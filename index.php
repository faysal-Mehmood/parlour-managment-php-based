<?php require_once (dirname(__FILE__)."/include/head.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo SITE_TITLE ." - ". SITE_SLOGAN; ?></title>
<?php
include("theme/meta-head.php");
?>

</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top header">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#myPage"><img style="margin-top:-10px" src="image/brand.jpg" alt="brand" ></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#services">SERVICES</a></li>
        <li><a href="#pricing">PRICING</a></li>
        <li><a href="#contact">CONTACT</a></li>
        <li><a href="<?php echo BASE_URL; ?>/book-appointment.php">Book Appointment</a></li>
        <li><a href="<?php echo BASE_URL; ?>/store.php">Store</a></li>
        <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Cart<span class="badge">0</span></a>
          <div class="dropdown-menu" style="width:400px;">
            <div class="">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-md-3">S No</div>
                  <div class="col-md-3">Product Image</div>
                  <div class="col-md-3">Product Name</div>
                  <div class="col-md-3">Price in $.</div>
                </div>
              </div>
              <div class="panel-body">
                <div id="cart_product">
                <!--<div class="row">
                  <div class="col-md-3">Sl.No</div>
                  <div class="col-md-3">Product Image</div>
                  <div class="col-md-3">Product Name</div>
                  <div class="col-md-3">Price in $.</div>
                </div>-->
                </div>
              </div>
            </div>
          </div>
        </li>
    <?php if (User_not_logged_in()) { ?>
        <li><a href="<?php echo BASE_URL; ?>/login.php">Login</a></li>
        <li><a href="<?php echo BASE_URL; ?>/Signup.php">SignUp</a></li>
    <?php } if (User_is_logged_in()) { ?>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $Username; ?>
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo BASE_URL; ?>/dashboard.php">DashBoard</a></li>
            <li><a href="<?php echo BASE_URL; ?>/logout.php">logout</a></li>
          </ul>
        </li>
    <?php } ?>
      </ul>
    </div>
  </div>
</nav>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="<?php echo BASE_URL; ?>/assets/images/image-3.jpg" alt="New York" >
        <div class="carousel-caption">
          <h3>New York</h3>
          <p>The atmosphere in New York is lorem ipsum.</p>
        </div>      
      </div>

      <div class="item" >
        <img src="<?php echo BASE_URL; ?>/assets/images/image-1.jpg" alt="Chicago" >
        <div class="carousel-caption">
          <h3>Chicago</h3>
          <p>Thank you, Chicago - A night we won't forget.</p>
        </div>      
      </div>
    
      <div class="item">
        <img src="<?php echo BASE_URL; ?>/assets/images/image-2.jpg" alt="Los Angeles" >
        <div class="carousel-caption">
          <h3>LA</h3>
          <p>Even though the traffic was a mess, we had the best time playing at Venice Beach!</p>
        </div>      
      </div>
    </div>

   
</div>


<!-- Container (Services Section) -->
<div id="services" class="container-fluid text-center">
  <h2>SERVICES</h2>
  <h4>What we offer</h4>


<section class="featured-services row">

<?php
$GetServices = getServiceDetails();
while ($row = mysqli_fetch_assoc($GetServices)) {
?>      
<div class="service l-md-6 col-lg-4">
<figure><img src="<?php echo BASE_URL; ?>/data/services-images/<?php echo $row['id']; ?>/<?php echo $row['service_token']; ?>.jpg" alt="" /></p>
<figure>
<div class="item-meta">
<h4 class="heading"><?php echo $row['service_name']; ?></h4>
<p><?php echo $row['service_description']; ?></p>
</div>
</figure>
</figure>
</div> 
<?php } ?>

</section>
</div>
</div>
    </div></section>

</div>

<!-- Container (Pricing Section) -->
<div id="pricing" class="container-fluid">
  <div class="text-center">
    <h2>Pricing</h2>
    <h4>Choose a payment plan that works for you</h4>
  </div>
  <div class="row slideanim">
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


<!-- Container (Portfolio Section) -->
<div id="portfolio" class="container-fluid text-center">

  
  <h2>What our customers say</h2>
  <div class="review-block">		
				<?php

				$ratinguery = $mysqli->query("SELECT ratingId, itemId, username, ratingNumber, title, comments, created, modified FROM item_rating");
				while($rating = mysqli_fetch_assoc($ratinguery)){
					$date=date_create($rating['created']);
          $reviewDate = date_format($date,"M d, Y");
          			
				?>				
					<div class="row">
						<div class="col-sm-3">
							<img  style="width:60px;height:60px" src="image/profile1.png" class="img-rounded">
							<div class="review-block-name">By <a href="#"> <?php echo $rating['username']; ?></a></div>
							<div class="review-block-date"><?php echo $reviewDate; ?></div>
						</div>
						<div class="col-sm-9">
							<div class="review-block-rate">
								<?php
								for ($i = 1; $i <= 5; $i++) {
									$ratingClass = "btn-default btn-grey";
									if($i <= $rating['ratingNumber']) {
										$ratingClass = "btn-warning";
									}
								?>
								<button type="button" class="btn btn-xs <?php echo $ratingClass; ?>" aria-label="Left Align">
								  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
								</button>								
								<?php } ?>
							</div>
							<div class="review-block-title"><?php echo $rating['title']; ?></div>
							<div class="review-block-description"><?php echo $rating['comments']; ?></div>
						</div>
					</div>
					<hr/>					
				<?php } ?>
				</div>
</div>

<!-- Container (Contact Section) -->
<div id="contact" class="container">
  <h2 class="text-center">CONTACT</h2>
  <div class="row">
    <div class="col-sm-5">
      <p>Contact us and we'll get back to you within 24 hours.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> Punjab, Pk</p>
      <p><span class="glyphicon glyphicon-phone"></span> <?php echo $web_phone ?></p>
      <p><span class="glyphicon glyphicon-envelope"></span> <?php echo $web_email ?></p>
    </div>
    <div class="col-sm-7 slideanim">
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


<?php
include("theme/footer.php");
?>
<script>
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
