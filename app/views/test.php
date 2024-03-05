<?php $page_name = 'test' ?>
<?php require 'util/header.php'; ?>

<ul class="list-group container my-5">
    <li class="list-group-item">$routes['/test/:any'] = 'test/$value/$id';</li>
    <li class="list-group-item">$value : <?= $value ?></li>
    <li class="list-group-item">$id : <?= $id ?></li>
</ul>

<?php require 'util/footer.php'; ?>