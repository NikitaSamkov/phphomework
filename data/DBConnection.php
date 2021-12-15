<?php

class DBConnection
{
    private PDO $connection;

    public function __construct($host, $dbname, $username = 'root', $password = null)
    {
        try {
            $this->connection = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
        }
        catch (PDOException $e){
            die('Connection failed: '.$e->getMessage());
        }
    }

    public function Query($query): bool|PDOStatement
    {
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function QueryGet($query, $mode=PDO::FETCH_ASSOC): bool|array
    {
        return $this->Query($query)->fetchAll($mode);
    }

    public function GetTable($table): bool|array
    {
        return $this->QueryGet("SELECT * FROM $table");
    }

    public function GetOrdered($table, $column, $descending=false): bool|array
    {
        $mode = $descending ? 'DESC' : '';
        return $this->QueryGet("SELECT * FROM $table ORDER BY $column $mode");
    }

    public function IsExists($table, $column, $value): bool
    {
        $ids = $this->GetColumns($table, 'id', $column, $value);
        if(count($ids) > 0) {
            return true;
        }
        return false;
    }

    public function GetColumns($table, $targetColumns, $column, $value): bool|array
    {
        $columns = $targetColumns;
        if(gettype($targetColumns) == 'array') {
            $columns = implode(', ', $targetColumns);
        }
        $result = $this->QueryGet("SELECT $columns FROM $table WHERE $column='$value'");
        return $result;
    }

    public function GetRow($table, $column, $value): bool|array
    {
        return $this->QueryGet("SELECT * FROM $table WHERE $column='$value' LIMIT 1");
    }

    public function DeleteRow($table, $column, $value)
    {
        $query = "DELETE FROM $table WHERE $column=$value";
        $this->Query($query);
    }

    public function UpdateRow($table, $updValues, $column, $value)
    {
        $values = array();
        foreach ($updValues as $key => $updValue) {
            $val = (gettype($updValue) == "array") ? ((isset($updValue[1]) && $updValue[1]) ? "'$updValue[0]'" : $updValue[0]) : $updValue;
            $values[] = "$key=$val";
        }
        $values = join(', ', $values);
        $query = "UPDATE $table SET $values WHERE $column=$value";
        $this->Query($query);
    }

    public function AddRow($table, $values)
    {
        $modifiedValues = array();
        foreach ($values as $value) {
            $modifiedValues[] = (gettype($value) == "array") ? ((isset($value[1]) && $value[1]) ? "'$value[0]'" : $value[0]) : $value;
        }
        $modifiedValues = join(', ', $modifiedValues);
        $query = "INSERT INTO $table VALUES ($modifiedValues)";
        print_r($query);
        $this->Query($query);
    }
}
