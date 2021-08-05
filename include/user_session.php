<?php
if(isset($_SESSION['Parlor_Session'])){
	$uid = $_SESSION['Parlor_Session'];
	$stmt = $mysqli->query("SELECT * FROM users WHERE user_id = '$uid'");
	while ($row = mysqli_fetch_array($stmt)){
		$Username      = $row['user_name'];
		$UserId        = $row['user_id'];
		$user_slug     = $row['user_slug'];
		$email         = $row['user_email'];
	}
} else {
    return false;
}
  

    
?>

