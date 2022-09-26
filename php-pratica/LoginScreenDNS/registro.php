<?php
//Incluindo arquivo de conexão
require_once "conexao.php";
$username = $password = $confirmpassword = "";
$username_err = $password_err = $confirmpassword_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor Preencha o campo";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Usuário só pode conter letras, números e o anderline";
    } else{
        $sql = "SELECT id FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($conexao, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            $param_username = trim($_POST["username"]);

            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "Este usuário já existe";}
            } else {
                $username = trim($_POST["username"]);
            }
        }else {
            echo "Oops, Algo deu errado, volte novamente Depois!";
        }
        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
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
                <input type="password" name="password" class="form-control" value="">
                <span class="invalid-feedback"></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control " value="">
                <span class="invalid-feedback"></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <p>Already have an account? <a href="telalogin.php">Login here</a>.</p>
        </form>
