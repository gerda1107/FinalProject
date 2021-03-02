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
        $data = [];
        $this->view('users/register', $data);
    }

    public function login()
    {
        $data = [];
        $this->view('users/login', $data);
    }
}