<!DOCTYPE html>
<html>
<?php include "theme/default/head.php" ?>
<?php
$reg_user = new USER();

if(isset($_POST['order_update']))
{
     
     $order_status       = $_POST['order_status'];
     $order_id           = $_GET['id'];

     $product_post = $mysqli->query("UPDATE orders SET p_status = '$order_status' where order_id = '$order_id'");

          $msg = "<div class='alert alert-success'>
            <button class='close' data-dismiss='alert'>&times;</button>
              <strong>Success!</strong> Order Has Been Update
            </div>";


     
}


        $sql = $mysqli->query("SELECT * FROM orders where order_id = ".$_GET['id']."");
        while ($row = mysqli_fetch_assoc($sql)) { 
          $order_id              = $row["order_id"];
          $product_id            = $row["product_id"];
          $reciever_name         = $row['reciever_name'];
          $reciever_phone        = $row['reciever_phone'];
          $reciever_city         = $row['reciever_city'];
          $reciever_postal_code  = $row['reciever_postal_code'];
          $reciever_home_address = $row['reciever_home_address'];
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
        Order
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Users</li>
        <li class="active">Edit Order</li>
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
                        <label for="order_status">Select Service</label>
                        <select class="form-control" name="order_status">
                          <option value="recieve">Recieve</option>
                          <option value="cnfrm">Confrm</option>
                          <option value="complete">Complete</option>
                        </select>
                      </div> 
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Reciever Product Id</label>
                      <input type="" name="" class="form-control" disabled="" value="<?php echo $product_id; ?>">
                    </div>
                  </div>
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Reciever Name</label>
                      <input type="" name="" class="form-control" disabled="" value="<?php echo $reciever_name ?>">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Reciever Phone</label>
                      <input type="" name="" class="form-control" disabled="" value="<?php echo $reciever_phone ?>">
                    </div>
                  </div>   

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Reciever City</label>
                      <input type="" name="" class="form-control" disabled="" value="<?php echo $reciever_city ?>">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="">Reciever Postal</label>
                      <input type="" name="" class="form-control" disabled="" value="<?php echo $reciever_postal_code ?>">
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="">Reciever Home Address</label>
                      <textarea class="form-control" disabled=""><?php echo $reciever_home_address ?></textarea>
                    </div>
                  </div>

            <div class="col-md-12">            
                <center>
                  <input class='btn btn-sm btn-primary ' type='submit' id='order_update' name="order_update" value='Update' style='padding:7px;'>
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