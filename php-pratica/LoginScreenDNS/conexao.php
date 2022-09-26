<?php 
    define ('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define ('DB_PASSWORD', '');
    define ('DB_NAME', 'login');

    $conexao = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if ($conexao === false) {
        die ("ERROR: Não pode conectar ao banco " .mysqli_connect_error());
    } 

?>