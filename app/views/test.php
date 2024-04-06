<?php $page_name = 'test' ?>
<?php require 'util/header.php'; ?>

<ul class="list-group container my-5">
    <li class="list-group-item">$routes['/test/:any'] = 'test/$value/$id';</li>
    <li class="list-group-item">$value : <?= $value ?></li>
    <li class="list-group-item">$id : <?= $id ?></li>
</ul>

<?php

    echo '<pre>';
    // print_r($conn);
    // echo '</pre>';

    // echo '<h1>new</h1>';
    // echo '<pre>';

    // --------------------------------------------------------------------------------------------------
    // SELECT * FROM `contact`
    // print_r($database->get('contact')->result());
    // print_r('error: '.$database->error());

    // SELECT * FROM `student` WHERE `id` >= '1' OR `name` < 'Ram' AND `roll` = 'game'
    // print_r($database->where('id >=', '1')->or_where('name <','Ram')->where('roll','game')->get('student')->get_query());

    // SELECT * FROM `student` WHERE `id` = '1' AND `name` = 'Ram'
    // $database->where('id', '1');
    // $database->where('name','Ram');
    // print_r($database->get('student')->get_query());
    // print_r($database->get('student')->result());
    // print_r($database->get('contact')->result());

    // SELECT * FROM `student` WHERE `id` = '1' OR `name` = 'game'
    // print_r($database->where('id', '1')->or_where('name', 'game')->get('student')->get_query());

    // SELECT * FROM `student` WHERE `name` LIKE '%ram%' AND `open` = 'hello' OR `id` LIKE '%hh%'
    // print_r($database->like('name','ram')->where('open', "hello")->or_like('id', 'hh')->get('student')->get_query());

    // SELECT * FROM `student` WHERE `id` <= '3' AND `name` LIKE '%soubhik%'
    // print_r($database->where('id <=','3')->like('name','soubhik')->get('student')->get_query());

    // print_r($database->get('student')->count());

    $data = array(
        'name' => 'GTA V',
        'city' => 'mars'
    );
    // INSERT DATA
    // print_r($database->insert('student', $data));
    // UPDATE DATA
    // print_r($database->where('id', '25')->update('student', $data));
    // DELETE DATA
    // print_r($database->where('id', '24')->delete('student'));
    // --------------------------------------------------------------------------------------------------

    echo '</pre>';

    // echo '<h1>old</h1>';
    // $sql = "SELECT * FROM student";
    // $result = $conn->query($sql);

    // if ($result->num_rows > 0) {
    //     // Output data of each row
    //     while ($row = $result->fetch_assoc()) {
    //         echo '<pre>';
    //         print_r($row);
    //         echo '</pre>';
    //     }
    // } else {
    //     echo "0 results";
    // }
    // setcookie("user", "John", time() + (86400 * 30), "/"); // 86400 = 1 day
    // SETCOOKIE
    // $input->set_cookie("name1","hello");
    echo '<pre>';
    // print_r(htmlspecialchars($input->post('name', true)));
    // print_r($input->post(null, true));
    // print_r($input->get(null, true));
    // print_r($input->cookie(null, true));
    // print_r($_COOKIE);

    // SESSION ----------------------------------------------------------
    // print_r($session->set_userdata('name', 'game'));
    // print_r($session->set_userdata($data));

    // print_r($session->userdata('name'));
    // print_r($session->has_userdata('name'));
    
    // $session->unset_userdata('name2');
    // $session->unset_userdata(['name1','name2']);

    // $session->destroy();
    
    // print_r($session);
    // print_r($session->userdata());
    
    echo '</pre>';

    // How to use
    // if ($input->post('submit', true)) {
    //     echo "submit";
    //     print_r($input->post(null, true));
    // }

    $arr = [
        "name"=>"soubhik",
        "phone"=>"9000",
    ];

    // email: soubhik@gmail.com
    // password: password@

    $auth = new Auth($database);
    // $auth = new Auth($database, 'game', 'user', 'pass');

    // $auth->setTableName('game');
    // $auth->setEmailName('user');
    // $auth->setPasswordName('pass');

    // print_r($result = $auth->signUp("soubhik@gmail.com", "password@", $arr));
    // print_r($result = $auth->signUp("soubhik123", "password", $arr, false, false));
    // print_r($result = $auth->signUp("soubhik123", "password", [], false, false));
    // print_r($auth->signIn("soubhik@gmail.com", "password@"));
    // echo $result->error_mess;

    // $auth->logout();
    // echo $auth->isLoggedin();
    if ($auth->isLoggedin()) {
        echo "YES";
    } else {
        echo "NO";
    }
    
    echo '<pre>';
    print_r($auth->getUser());
    echo '</pre>';

?>

<!-- <form method="post">
    <input type="text" name="name" value="ram">
    <button name="submit" value="1">submit</button>
</form> -->

<?php require 'util/footer.php'; ?>