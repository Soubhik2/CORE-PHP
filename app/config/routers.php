<?php

    if ($request =='/' || $request == '') {
        require BASEPATH . $viewDir . 'welcome.php';
    } else if($request == '/test' || preg_match('/test\/[a-z]/i', $request)){
        require BASEPATH . $viewDir . 'test.php';
    } else{
        http_response_code(404);
        require BASEPATH . $viewDir . '404.php';
    }

?>