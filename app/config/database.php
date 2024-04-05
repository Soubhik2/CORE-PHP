<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// connect your mysql data base here
$database["host"] = 'localhost';
$database["username"] = 'root';
$database["password"] = '';
$database["database"] = 'javajdbc';

$database = new Database($database);
$conn = $database->connect();

if (!$conn) {
    die("<h2>Database Connection failed</h2> <h4>ERROR</h4>".$database->error());
}