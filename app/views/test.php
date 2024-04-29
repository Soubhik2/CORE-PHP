<?php $page_name = 'test' ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="icon" type="image/x-icon" href="<?= BASEURL ?>public/asset/php.png">
    <link rel="stylesheet" href="<?= BASEURL ?>public/css/demo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  </head>
  <body>
    <?php require 'util/header.php'; ?>

    <ul class="list-group container my-5">
        <li class="list-group-item">$routes['/test/:any'] = 'test/$value/$id';</li>
        <li class="list-group-item">$value : <?= $value ?></li>
        <li class="list-group-item">$id : <?= $id ?></li>
    </ul>

    <?php require 'util/footer.php'; ?>

    <script src="<?= BASEURL ?>public/js/demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>