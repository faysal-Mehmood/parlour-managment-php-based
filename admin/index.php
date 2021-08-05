<!DOCTYPE html>
<html>
<?php include "theme/default/head.php" ?>


<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  
<?php include "theme/default/header.php" ?>
<?php include "theme/default/sidebar.php" ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">CPU Usage</span>
              <span class="info-box-number"><small>%</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Ram Usage</span>
              <span class="info-box-number"></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>
        <?php
        $total_videos = $mysqli->query("SELECT * FROM appointment ");
        $total_videos = mysqli_num_rows($total_videos);

        $total_users = $mysqli->query("SELECT * FROM users ");
        $total_users = mysqli_num_rows($total_users);
        
        ?>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-play"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Appointments</span>
              <span class="info-box-number"><?php echo $total_videos; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Users</span>
              <span class="info-box-number"><?php echo $total_users; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
       
          <!-- /.box -->
          <div class="row">
            <!-- /.col -->





      <div class="col-md-8">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Recently Added Appointments</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Client Name</th>
                    <th>Client Phone No</th>
                    <th>Client Service</th>
                    <th>Appointment Date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $tableData = getDetails($UserId);
                  while ($row = mysqli_fetch_assoc($tableData)) {?>  
                    <tr>
                      <td><?php echo $row['client_name'] ?></td>
                      <td><?php echo $row['client_phone'] ?></td>
                      <td><?php echo $row['appointment_service'] ?></td>
                      <td><?php echo $row['appointment_date'] ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="javascript:void(0)" class="uppercase">View All Appointments</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
       

      </div>
            <!-- /.col -->

           </div>
            <!-- /.row -->

          </div>

 
 <div class="row">
        <div class="col-md-12">

    <div class="col-md-4">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Recently Recieve Orders</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Order Id</th>
                    <th>Order Name</th>
                    <th>Order Price</th>
                    <th>Order Invoice</th>
                    
                  </tr>
                </thead>
                <tbody>
                <?php
                $sql = $mysqli->query("SELECT * FROM orders");
                      $sql = getOrderDetails($UserId);
                    if (mysqli_num_rows($sql)) {
                      
                    while ($row=mysqli_fetch_assoc($sql)) { 
                      $order_id   = $row["order_id"];
                      $product_id = $row["product_id"];
                      $quantity   = $row['qty'];
                      $invoice    = $row['trx_id'];
                    $sql1 = getOrderProductDetails($product_id);

                    while ($row=mysqli_fetch_assoc($sql1)) {
                      $product_title = $row["product_name"];
                      $product_price = $row["product_price"];
                      $product_token = $row["product_token"];
                      ?> 
                    <tr>
                      <td><?php echo $order_id ?></td>
                      <td><?php echo $product_title ?></td>
                      <td><?php echo $product_price ?></td>
                      <td><?php echo $invoice ?></td>
                    </tr>
                  <?php } } }?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="javascript:void(0)" class="uppercase">View All Orders</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
       

      </div>
            <!-- /.col -->  

    <div class="col-md-8">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Recently Added Services</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Service Id</th>
                    <th>Service Name</th>
                    <th>Service Price</th>
                    <th>Service Description</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php $tableData = getServiceDetails();
                  while ($row = mysqli_fetch_assoc($tableData)) {?>  
                    <tr>
                      <td><?php echo $row['id'] ?></td>
                      <td><?php echo $row['service_name'] ?></td>
                      <td><?php echo $row['service_price'] ?></td>
                      <td><?php echo $row['service_description'] ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="javascript:void(0)" class="uppercase">View All Services</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
       

      </div>
            <!-- /.col -->    

    <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Recently Added Products</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Product Id</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product Description</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php $tableData = getProductDetails();
                  while ($row = mysqli_fetch_assoc($tableData)) {?>  
                    <tr>
                      <td><?php echo $row['id'] ?></td>
                      <td><?php echo $row['product_name'] ?></td>
                      <td><?php echo $row['product_price'] ?></td>
                      <td><?php echo $row['product_description'] ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="javascript:void(0)" class="uppercase">View All Products</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
       

      </div>



      </div>
 <!-- /.col -->  

        </div>
<!-- /.row --> 

        
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
 <?php include 'theme/default/footer.php';?>

  

</body>
</html>
