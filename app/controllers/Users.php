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
                    'passwordErr' => '',
                    'confirmPasswordErr' => '',
                ],
            ];

            $data['errors']['nameErr'] = $this->vld->validateName($data['name']);
            $data['errors']['lastnameErr'] = $this->vld->validateLastame($data['lastname']);
            $data['errors']['emailErr'] = $this->vld->validateEmail($data['email'], $this->userModel);
            $data['errors']['passwordErr'] = $this->vld->validatePassword($data['password'], 6, 10);
            $data['errors']['confirmPasswordErr'] = $this->vld->confirmPassword($data['confirmPassword']);

            if ($this->vld->ifEmptyArr($data['errors'])) {

                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                if ($this->userModel->register($data)) {
                    flash('register_status', 'Registracija sėkminga! Prašome prisijungti.');
                    redirect('/users/login');
                } else {
                    die("Something went wrong in adding user to DB.");
                }
            } else {
                flash('register_status', 'Prašome patikrinti ar viską užpildėte teisingai.', 'alert alert-danger');
                $this->view('users/register', $data);
            }
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