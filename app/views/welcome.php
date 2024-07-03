<?php $page_name = 'welcome'; ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="icon" type="image/x-icon" href="<?= BASEURL ?>public/asset/php.png">
    <!-- <link rel="stylesheet" href="<?= BASEURL ?>public/css/demo.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  </head>
  <body>
    <?php require 'util/header.php'; ?>

    <div class="px-4 py-4 text-center">
        <img class="d-block mx-auto mb-4" src="<?= BASEURL ?>public/asset/php.png" alt="" width="100">
        <h1 class="display-5 fw-bold text-body-emphasis">WELCOME TO CORE PHP</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most
                popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system,
                extensive prebuilt components, and powerful JavaScript plugins.</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <a href="https://github.com/Soubhik2/CORE-PHP" class="btn btn-primary btn-lg px-4 gap-3">Get Start<i class="bi bi-arrow-right-short"></i></a>
            </div>
        </div>
        <h2 class="mt-5">Most used variables</h2>
        <ul class="list-group container">
            <li class="list-group-item">BASEPATH : <?= BASEPATH ?></li>
            <li class="list-group-item">BASEURL : <?= BASEURL ?></li>
            <li class="list-group-item">$viewDir : <?= $viewDir ?></li>
            <li class="list-group-item">$pass_url : <?= $pass_url ?></li>
        </ul>
    </div>

    <?php require 'util/footer.php'; ?>

    <script src="<?= BASEURL ?>public/js/demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>