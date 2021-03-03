<?php

namespace app\models;

use core\Database;

/**
 * User model class to get needed info from DB.
 */
class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * Insert given data to DB.
     *
     * @param array $data
     * @return bool
     */
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

    /**
     * Find user by email in DB.
     *
     * @param string $email
     * @return bool
     */
    public function findUserByEmail($email)
    {
        $this->db->query("SELECT * FROM users WHERE email = :email");
        $this->db->bind(':email', $email);

        $row = $this->db->singleRow();

        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * If user exists, select needed info from db
     *
     * @param string $email
     * @param string $notHashedPass
     * @return bool
     */
    public function login($email, $notHashedPass)
    {
        $this->db->query("SELECT * FROM users WHERE `email` = :email");

        $this->db->bind(':email', $email);

        $row = $this->db->singleRow();

        if ($row) {
            $hashedPassword = $row->password;
        } else {
            return false;
        }

        if (password_verify($notHashedPass, $hashedPassword)) {
            return $row;
        } else {
            return false;
        }
    }
}