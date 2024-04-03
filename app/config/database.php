<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require_once BASEPATH .'/system/database/database.php';

// connect your mysql data base here
$database["host"] = 'localhost';
$database["username"] = 'root';
$database["password"] = '';
$database["database"] = 'javajdbc';

$database = new Database($database);
$conn = $database->connect();