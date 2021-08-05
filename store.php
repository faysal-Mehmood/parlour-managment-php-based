<?php require_once (dirname(__FILE__)."/include/head.php");

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Store - <?php echo SITE_TITLE; ?></title>
<?php
include("theme/meta-head.php");
?>

  <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/assets/css/style_estore.css">
  <style>

  .wrap{
   margin-top: 80px;
   margin-bottom: 20px;    
  }
  </style>
</head>
<body>
<div class="wait overlay">
  <div class="loader"></div>
</div>
<?php
include("theme/header.php");
?>

<div class="wrap container">
        <div class="row">
          <div class="col-md-12 col-xs-12" id="product_msg">
          </div>
        </div>
<div id="services" class="text-center">

  <h3>Product Store <small>100% Creative</small></h3>
  <h4>All Products Are Original</h4>

<section class="featured-products row">
<?php
$GetProducts = getProductDetails();
while ($row = mysqli_fetch_assoc($GetProducts)) {
?>  
<div class="products l-md-6 col-lg-4">
<figure><img src="<?php echo BASE_URL; ?>/data/product-images/<?php echo $row['id']; ?>/<?php echo $row['product_token']; ?>.jpg" alt="" /></p>
<figure>
<div class="item-meta">
<h4 class="heading"><?php echo $row['product_name']; ?> <span style="color: red"> - $<?php echo $row['product_price']; ?></span></h4>
<input type="button" class="btn btn-secondary" name="login" value="Buy Now" pid='<?php echo $row['id']; ?>' id="buyproduct">
<p><?php echo $row['product_description']; ?>
</p>
</div>
</figure>
</figure>
</div>
<?php } ?>
</section>






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
