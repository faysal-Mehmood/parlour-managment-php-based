<?php require_once (dirname(__FILE__)."/include/head.php");
$book_appointment = NEW FUNCTION_CLASS();

if (isset($_POST['book_appointment'])) {

  $client_name         = $_POST['client_name'];
  $client_phone        =  $_POST['client_phone'];
  $appointment_service = $_POST['appointment_service'];
  $appointment_date    = $_POST['appointment_date'];
  $appointment_tokenz  = random_num(2).'-'.time();
  $appointment_status  = "Pending";
  $sender = "Saloon";
  $message = "Aslam-o-Alaikum $client_name Your Appointment Has Been Booked at Designer.pk .Your Appoint Date is $appointment_date. Your Appointment Token is ( $appointment_tokenz ).Please Come On Our Parlor/Saloon On Appointment Date With Token";

  if (User_is_logged_in()) { 
     if ($book_appointment->book_appointment($client_name,$client_phone,$appointment_service,$appointment_date,$appointment_tokenz,$appointment_status)) {
       $msg = "Appointment Has Been Booked";
       $appointment_token = "Your Appointment Token No ( ".$appointment_tokenz." )";
       $book_appointment->send_sms($client_phone,$sender,$message);
     } else {
       $msg = "Appointment Can't Booked Please try again later";
     }
  } else {
     $msg = "Please Login Here With Your Email Then Try Again";
  } 
  

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Book Appointment - <?php echo SITE_TITLE; ?></title>
<?php
include("theme/meta-head.php");
?>
  <style>

  .wrap{
   margin-top: 80px;
   margin-bottom: 20px;    
  }
  </style>
<script type="text/javascript" src="<?php echo BASE_URL ?>/assets/js/phone.js"></script>
<script type="text/javascript">
  $(function(){
  
  $("#client_phone").mask("99999999999");


  $("#client_phone").on("blur", function() {
      var last = $(this).val().substr( $(this).val().indexOf("-") + 1 );

      if( last.length == 5 ) {
          var move = $(this).val().substr( $(this).val().indexOf("-") + 1, 1 );

          var lastfour = last.substr(1,4);

          var first = $(this).val().substr( 0, 9 );

          $(this).val( first + move + '-' + lastfour );
      }
  });
}); 
</script>

</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
  
<?php
include("theme/header.php");
?>

<div class="wrap container">

    <div class="modal-dialog">
      <div style="box-shadow: 0 3px 8px -1px rgba(0, 0, 0, 0.2);">

            <form method="post" enctype="multipart/form-data" id="signForm">
             <div id="showReturnMsg"></div>

              <div class="col-md-12 col-lg-12 col-xl-12 ">
                  <div class="category-title">
                    <h3 class="c-heading">Book Appointment</h3>
                   <span style="color:red"> <?php if(isset($msg)) echo $msg ?></span><br>
                    <strong><?php if(isset($appointment_token)) echo $appointment_token ?></strong>
                  </div>

                      <div class="form-group">
                        <label for="client_name">Client Name</label>
                        <input type="text" class="form-control" placeholder="Enter Client Name" id="client_name" name="client_name" required>
                      </div>

                      <div class="form-group">
                        <label for="client_phone">Client Phone Number</label>
                        <input type="text" class="form-control" placeholder="Enter Client Phone Number" id="client_phone" name="client_phone">
                      </div>

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

                      <div class="form-group">
                        <label for="appointment_date">Select Date</label>
                        <input type="date" class="form-control" placeholder="Select Date" id="appointment_date" name="appointment_date" required pattern="\d{4}-\d{2}-\d{2}">
                      </div>                  

                    <center><button type="submit" class="btn btn-secondary" name="book_appointment" id="book_appointment">Book Now</button></center>
              </div>
            </form>
                    <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="services.php">Visit Service Area</a></button>
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
