 <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


<!-- jQuery 3 -->
<script src="<?php echo $domain ?>/admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo $domain ?>/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo $domain ?>/admin/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $domain ?>/admin/dist/js/adminlte.min.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script src="<?php echo $domain ?>/admin/dist/js/load.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

 <!-- Sparkline -->
<script src="<?php echo $domain ?>/admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="<?php echo $domain ?>/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo $domain ?>/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- am charts mapdata -->
<script src="<?php echo $domain ?>/admin/plugins/ammap/ammap.js" type="text/javascript"></script>
<link rel="<?php echo $domain ?>/admin/stylesheet" href="plugins/ammap/ammap.css" type="text/css" media="all" />
<script src="<?php echo $domain ?>/admin/plugins/ammap/worldLow.js" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="<?php echo $domain ?>/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo $domain ?>/admin/bower_components/chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo $domain ?>/admin/dist/js/pages/dashboard2.js"></script>


<script src="<?php echo $domain ?>/admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo $domain ?>/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,
      "pageLength"  : 15,
      "lengthMenu"  : [[15, 25, 50, -1], [15, 25, 50, "All"]],
    })
  })
</script>
<script type="text/javascript">
  var url = window.location;

// for sidebar menu entirely but not cover treeview
$('ul.sidebar-menu a').filter(function() {
    return this.href == url;
}).parent().siblings().removeClass('active').end().addClass('active');

// for treeview
$('ul.treeview-menu a').filter(function() {
    return this.href == url;
}).parentsUntil(".sidebar-menu > .treeview-menu").siblings().removeClass('active').end().addClass('active')
</script>
<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
    
}
function openCity_parent(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
    
}
document.getElementById("defaultOpen").click();
</script>
