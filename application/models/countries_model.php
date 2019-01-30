<?php

class Countries_model extends Model
{

    public function all()
    {
        $result = $this->query('SELECT * FROM countries');
        return $result;
    }

    public function getById($id)
    {
        $id = $this->escapeString($id);
        $result = $this->query('SELECT * FROM countries WHERE id="' . $id . '"');
        return $result;
    }
}