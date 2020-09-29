<?php
session_start();
require('../db.php');
if(!empty($_SESSION['email'])){
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
      <title>Dashboard | Jagvillage</title>
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
         <div class="page-sidebar">
            <div class="logo">
               <a class="logo-img" href="index.php">		
                  <h6 class="text-white">USER PANEL</h6>
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
                           <li class="list-inline-item"><img src="../images/logo.png" alt="" style="width: 70%" ></li>
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
                           <a  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <?php 
                                       if(!empty($_SESSION['email'])){ 
                                          $email = $_SESSION['email'];
                                          $sql = "select * from user where user_email = '$email'";
                                        $run = mysqli_query($con,$sql);
                                        while($row=mysqli_fetch_array($run)){ 
											$fname = $row['user_fname'];
                                 $lname = $row['user_lname'];
                                 $id = $row['user_id'];
                              }
                              echo $fname.' '.$lname;
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
                                       if(!empty($_SESSION['email'])){ echo $fname.' '.$lname; }
                                       ?></h6>
                                       
                                    </div>
                                 </div>
                                 
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
               <!-- Wrapper -->
               <div class="wrapper">
                  <!--================================-->
                  <!-- Breadcrumb Start -->
                  <!--================================-->
                  <div class="pageheader pd-t-25 pd-b-35">
                     <div class="d-flex justify-content-between">
                        <div class="clearfix">
                           <div class="pd-t-5 pd-b-5">
                              <h1 class="pd-0 mg-0 tx-20 tx-dark">View Jagvillage Service</h1>
                           </div>
                           
                        </div>
                     </div>
                  </div>
                  <!--/ Breadcrumb End -->
                  <!--================================-->
                  <!-- Static Tables Start -->
                  <!--================================-->				  
                  
                  <div class="row clearfix">
                     <!--================================-->
                     <!-- Basic Table Start -->
                     <!--================================-->
                     
                     
                     <div class="col-md-12 col-lg-12">
                        <div class="card mg-b-30">
                           <div class="card-header">
                              <div class="d-flex justify-content-between align-items-center">
                                 <div>
                                    <h6 class="card-header-title tx-13 mb-0">View Jagvillage Service</h6>
                                 </div>
                                 
                              </div>
                           </div>
                           <div class="card-body pd-0">
						   <div class="table-responsive">
                              <table class="table table-hover">
                                 <thead>
                                    <tr>
                                       <th>Jagvillage Service For</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 
                                     <?php
                                       $check = "select * from volunteer where vol_email = '$email'";
                                       $check_run = mysqli_query($con,$check);
                                       
                                       $sql = "select * from services where user_id='$id'";
                                        $run = mysqli_query($con,$sql);
                                        $org_rec_count = mysqli_num_rows($run);
                                        
                                        $rec_sql = "select * from services where recipent_email='$email'";
                                        $run_sql = mysqli_query($con,$rec_sql);
                                        $rec_count = mysqli_num_rows($run_sql);
                                        
                                       $vol_count = mysqli_num_rows($check_run);
                                       
                                       if($vol_count > 0 && $org_rec_count > 0 && $rec_count > 0){
                                           
                                          while($check_row = mysqli_fetch_array($check_run)){
                                             $token = $check_row['token'];
                                             $sql = "select * from services where service_token='$token'";
                                             $run1 = mysqli_query($con,$sql);
                                             if(mysqli_num_rows($run1) > 0){
                                             $row1=mysqli_fetch_array($run);
                                             ?>
                                             <tr>
                                       <td><?php echo $row1['recipent_name']; ?></td>
                                       <td><a class="btn btn-primary" href="../jagvillage-service.php?key=<?php echo $token; ?>">Open Jagvillage Service</a></td>
                                       </tr>
                                             <?php
                                          }
                                       }
                                        
                                        while($row=mysqli_fetch_array($run)){ 
                                            $link=$row["service_token"];
                                            ?>
                                            <tr>
                                       <td><?php echo $row['recipent_name']; ?></td>
                                       <td><a class="btn btn-primary" href="../jagvillage-service.php?key=<?php echo $link; ?>">Open Jagvillage Service</a></td>
                                       
                                    </tr>
                                    <?php
                                        }
                                        while($row_rec=mysqli_fetch_array($run_sql)){ 
                                            $link=$row_rec["service_token"];
                                            ?>
                                            <tr>
                                       <td><?php echo $row_rec['recipent_name']; ?></td>
                                       <td><a class="btn btn-primary" href="../jagvillage-service.php?key=<?php echo $link; ?>">Open Jagvillage Service</a></td>
                                       
                                    </tr>
                                    <?php }
                                    
                                       }else {
                                           if($vol_count > 0){
                                           
                                          while($check_row = mysqli_fetch_array($check_run)){
                                             $token = $check_row['token'];
                                             $sql_vol = "select * from services where service_token='$token'";
                                             $run_vol = mysqli_query($con,$sql_vol);
                                             if(mysqli_num_rows($run_vol) > 0){
                                             $row_vol=mysqli_fetch_array($run_vol);
                                             ?>
                                             <tr>
                                       <td><?php echo $row_vol['recipent_name']; ?></td>
                                       <td><a class="btn btn-primary" href="../jagvillage-service.php?key=<?php echo $token; ?>">Open Jagvillage Service</a></td>
                                       </tr>
                                             <?php
                                          }
                                       }
                                       }if($org_rec_count > 0){
                                           
                                          while($row=mysqli_fetch_array($run)){ 
                                             $link=$row["service_token"];
                                             ?>
                                             <tr>
                                        <td><?php echo $row['recipent_name']; ?></td>
                                        <td><a class="btn btn-primary" href="../jagvillage-service.php?key=<?php echo $link; ?>">Open Jagvillage Service</a></td>
                                        
                                     </tr>
                                     <?php
                                         }
                                       }
                                       if($rec_count > 0){
                                           
                                          while($row_rec=mysqli_fetch_array($run_sql)){ 
                                             $link=$row_rec["service_token"];
                                             ?>
                                             <tr>
                                        <td><?php echo $row_rec['recipent_name']; ?></td>
                                        <td><a class="btn btn-primary" href="../jagvillage-service.php?key=<?php echo $link; ?>">Open Jagvillage Service</a></td>
                                        
                                     </tr>
                                     <?php
                                         }
                                       }
                                       }
                                        
                                            ?>
                                            
                                       
                                      
                                    
                                    
                                 </tbody>
                              </table>
                           </div>
                           </div>
                        </div>
                     </div>
                     <!--/ Color Table End -->		
                  </div>
                  <!--/ Static Tables End -->
               </div>
               <!--/ Wrapper End -->
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
}else{
  header('Location: ../index.php');
}
?>