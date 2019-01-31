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
        $user_country = (int)$user_country;
        $this->insert('users', ['name', 'email', 'country_id'], [$user_name, $user_email, $user_country]);
        return true;
    }

    public function edit($user_id, $user_name, $user_email, $user_country)
    {
        $user_country = (int)$user_country;
        $this->update('users', $user_id, ['name', 'email', 'country_id'], [$user_name, $user_email, $user_country]);
        return true;
    }

    public function delete($id)
    {
        $this->deleteById($id, 'users');
        return true;
    }
}