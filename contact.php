<?php require_once (dirname(__FILE__)."/include/head.php");

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Contact Us - <?php echo SITE_TITLE; ?></title>
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

<!-- Container (Contact Section) -->
<div id="contact" class="container">
  <h2 class="text-center">CONTACT</h2>
  <div class="row">
    <div class="col-sm-5">
      <p>Contact us and we'll get back to you within 24 hours.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> Chicago, US</p>
      <p><span class="glyphicon glyphicon-phone"></span> +00 1515151515</p>
      <p><span class="glyphicon glyphicon-envelope"></span> myemail@something.com</p>
    </div>
    <div class="col-sm-7">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
      <div class="row">
        <div class="col-sm-12 form-group">
          <button class="btn btn-default pull-right" type="submit">Send</button>
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
