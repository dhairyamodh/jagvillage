<?php
session_start();
require('../db.php');

if (!empty($_SESSION['admin_email'])) {
   $msg = "";
   if (isset($_POST['add-event'])) {
      $msg = 'sajdfsj';
      $title = $_POST['title'];
      $desc = mysqli_real_escape_string($con, $_POST['desc']);
      $date = $_POST['date'];
      $img = $_POST['filename'];

      $sql = "insert into event(event_date,event_name,event_img,event_desc) values('$date','$title','$img','$desc')";

      $run = mysqli_query($con, $sql);

      if ($run) {
         $msg = '<div class="alert alert-success">Event Added Successfully</div>';
      } else {
         $msg = '<div class="alert alert-danger">Event Not Added</div>';
      }
   }
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
      <title>Add Event</title>
      <!-- Main CSS -->
      <link type="text/css" rel="stylesheet" href="assets/css/style.css" />
      <!-- Favicon -->
      <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
      <link type="text/css" rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css" />
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
               <div class="search-form">
                  <form action="#" method="GET">
                     <div class="input-group">
                        <input class="form-control search-input typeahead" name="search" placeholder="Type something..." type="text" />
                        <span class="input-group-btn"><span id="close-search"><i data-feather="x" class="wd-16"></i></span></span>
                     </div>
                  </form>
               </div>
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
                           <a href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <?php
                              if (!empty($_SESSION['admin_email'])) {
                                 echo '' . $_SESSION['admin_email'];
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
                                             if (!empty($_SESSION['admin_email'])) {
                                                echo '' . $_SESSION['admin_email'];
                                             }

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
               <!-- Wrapper -->
               <div class="wrapper">
                  <!--================================-->
                  <!-- Breadcrumb Start -->
                  <!--================================-->
                  <div class="pageheader pd-t-25 pd-b-35">
                     <div class="d-flex justify-content-between">
                        <div class="clearfix">
                           <div class="pd-t-5 pd-b-5">
                              <h1 class="pd-0 mg-0 tx-20 tx-dark">Add Event</h1>
                           </div>

                        </div>
                     </div>
                  </div>
                  <!--/ Breadcrumb End -->
                  <!--================================-->
                  <!-- Form Validation Start -->
                  <!--================================-->

                  <div class="row clearfix">
                     <!--================================-->
                     <!-- Required Input Validation Start -->
                     <!--================================-->
                     <div class="col-md-12 col-lg-12">
                        <div class="card mg-b-30">
                           <div class="card-header">
                              <div class="d-flex justify-content-between align-items-center">
                                 <div>
                                    <h6 class="card-header-title tx-13 mb-0">Add Event Form</h6>
                                 </div>

                              </div>
                           </div>
                           <div class="card-body">
                              <?php echo $msg; ?>
                              <form action="add-event.php" method="POST" data-parsley-validate>

                                 <div class="row mg-b-15">

                                    <!-- col-4 -->
                                    <div class="col-lg-6">
                                       <div class="form-group">
                                          <label class="form-control-label">Event Title<span class="tx-danger">*</span></label>
                                          <input type="text" name="title" class="form-control" placeholder="Enter event title" required>
                                       </div>
                                    </div>
                                    <!-- col-4 -->
                                    <div class="col-lg-3">
                                       <div class="form-group mg-b-10-force">
                                          <label class="form-control-label">Event Date<span class="tx-danger">*</span></label>
                                          <input type="text" autocomplete="off" class="form-control" name="date" placeholder="Choose date" required="">
                                       </div>
                                    </div>
                                    <div class="col-lg-3">
                                       <div class="form-group mg-b-10-force">
                                          <label class="form-control-label">Event Image<span class="tx-danger">*</span></label>
                                          <div class="custom-file">
                                             <input type="file" class="custom-file-input" id="file" name="file" required="">
                                             <label class="custom-file-label">Choose file...</label>
                                             <div class="invalid-feedback">Example invalid custom file feedback</div>
                                             <div id="uploaded_image"></div>
                                             <input type="hidden" name="filename">
                                          </div>
                                       </div>
                                    </div>
                                    <!-- col-8 -->
                                    <div class="col-lg-12">
                                       <div class="form-group mg-b-10-force">
                                          <label class="form-control-label">Event Description<span class="tx-danger">*</span></label>
                                          <textarea name="desc" class="form-control" placeholder="Enter event description" required rows="10" cols="3"></textarea>
                                       </div>
                                    </div>
                                    <!-- col-4 -->
                                 </div>
                                 <!-- d-flex -->
                                 <button type="submit" name="add-event" class="btn btn-primary">Add Event</button>

                              </form>

                           </div>
                        </div>
                     </div>
                     <!--/ Required Input Validation End -->
                     <!--================================-->
                     <!-- Email Validates Start -->
                     <!--================================-->
                     <!--/ Custom Style Error Messages End -->
                  </div>
                  <!--/ Form Validation End -->
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
      <script src="assets/plugins/popper/popper.js"></script>
      <script src="assets/plugins/feather/feather.min.js"></script>
      <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
      <script src="assets/plugins/typeahead/typeahead.js"></script>
      <script src="assets/plugins/typeahead/typeahead-active.js"></script>
      <script src="assets/plugins/pace/pace.min.js"></script>
      <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
      <script src="assets/plugins/highlight/highlight.min.js"></script>
      <!-- parsleyjs Script -->
      <script src="assets/plugins/parsleyjs/parsley.js"></script>
      <!-- Required Script -->
      <script src="assets/js/app.js"></script>
      <script src="assets/js/avesta.js"></script>
      <script src="assets/js/avesta-customizer.js"></script>
      <script src="assets/plugins/moment/moment.min.js"></script>
      <script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
      <script>
         $(function() {
            'use strict';
            $('#selectForm').parsley();
            $('#selectForm2').parsley();
         });
      </script>
   </body>
   <script>
      $(function() {
         var isRtl = $('body').attr('dir') === 'rtl' || $('html').attr('dir') === 'rtl';
         $('input[name="date"]').datepicker({
            showOtherMonths: true,
            selectOtherMonths: true,
            dateFormat: 'yy-mm-dd',
            minDate: 'today'
         });
         $('input[name="date"]').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('DD/MM/YYYY'));
         });
      });
   </script>
   <script>
      $(document).ready(function() {
         $(document).on('change', '#file', function() {
            var name = document.getElementById("file").files[0].name;
            var form_data = new FormData();
            var ext = name.split('.').pop().toLowerCase();
            if (jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
               alert("Invalid Image File");
            }
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("file").files[0]);
            var f = document.getElementById("file").files[0];
            var fsize = f.size || f.fileSize;
            if (fsize > 2000000) {
               alert("Image File Size is very big");
            } else {
               form_data.append("file", document.getElementById('file').files[0]);
               form_data.append('upload_event_img', 1);
               $('input[name="filename"]').val(document.getElementById("file").files[0].name);
               $.ajax({
                  url: "upload.php",
                  method: "POST",
                  data: form_data,
                  contentType: false,
                  cache: false,
                  processData: false,
                  beforeSend: function() {
                     $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
                  },
                  success: function(data) {
                     $('#uploaded_image').html(data);
                  }
               });
            }
         });
      });
   </script>

   </html>
<?php
} else {
   header('Location: login.php');
}
?>