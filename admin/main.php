<!DOCTYPE html>
<html>
<?php include "theme/default/head.php" ?>

 <?php
 if (isset($_POST["submit"])) {





 $site_title = trim($_POST["web_title"]);

 $web_slogan = $_POST['web_slogan'];
 $web_keywords = $_POST['web_keywords'];
 $web_description = $_POST['web_description'];
 $web_email = $_POST['web_email'];
 $web_phone = $_POST['web_phone'];
 $user_name = $_POST['user_name'];
 $user_pass = $_POST['user_pass'];




 	$d = $mysqli->query("UPDATE config SET  site_title = '$site_title' , site_description = '$web_description' ,site_slogan = '$web_slogan', site_keywords = '$web_keywords' , web_email = '$web_email', web_phone = '$web_phone' , user_name = '$user_name' , user_pass = '$user_pass'");
 	if ($d) {
 		$msg =  " <div class='alert alert-success'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Success!</strong> Setting Will Be Update
			  </div>";
 	} else {
 		$msg = "<div class='alert alert-error'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Sory!</strong> SomeThing Problem
			  </div>";
 	}
 }

 ?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  
<?php include "theme/default/header.php" ?>
<?php include "theme/default/sidebar.php" ?>

 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	  <!-- Content Header (Page header) -->
	<section class="content-header">
      <h1>
        Website Configuration
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>General</li>
        <li class="active">Website Configuration</li>
      </ol>
    </section>

   <!-- Main content -->
<section class="content">
	<!-- Row -->
<div class="row">
	<!-- Col -->
<div class="col-md-12">
		<?php if(isset($msg)) echo $msg ?>
<!-- box -->
<div class="box">

	<!-- tab area -->

<!-- /.box -->

<!-- tab content -->
<form class="form-signin" method="post">
<!--  General Website Setting -->
<div class="">

<div class="">

<div class="col-md-6">	
  <div class="form-group">
    <label for="text">WebSite Title</label>
    <input type="text" class="form-control" id="web_title" name="web_title" value="<?php echo $site_title ?>" required >
  </div>
</div>

<div class="col-md-6">	
  <div class="form-group">
    <label for="text">WebSite Slogan</label>
    <input type="text" class="form-control" id="web_slogan" name="web_slogan" value="<?php echo $site_slogan ?>" required >
  </div>
</div>

<div class="col-md-6">
  <div class="form-group">
    <label for="text">Website Description</label>
    <input type="text" class="form-control" id="web_description" name="web_description" value="<?php echo $web_description ?>">
  </div>
</div>

<div class="col-md-6">
  <div class="form-group">
    <label for="text">Website Keywords</label>
    <input type="text" class="form-control" id="web_keywords" name="web_keywords" value="<?php echo $web_keywords ?>">
  </div>
</div>

<div class="col-md-6">
  <div class="form-group">
    <label for="text">Web Email</label>
    <input type="text" class="form-control" id="web_email" name="web_email" value="<?php echo $web_email ?>">
  </div>
</div>

<div class="col-md-6">
  <div class="form-group">
    <label for="text">Web Phone</label>
    <input type="text" class="form-control" id="web_phone" name="web_phone" value="<?php echo $web_phone ?>">
  </div>
</div>


<div class="col-md-12">
<h3>Sending Sms Account Details</h3>

<div class="col-md-6">
  <div class="form-group">
    <label for="text">User Name</label>
    <input type="text" class="form-control" id="user_name" name="user_name" value="<?php echo $user_name ?>">
  </div>
</div>

<div class="col-md-6">
  <div class="form-group">
    <label for="text">User Pass</label>
   <input type="text" class="form-control" id="user_pass" name="user_pass" value="<?php echo $user_pass ?>">
  </div>
</div>
</div>



<div class="row">
<div class="col-md-12">
<center>
<button style="margin: 6px" type="submit" name="submit" class="btn btn-success">Update</button>
</center>
</div>
</div>
</form>
<!-- /.tab content -->

</div>	
	<!-- /.box -->
</div>
		<!-- /.col -->
</div>
    <!-- /.row -->

</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
 <?php include 'theme/default/footer.php';?>
 <script src="<?php echo $domain ?>/admin/dist/js/countrypicker.js"></script>

