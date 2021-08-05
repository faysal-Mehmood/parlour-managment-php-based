<?php


$mail_data = $mysqli->query("SELECT * FROM config");
    while($row = mysqli_fetch_assoc($mail_data)){

    $site_title = $row['site_title'];

    }



class USER
{



    private $query;
    public $lastid = "";
    public function __construct()
    {
    	Global $mysqli;
    	$mysqli->query = $mysqli->query;
    }


	public function lasdID()
	{
		$stmt = $this->lastid;
		return $stmt;
	}

	public function register($uname,$email,$upass,$user_name,$mobile_number,$user_dob)
	{
		Global $mysqli;
		try
		{
			$password = md5($upass);
			$user_slug = create_slug($uname);
			echo "stringAsd";
			$stmt = $querys = $mysqli->query("INSERT INTO users (user_name,user_email,user_pass,user_slug,user_phone,user_dob) VALUES ('$uname','$email','$password','$user_slug','$mobile_number','$user_dob') ");

			//$this->lastid = $mysqli->insert_id;

			

		    return $stmt;
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	} 

    
    	public function UserUpdate($id,$email,$user_name,$mobile_number,$user_dob)
	{  
		Global $mysqli;
		try
		{
			$user_slug = create_slug($uname);
			$mysqli->query("UPDATE users SET user_name = '$uname',user_email = '$email',user_slug = '$user_slug',user_phone = '$mobile_number', user_dob = '$user_dob' WHERE user_id = '$id' ");
          return true;
		} catch(PDOException $ex){
			echo $ex->getMessage();
		}

     }
	public function login($email,$upass)
	{
		Global $mysqli;
		Global $mysqli;
		try
		{
			$stmt = $mysqli->query("SELECT * FROM users WHERE user_email = '$email' ");
			$userRow = mysqli_fetch_array($stmt);

			if(mysqli_num_rows($stmt) == 1)
			{

					if($userRow['user_pass'] == md5($upass)){

					  $_SESSION['Parlor_Session'] = $userRow['user_id'];
                      if (isset($_GET['redirect'])) {
                      	$ip_add = getenv("REMOTE_ADDR");
                      	$this->redirect("http://localhost/parlor/".$_GET['redirect']);
				        
						//we have created a cookie in login_form.php page so if that cookie is available means user is not login
							if (isset($_COOKIE["product_list"])) {
								$p_list = stripcslashes($_COOKIE["product_list"]);
								//here we are decoding stored json product list cookie to normal array
								$product_list = json_decode($p_list,true);
								for ($i=0; $i < count($product_list); $i++) { 
									//After getting user id from database here we are checking user cart item if there is already product is listed or not
								 $verify_cart = $mysqli->query("SELECT cart_id FROM cart WHERE user_id = $_SESSION[Parlor_Session] AND product_id = ".$product_list[$i]);
									if(mysqli_num_rows($verify_cart) < 1){
										//if user is adding first time product into cart we will update user_id into database table with valid id
									 $update_cart = $mysqli->query("UPDATE cart SET user_id = '$_SESSION[Parlor_Session]' WHERE ip_add = '$ip_add' AND user_id = -1");
									} else {
										//if already that product is available into database table we will delete that record
										$delete_existing_product = $mysqli->query("DELETE FROM cart WHERE user_id = -1 AND ip_add = '$ip_add' AND product_id = ".$product_list[$i]);
									}
								}
								//here we are destroying user cookie
								setcookie("product_list","",strtotime("-1 day"),"/");
							}                      	
                      } else {
                      	$this->redirect("http://localhost/parlor");
                      }
                      exit;
					} else {
					  $this->redirect("http://localhost/parlor/login.php?error");
					  exit;
					}
				
			}
			else
			{
					  $this->redirect("http://localhost/parlor/login.php?wrong");
					  exit;
			}
		}
		catch(PDOException $ex)
		{
			echo $ex->getMessage();
		}
	}


	public function is_logged_in()
	{
		if(isset($_SESSION['Parlor_Session']))
		{
			return true;
		}
	}

	public function redirect($url)
	{
		header("Location: $url");
	}

	public function logout()
	{
		session_destroy();
		$_SESSION['Parlor_Session'] = false;
	}

	public function userlevel(){
		Global $mysqli;
	    $query = $mysqli->query("SELECT * FROM users WhERE user_id = '1' ");
		$row = mysqli_fetch_array($query);

	    $user_level = $row['user_level'];
	    /*if ($user_level !== "admin") {
	    	header("Location: login.php?not_admin");
				exit;
	    }*/
	    return $user_level;
    }




}
