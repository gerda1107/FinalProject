<?php

namespace app\models;

use core\Database;

/**
 * Class for getting and adding comments to DB.
 */
class Comment
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * Function to add comments to DB.
     *
     * @param array $data
     * @return bool
     */
    public function addComment($data)
    {
        $this->db->query('INSERT INTO comments (user_id, author, comment_body) VALUES (:user_id, :author, :comment_body)');

        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':author', $data['username']);
        $this->db->bind(':comment_body', $data['commentBody']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Function to get all comments from DB.
     *
     * @return object
     */
    public function getComments()
    {
        $sql = "SELECT * FROM comments ORDER BY created_at DESC";

        $this->db->query($sql);
        
        $result = $this->db->resultSet();

        return $result;
    }

    /**
     * Function to get username by ID from DB.
     *
     * @param int $id
     */
    public function getUsername($id)
    {
        $this->db->query("SELECT name, lastname FROM users WHERE user_id = :id");

        $this->db->bind(':id', $id);

        $row = $this->db->singleRow();

        if ($this->db->rowCount() > 0) return $row;
        return false;
    }
}