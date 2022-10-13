<?php

    if(!isset($_SESSION)) {
        session_start();
    };

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>

    <title>Hello, World!</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./styleMain.css">

</head>
<body>
    <!-- Components -->
    <section class="container">
        <section class="container_msg">
            <h1 class="msg">
                <?php
                        if(isset($_SESSION['msg'])) {
                            echo $_SESSION['msg'];

                            session_destroy();
                        } else {
                            
                            include('config_database.php');

                            $query_consult = mysqli_query($mysqli, "SELECT * FROM msg;");

                            $msgDB = $query_consult->fetch_assoc();

                            echo $msgDB['msg'];

                        };
                ?>
            </h1>
        </section>
        <form class="form_container" action="./validation_msg.php" method="post">
            <label for="text">Digite abaixo a mensagem:</label>
            <input type="text" placeholder="Digite a mensagem:" name="msg" class="msg_input">
            <button type="submit" class="btn_send">Atualizar</button>
        </form>
    </section>
</body>
</html>