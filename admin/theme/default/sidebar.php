  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo Domain_Data ?>/data/user_img/<?php echo $_SESSION['Session'] ?>/user_profile.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
          
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>General</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo $domain ?>/admin/main.php"><i class="fa fa-circle-o"></i> Website Configuration</a></li>
          </ul>
        </li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-play"></i>
            <span>Orders</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="view-orders.php"><i class="fa fa-youtube-play"></i>Manage Orders</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-play"></i>
            <span>Services</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="add_services.php"><i class="fa fa-youtube-play"></i>Add Services</a></li>
            <li><a href="manage_services.php"><i class="fa fa-youtube-play"></i>Manage Services</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-play"></i>
            <span>Prodcuts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="add_products.php"><i class="fa fa-youtube-play"></i>Add Products</a></li>
            <li><a href="manage_products.php"><i class="fa fa-youtube-play"></i>Manage Products</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-play"></i>
            <span>Appointments</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="add_appointment.php"><i class="fa fa-youtube-play"></i>Add Appointment</a></li>
            <li><a href="manage_appointment.php"><i class="fa fa-youtube-play"></i>Manage Appointment</a></li>
          </ul>
        </li>


      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>