<head>
<?php include "include/function.php"; ?>
<?php include "include/db.php"; ?>
<?php include "include/config.php"; ?>
<?php include(dirname(__FILE__)."/../../../include/head.php"); ?>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo $domain ?>/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!--Font Awesome -->
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

<style type="text/css">

.show_ci {
  background: rgb(210, 214, 222);
  color: rgb(210, 214, 222);
  height: 40px;
  width: 40px;
}

html, body {
  width: 100%;
  height: 100%;
  margin: 0px;
}

#chartdiv {
    width: 100%;
    height: 100%;
}

</style>
