<?php
    session_start();
    echo 'Bem vindo a Página 2!<br>';

    echo $_SESSION['cor'];
    echo $_SESSION['animal'];
    echo date('Y m d H:i:s', $_SESSION['data']);
    echo '<br> <a href="pag1.php"> Página 1 </a>'


?>