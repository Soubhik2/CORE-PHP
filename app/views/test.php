<?php require BASEPATH.'/app/db/_dbconnect.php' ?>
<?php $page_name = 'test' ?>
<?php require BASEPATH.'/app/util/header.php'; ?>

<ul class="list-group container my-5">
    <li class="list-group-item">$request : <?= $request ?></li>
    <li class="list-group-item">$requests : <?php print_r($requests) ?></li>
    <li class="list-group-item">$requests[2] : <?= $requests[2] ?></li>
    <li class="list-group-item">$requests[3] : <?= $requests[3] ?></li>
</ul>

<?php require BASEPATH.'/app/util/footer.php'; ?>