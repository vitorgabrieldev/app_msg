<?php

    if(strlen($_POST['msg']) >= 6 && strlen($_POST['msg']) <= 16) {
        
        include('config_database.php');

        $msg = $_POST['msg'];

        $query = mysqli_query($mysqli,"DELETE from msg;");
        $query = mysqli_query($mysqli,"INSERT INTO msg (msg) VALUES ('$msg');");

        if(!isset($_SESSION)) {
            session_start();
        };

        $_SESSION['msg'] = $_POST['msg'];

        header('LOCATION: ./');

    } else {
        header('LOCATION: ./');
    };

?>