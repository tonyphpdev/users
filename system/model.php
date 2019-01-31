<?php

class Model
{

    private $connection;

    public function __construct()
    {
        global $config;

        $this->connection = mysql_pconnect($config['db_host'], $config['db_username'], $config['db_password']) or die('MySQL Error: ' . mysql_error());
        mysql_select_db($config['db_name'], $this->connection);
    }

    public function escapeString($string)
    {
        return mysql_real_escape_string($string);
    }

    public function escapeArray($array)
    {
        array_walk_recursive($array, create_function('&$v', '$v = mysql_real_escape_string($v);'));
        return $array;
    }

    public function query($qry)
    {
        $result = mysql_query($qry) or die('MySQL Error: ' . mysql_error());
        $resultObjects = array();

        while ($row = mysql_fetch_object($result)) {
            $resultObjects[] = $row;
        }

        return $resultObjects;
    }

    public function execute($qry)
    {
        $exec = mysql_query($qry) or die('MySQL Error: ' . mysql_error());
        return $exec;
    }

    public function insert($table, $columns = [], $row = [])
    {
        $exec = mysql_query("INSERT INTO " . $table . " (" . implode(',', $columns) . ") VALUES (" . implode(',', $row) . ")  . ") or die('MySQL Error: ' . mysql_error());
    }

    public function update($table, $id, $columns = [], $row = [])
    {
        $id = $this->escapeString($id);
        $updateArr = [];
        if (count($columns) === count($row)) {
            for ($i = 0; $i < count($columns); $i++) {
                $updateArr[] = $columns[$i] . '=' . $this->escapeString($row[$i]);
            }
        }
        $exec = mysql_query("UPDATE " . $table . " SET " . implode(',', $updateArr) . " WHERE id=" . $id) or die('MySQL Error: ' . mysql_error());
    }

    public function deleteById($id, $table)
    {
        $id = $this->escapeString($id);
        $exec = mysql_query('DELETE FROM ' . $table . ' WHERE id="' . $id . '"') or die('MySQL Error: ' . mysql_error());
    }

}