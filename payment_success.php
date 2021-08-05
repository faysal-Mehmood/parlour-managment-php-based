<?php
require_once (dirname(__FILE__)."/include/head.php");
if(!isset($_SESSION["Parlor_Session"])){
	header("location:index.php");
}

if (isset($_POST["checkout"])) {

	# code...
	    $trx_id = random_num(3).'-'.time();
	    $cm_user_id            = $_POST['ses'];
	    $reciever_name         = $_POST['reciever_name'];
	    $reciever_phone        = $_POST['reciever_phone'];
	    $reciever_city         = $_POST['reciever_city'];
	    $reciever_postal_code  = $_POST['reciever_postal_code'];
	    $reciever_home_address = $_POST['reciever_home_address'];
		$c_amt = $_COOKIE["ta"];
		$p_st = "Pending";
	if ($p_st == "Pending") {

		

		$sql = $mysqli->query("SELECT product_id,qty FROM cart WHERE user_id = '$cm_user_id'");
		if (mysqli_num_rows($sql) > 0) {
			# code...
			while ($row=mysqli_fetch_assoc($sql)) {
			$product_id[] = $row["product_id"];
			$qty[] = $row["qty"];
			}

			for ($i=0; $i < count($product_id); $i++) { 
			$mysqli->query("INSERT INTO orders (user_id,reciever_name,reciever_phone,reciever_city,reciever_postal_code,reciever_home_address,product_id,qty,trx_id,p_status) VALUES ('$cm_user_id','$reciever_name','$reciever_phone','$reciever_city','$reciever_postal_code','$reciever_home_address','".$product_id[$i]."','".$qty[$i]."','$trx_id','$p_st')");
			}

			$sql = $mysqli->query("DELETE FROM cart WHERE user_id = '$cm_user_id'");
			if ($sql) {
				?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Services - <?php echo SITE_TITLE; ?> </title>
<?php
include("theme/meta-head.php");
?>
  <style>


  .wrap{
   margin-top: 80px;
   margin-bottom: 20px;    
  }
  </style>
</head>
<body>
<?php
include("theme/header.php");
?>

<div class="wrap">
						<div class="container-fluid">
						
							<div class="row">
								<div class="col-md-2"></div>
								<div class="col-md-8">
									<div class="panel panel-default">
										<div class="panel-heading"></div>
										<div class="panel-body">
											<h1>Thankyou </h1>
											<hr/>
											<p>Hello <?php echo "<b>".$Username."</b>"; ?>,Your Order process is 
											successfully completed and your Invoice id is <b><?php echo $trx_id; ?></b><br/>
											you can continue your Shopping <br/></p>
											<a href="store.php" class="btn btn-success btn-lg">Continue Shopping</a>
										</div>
										<div class="panel-footer"></div>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
						</div>
</div>
<?php
include("theme/footer.php");
?>

				<?php
			}
		}else{
			header("location:index.php");
		}
		
	}
}



?>

















































