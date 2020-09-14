<div class="page-sidebar">
            <div class="logo">
               <a class="logo-img" href="index-2.html">		
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
                     
                     <li class="<?php echo (basename($_SERVER['PHP_SELF']) == "index.php") ? "active" : ""; ?>" >
                        <a href="index.php"><i data-feather="home"></i>
                        <span>My Dashboard</span></a>
                     </li>
                     <li class="<?php echo (basename($_SERVER['PHP_SELF']) == "view-user.php") ? "active" : ""; ?>">
                        <a href="view-user.php"><i data-feather="home"></i>
                        <span>View Users</span></a>
                     </li>
                     <!-- <li class="<?php echo (basename($_SERVER['PHP_SELF']) == "add-blog.php") ? "active" : ""; ?>">
                        <a href="add-blog.php"><i data-feather="home"></i>
                        <span>Add Blog</span></a>
                     </li> -->
                     <li class="<?php echo (basename($_SERVER['PHP_SELF']) == "add-blog.php") || (basename($_SERVER['PHP_SELF']) == "view-blog.php") ? "open active" : ""; ?>">
                        <a href="#"><i data-feather="home"></i>
                        <span>Blog</span><i class="accordion-icon fa fa-angle-left"></i></a>
                        <ul class="sub-menu" style="display: block;">
                           <!-- Active Page -->
                           <li class="<?php echo (basename($_SERVER['PHP_SELF']) == "add-blog.php") ? "active" : ""; ?>"><a href="add-blog.php">Add Blog</a></li>
                           <li class="<?php echo (basename($_SERVER['PHP_SELF']) == "view-blog.php") ? "active" : ""; ?>"><a href="view-blog.php">View Blog</a></li>
                           
                        </ul>
                     </li>
                     <li class="<?php echo (basename($_SERVER['PHP_SELF']) == "add-event.php") || (basename($_SERVER['PHP_SELF']) == "view-event.php") ? "open active" : ""; ?>">
                        <a href="#"><i data-feather="home"></i>
                        <span>Event</span><i class="accordion-icon fa fa-angle-left"></i></a>
                        <ul class="sub-menu" style="display: block;">
                           <!-- Active Page -->
                           <li class="<?php echo (basename($_SERVER['PHP_SELF']) == "add-event.php") ? "active" : ""; ?>"><a href="add-event.php">Add Event</a></li>
                           <li class="<?php echo (basename($_SERVER['PHP_SELF']) == "view-event.php") ? "active" : ""; ?>"><a href="view-event.php">View Event</a></li>
                           
                        </ul>
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