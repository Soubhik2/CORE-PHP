<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (isset($autoload['session'])) {
    if ($autoload['session']) {
        require_once BASEPATH .'/system/libraries/session.php';
    }
}

if (isset($autoload['database'])) {
    if ($autoload['database']) {
        require_once BASEPATH .'/system/database/database.php';
        require_once BASEPATH .'/app/config/database.php';
    }
}

// *--*
// Basic Configration

if (isset($autoload['input'])) {
    if ($autoload['input']) {
        require_once BASEPATH .'/system/libraries/input.php';
    }
}

if (isset($autoload['auth'])) {
    if ($autoload['auth']) {
        require_once BASEPATH .'/system/libraries/auth.php';
    }
}

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

require_once BASEPATH .'/system/router/routers.php';
