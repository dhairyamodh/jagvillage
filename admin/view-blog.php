<?php
session_start();
require('../db.php');
if (!empty($_SESSION['admin_email'])) {
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
      <title>Admin dashboard | jagvillage</title>
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
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn"t work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>

   <body>

      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Comments</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <table class="table table-hover">
                     <thead>
                        <tr>
                           <th>Name</th>
                           <th>Comment</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody id="display_comment">

                        <form action="delete.php" method="post" id="delete-blog">
                           <input type="hidden" name="delete_blog" value="">
                        </form>

                     </tbody>
                  </table>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
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
                           <li class="list-inline-item"><a class=" hidden-xs hidden-sm" href="#" id="collapsed-sidebar-toggle-button"><i data-feather="menu" class="wd-20"></i></a></li>

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
                              <h1 class="pd-0 mg-0 tx-20 tx-dark">View Blog</h1>
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
                                    <h6 class="card-header-title tx-13 mb-0">View Blog</h6>
                                 </div>

                              </div>
                           </div>
                           <div class="card-body pd-0">
                              <div class="table-responsive">
                                 <table class="table table-hover">
                                    <thead>
                                       <tr>
                                          <th>#</th>
                                          <th>Blog Title</th>
                                          <th>Blog Image</th>
                                          <th width="1%">Blog Description</th>
                                          <th>Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                       $sql = "select * from blog";
                                       $run = mysqli_query($con, $sql);
                                       $i = 0;
                                       while ($row = mysqli_fetch_array($run)) {
                                          $i++;
                                       ?>
                                          <tr>
                                             <td><?php echo $i; ?></td>
                                             <td><?php echo $row['blog_title']; ?></td>
                                             <td>
                                                <div class="avatar avatar-xxl mr-2"><img src="./upload/blog/<?php echo $row['blog_img']; ?>" alt="" class="rounded"></div>
                                             </td>
                                             <td>
                                                <div style="white-space: nowrap; width: 500px; overflow: hidden;text-overflow: ellipsis; "><?php echo $row['blog_desc']; ?></div>
                                             </td>
                                             <td>
                                                <a href="edit-blog.php?blog_id=<?php echo $row['blog_id']; ?>" title="" data-toggle="tooltip" data-original-title="Edit" class="mr-3 text-primary"><i data-feather="edit-3" class="wd-16"></i></a>
                                                <a href="#" title="" data-toggle="tooltip" delete_id="<?php echo $row['blog_id']; ?>" data-original-title="Remove" class="delete mr-3 text-danger"><i data-feather="trash-2" class="wd-16"></i></a>
                                                <a href="#" title="" data-toggle="tooltip" blog_id="<?php echo $row['blog_id']; ?>" data-original-title="Remove" class="comment text-warning"><i data-feather="message-circle" class="wd-16"></i></a>
                                             </td>
                                          </tr>
                                       <?php }
                                       ?>
                                       <form action="delete.php" method="post" id="delete-blog">
                                          <input type="hidden" name="delete_blog" value="">
                                       </form>
                                       <form action="delete.php" method="post" id="delete-comment">
                                          <input type="hidden" name="delete_comment" value="">
                                       </form>
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
      <script>
         $(document).ready(function() {
            $('.delete').click(function() {
               var id = $(this).attr('delete_id');
               $('input[name="delete_blog"]').val(id);
               if (confirm('Are you sure want delete this blog?')) {
                  document.getElementById('delete-blog').submit();
               }
            })

            $('body').on('click', '.comment', function() {
               load_comment($(this).attr('blog_id'));
            });

            $('body').on('click', '.deletecomment', function() {
               var id = $(this).attr('id');
               $('input[name="delete_comment"]').val(id);
               if (confirm('Are you sure want delete this blog?')) {
                  document.getElementById('delete-comment').submit();
               }
            });


            function load_comment(id) {
               $.ajax({
                  url: "fetch.php",
                  method: "POST",
                  data: {
                     view_comment: 1,
                     id: id
                  },
                  success: function(data) {
                     $('#display_comment').html(data);
                     $('#exampleModal').modal('show');
                  }
               })
            }
         })
      </script>
      <!-- / Javascript -->
   </body>

   </html>

<?php
} else {
   header('Location: login.php');
}
?>