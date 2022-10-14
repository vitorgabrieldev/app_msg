<?php

    if(strlen($_POST['msgText']) > 0) {
        
        include('config_database.php');

        $delete_if = mysqli_query($mysqli, "SELECT * FROM msg");
        $qts_rows = $delete_if->num_rows;

        if($qts_rows > 7) {
            $delete_regs = mysqli_query($mysqli, "DELETE FROM msg");
        };
    
        $username = $_POST['username'];


        $msg = $_POST['msgText'];

        $query = mysqli_query($mysqli,"INSERT INTO msg (usuario, msg) VALUES ('$username','$msg');");

        if(!isset($_SESSION)) {
            session_start();
        };

        $_SESSION['user'] = $_POST['username'];
        $_SESSION['msg'] = $_POST['msgText'];

        header('LOCATION: ./');

    } else {
        header('LOCATION: ./');
    };

?>