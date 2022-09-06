<?php
    $hostname ="localhost";
    $username = "root";
    $password = "";
    $dbname = "login";


    $conexao = mysqli_connect($hostname, $username, $password, $dbname); 


    if (!$conexao) {
        echo "Não Conectado ao banco";
    } else {
        echo "Conectado ao banco!";
    }

?>
