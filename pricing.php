<?php require_once (dirname(__FILE__)."/include/head.php");

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pricing - <?php echo SITE_TITLE; ?></title>
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
<body>
<?php
include("theme/header.php");
?>

<div class="wrap container">

<!-- Container (Pricing Section) -->
<div id="pricing" class="container-fluid">
  <div class="text-center">
    <h2>Pricing</h2>
    <h4>Choose a payment plan that works for you</h4>
  </div>
  <div class="row">
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>Basic</h1>
        </div>
        <div class="panel-body">
          <p>Hair Cut</p>
          <p>Hair Style</p>
          <p>Nails Cutting</p>
          <p>Waxing</p>
        </div>
        <div class="panel-footer">
          <h3>$19</h3>
          <button class="btn btn-lg">Sign Up</button>
        </div>
      </div>      
    </div>     
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>Pro</h1>
        </div>
        <div class="panel-body">
          <p>Hair Cut</p>
          <p>Hair Style</p>
          <p>Ficial</p>
          <p>Nails Cutting</p>
          <p>Waxing</p>
        </div>
        <div class="panel-footer">
          <h3>$29</h3>
          <button class="btn btn-lg">Sign Up</button>
        </div>
      </div>      
    </div>       
    <div class="col-sm-4 col-xs-12">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <h1>Premium</h1>
        </div>
        <div class="panel-body">
          <p>Hair Cut</p>
          <p>Hair Style</p>
          <p>Ficial </p>
          <p>Nails Cutting</p>
          <p>Body Massage</p>
          <p>Waxing</p>
        </div>
        <div class="panel-footer">
          <h3>$49</h3>
          <button class="btn btn-lg">Sign Up</button>
        </div>
      </div>      
    </div>    
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
