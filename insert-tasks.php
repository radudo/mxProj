<?php
    include('con.php');
    $name = $_POST['name'];
    $uid = $_SESSION['user_id'];
    $sql = "INSERT INTO `tasks`(`taskContent`, `userID`) VALUES ('$name',$uid)";
   
    if (mysqli_query($db, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($db);
?>