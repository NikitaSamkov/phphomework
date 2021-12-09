<?php

class DBConnection
{
    private $connection;

    public function __construct($host, $dbname, $username = 'root', $password = null)
    {
        try {
            $this->connection = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
        }
        catch (PDOException $e){
            die('Connection failed: '.$e->getMessage());
        }
    }

    public function Query($query)
    {
        return $this->connection->query($query);
    }

    public function QueryGet($query, $mode=PDO::FETCH_ASSOC)
    {
        return $this->Query($query)->fetchAll($mode);
    }

    public function GetTable($table)
    {
        return $this->QueryGet("SELECT * FROM $table");
    }

    public function GetOrdered($table, $column, $descending=false)
    {
        $mode = $descending ? 'DESC' : '';
        return $this->QueryGet("SELECT * FROM $table ORDER BY $column $mode");
    }

    public function IsExists($table, $column, $value)
    {
        $ids = $this->GetColumns($table, 'id', $column, $value);
        if(count($ids) > 0) {
            return true;
        }
        return false;
    }

    public function GetColumns($table, $targetColumns, $column, $value) {
        $columns = $targetColumns;
        if(gettype($targetColumns) == 'array') {
            $columns = implode(', ', $targetColumns);
        }
        $result = $this->QueryGet("SELECT $columns FROM $table WHERE $column='$value'");
        return $result;
    }

    public function GetRow($table, $column, $value) {
        return $this->QueryGet("SELECT * FROM $table WHERE $column='$value' LIMIT 1");
    }
}
