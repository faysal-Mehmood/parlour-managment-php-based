<!DOCTYPE html>
<html>
<?php include "theme/default/head.php" ?>
<?php 

if (!empty($_POST['delete_selected'])) {
if (isset($_POST['delete_selected'])) {

 	for ($i=0; $i <count($_POST['check_services']) ; $i++) { 
 		$action_id = $_POST['check_services'][$i];
        action($mysqli,'services','delete',$action_id);
              
 	} 
 		$msg = "<div class='alert alert-success'>
 						<button class='close' data-dismiss='alert'>&times;</button>
 							<strong>Success!</strong> Selected Services Have Been Deleted
 					  </div>";
 }
}
if (isset($_GET['delete_services'])) {

 		$action_id = $_GET['delete_services'];
        action($mysqli,'services','delete',$action_id);
 
 		$msg = "<div class='alert alert-success'>
 						<button class='close' data-dismiss='alert'>&times;</button>
 							<strong>Success!</strong> Service Have Been Deleted
 					  </div>";
 }
?>
<link rel="stylesheet" href="<?php echo $domain ?>/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<script type="text/javascript">
function toggle(source) {
  checkboxes = document.getElementsByName('check_services[]');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
</script>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  
<?php include "theme/default/header.php" ?>
<?php include "theme/default/sidebar.php" ?>

 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	  <!-- Content Header (Page header) -->
	<section class="content-header">
      <h1>
        Service Manage
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Videos</li>
        <li class="active">Services Manage</li>
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
<?php 


?>

  <div class="box-body">

  	<form name="services_manage" method="post">
  

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <div class="btn-group">


        <input class="btn btn-primary btn-xs" type="submit" name="delete_selected" value="Delete" class="button"
               onclick="return _cb.confirm_it('Are you sure you want to delete selected video(s)')"/>

    </div>
                <tr>
                  <th><input type="checkbox" name="checkall" onclick="toggle(this)"/></th>
                  <th>Id</th>
                  <th>Service Details</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $datas = $mysqli->query("SELECT * FROM services order by id desc");
                while($row = mysqli_fetch_assoc($datas)){
                 $id                   = $row['id'];
                 $service_name         = $row['service_name'];
                 $service_name         = $row['service_name'];
                 $service_price        = $row['service_price'];
                 $service_description  = $row['service_description'];
                 $post_token           = $row['service_token'];
                 $service_active       = $row['active'];

                ?>
                <tr>
                  <td><input name="check_services[]" type="checkbox" id="check_services" value="<?php echo $id ?>"/></td>
                  <td><?php echo $id ?></td>
                  <td> <div class="row">
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="<?php echo BASE_URL; ?>/data/services-images/<?php echo $id ?>/<?php echo $post_token.".jpg" ?>" width="130" height="80" id="thumbs_967" title=""/>
                            </div>
                            <div class="col-md-9">
                                <a href="#">
                                    <?php echo $service_name  ?> </a><br>

                            </div>
                        </div>
                    </div>

                </div>
                </td>
                  <td><div class="dropdown text-center">
            <button id="dropdownMenu1" class="btn btn-primary dropdown-toggle btn-width" data-toggle="dropdown">
                <i class="hidden-xs">Actions</i> <i class="caret"></i></button>
                <ul class="dropdown-menu pull-right" aria-labelledby="dropdownMenu1" role="menu">
                <li><a role="menuitem" tabindex="-1" href="<?php echo $domain ?>/admin/edit_service.php?id=<?php echo $id; ?>" class="">Edit</a></li>

                <li class="divider"></li>
                <li><a role="menuitem" tabindex="-1" href="?delete_services=<?php echo $id; ?>">Delete</a></li>
                </ul>
        </div></td>
                </tr>
               <?php } ?>
                </tbody>
              </table>
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
<?php

?>