<?php
session_start();

if(!empty($_SESSION['admin_email'])){
   
?>
<!DOCTYPE html>
<html lang="zxx">
   
<head>
      <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="keyword" content="">
      <meta name="author"  content=""/>
      <!-- Page Title -->
      <title>Admin dashboard | jagvillage</title>
      <!-- Datepicket CSS -->
      <link type="text/css" rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css"/>
      <!-- Chart CSS -->      
      <link type="text/css" rel="stylesheet" href="assets/plugins/chartist/chartist.css">
      <!-- Map CSS --> 
      <link type="text/css" rel="stylesheet" href="assets/plugins/jqvmap/jquery-jvectormap-2.0.2.css">
      <!-- Main CSS -->	  
      <link type="text/css" rel="stylesheet" href="assets/css/style.css"/>
      <!-- Favicon -->	
      <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn"t work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body>
      <!--================================-->
      <!-- Page Container Start -->
      <!--================================-->
      <div class="page-container">
         <!--================================-->
         <!-- Page Sidebar Start -->
         <!--================================-->
         <?php include('sidebar.php'); ?>
         <!--/ Page Sidebar End -->
         <!--================================-->
         <!-- Page Content Start -->
         <!--================================-->
         <div class="page-content">
            <!--================================-->
            <!-- Page Header Start -->
            <!--================================-->
            <div class="page-header">
               
               <nav class="navbar navbar-default">
                  <!--================================-->
                  <!-- Brand and Logo Start -->
                  <!--================================-->
                  <div class="navbar-header">
                     <div class="navbar-brand">
                        <ul class="list-inline">
                           <!-- Mobile Toggle and Logo -->
                           <li class="list-inline-item"><a class="hidden-md hidden-lg" href="#" id="sidebar-toggle-button"><i data-feather="menu" class="wd-20"></i></a></li>
                           <!-- PC Toggle and Logo -->
                           <li class="list-inline-item"><a class=" hidden-xs hidden-sm" href="#" id="collapsed-sidebar-toggle-button"><i data-feather="menu" class="wd-20"></i></a><img src="../images/logo.png" alt="" style="margin-left:30px; width: 50%;"></li>
                           
                        </ul>
                     </div>
                  </div>
                  <!--/ Brand and Logo End -->
                  <!--================================-->
                  <!-- Header Right Start -->
                  <!--================================-->
                  <div class="header-right pull-right">
                     <ul class="list-inline justify-content-end">
                        <!--================================-->
                        <!-- Languages Dropdown Start -->
                        <!--================================-->
                        
                        <!--/ Messages Dropdown End -->
                        <!--================================-->
                        <!-- Profile Dropdown Start -->
                        <!--================================-->
                        <li class="list-inline-item dropdown" style="border: 1px solid #808080; padding: 5px; border-radius: 20px;">
                           <a  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <?php 
                                       if(!empty($_SESSION['admin_email'])){ echo ''.$_SESSION['admin_email']; }
                                      
                                       ?>
                           </a>
                           <div class="dropdown-menu dropdown-menu-right dropdown-profile">
                              <div class="user-profile-area">
                                 <div class="user-profile-heading">
                                    <div class="profile-thumbnail">
                                       
                                    </div>
                                    <div class="profile-text">
                                       <h6><?php 
                                       if(!empty($_SESSION['admin_email'])){ echo ''.$_SESSION['admin_email']; }
                                      
                                       ?></h6>
                                       
                                    </div>
                                 </div>
                                 
                                 <a href="logout.php" class="dropdown-item"><i data-feather="power" class="wd-16 mr-2"></i> Sign-out</a>
                              </div>
                           </div>
                        </li>
                        <!-- Profile Dropdown End -->
                     </ul>
                  </div>
                  <!--/ Header Right End -->
               </nav>
            </div>
            <!--/ Page Header End -->   
            <!--================================-->
            <!-- Page Inner Start -->
            <!--================================-->
            <div class="page-inner">
               <!--================================-->
               <!-- Breadcrumb Start -->
               <!--================================-->
               <div class="pageheader pd-t-25 pd-b-35">
                  <div class="d-flex justify-content-between">
                     <div class="clearfix">
                        <div class="pd-t-5 pd-b-5">
                           <h1 class="pd-0 mg-0 tx-20 tx-dark">Admin Dashboard</h1>
                        </div>
                        
                     </div>
                    
                  </div>
               </div>
            <!--/ Page Footer End -->		
         </div>
         <!--/ Page Content End -->
      </div>
      <!--/ Page Container End -->
      <!--================================-->
      <!-- Scroll To Top Start-->
      <!--================================-->	
      <a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
      <!--/ Scroll To Top End -->
      <!--================================-->
      <!-- Template Customizer Start-->
      <!--================================-->		  
      
      <!--/ Template Customizer End -->
      <!--================================-->
      <!-- Footer Script -->
      <!--================================-->
      <script src="assets/plugins/jquery/jquery.min.js"></script>
      <script src="assets/plugins/jquery-ui/jquery-ui.js"></script>
      <script src="assets/plugins/moment/moment.min.js"></script>
      <script src="assets/plugins/popper/popper.js"></script>
      <script src="assets/plugins/feather/feather.min.js"></script>
      <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
      <script src="assets/plugins/typeahead/typeahead.js"></script>
      <script src="assets/plugins/typeahead/typeahead-active.js"></script>
      <script src="assets/plugins/pace/pace.min.js"></script>
      <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
      <script src="assets/plugins/highlight/highlight.min.js"></script>
      <!-- Dashboard Script -->
      <script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
      <script src="assets/plugins/jqvmap/jquery-jvectormap-2.0.2.min.js"></script>	
      <script src="assets/plugins/jqvmap/gdp-data.js"></script>	
      <script src="assets/plugins/jqvmap/maps/jquery-jvectormap-world-mill-en.js"></script>	
      <script src="assets/plugins/chartist/chartist.js"></script>
      <script src="assets/plugins/apex-chart/apexcharts.min.js"></script>
      <script src="assets/plugins/apex-chart/irregular-data-series.js"></script>
      <script src="assets/plugins/flot/jquery.flot.js"></script>
      <script src="assets/plugins/flot/jquery.flot.pie.js"></script>
      <script src="assets/plugins/flot/jquery.flot.resize.js"></script>
      <script src="assets/plugins/flot/sampledata.js"></script>  
      <script src="assets/js/dashboard/sales-dashboard-init.js"></script>
      <!-- Required Script -->
      <script src="assets/js/app.js"></script>
      <script src="assets/js/avesta.js"></script>
      <script src="assets/js/avesta-customizer.js"></script>
      <!-- Javascript -->
     
      <!-- / Javascript -->
   </body>

</html>

<?php
}else{
  header('Location: login.php');
}
?>