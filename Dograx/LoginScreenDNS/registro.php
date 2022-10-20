<?php
//Incluindo arquivo de conexão
//Olá, Douglas :) Tomaram meu PC, então estou aqui no seu, blz?
require_once "conexao.php";
$username = $password = $confirmpassword = "";
$username_err = $password_err = $confirmpassword_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor Preencha o campo";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Usuário só pode conter letras, números e o underline";
    } else{
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if ($stmt = mysqli_prepare($conexao, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            $param_username = trim($_POST["username"]);

            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "Este usuário já existe";}
            } else {http://localhost/Dograx/LoginScreenDNS/registro.php
                $username = trim($_POST["username"]);
            }
        }else {
            echo "Oops, Algo deu errado, volte novamente Depois!";
        }
        mysqli_stmt_close($stmt);
    }

    if (empty(trim($_POST["password"]))) {
        $password_err = "Por favor preencha com uma senha";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "A senha deve ter no mínimo 6 caracteres";
    }else {
        $password = trim($_POST["password"]);
    }
if(empty(trim($_POST["password"])))
  $password_err = "Por favor digite uma senha!";
} elseif (strlen(trim($_POST["password"])) < 6) {
    $password_err = "A senha  deve ter pelo menos 6 caracteres"; 
} else {
    $password = trim($_POST["password"]);

}    if(empty(trim($_POST["confirm_password"]))){
        $confirmpassword_err = "Por favor confirme a senha!";
    }else{
        $confirmpassword = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirmpassword)) {
            $confirmpassword_err = "Senha é Diferente";
        }
    }

    if (empty($username_err) && empty($password_err) && empty($confirmpassword_err)) {
        $sql = "INSERT INTO users (username, password) VALUES (?,?)";

        if ($stmt = mysqli_prepare($conexao, $sql)) {
            mysqli_stmt_bind_param($stmt,"ss", $param_username, $param_password);

            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);

            if (mysqli_stmt_execute($stmt)) {
                header("location: telalogin.php");
            }else {
                echo "Oops! Algo de errado.. tente novamente." ;
            }

            mysqli_stmt_close($stmt);
        }
        mysqli_close($conexao);
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ 
            font: 14px sans-serif; 
            background-color: #223; 
            color: #fff; }

        .wrapper{ 
            width: -360px; 
            padding: 20px; 
            display: flex; 
            flex-direction: column; 
            align-items: center; 
            justify-content: center; 
            height: 90vh; 
        }
        </style>
</head>
<body>
    <div class="container">
        <div class="justify-content-center align-items-center row">
        <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Preencha esse formulário para criar um login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username;?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirmpassword_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirmpassword;?>">
                <span class="invalid-feedback"><?php echo $confirmpassword_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <p>Already have an account? <a href="telalogin.php">Login here</a>.</p>
        </form>

    </body>
</html>    
