<!DOCTYPE html>
<html>
<?php include "theme/default/head.php" ?>
<?php
$reg_user = new USER();
$book_appointment = NEW FUNCTION_CLASS();

if(isset($_POST['add_appointment']))
{
     
     $client_name              = $_POST['client_name'];
     $client_phone             = $_POST['client_phone'];
     $appointment_service      = $_POST['appointment_service'];
     $appointment_date         = $_POST['appointment_date'];
     $appointment_token        = random_num(2).'-'.time();
     $appointment_status       = "Pending";

     if ($book_appointment->book_appointment($client_name,$client_phone,$appointment_service,$appointment_date,$appointment_token,$appointment_status)) {
          $msg = "<div class='alert alert-success'>
            <button class='close' data-dismiss='alert'>&times;</button>
              <strong>Success!</strong> Appointment Have Been Booked
            </div>";

          $appointment_msg = "<div class='alert alert-info'>
            <button class='close' data-dismiss='alert'>&times;</button>
              <strong>Token</strong> Your Appointment Token No  (".$appointment_token.")
            </div>";
       $book_appointment->send_sms($client_phone,$sender,$message);
     } else {
       $msg = "Appointment Can't Booked Please try again later";
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
        <li class="active">Add Service</li>
      </ol>
    </section>
       <!-- Main content -->
<section class="content">
	<!-- Row -->
<div class="row">
	<!-- Col -->
<div class="col-md-12">
		<?php if(isset($msg)) echo $msg ?>
    <?php if(isset($appointment_msg)) echo $appointment_msg ?>
<!-- box -->
<div class="box">

<div class="box-body">

  <form class="form-signin" method="post" enctype="multipart/form-data">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="client_name">Client Name</label>
                        <input type="text" class="form-control" placeholder="Enter Client Name" id="client_name" name="client_name" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="client_phone">Client Phone Number</label>
                        <input type="text" class="form-control" placeholder="Enter Client Phone Number" id="client_phone" name="client_phone">
                    </div>
                  </div>
                  
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="appointment_service">Select Service</label>
                        <select class="form-control" name="appointment_service">
                          <option value="hair_cut">Hair Cut</option>
                          <option value="hair_style">Hair Style</option>
                          <option value="ficia">Ficial</option>
                          <option value="nails_cutting">Nails Cutting</option>
                          <option value="body_massage">Body Massage</option>
                          <option value="waxing">Waxing</option>
                          <option value="basic">Basic ($19) </option>
                          <option value="pro">Pro ($29) </option>
                          <option value="premium">Premium ($49) </option>
                        </select>
                      </div> 
                  </div>

                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="appointment_date">Select Date</label>
                        <input type="text" class="form-control" placeholder="Select Date" id="appointment_date" name="appointment_date">
                    </div>
                  </div>

            <div class="col-md-12">            
                <center>
                  <input class='btn btn-sm btn-primary ' type='submit' id='add_appointment' name="add_appointment" value='Add New Appointment' style='padding:7px;'>
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