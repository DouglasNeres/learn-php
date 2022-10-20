<?php
//Inicializa a sessão do user
    session_start();
    
//Check if the user it's logged;
//Redirect for the welcome page
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: welcome.php");
        exit;
    }

//Include connection files with the DataBase
    require_once "conexao.php";

//Definir the variables and begin
    $username = $password = "";
    $username_err = $password_err = $login_err = "";

//Processar os dados que foram enviados of form
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        //Verificar if the username it's empty
        if (empty(trim($_POST["username"]))) {
            $username_err = "Please enter with one user";
        }else{
            $username = trim($_POST["username"]);
        }

//Check if camp password it's empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Nothing password found";
    }
    else{
        $password = trim($_POST["password"]);
    }

//Validate credentials
    if (empty($username_err) && empty($password_err)) {
    //Make consultation to the DataBase
    $sql = "SELECT id, username, password FROM users WHERE username = ?";

    if ($stmt = mysqli_prepare($conexao, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $param_username);

        $param_username = $username;

        if (mysqli_stmt_execute($stmt)) {
            //Store Result
            mysqli_stmt_store_result($stmt);

            if (mysqli_stmt_num_rows($stmt) == 1) {
                mysqli_stmt_bind_result($stmt, $id, $username, $password, $hashed_password);

                if(mysqli_stmt_fetch($stmt)){
                    if (password_verify($password, $hashed_password)) {
                        //If password correct, begin the session
                        session_start();

                        //Store variable of session

                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["username"] = $username;

                        header("location: welcome.php");
                        
                    }else{
                        $login_err = "User or password invalids";
                    }
                
                }else{
                    echo "Oops!! Something wrong is not right!";
                    }
                    mysqli_stmt_close($stmt);
                }
            }
            mysqli_close($conexao);
        }
    }
}

?>