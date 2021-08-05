<?php require_once (dirname(__FILE__)."/include/head.php");
if(User_not_logged_in())
{
   redirect('index.php');
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard - <?php echo SITE_TITLE; ?></title>
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

    <div class="row">

      <div class="col-md-4 col-sm-4">
        <div class="panel panel-default">
          <center>
            <div class="panel-heading">My Appointments</div>
            <div class="panel-body">
              <?php $appointment = getDetails($UserId); 
                    echo $row1 = mysqli_num_rows($appointment);
              ?>
            </div>
          </center>
        </div>
      </div>   

      <div class="col-md-4 col-sm-4">
        <div class="panel panel-default">
          <center>
            <div class="panel-heading">My Orders</div>
            <div class="panel-body">
                <?php $appointment = getOrderDetails($UserId); 
                    echo $row1 = mysqli_num_rows($appointment);
              ?>
            </div>
          </center>
        </div>
      </div>    

    </div>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Client Name</th>
        <th>Client Phone No</th>
        <th>Client Service</th>
        <th>Appointment Date</th>
        <th>Appointment Status</th>
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
          <td><?php echo $row['appointment_status'] ?></td>
        </tr>
      <?php } ?>
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
