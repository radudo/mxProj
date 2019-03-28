<?php include('con.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Magento Experten - Task</title>
    <link rel="stylesheet" href="styles/style.min.css">
    <script src="js/jquery-3.3.1.min.js" ></script>
</head>
<body>
    <div class="container">
        <div class="title"> <h1>Login</h1> </div>
        <div class="form" id="loginForm">
            <form action="login.php" method="POST">
                <div>
                    <label for="username"> Username </label>
                    <input type="text" class="login_input" name="username" autocomplete="off" required>
                </div>
                <div>
                    <label for="password"> Password </label>
                    <input type="password" class="login_input" name="password" autocomplete="current-password" required>
                </div>
                <?php include('errors.php') ?>
                <input type="submit" name="login_btn" value="Login">
                <p class="subtext">New user ? <a href="reg.php">Sign Up</a></p>
            </form>
        </div>
    </div>
   
</body>
</html>