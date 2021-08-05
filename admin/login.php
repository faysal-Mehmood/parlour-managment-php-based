<!DOCTYPE html>
<html>
<head>
<?php   session_start(); ?>
<?php require_once(dirname(__FILE__)."/../include/head.php"); ?>
<?php include "include/db.php"; ?>
<?php include "include/config.php"; ?>
<?php
$user_login = new USER();
if($user_login->is_logged_in()!="")
{
  $user_login->redirect('index.php');
}

if(isset($_POST['btn-login']))
{

  $email = trim($_POST['txtemail']);
  $upass = trim($_POST['txtupass']);

  if($user_login->login($email,$upass))
  {

    if($user_login->userlevel() !== "admin")
    {
      session_destroy();
      $_SESSION['Parlor_Session'] = false;
      header("Location: login.php?not_admin");
      exit;

    } else {
      $user_login->redirect('index.php');
    }
  }
}


?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo $domain ?>/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo $domain ?>/admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo $domain ?>/admin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo $domain ?>/admin/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $domain ?>/admin/dist/css/AdminLTE.min.css">
  <!-- Admin Css style -->
  <link rel="stylesheet" href="<?php echo $domain ?>/admin/dist/css/admin-style.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo $domain ?>/admin/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo $domain ?>/admin/plugins/iCheck/square/blue.css">
<!-- am charts mapdata -->


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">

<?php
if(isset($_GET['not_admin'])) { ?>
<div class='alert alert-success' style="margin: 4px">
            <button class='close' data-dismiss='alert'>&times;</button>
              <strong>Eror!</strong> You Are Not A Admin So No Try For Login Admin Area
</div>
<?php } ?>
<div class="login-box">

  <div class="login-logo">
    <a href="#"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="txtemail" placeholder="Email" required="">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="txtupass" placeholder="Password" required="">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="btn-login">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>




  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo $domain ?>/admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo $domain ?>/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->

<script src="<?php echo $domain ?>/admin/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
