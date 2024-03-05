<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// *--*
// Load Databases

require_once BASEPATH .'/app/db/_dbconnect.php';

// *--*
// Basic Configration

require_once BASEPATH .'/app/config/config.php';

if ($project == "development") {
    error_reporting(E_ERROR | E_PARSE);
}

if ($project == "deploy") {
    error_reporting(0);
    error_reporting(E_ERROR | E_PARSE);
    ini_set('display_errors', 'Off');
}

$request = str_replace("/$pass_url",'',$request);
$requests = explode('/', $request);

require_once BASEPATH .'/app/config/routers.php';