<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Runner {
    private $query;
    private $conn;
    private $context;
    public function __construct($context, $query) {
        $this->context = $context;
        $this->conn = $context->conn();
        $this->query = $query;
    }

    public function count(){
        $result = $this->conn->query($this->query);
        return $result->num_rows;
    }

    public function result(){
        // try {
        //     $result = $this->conn->query($this->query);
        // } catch (\Throwable $e) {
        //     $this->context->seterror($e, 'mnxygfi');
        //     return false;
        // }
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

    public function get_query(){
        return $this->query;
    }
}