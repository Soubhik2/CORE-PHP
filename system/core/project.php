<?php

if ($project == "development") {
    error_reporting(E_ERROR | E_PARSE);
}

if ($project == "deploy") {
    error_reporting(0);
    error_reporting(E_ERROR | E_PARSE);
    ini_set('display_errors', 'Off');
}