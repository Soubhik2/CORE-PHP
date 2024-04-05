<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Input{

    public function __construct() {
        
    }

    public function post($name=null, $xss=false){
        if ($xss) {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        }
        if ($name != null) {
            return $_POST[$name];
        } else {
            return $_POST;
        }
    }

    public function get($name=null, $xss=false){
        if ($xss) {
            $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
        }
        if ($name != null) {
            return $_GET[$name];
        } else {
            return $_GET;
        }
    }

    public function cookie($name=null, $xss=false){
        if ($xss) {
            $_COOKIE = filter_input_array(INPUT_COOKIE, FILTER_SANITIZE_STRING);
        }
        if ($name != null) {
            return $_COOKIE[$name];
        } else {
            return $_COOKIE;
        }
    }

    public function set_cookie($name, $value, $expires=86400, $path="/", $domain="", $secure=false, $httponly=false){
        setcookie($name, $value, time() + ($expires), $path, $domain, $secure, $httponly);
    }
    
}

$input = new Input();