<?php
  define("BASEPATH", __DIR__);
  $pass_url = 'CPHP';
  $localhost = $_SERVER["SERVER_NAME"];
  define("BASEURL", "http://$localhost/$pass_url/");
?>

<?php require_once BASEPATH.'/app/config/autoload.php' ;?>