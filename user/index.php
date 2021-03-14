<?php
session_start();
require('../db.php');
if (!empty($_SESSION['email'])) {
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
      <meta name="author" content="" />
      <!-- Page Title -->
      <title>Dashboard | Jagvillage</title>
      <!-- Datepicket CSS -->
      <link type="text/css" rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css" />
      <!-- Chart CSS -->
      <link type="text/css" rel="stylesheet" href="assets/plugins/chartist/chartist.css">
      <!-- Map CSS -->
      <link type="text/css" rel="stylesheet" href="assets/plugins/jqvmap/jquery-jvectormap-2.0.2.css">
      <!-- Main CSS -->
      <link type="text/css" rel="stylesheet" href="assets/css/style.css" />
      <!-- Favicon -->
      <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
      <style>
         .card {
            overflow: hidden;
            padding: 5;
            border: none;
            border-radius: .28571429rem;
         }

         .carousel-inner .carousel-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
         }

         .card-body .desc {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
         }

         .carousel-indicators li {
            border-radius: 100%;
            width: 10px;
            height: 10px;
            transition: padding .2s ease-in;
         }

         .carousel-indicators li.active {
            margin-top: 10px;
            padding: 0 5px;
            border: none;
            height: 10px;
            border-radius: 20px;
         }
      </style>
   </head>

   <body>
      <!--================================-->
      <!-- Page Container Start -->
      <!--================================-->
      <div class="page-container">
         <!--================================-->
         <!-- Page Sidebar Start -->
         <!--================================-->
         <div class="page-sidebar">
            <div class="logo">
               <a class="logo-img" href="index.php">
                  <h6 class="text-white text-center">USER PANEL</h6>
                  <!-- <img class="desktop-logo" src="assets/images/logo.png" alt="">
               <img class="small-logo" src="assets/images/small-logo.png" alt=""> -->
               </a>
               <a id="sidebar-toggle-button-close"><i class="wd-20" data-feather="x"></i> </a>
            </div>
            <!--================================-->
            <!-- Sidebar Menu Start -->
            <!--================================-->
            <div class="page-sidebar-inner">
               <div class="page-sidebar-menu">
                  <ul class="accordion-menu">
                     <li>
                        <a href="../index.php"><i data-feather="home"></i>
                           <span>Return to Jagvillage</span></a>
                     </li>
                     <li>
                        <a href="index.php"><i data-feather="home"></i>
                           <span>My Dashboard</span></a>
                     </li>
                     <li>
                        <a href="my-jagvillage-service.php"><i data-feather="home"></i>
                           <span>My Jagvillage Service</span></a>
                     </li>
                  </ul>
               </div>
            </div>
            <!--/ Sidebar Menu End -->
            <!--================================-->
            <!-- Sidebar Footer Start -->
            <!--================================-->

            <!--/ Sidebar Footer End -->
         </div>
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
                           <li class="list-inline-item"><a class=" hidden-xs hidden-sm" href="#" id="collapsed-sidebar-toggle-button"><i data-feather="menu" class="wd-20"></i></a></li>
                           <li class="list-inline-item"><img src="../images/logo.png" alt="" style="width: 70%"></li>
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

                        <!--/ Languages Dropdown End -->
                        <!--================================-->
                        <!-- Notifications Dropdown Start -->
                        <!--================================-->

                        <!--/ Notifications Dropdown End -->
                        <!--================================-->
                        <!-- Messages Dropdown Start -->
                        <!--================================-->

                        <!--/ Messages Dropdown End -->
                        <!--================================-->
                        <!-- Profile Dropdown Start -->
                        <!--================================-->
                        <li class="list-inline-item dropdown" style="border: 1px solid #808080; padding: 5px; border-radius: 20px;">
                           <a href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <?php
                              if (!empty($_SESSION['email'])) {
                                 $email = $_SESSION['email'];
                                 $sql = "select * from user where user_email = '$email'";
                                 $run = mysqli_query($con, $sql);
                                 while ($row = mysqli_fetch_array($run)) {
                                    $fname = $row['user_fname'];
                                    $lname = $row['user_lname'];
                                    $id = $row['user_id'];
                                 }
                                 echo $fname . ' ' . $lname;
                              }

                              ?>
                           </a>
                           <div class="dropdown-menu dropdown-menu-right dropdown-profile">
                              <div class="user-profile-area">
                                 <div class="user-profile-heading">
                                    <div class="profile-thumbnail">

                                    </div>
                                    <div class="profile-text">
                                       <h6><?php
                                             if (!empty($_SESSION['email'])) {
                                                echo $fname . ' ' . $lname;
                                             }

                                             ?></h6>

                                    </div>
                                 </div>

                                 <a href="../account.php" class="dropdown-item"><i data-feather="user" class="wd-16 mr-2"></i> My Profile</a>
                                 <a href="../logout.php" class="dropdown-item"><i data-feather="power" class="wd-16 mr-2"></i> Sign-out</a>
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
                           <h1 class="pd-0 mg-0 tx-20 tx-dark">My Dashboard</h1>
                        </div>

                     </div>

                  </div>
               </div>
               <h4 class="text-primary">Continues Events</h4>
               <hr>
               <div class="row">
                  <?php
                  $today = date('Y-m-d');
                  $sql = "select * from event where event_date = '$today'  order by event_id DESC limit 0,3";
                  $run = mysqli_query($con, $sql);
                  $i = 0;
                  if (mysqli_num_rows($run) > 0) {
                     foreach ($run as $row) {
                        $i++;
                  ?>
                        <div class="col-md-4">
                           <div class="card mb-3" style="border-radius:20px; ">
                              <div class="row no-gutters">
                                 <div class="col-md-5">
                                    <div id="CarouselTest" class="carousel slide" data-ride="carousel">
                                       <div class="carousel-inner">
                                          <div class="carousel-item active">
                                             <img src="../admin/upload/event/<?php echo $row['event_img'] ?>">
                                          </div>

                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-7">
                                    <div class="card-body">
                                       <h5 class="card-title"><?php echo $row['event_name'] ?></h5>
                                       <hr>
                                       <p class="card-text desc"><?php echo $row['event_desc'] ?></p>

                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                  <?php }
                  } else {
                     echo '<div class="col-md-12"><h6 class="text-danger text-center" style="padding-bottom:40px;">No Events Available</h6></div>';
                  } ?>
               </div>
               <h4 class="text-primary">Upcoming Events</h4>
               <hr>
               <div class="row">
                  <?php
                  $today = date('Y-m-d');
                  $sql = "select * from event where event_date > '$today' order by event_id DESC limit 0,3";
                  $run = mysqli_query($con, $sql);
                  $i = 0;
                  if (mysqli_num_rows($run) > 0) {
                     foreach ($run as $row) {
                        $i++;
                  ?>
                        <div class="col-md-4">
                           <div class="card mb-3" style="border-radius:20px; ">
                              <div class="row no-gutters">
                                 <div class="col-md-5">
                                    <div id="CarouselTest" class="carousel slide" data-ride="carousel">
                                       <div class="carousel-inner">
                                          <div class="carousel-item active">
                                             <img src="../admin/upload/event/<?php echo $row['event_img'] ?>">
                                          </div>

                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-7">
                                    <div class="card-body">
                                       <h5 class="card-title"><?php echo $row['event_name'] ?></h5>
                                       <hr>
                                       <p class="card-text desc"><?php echo $row['event_desc'] ?></p>

                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                  <?php }
                  } else {
                     echo '<div class="col-md-12"><h6 class="text-danger text-center" style="padding-bottom:40px;">No Events Available</h6></div>';
                  } ?>
               </div>

            </div>
            <!--/ Page Inner End -->
            <!--================================-->
            <!-- Page Footer Start -->
            <!--================================-->

            <!--/ Page Footer End -->
         </div>
         <!--/ Page Content End -->
      </div>
      <!--/ Page Container End -->
      <!--================================-->
      <!-- Scroll To Top Start-->
      <!--================================-->
      <a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>

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
} else {
   header('Location: ../index.php');
}
?>