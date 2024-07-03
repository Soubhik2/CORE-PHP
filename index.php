<?php
  ob_start();
  define("BASEPATH", __DIR__);
  $pass_url = 'CPHP';
  $localhost = $_SERVER["SERVER_NAME"];
  define("BASEURL", "http://$localhost/$pass_url/");

  // development, deploy
  $project = "development";
?>

<?php
  try {
    require_once BASEPATH.'/app/config/autoload.php';
  } catch (\Throwable $th) {
      require_once BASEPATH.'/system/error/error.php';
      $error = new CError($th);

      if ($project == "development") {
        // echo '<pre>';
        // echo '<h2>'.$th.'</h2>';
        // echo '</pre>';
        ob_end_clean();
        $error->display();
      }

      if ($project == "deploy") {
        ob_end_clean();
        $error->displayError500();
        // echo "<h1>500</h1>";
      }
  }
?>

<?php ?>