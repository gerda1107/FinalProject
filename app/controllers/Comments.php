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
        $data = [];
        $this->view('comments/feedback', $data);
    }
}