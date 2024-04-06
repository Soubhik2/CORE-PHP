<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Session{
    public function __construct() {
        session_start();
        foreach ($this->userdata() as $key => $value) {
            try {
                if (is_array($value) or is_object($value)) {
                    $value = json_encode($value);
                    eval('$this'."->$key = '$value';");
                }else{
                    eval('$this'."->$key = '$value';");
                }
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
    }

    public function userdata($value=null){
        if ($value!=null) {
            return $_SESSION[$value];
        }else{
            return $_SESSION;
        }
    }

    public function set_userdata($name, $value=""){
        if (is_array($name)) {
            foreach ($name as $key => $value) {
                $_SESSION[$key] = $value;
            }
        } else {
            $_SESSION[$name] = $value;
        }
        
    }

    public function has_userdata($name){
        return isset($_SESSION[$name]);
    }

    public function unset_userdata($arr){
        if (is_array($arr)) {
            $eval = "unset(";
            $eval .= implode(', ', array_map(
                function ($k, $v) { return '$_SESSION["'.$v.'"]'; },
                array_keys($arr),
                $arr
            ));
            $eval .= ');';
            eval($eval);
        } else {
            unset($_SESSION[$arr]);
        }
    }

    public function destroy(){
        session_destroy();
    }
}

$session = new Session();