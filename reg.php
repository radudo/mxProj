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
        <div class="title"> <h1>Registration</h1> </div>
        <?php
        $arrow = "<i class='arrow left'></i>";
        $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
        echo "<a href='$url'><h4> <i class='arrow left'></i> Back</h4></a>"; 
        ?>
        <div class="form">
        <form action="reg.php" method="POST">
            <?php include('errors.php') ?>
            <div>
                <label for="username"> Username </label>
                <input type="text" name="username"  autocomplete="off" required>
            </div>
            <div>
                <label for="email"> Email </label>
                <input type="email" name="email"  autocomplete="off" required>
            </div>
            <div>
                <label for="password"> Password </label>
                <input type="password" name="password" required>
            </div>
            <div>
                <label for="passwordValidation"> Confirm Password </label>
                <input type="password" name="passwordValidation" required>
            </div>
            <input type="submit" name="register" value="Submit">

        </form>
        </div>
    </div>
</body>
</html>