<?php $page_name = 'test' ?>
<?php require 'util/header.php'; ?>

<ul class="list-group container my-5">
    <li class="list-group-item">$routes['/test/:any'] = 'test/$value/$id';</li>
    <li class="list-group-item">$value : <?= $value ?></li>
    <li class="list-group-item">$id : <?= $id ?></li>
</ul>

<?php

    echo '<pre>';
    print_r($conn);
    echo '</pre>';

    echo '<h1>new</h1>';
    echo '<pre>';
    // print_r($database->get('contact')->result());

    print_r($database->where('id >=', '1')->or_where('name <','Ram')->where('roll','game')->get('student'));

    // $database->where('id', '1');
    // $database->where('name','Ram');
    // print_r($database->get('student'));

    // print_r($database->where('id', '1')->or_where('name', 'game')->get('student'));

    // print_r($database->get('student'));

    echo '</pre>';

    echo '<h1>old</h1>';
    $sql = "SELECT * FROM student";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo '<pre>';
            print_r($row);
            echo '</pre>';
        }
    } else {
        echo "0 results";
    }
?>

<?php require 'util/footer.php'; ?>