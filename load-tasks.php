<?php
    include('con.php');
    $uid = $_SESSION['user_id'];
    $query = "SELECT taskContent, taskID 
    FROM tasks AS t 
    INNER JOIN user AS u ON u.id = t.userID 
    WHERE u.id = {$_SESSION['user_id']}
    ";
    $result = mysqli_query($db, $query);
    if(mysqli_num_rows($result) > 0 ){
        while($row=mysqli_fetch_assoc($result)){
?>
        <li id="<?=$row['taskID']?>"><?=$row["taskContent"];?> <a href="#" id="<?=$row['taskID']?>" class="trash" >X</a></li>
<?php	
	    }
    }
	else {
		echo "0 results";
	}
	mysqli_close($db);
?>
