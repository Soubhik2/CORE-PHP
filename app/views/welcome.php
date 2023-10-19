<?php require BASEPATH.'/app/db/_dbconnect.php' ?>
<?php $page_name = 'welcome' ?>
<?php require BASEPATH.'/app/util/header.php'; ?>

<?php
    // echo BASEPATH;
    // echo '<br>';
    // echo BASEURL;
?>

<div class="px-4 py-4 text-center">
    <img class="d-block mx-auto mb-4" src="<?= BASEURL ?>public/asset/php.png" alt="" width="100">
    <h1 class="display-5 fw-bold text-body-emphasis">WELCOME TO CORE PHP</h1>
    <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most
            popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system,
            extensive prebuilt components, and powerful JavaScript plugins.</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="" class="btn btn-primary btn-lg px-4 gap-3">Get Start<i class="bi bi-arrow-right-short"></i></a>
        </div>
    </div>
    <h2 class="mt-5">Most used variables</h2>
    <ul class="list-group container">
        <li class="list-group-item">BASEPATH : <?= BASEPATH ?></li>
        <li class="list-group-item">BASEURL : <?= BASEURL ?></li>
        <li class="list-group-item">$request : <?= $request ?></li>
        <li class="list-group-item">$requests : <?php print_r($requests) ?></li>
        <li class="list-group-item">$viewDir : <?= $viewDir ?></li>
        <li class="list-group-item">$pass_url : <?= $pass_url ?></li>
    </ul>
</div>


<?php require BASEPATH.'/app/util/footer.php'; ?>