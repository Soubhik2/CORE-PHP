<?php
    $viewDir = '/app/views/';
    $request = $_SERVER['REQUEST_URI'];
    $request = str_replace("/$pass_url",'',$request);

    $requests = explode('/', $request);

    require 'routers.php';
?>