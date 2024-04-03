<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Runner {
    private $query;
    private $conn;
    public function __construct($conn,$query) {
        $this->conn = $conn;
        $this->query = $query;
    }

    public function result(){
        $result = $this->conn->query($this->query);
        $arr = [];

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_object()) {
                array_push($arr, $row);
            }
            return $arr;
        } else {
            return false;
        }
    }

    public function result_array(){
        $result = $this->conn->query($this->query);
        $arr = [];

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                array_push($arr, $row);
            }
            return $arr;
        } else {
            return false;
        }
    }

    public function result_json(){
        $result = $this->conn->query($this->query);
        $arr = [];

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_object()) {
                array_push($arr, $row);
            }
            return json_encode($arr);
        } else {
            return false;
        }
    }
}