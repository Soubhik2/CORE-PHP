<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'runner.php';

class Database {
    private $host;
    private $username;
    private $password;
    private $database;
    private $conn;
    private $subQuery = "";
    private $error;

    public function __construct($database) {
        $this->host = $database['host'];
        $this->username = $database['username'];
        $this->password = $database['password'];
        $this->database = $database['database'];
    }

    public function connect() {
        try {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        } catch (Exception $e) {
            $this->conn = false;
            $this->error = $e;
        }
        return $this->conn;
    }

    // public function get($table){
    //     $query = "SELECT * FROM `$table` ".$this->subQuery;
    //     // return new Runner($this->conn, $query);
    //     return $query;
    // }
    public function get($table, $pre = null, $limit = null) {
        $query = "SELECT * FROM `$table` ".$this->subQuery;
        if ($limit !== null && $pre !== null) {
            // If both $pre and $limit are provided
            $query .= " LIMIT $pre, $limit";
        } elseif ($pre !== null) {
            // If only $limit is provided
            $query .= " LIMIT $pre";
        }
        // return $query;
        return new Runner($this, $query);
    }

    public function insert($table, $data) {
        $length = count($data);
        $query = "INSERT INTO $table (";
        // $query = "INSERT INTO mytable (title, name, date) VALUES ('My title', 'My name', 'My date')";
        $i = 1;
        foreach ($data as $key => $value) {
            if ($length > $i) {
                $query .= "$key, ";
            } else {
                $query .= "$key";
            }
            $i++;
        }
        $query .= ") VALUES (";
        $j = 1;
        foreach ($data as $key => $value) {
            if ($length > $j) {
                $query .= "'$value', ";
            } else {
                $query .= "'$value'";
            }
            $j++;
        }
        $query .= ")";
        return $this->conn->query($query);
    }

    public function update($table, $data) {
        $length = count($data);
        $query = "INSERT INTO $table SET ";
        // $query = "INSERT INTO mytable (title, name, date) VALUES ('My title', 'My name', 'My date')";

        $query .= implode(', ', array_map(
            function ($k, $v) { return "$k = '$v'"; },
            array_keys($data),
            $data
        ));
        $query .= ' '; // `student`.`id`
        $query .= $this->subQuery;
        
        return $query;
        // return $this->conn->query($query);
    }

    public function where($col, $value){
        if (strpos($this->subQuery, "WHERE") !== false) {
            $this->addWhereSubQueryType("AND", $col, $value);
        } else {
            // $this->subQuery = "WHERE `$col` = $value";
            $this->addWhereSubQuery($col, $value);
        }
        
        return $this;
    }

    public function or_where($col, $value){
        if (strpos($this->subQuery, "WHERE") !== false) {
            // $this->subQuery .= " OR `$col` = $value";
            $this->addWhereSubQueryType("OR", $col, $value);
        } else {
            // $this->subQuery = "WHERE `$col` = $value";
            $this->addWhereSubQuery($col, $value);
        }
        
        return $this;
    }

    public function like($col, $value, $type = null){
        if (strpos($this->subQuery, "WHERE") !== false) {
            $this->addLikeSubQueryType("AND", $col, $value, $type);
        } else {
            // $this->subQuery = "WHERE `$col` = $value";
            $this->addLikeSubQuery($col, $value, $type);
        }
        
        return $this;
    }

    public function or_like($col, $value, $type = null){
        if (strpos($this->subQuery, "WHERE") !== false) {
            $this->addLikeSubQueryType("OR", $col, $value, $type);
        } else {
            // $this->subQuery = "WHERE `$col` = $value";
            $this->addLikeSubQuery($col, $value, $type);
        }
        
        return $this;
    }

    public function query($query){
        return new Runner($this->conn, $query);
    }

    public function conn(){
        // echo 'hello';
        return $this->conn;
    }

    public function error(){
        return $this->error;
    }
    // public function seterror($error, $key){
    //     if ($key == "mnxygfi") {
    //         $this->error = $error;
    //     }
    // }

    private function addWhereSubQuery($col, $value){
        $q = explode(' ', $col);
        switch ($q[1]) {
            case '!=':
                $this->subQuery .= "WHERE `".$q[0]."` != '$value'";
                break;

            case '<':
                $this->subQuery .= "WHERE `".$q[0]."` < '$value'";
                break;

            case '>':
                $this->subQuery .= "WHERE `".$q[0]."` > '$value'";
                break;

            case '>=':
                $this->subQuery .= "WHERE `".$q[0]."` >= '$value'";
                break;

            case '<=':
                $this->subQuery .= "WHERE `".$q[0]."` <= '$value'";
                break;
            
            default:
                $this->subQuery .= "WHERE `".$q[0]."` = '$value'";
                break;
        }
    }

    private function addLikeSubQuery($col, $value, $type){
        switch ($type) {
            case 'before':
                $this->subQuery .= "WHERE `$col` LIKE '%$value'";
                break;

            case 'after':
                $this->subQuery .= "WHERE `$col` LIKE '$value%'";
                break;

            case 'none':
                $this->subQuery .= "WHERE `$col` LIKE '$value'";
                break;
            
            default:
                $this->subQuery .= "WHERE `$col` LIKE '%$value%'";
                break;
        }
    }
    

    private function addWhereSubQueryType($type, $col, $value){
        $q = explode(' ', $col);
        switch ($q[1]) {
            case '!=':
                $this->subQuery .= " $type `".$q[0]."` != '$value'";
                break;

            case '<':
                $this->subQuery .= " $type `".$q[0]."` < '$value'";
                break;

            case '>':
                $this->subQuery .= " $type `".$q[0]."` > '$value'";
                break;

            case '>=':
                $this->subQuery .= " $type `".$q[0]."` >= '$value'";
                break;

            case '<=':
                $this->subQuery .= " $type `".$q[0]."` <= '$value'";
                break;
            
            default:
                $this->subQuery .= " $type `".$q[0]."` = '$value'";
                break;
        }
    }

    private function addLikeSubQueryType($set, $col, $value, $type){
        switch ($type) {
            case 'before':
                $this->subQuery .= " $set `$col` LIKE '%$value'";
                break;

            case 'after':
                $this->subQuery .= " $set `$col` LIKE '$value%'";
                break;

            case 'none':
                $this->subQuery .= " $set `$col` LIKE '$value'";
                break;
            
            default:
                $this->subQuery .= " $set `$col` LIKE '%$value%'";
                break;
        }
    }
}