<?php

    if(!isset($_SESSION)) {
        session_start();
    };

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>

    <!-- By: Vitor Gabriel De Oliveira -->

    <title>Chat Online! - Conversa em tempo real</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./styleMain.css">

</head>
<body>
    <!-- Components -->
    <section class="container">
        <!-- <section class="container_msg">
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
    </section> -->
    <section class="container">
        <header class="header_page">
            <h1 class="msg_title">Chat Online!</h1>
        </header>
        <hr>
        <article class="container_msg">
            <ul class="list_msg">
                <!-- Exemplo de estrutura -->
                <!-- <li class="msg_item">Vitor: Olá meu caro amigo!</li> -->

                <?php
                    // -- Connect DATABASE - Require mensagens

                    include('config_database.php');

                    $sql = mysqli_query($mysqli,"SELECT * FROM msg;");

                    while($reg = mysqli_fetch_array($sql)) {
                        $user = $reg['usuario'];
                        $msg = $reg['msg'];

                        echo "<li class=\"msg_item\">" . $user . " : " . $msg . "</li>";
                    };
                ?>

            </ul>
        </article>
        <form class="typer_msg" action="./validation_msg.php" method="POST">
            <!-- Form -->

            <?php
                if(!isset($_SESSION['user'])) {
                    echo "<input type=\"text\" placeholder=\"Digite seu username\" name=\"username\" class=\"input_values\">";
                };
            ?>

            <input type="text" placeholder="Digite aqui sua mensagem" name="msgText" class="input_values">
            <!-- Button submit -->
            <button type="submit" class="btn_send">Enviar</button>
        </form>
    </section>
</body>
</html>