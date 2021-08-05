<!DOCTYPE html>
<html>
<?php include "theme/default/head.php" ?>
<?php
$reg_user = new USER();

$service_id     = $_GET['id'];
$datas = $mysqli->query("SELECT * FROM services where id = '$service_id'");
  while($row = mysqli_fetch_assoc($datas)){
  $id                   = $row['id'];
  $service_name         = $row['service_name'];
  $service_price        = $row['service_price'];
  $service_description  = $row['service_description'];
  $post_token           = $row['service_token'];
  $service_active       = $row['active'];

} 
if(isset($_POST['update_service']))
{
     
     $service_name         = $_POST['service_name'];
     $service_price        = $_POST['service_price'];
     $service_description  = $_POST['service_description'];
     $service_image        = $_FILES['service_image']['name'];
     $file_name            = $post_token.".jpg";

   
$mysqli->query("UPDATE services SET service_name = '$service_name' , service_price = '$service_price' , service_description = '$service_description'  where id = '$service_id'");

      if (!empty($service_image)) {
            if (file_exists(dirname(__FILE__)."/../data/services-images/$service_id")) {

        } else {
            mkdir(dirname(__FILE__)."/../data/services-images/$service_id", 0777, true);
        }
       move_uploaded_file($_FILES['service_image']['tmp_name'], dirname(__FILE__)."/../data/services-images/".$service_id.'/'.$file_name);
      } 
}

?>
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?php echo $domain ?>/admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  
<?php include "theme/default/header.php" ?>
<?php include "theme/default/sidebar.php" ?>

 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
  <section class="content-header">
      <h1>
        Services
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Users</li>
        <li class="active">Edit Service</li>
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

<div class="box-body">

  <form class="form-signin" method="post" enctype="multipart/form-data">
                  <div class="col-md-6">
                     <div class="form-group">
                      <label for="text">Service Name</label>
                      <input type="text" class="form-control" id="service_name" name="service_name" value="<?php echo $service_name ?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                      <label for="text">Service Price</label>
                      <input type="text" class="form-control" id="service_price" name="service_price" value="<?php echo $service_price ?>">
                    </div>
                  </div>
                  
                  <div class="col-md-6">
                     <div class="form-group">
                      <label for="text">Service Description</label>
                     <textarea class="form-control" name="service_description"><?php echo $service_description ?></textarea>
                    </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group">
                      <label for="text">Service Image</label>
                      <input type="file" name="service_image" class="form-control">
                    </div>
                  </div>
            <div class="col-md-12">            
                <center>
                  <input class='btn btn-sm btn-primary ' type='submit' id='update_service' name="update_service" value='Update Service' style='padding:7px;'>
                </center>
            </div>



</form>


</div>
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

<!-- bootstrap datepicker -->
<script src="<?php echo $domain ?>/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo $domain ?>/admin/plugins/input-mask/jquery.inputmask.js"></script>

 <script src="<?php echo $domain ?>/admin/dist/js/countrypicker.js"></script>

 <script type="text/javascript">
//Date picker
    $('#user_dob').datepicker({
      autoclose: true
    })
    $(function () {
    $('[data-mask]').inputmask()
  })
 </script>