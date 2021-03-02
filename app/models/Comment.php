<?php

namespace app\models;

use core\Database;

class Comment
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
}