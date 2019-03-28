<?php
	include 'con.php';
	$t_id=$_POST['t_id'];
	$sql = "DELETE FROM `tasks` WHERE taskID= $t_id ";
	if (mysqli_query($db, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($db);
?>