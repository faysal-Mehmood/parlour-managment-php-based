<?php

    require_once (dirname(__FILE__)."/include/head.php");
	include_once("db.php");
	include("theme/meta-head.php");
    if(!empty($_POST['rating']) && !empty($_POST['itemId'])){
	$itemId = $_POST['itemId'];
	$userNAME = $Username;		
	$insertRating = "INSERT INTO item_rating (itemId, username, ratingNumber, title, comments, created, modified) VALUES ('".$itemId."', '".$userNAME."', '".$_POST['rating']."', '".$_POST['title']."', '".$_POST["comment"]."', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')";
	mysqli_query($mysqli, $insertRating) or die("database error: ". mysqli_error($mysqli));		
	echo "rating saved!";
  }
 
?>