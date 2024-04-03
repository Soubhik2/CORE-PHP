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
        }
        
        if ($this->conn->connect_error) {
            die("Database Connection failed");
        }

        return $this->conn;
    }

    public function get($table){
        $query = "SELECT * FROM `$table` ".$this->subQuery;
        // return new Runner($this->conn, $query);
        return $query;
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

    public function query($query){
        return new Runner($this->conn, $query);
    }

    private function addWhereSubQuery($col, $value){
        $q = explode(' ', $col);
        switch ($q[1]) {
            case '!=':
                $this->subQuery .= "WHERE `".$q[0]."` != $value";
                break;

            case '<':
                $this->subQuery .= "WHERE `".$q[0]."` < $value";
                break;

            case '>':
                $this->subQuery .= "WHERE `".$q[0]."` > $value";
                break;

            case '>=':
                $this->subQuery .= "WHERE `".$q[0]."` >= $value";
                break;

            case '<=':
                $this->subQuery .= "WHERE `".$q[0]."` <= $value";
                break;
            
            default:
                $this->subQuery .= "WHERE `".$q[0]."` = $value";
                break;
        }
    }

    private function addWhereSubQueryType($type, $col, $value){
        $q = explode(' ', $col);
        switch ($q[1]) {
            case '!=':
                $this->subQuery .= " $type `".$q[0]."` != $value";
                break;

            case '<':
                $this->subQuery .= " $type `".$q[0]."` < $value";
                break;

            case '>':
                $this->subQuery .= " $type `".$q[0]."` > $value";
                break;

            case '>=':
                $this->subQuery .= " $type `".$q[0]."` >= $value";
                break;

            case '<=':
                $this->subQuery .= " $type `".$q[0]."` <= $value";
                break;
            
            default:
                $this->subQuery .= " $type `".$q[0]."` = $value";
                break;
        }
    }
}