<?php
    date_default_timezone_set('Asia/Karachi');

    $site_data = $mysqli->query("SELECT * FROM config");
    while($row = mysqli_fetch_assoc($site_data)){
    $domain = $row['domain_name'];
    $site_title = $row['site_title'];
    $site_slogan = $row['site_slogan'];
    $site_description = $row['site_description'];
    $site_keywords = $row['site_keywords'];
    $web_email = $row['web_email'];
	$web_phone = $row['web_phone'];	
    $user_name = $row['user_name'];
    $user_pass = $row['user_pass'];
    }


?>