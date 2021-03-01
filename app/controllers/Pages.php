<?php

namespace app\controllers;
use core\Controller;

class Pages extends Controller
{
    public function index()
    {
        $data = [];
        $this->view('pages/index', $data);
    }
}