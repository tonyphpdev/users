<?php

class Users_model extends Model
{

    public function all()
    {
        $result = $this->query('SELECT * FROM users');
        return $result;
    }

    public function getById($id)
    {
        $id = $this->escapeString($id);
        $result = $this->query('SELECT * FROM users WHERE id="' . $id . '"');
        return $result;
    }

    public function add($user_name, $user_email, $user_country)
    {
        if ($this->query('INSERT INTO users (name, email, country_id) VALUES (' . $user_name . ', ' . $user_email . ', ' . $user_country . ')')) {
            header("Location: /");
        }
    }
}