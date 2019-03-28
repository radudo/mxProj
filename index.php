<?php

session_start();
include('con.php');
if(!isset($_SESSION['username'])){
    $_SESSION['msg'] = "Login to view the page";
    header("location: login.php");
}

if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");  
}


?>

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

        <?php  if (isset($_SESSION['username'])) : ?>

            <h1>Welcome <strong><?php echo $_SESSION['username']; ?></strong></h1>
            <p> <a href="index.php?logout='1'" style="color: red;">Logout</a> </p>

            <h2>Here are your notes</h2>
            <ul id="list">
            </ul>
            <form id="insert_form" name="addForm">
                <input type="text" name="name" id="task_name" autocomplete="off" required>
                <input type="submit" name="add" id="insert"  value="Add">
            </form>
        <?php endif ?>
        
    </div>
<script src="js/scripts.min.js"></script>
</body>
</html>