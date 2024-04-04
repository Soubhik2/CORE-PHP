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

    // SELECT * FROM `contact`
    // print_r($database->get('contact')->result());
    // print_r('error: '.$database->error());

    // SELECT * FROM `student` WHERE `id` >= '1' OR `name` < 'Ram' AND `roll` = 'game'
    // print_r($database->where('id >=', '1')->or_where('name <','Ram')->where('roll','game')->get('student')->get_query());

    // SELECT * FROM `student` WHERE `id` = '1' AND `name` = 'Ram'
    // $database->where('id', '1');
    // $database->where('name','Ram');
    // print_r($database->get('student')->get_query());

    // SELECT * FROM `student` WHERE `id` = '1' OR `name` = 'game'
    // print_r($database->where('id', '1')->or_where('name', 'game')->get('student')->get_query());

    // SELECT * FROM `student` WHERE `name` LIKE '%ram%' AND `open` = 'hello' OR `id` LIKE '%hh%'
    // print_r($database->like('name','ram')->where('open', "hello")->or_like('id', 'hh')->get('student')->get_query());

    // SELECT * FROM `student` WHERE `id` <= '3' AND `name` LIKE '%soubhik%'
    // print_r($database->where('id <=','3')->like('name','soubhik')->get('student')->get_query());

    // print_r($database->get('student')->count());

    // INSERT DATA
    $data = array(
        'name' => 'GTA',
        'city' => 'mars'
    );
    // print_r($database->insert('student', $data));
    print_r($database->where('id', '24')->update('student', $data));

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