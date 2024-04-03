<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once BASEPATH .'/app/config/routes.php';

if ($router == "AUTO") {
    if ($request =='/' || $request == '') {
        $req = $default_page;
    }else{
        $req = $request;
    }

    if (file_exists(BASEPATH . $viewDir . $req . '.php')) {
        require_once BASEPATH . $viewDir . $req.'.php';
    } else {
        require_once $routes['404'] == null ? BASEPATH . $viewDir . 'errors/404ERROR.php': BASEPATH . $viewDir . $routes['404'].'.php';
    }
}

if ($router == "MANUAL") {
    foreach ($routes as $key => $value) {
        $key = str_replace("/:any",'\/[a-z]/i',$key);
        $key = str_replace("/:num",'\/[0-9]/i',$key);
        
        $pages = explode('/$', $value);
        
        if ($request == $key || preg_match($key, $request)) {
    
            for ($i=1; $i < count($pages); $i++) { 
                // echo $pages[$i].'='.$requests[$i+1].'<br>';
                $req_values = explode("?", $requests[$i+1]);
                eval('$'.$pages[$i].'="'.$req_values[0].'";');
            }
    
            require_once BASEPATH . $viewDir . $pages[0].'.php';
            $isPage = TRUE;
            break;
        }
    }
    if (!$isPage) {
        require_once $routes['404'] == null ? BASEPATH . $viewDir . 'errors/404ERROR.php': BASEPATH . $viewDir . $routes['404'].'.php';
    }
}