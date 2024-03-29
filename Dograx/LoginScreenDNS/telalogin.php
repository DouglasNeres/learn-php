<?php
    include 'login.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font: 14px sans-serif;
            background-color: #223;
            color: #fff;
        }

        .wrapper {
            width: 360px;
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
                <h2>Login</h2>
                <p>Please fill in your credentials to login.</p>
                
                <?php 
                    if (!empty($login_err)) {
                        echo '<div class="alert-alert-danger">' . $login_err . '</div>';
                    }
                ?>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : '';?>" value="<?php echo $username; ?>">
                        <span class="invalid-feedback" <?php echo $username_err;?>>The User Name it's empty, please fill in!</span>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : '';?>" value="<?php echo $password; ?>">
                        <span class="invalid-feedback" <?php echo $password_err;?>>The Password it's empty, please fill in!</span>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Login">
                    </div>
                    <p>Don't have an account? <a href="registro.php">Sign up now</a>.</p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>