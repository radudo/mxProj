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
    <link rel="stylesheet" href="styles/style.css">
    <script src="js/jquery-3.3.1.min.js" ></script>
    
</head>
<body>
    <div class="container">
        <?php if (isset($_SESSION['success'])) : ?>
        <div>
            <h3>
                <?php 
                    echo $_SESSION['success']; 
                    unset($_SESSION['success']);
                ?>
            </h3>
        </div>
        <?php endif ?>
        <?php  if (isset($_SESSION['username'])) : ?>

            <h1>Welcome <strong><?php echo $_SESSION['username']; ?></strong></h1>
            <p> <a href="index.php?logout='1'" style="color: red;">Logout</a> </p>

            <h2>Here are your notes</h2>
            <div class="list">
                <?php if($row === NULL) :?>
                
                <h3>You have no new entries</h3>
                <?php endif ?>
                <?php while($row=mysqli_fetch_assoc($result)) : ?>
                        <ul id="list">
                            <li><?php echo $row['taskContent']; ?> <a href="index.php?taskID=<?php echo $row['taskID']; ?>" style="color: red;">x</a></li> 
                        </ul>
                <?php endwhile ?>
            </div>

            <form action="index.php" id="insert_form" method="POST">
                <input type="text" name="name" autocomplete="off" required>
                <input type="submit" name="add"  value="Add">
            </form>
        <?php endif ?>
        
    </div>
</body>
</html>