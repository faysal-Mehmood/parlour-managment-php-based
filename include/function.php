<?php

define("BASE_URL", $domain);
define("BASEDIR",dirname(dirname(__FILE__)));
define("SITE_TITLE", $site_title);
define("SITE_SLOGAN", $site_slogan);
define("SITE_DESCRIPTION", $site_description);
define("SITE_KEYWORDS", $site_keywords);

function create_slug($string){
    $cat=preg_replace('~[^\p{L}\p{N}\n]+~u', '-', $string);
    return $cat;
}


function user_info($email){
    global $mysqli;
    $query = $mysqli->query("SELECT * FROM users WhERE user_email = '$email' ");
    return $query;
}

function User_is_logged_in(){
  if(isset($_SESSION['Parlor_Session'])){
    return true;
  }
}

function User_not_logged_in(){
  if(!isset($_SESSION['Parlor_Session'])){
    return true;
  }
}

function logout(){
    session_destroy();
    $_SESSION['Parlor_Session'] = false;
}

function redirect($url){
    header("Location: $url");
}

function getDetails($user_id){
	  GLOBAL $mysqli;
	  $getDetails = $mysqli->query("SELECT * FROM appointment where user_id = '$user_id'");
	  $row = $getDetails;
	  return $row;
	}

function getOrderDetails($user_id){
      GLOBAL $mysqli;
      $getDetails = $mysqli->query("SELECT * FROM orders where user_id = '$user_id'");
      $row = $getDetails;
      return $row;
    } 

function getOrderProductDetails($id){
    GLOBAL $mysqli;
    $getDetails = $mysqli->query("SELECT * FROM products where id = '$id'");
    $row = $getDetails;
    return $row;
  }

function getServiceDetails(){
    GLOBAL $mysqli;
    $getDetails = $mysqli->query("SELECT * FROM services");
    $row = $getDetails;
    return $row;
  } 

function getProductDetails(){
    GLOBAL $mysqli;
    $getDetails = $mysqli->query("SELECT * FROM products");
    $row = $getDetails;
    return $row;
  }   

  function random_num($size){
    $alpha_key = '';
    $keys = range('A', 'Z');

    for ($i = 0; $i < 2; $i++) {
        $alpha_key .= $keys[array_rand($keys)];
    }

    $length = $size - 2;

    $key = '';
    $keys = range(0, 10);

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $alpha_key . $key;
}
?>