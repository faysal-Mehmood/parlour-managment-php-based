<?php require_once (dirname(__FILE__)."/include/head.php");
if(User_is_logged_in())
{
   redirect('index.php');
}
$userREG = New USER();
if (isset($_POST['login'])) {


      $user_email = $_POST['user_email'];
      $user_pass  = $_POST['user_pass'];

      $userREG->login($user_email,$user_pass);


} 

if (isset($_POST["login_user_with_product"])) {
  //this is product list array
  $product_list = $_POST["product_id"];
  //here we are converting array into json format because array cannot be store in cookie
  $json_e = json_encode($product_list);
  //here we are creating cookie and name of cookie is product_list
  setcookie("product_list",$json_e,strtotime("+1 day"),"/","","",TRUE);

  $_COOKIE["product_list"];

}

   if(isset($_GET['error'])){
     $msg = "<strong>Warning!</strong> Incorrect Username/Passwrod";
   }
   if(isset($_GET['wrong'])){
     $msg = "<strong>User</strong> Can't Found";
   }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login - <?php echo SITE_TITLE; ?></title>
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

    <div class="modal-dialog">
      <div style="box-shadow: 0 3px 8px -1px rgba(0, 0, 0, 0.2);">

            <form method="post" enctype="multipart/form-data" id="signForm">
             <div id="showReturnMsg"></div>

              <div class="col-md-12 col-lg-12 col-xl-12 ">
                  <div class="category-title">
                    <h3 class="c-heading">Enter Login Details</h3>
                    <span style="color:red"><?php if(isset($msg)) echo $msg ?></span>
                  </div>

                      <div class="form-group">
                        <label for="user_email">User Email</label>
                        <input type="email" class="form-control" placeholder="Enter Email" id="user_email" name="user_email" required>
                      </div>
                      <div class="form-group">
                        <label for="user_pass">Password</label>
                        <input type="password" class="form-control" placeholder="Enter Password" id="user_pass" name="user_pass" required>
                        </div>
                      <center><button type="submit" class="btn btn-secondary" name="login" id="login">Login</center>
              </div>
            </form>
        <!-- Modal footer -->
        <div class="modal-footer">
          
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
