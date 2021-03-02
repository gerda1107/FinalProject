<?php

namespace app\controllers;

use app\models\Comment;
use core\Controller;
use core\Validation;

class Comments extends Controller
{
    private $commentModel;
    private $vld;

    public function __construct()
    {
        $this->commentModel = new Comment;
        $this->vld = new Validation;
    }

    public function index()
    {
        if(isset($_SESSION['user_id'])) {
          $data = [
            'username' => $this->commentModel->getUsername($_SESSION['user_id'])
            ];  
        } else {
             $data = [];
        }
        
        $this->view('comments/feedback', $data);
    }

    public function addComment()
    {
        if (ifRequestIsPost()) {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $id = $_SESSION['user_id'];

            $data = [
                'user_id' => $id,
                'username' => trim($_POST['userName']),
                'commentBody' => trim($_POST['commentBody']),

                'errors' => [
                    'usernameErr' => '',
                    'commentBodyErr' => '',
                ],
            ];

            $data['errors']['usernameErr'] = $this->vld->validateName($data['username']);
            $data['errors']['commentBodyErr'] = $this->vld->validateComment($data['commentBody']);

            if ($this->vld->ifEmptyArr($data['errors'])) {
                $commentData = [
                    'user_id' => $data['user_id'],
                    'username' => $data['username'],
                    'commentBody' => $data['commentBody'],
                ];

                if ($this->commentModel->addComment($commentData)) {
                    $result['success'] = "Komentaras sėkmingai pridėtas.";
                } else {
                    $result['errors'] = "Bandykite dar kartą.";
                }
            } else {
                $result['errors'] = $data['errors'];
            }

        } else {
            $result['error'] = 'not allowed';
            redirect('/comments');
        }

        echo json_encode($result);
        die();  
    }

    public function getAllComments()
    {
        $comments = $this->commentModel->getComments();
        $data = [
            'comments' => $comments,
        ];

        header('Content-Type: application/json');
        echo json_encode($data);
    }
}