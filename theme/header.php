<nav class="navbar navbar-default navbar-fixed-top header">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="http://localhost/parlor"><img style="margin-top:-10px" src="image/brand.jpg" alt="brand" ></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo BASE_URL; ?>/services.php">SERVICES</a></li>
        <li><a href="<?php echo BASE_URL; ?>/pricing.php">PRICING</a></li>
        <li><a href="<?php echo BASE_URL; ?>/contact.php">CONTACT</a></li>
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