<?php
    session_start();
    echo "Bem vindo a Página 1!";

    $_SESSION['nome'];
    $_SESSION['senha'];
    $_SESSION['confirmarSenha'];    

    echo '<br><br> <a href="pag2.php">Página 2<a/>';
?>