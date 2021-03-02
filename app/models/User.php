<?php

namespace app\models;

use core\Database;

class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function register($data)
    {
        $this->db->query("INSERT INTO users (`name`, `lastname`, `email`, `phone`, `address`, `password`) VALUES (:name, :lastname, :email, :phone, :address, :password)");

        $this->db->bind(':name', $data['name']);
        $this->db->bind(':lastname', $data['lastname']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':password', $data['password']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}