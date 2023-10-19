<?php

    session_start();

    function isUserLogin(){
        if (isset($_SESSION['loggedin']) and $_SESSION['loggedin']==true) {
            return true;
        }else{
            return false;
        }
    }

    function createUserWithEmailAndPassword($email, $password, $conn){
        if ($conn) {
            if (strpos($email, "@") and strpos($email, ".com")) {
                if (strlen($password) >= 6) {
    
                    $spec = array('!','@','#','$','%','^','&','*');
    
                    foreach ($spec as $key => $value) {
                        if (strpos($password, $value)) {
                            $pass_v = true;
                            break;
                        }else{
                            $pass_v = false;
                        }
                    }
    
                    if ($pass_v) {
                        try {
                            $result = mysqli_query($conn, "SELECT * FROM `users` WHERE `user` = '$email'");
                            $numExistRow = mysqli_num_rows($result);
                    
                            if ($numExistRow > 0) {
                            //   echo "Username Already Exists";
                                return array("Check"=>false, "Message"=>"Username Already Exists", "Code"=>"ERROR: numExistRow ". $numExistRow. " it is grater then 0");
                            }else{
                                $hash = password_hash($password, PASSWORD_DEFAULT);
                                $sql = "INSERT INTO `users` (`sno`, `user`, `password`, `date`) VALUES (NULL, '$email', '$hash', current_timestamp())";
                                try {
                                    $result = mysqli_query($conn, $sql);
                                    if ($result) {
                                        return array("Check"=>true, "Message"=>"Successfully Signed in", "Code"=>"auth - signed in");
                                    }
                                } catch (Exception $e) {
                                    //throw $th;
                                    return array("Check"=>false, "Message"=>"Network connect problem", "Code"=>"ERROR: ".$e);
                                }
                            }
                        } catch (Exception $e) {
                            //throw $th;
                            return array("Check"=>false, "Message"=>"Network connect problem", "Code"=>"ERROR: ".$e);
                        }
                    }else{
                        return array("Check"=>false, "Message"=>"Password have minmum 1 special character", "Code"=>"ERROR: password no special character found");
                    }
    
                }else{
                    return array("Check"=>false, "Message"=>"Password have minmum 6 digit", "Code"=>"ERROR: password lenth is ".strlen($password). ". This smaller than 6");
                }
            }else{
                return array("Check"=>false, "Message"=>"This email is badly formated", "Code"=>"ERROR: ". $email ." this email id is not formated like '@', '.com' ");
            }
        }else{
            return array("Check"=>false, "Message"=>"Network connect problem", "Code"=>"NULL");
        }
    }

    function createUserWithUsernameAndPassword($username, $password, $conn){
        if ($conn) {
            $user_spec = array('0','1','2','3','4','5','6','7','8','9');
            foreach ($user_spec as $key => $value) {
                if (strpos($username, $value)) {
                    $user_v = true;
                    break;
                }else{
                    $user_v = false;
                }
            }
            if ($user_v) {
                if (strlen($password) >= 6) {
    
                    $spec = array('!','@','#','$','%','^','&','*');
    
                    foreach ($spec as $key => $value) {
                        if (strpos($password, $value)) {
                            $pass_v = true;
                            break;
                        }else{
                            $pass_v = false;
                        }
                    }
    
                    if ($pass_v) {
                        try {
                            $result = mysqli_query($conn, "SELECT * FROM `users` WHERE `user` = '$username'");
                            $numExistRow = mysqli_num_rows($result);
                    
                            if ($numExistRow > 0) {
                            //   echo "Username Already Exists";
                                return array("Check"=>false, "Message"=>"Username Already Exists", "Code"=>"ERROR: numExistRow ". $numExistRow. " it is grater then 0");
                            }else{
                                $hash = password_hash($password, PASSWORD_DEFAULT);
                                $sql = "INSERT INTO `users` (`sno`, `user`, `password`, `date`) VALUES (NULL, '$username', '$hash', current_timestamp())";
                                try {
                                    $result = mysqli_query($conn, $sql);
                                    if ($result) {
                                        return array("Check"=>true, "Message"=>"Successfully Signed in", "Code"=>"auth - signed in");
                                    }
                                } catch (Exception $e) {
                                    //throw $th;
                                    return array("Check"=>false, "Message"=>"Network connect problem", "Code"=>"ERROR: ".$e);
                                }
                            }
                        } catch (Exception $e) {
                            //throw $th;
                            return array("Check"=>false, "Message"=>"Network connect problem", "Code"=>"ERROR: ".$e);
                        }
                    }else{
                        return array("Check"=>false, "Message"=>"Password have minmum 1 special character", "Code"=>"ERROR: password no special character found");
                    }
    
                }else{
                    return array("Check"=>false, "Message"=>"Password have minmum 6 digit", "Code"=>"ERROR: password lenth is ".strlen($password). ". This smaller than 6");
                }
            }else{
                return array("Check"=>false, "Message"=>"This username is already used", "Code"=>"ERROR: ". $username ." username have no number or charactor in used");
            }
        }else{
            return array("Check"=>false, "Message"=>"Network connect problem", "Code"=>"NULL");
        }
    }

    function createUser($userid, $password, $conn){
        if ($conn) {
            if (strlen($password) >= 6) {

                $spec = array('!','@','#','$','%','^','&','*');

                foreach ($spec as $key => $value) {
                    if (strpos($password, $value)) {
                        $pass_v = true;
                        break;
                    }else{
                        $pass_v = false;
                    }
                }

                if ($pass_v) {
                    try {
                        $result = mysqli_query($conn, "SELECT * FROM `users` WHERE `user` = '$userid'");
                        $numExistRow = mysqli_num_rows($result);
                
                        if ($numExistRow > 0) {
                        //   echo "Username Already Exists";
                            return array("Check"=>false, "Message"=>"Username Already Exists", "Code"=>"ERROR: numExistRow ". $numExistRow. " it is grater then 0");
                        }else{
                            $hash = password_hash($password, PASSWORD_DEFAULT);
                            $sql = "INSERT INTO `users` (`sno`, `user`, `password`, `date`) VALUES (NULL, '$userid', '$hash', current_timestamp())";
                            try {
                                $result = mysqli_query($conn, $sql);
                                if ($result) {
                                    return array("Check"=>true, "Message"=>"Successfully Signed in", "Code"=>"auth - signed in");
                                }
                            } catch (Exception $e) {
                                //throw $th;
                                return array("Check"=>false, "Message"=>"Network connect problem", "Code"=>"ERROR: ".$e);
                            }
                        }
                    } catch (Exception $e) {
                        //throw $th;
                        return array("Check"=>false, "Message"=>"Network connect problem", "Code"=>"ERROR: ".$e);
                    }
                }else{
                    return array("Check"=>false, "Message"=>"Password have minmum 1 special character", "Code"=>"ERROR: password no special character found");
                }

            }else{
                return array("Check"=>false, "Message"=>"Password have minmum 6 digit", "Code"=>"ERROR: password lenth is ".strlen($password). ". This smaller than 6");
            }
        }else{
            return array("Check"=>false, "Message"=>"Network connect problem", "Code"=>"NULL");
        }
    }

    function signIn($userid, $password, $conn){
        if ($conn) {
            try {
                $User_result = mysqli_query($conn, "SELECT * FROM `users` WHERE `user` = '$userid'");
                $num_rows = mysqli_num_rows($User_result);
                if ($num_rows == 1) {
                  while ($get_data_row = mysqli_fetch_assoc($User_result)) {
                    if (password_verify($password, $get_data_row['password'])) {
                      $_SESSION['loggedin'] = true;
                      return array("Check"=>true, "Message"=>"Successfully Signed in", "Code"=>"auth - signed in");
                    }else{
                      return array("Check"=>false, "Message"=>"Invalid Password", "Code"=>"ERROR: auth - sign account password is not match");
                    }
                  }
                }else{
                  return array("Check"=>false, "Message"=>"Invalid User", "Code"=>"ERROR: auth - sign account user is not found");
                }
            } catch (Exception $e) {
                return array("Check"=>false, "Message"=>"Network connect problem", "Code"=>"ERROR: ".$e);
            }
        }else{
            return array("Check"=>false, "Message"=>"Network connect problem", "Code"=>"ERROR: NULL");
        }
    }

    function logout(){
        session_unset();
        session_destroy();
    }
?>