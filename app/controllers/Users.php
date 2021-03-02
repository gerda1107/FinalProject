<?php

namespace app\controllers;

use app\models\User;
use core\Controller;
use core\Validation;

class Users extends Controller
{
    private $userModel;
    private $vld;

    public function __construct()
    {
        $this->userModel = new User;
        $this->vld = new Validation;
    }

    public function register()
    {
        if (ifRequestIsPost()) {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'name' => trim($_POST['name']),
                'lastname' => trim($_POST['lastname']),
                'email' => trim($_POST['email']),
                'phone' => trim($_POST['phone']),
                'address' => trim($_POST['address']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),

                'errors' => [
                    'nameErr' => '',
                    'lastnameErr' => '',
                    'emailErr' => '',
                    'phoneErr' => '',
                    'passwordErr' => '',
                    'confirmPasswordErr' => '',
                ],
            ];

            $data['errors']['nameErr'] = $this->vld->validateName($data['name']);
            $data['errors']['lastnameErr'] = $this->vld->validateLastame($data['lastname']);

            $this->view('users/register', $data);
        } else {
            $data = [
                'name' => '',
                'lastname' => '',
                'email' => '',
                'phone' => '',
                'address' => '',
                'password' => '',
                'confirmPassword' => '',

                'errors' => [
                    'nameErr' => '',
                    'lastnameErr' => '',
                    'emailErr' => '',
                    'phoneErr' => '',
                    'passwordErr' => '',
                    'confirmPasswordErr' => '',
                ],
            ];
            $this->view('users/register', $data);
        }
    }

    public function login()
    {
        $data = [];
        $this->view('users/login', $data);
    }
}