<?php

    if(strlen($_POST['username']) > 0 && strlen($_POST['msg_text']) > 0) {
        
        include('config_database.php');

        $username = $_POST['username'];
        $msg = $_POST['msg_text'];

        // $query = mysqli_query($mysqli,"INSERT INTO mensagens (usuario, msg) VALUES ('$username','$msg');");

        if(!isset($_SESSION)) {
            session_start();
        };

        $_SESSION['user'] = $_POST['username'];
        $_SESSION['msg'] = $_POST['msg'];

        header('LOCATION: ./');

    } else {
        header('LOCATION: ./');
    };

?>