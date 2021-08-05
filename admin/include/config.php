<?php

$data = $mysqli->query("SELECT * FROM config");
while($row = mysqli_fetch_assoc($data)){
	$domain = $row['domain_name'];
	$site_title = $row['site_title'];
	$web_email = $row['web_email'];
	$web_phone = $row['web_phone'];	
	$web_keywords = $row['site_keywords'];
	$web_description = $row['site_description'];
	$user_name = $row['user_name'];
	$user_pass = $row['user_pass'];
	
}


?>