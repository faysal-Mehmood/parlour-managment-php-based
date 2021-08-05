<!DOCTYPE html>
<html>
<?php include "theme/default/head.php" ?>
<?php
$reg_user = new USER();

$product_id     = $_GET['id'];
$datas = $mysqli->query("SELECT * FROM products where id = '$product_id'");
  while($row = mysqli_fetch_assoc($datas)){
$id                   = $row['id'];
$product_name         = $row['product_name'];
$product_name         = $row['product_name'];
$product_price        = $row['product_price'];
$product_description  = $row['product_description'];
$post_token           = $row['product_token'];
} 

if(isset($_POST['update_product']))
{
     
     $product_name         = $_POST['product_name'];
     $product_price        = $_POST['product_price'];
     $product_description  = $_POST['product_description'];
     $product_image        = $_FILES['product_image']['name'];
     $file_name            = $post_token.".jpg";

   
$mysqli->query("UPDATE products SET product_name = '$product_name' , product_price = '$product_price' , product_description = '$product_description'  where id = '$product_id'");

      if (!empty($product_image)) {
            if (file_exists(dirname(__FILE__)."/../data/product-images/$id")) {

        } else {
            mkdir(dirname(__FILE__)."/../data/product-images/$id", 0777, true);
        }
       move_uploaded_file($_FILES['product_image']['tmp_name'], dirname(__FILE__)."/../data/product-images/".$id.'/'.$file_name);
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
        Products
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Users</li>
        <li class="active">Edit Products</li>
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
                      <label for="text">Product Name</label>
                      <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $product_name ?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                      <label for="text">Product Price</label>
                      <input type="text" class="form-control" id="product_price" name="product_price" value="<?php echo $product_price ?>">
                    </div>
                  </div>
                  
                  <div class="col-md-6">
                     <div class="form-group">
                      <label for="text">Product Description</label>
                     <textarea class="form-control" name="product_description"><?php echo $product_description ?></textarea>
                    </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group">
                      <label for="text">Product Image</label>
                      <input type="file" name="product_image" class="form-control">
                    </div>
                  </div>
            <div class="col-md-12">            
                <center>
                  <input class='btn btn-sm btn-primary ' type='submit' id='update_product' name="update_product" value='Update Product' style='padding:7px;'>
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