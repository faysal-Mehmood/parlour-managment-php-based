<?php require_once (dirname(__FILE__)."/include/head.php");
if(User_not_logged_in())
{
   redirect('index.php');
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>My Appointments - <?php echo SITE_TITLE; ?></title>
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
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<?php
include("theme/header.php");
?>

<div class="wrap container">
 <div class="row">

  <div class="col-sm-4 col-md-4">
    <div class="list-group">
        <a href="<?php echo BASE_URL?>/dashboard.php" class="list-group-item list-group-item-action">Dashboard</a>
        <a href="<?php echo BASE_URL?>/my-appointment.php" class="list-group-item list-group-item-action">My Appointments</a>
        <a href="<?php echo BASE_URL?>/my-orders.php" disabled="" class="list-group-item list-group-item-action">My Orders</a>
        <a href="<?php echo BASE_URL?>/rating.php" disabled="" class="list-group-item list-group-item-action">Rating</a>
    </div>
  </div> 

  <div class="col-sm-8 col-md-8">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Sr No</th>
        <th>Product</th>
        <th>Product Name</th>
        <th>Order Price</th>
        <th>Invoice No</th>
        <th>Order Status</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = getOrderDetails($UserId);
      if (mysqli_num_rows($sql)) {
        
      while ($row=mysqli_fetch_assoc($sql)) { 
        $product_id   = $row["product_id"];
        $quantity     = $row['qty'];
        $invoice      = $row['trx_id'];
        $order_status = $row["p_status"];
      $sql1 = getOrderProductDetails($product_id);

      while ($row=mysqli_fetch_assoc($sql1)) {
        $product_title = $row["product_name"];
        $product_price = $row["product_price"];
        $product_token = $row["product_token"];
        $n++;
        ?>  
        <tr>
          <td><?php echo $n ?></td>
          <td><img class="img-responsive" src="<?php echo BASE_URL ?>/data/product-images/<?php echo $product_id ?>/<?php echo $product_token ?>.jpg" height="100px" width="100px"></td>
          <td><?php echo $product_title ?></td>
          <td>$ <?php echo $product_price * $quantity ?></td>
          <td><?php echo $invoice ?></td>
          <td><?php echo ucfirst($order_status) ?></td>
        </tr>
      <?php } } } else { echo "<center><td>No Order From Your End</td></center>";} ?>
    </tbody>
  </table>





  </div>

 </div>
</div>

<?php
include("theme/footer.php");
?>

<script>


$(function(){

  /* Sets the minimum height of the wrapper div to ensure the footer reaches the bottom */
  function setWrapperMinHeight() {
    $('.wrapper').css('minHeight', window.innerHeight - $('.nav').height() - $('.footer').height());
  }
  /* Make sure the main div gets resized on ready */
  setWrapperMinHeight();

  /* Make sure the wrapper div gets resized whenever the screen gets resized */
  window.onresize = function() {
    setWrapperMinHeight();
  }
});

$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>

</body>
</html>
