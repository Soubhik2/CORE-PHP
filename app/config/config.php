<?php
defined('BASEPATH') OR exit('No direct script access allowed');


// AUTO, MANUAL (recommend)
$router = "AUTO";
$default_page = "welcome";

// development, deploy
$project = "development";

$viewDir = '/app/views/';
$request = $_SERVER['REQUEST_URI'];