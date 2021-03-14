<?php
session_start();
require('db.php');


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <!-- Title -->
    <?php if (isset($_GET['key'])) {
        $key = $_GET['key'];
        $get_data = "select * from services where service_token='$key'";
        $data_run = mysqli_query($con, $get_data);

        $row_data = mysqli_fetch_array($data_run);
    }
    ?>
    <title>Meal for <?php echo $row_data['recipent_name']; ?> - Jag Village</title>
    <!-- Meta content -->
    <meta content='Project' name='description'>
    <meta content='Hope Charity' name='keywords'>
    <meta content='width=device-width, initial-scale=1' name='viewport'>
    <!-- Favicon -->
    <link rel='shortcut icon' href='favicon.png' type='image/png' />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">
    <!-- Style Sheets -->
    <link href='css/bootstrap.min.css' rel='stylesheet'>
    <link href='css/font-awesome-4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <link href='css/animate.css' rel='stylesheet'>
    <link href='css/jquery.bxslider.css' rel='stylesheet'>
    <link href='css/owl.carousel.min.css' rel='stylesheet'>
    <link href='css/template.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.plyr.io/3.4.6/plyr.css">

</head>

<body>
    <div class="modal fade" id="event-modal" tabindex="-1" role="dialog" id="addcalendar" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" onclick="window.location='it-takes-village.php';"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Login to continue</h4>
                </div>
                <div class="modal-body">
                    <form action="#" method="post">
                        <div class="error"></div>
                        <div class="form-group">
                            <label for="need">Email Address <span class="error-msg" style="font-size: 12px; color: #c73b0c; display:none;">(Email address is invalid!)</span></label>
                            <input type="email" id="email" class="form-control " placeholder="Enter email address">
                        </div>
                        <div class="form-group">
                            <label for="need">Password</label>
                            <input type="password" id="password" class="form-control " placeholder="Enter password">
                        </div>
                        <span>Don't have account? <a href="register.php">Create an account</a></span>
                        <input type="hidden" id="page" value="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="login">Login</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- Top Header Section -->
    <?php
    if (!empty($_SESSION['email'])) {
        include('header.php') ?>
        <!-- End Top Header Section -->
        <!-- Slider Section -->
        <section id="slider">

            <div class="contentwrap">
                <div class="container">

                </div>
            </div>
        </section>

        <section id="about">
            <div class="container">
                <!-- <div class="section-title">					
					<h2 class="dark-bg">Congratulations
                    </h2>
				</div> -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default" style="border: 1px solid #159397;">
                            <div class="panel-body">
                                <h5 style="color:#159397">Meal for</h5>
                                <h2><?php echo $row_data['recipent_name']; ?></h2>
                            </div>

                        </div>
                    </div>
                    <div class="card col-md-4">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <strong>Organizer</strong>
                                <div style="color: #159397">
                                    <?php
                                    $id = $row_data['user_id'];
                                    $get_org = "select * from user where user_id='$id'";
                                    $row_org = mysqli_fetch_array(mysqli_query($con, $get_org));

                                    echo $row_org['user_fname'] . ' ' . $row_org['user_lname'];
                                    ?>
                                </div>
                                <hr>
                                <strong>Recipient</strong>
                                <div style="color: #159397"><?php echo $row_data['recipent_name']; ?></div>
                                <hr>
                                <input type="text" class="form-control" value="http://test.jagvillage.com/meal.php?key=<?php echo $_GET['key']; ?>" style="width: 100%; margin-bottom: 10px;">
                                <button onclick='window.location.href="https://mail.google.com/mail/?view=cm&fs=1&su=Jagvillage meal&body=http://test.jagvillage.com/meal.php?key=<?php echo $_GET['key']; ?>"' class="btn btn-light btn-block" target="_blank"><i class="fa fa-envelope" aria-hidden="true"></i> Invitations</button>
                                <a href="https://www.facebook.com/sharer/sharer.php?u=http://test.jagvillage.com/meal.php?key=<?php echo $_GET['key']; ?>&t=TITLE" class="btn btn-info btn-block" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i> Share</a>
                                <a href="https://api.whatsapp.com/send?phone=+1(647)671-4966&text=http://test.jagvillage.com/meal.php?key=<?php echo $_GET['key']; ?>" class="btn btn-success btn-block" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i> Share</a>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-8">

                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="col-md-4">
                                    <strong>Location</strong><br>
                                    <?php echo ($row_data['recipent_address'] != "") ? $row_data['recipent_address'] : "Not specified"; ?>,<br>
                                    <?php echo ($row_data['recipent_city'] != "") ? $row_data['recipent_city'] : "Not specified"; ?>,<br>
                                    <?php echo ($row_data['recipent_state'] != "") ? $row_data['recipent_state'] : "Not specified"; ?>,<br>
                                    <?php echo ($row_data['recipent_postal'] != "") ? $row_data['recipent_postal'] : "Not specified"; ?><br>
                                    <a href="https://maps.google.com/maps?f=q&hl=en&q=<?php echo $row_data['recipent_address'] . '+' . $row_data['recipent_city'] . '+' . $row_data['recipent_state'] . '+' . $row_data['recipent_postal']; ?>"><i class="fa fa-map-marker" aria-hidden="true"></i> Map</a>
                                </div>
                                <div class="col-md-4">

                                    <strong>Special Instructions</strong>
                                    <p><?php echo ($row_data['instuction'] != "") ? $row_data['instuction'] : "Not specified"; ?></p>
                                </div>
                                <div class="col-md-4">
                                    <strong>Comments</strong>
                                    <p><?php echo ($row_data['allergies'] != "") ? $row_data['allergies'] : "Not specified"; ?></p>

                                </div>
                            </div>
                        </div>
                        <h6>Calendar</h6>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div>
                                    <?php
                                    $today = date("m/d/Y");
                                    $get_cate = "select * from category_date where service_token='$key'";
                                    $run_cate = mysqli_query($con, $get_cate);
                                    while ($row_cate = mysqli_fetch_array($run_cate)) {
                                        $date = $row_cate['date'];
                                    ?>
                                        <div class="row">
                                            <div class="col-sm-3 col-xs-4 text-center">
                                                <h6><?php echo date('F j Y', strtotime($row_cate['date'])); ?></h6><?php echo date('l', strtotime($row_cate['date'])); ?>, <?php echo $row_cate['time'] ?>
                                            </div>
                                            <!-- <div class="col-sm-2 col-xs-8">
                                                <strong><?php echo $row_cate['need'] ?></strong>
                                            </div> -->
                                            <div class="col-sm-3 col-xs-8">
                                                <?php
                                                $check = "select * from volunteer where token='$key' and date='$date'";
                                                if (mysqli_num_rows(mysqli_query($con, $check)) <= 0) { ?>
                                                    <a class="text-success" href="volunteer.php?key=<?php echo $key; ?>&date=<?php echo $row_cate['date']; ?>">
                                                        <strong>This date is available</strong>
                                                        <span class="visible-xs-inline"></span></div>
                                            <div class="col-sm-4 col-sm-offset-0 col-xs-offset-4 col-xs-8"><a class="btn btn-primary btn-block" href="volunteer.php?key=<?php echo $key; ?>&date=<?php echo $row_cate['date']; ?>">Volunteer for this</a></div>
                                        </div>
                                        </a>
                                    <?php } else { ?>
                                        <strong class="text-danger">This date is unavailable</strong>
                                        <span class="visible-xs-inline"></span></div>
                                <div class="col-sm-4 col-sm-offset-0 col-xs-offset-4 col-xs-8"><a class="btn btn-primary btn-block" href="volunteer.php?key=<?php echo $key; ?>&date=<?php echo $row_cate['date']; ?>" disabled>Volunteer for this</a></div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            </div>

        </section>

        <!-- End Slider Section -->

        <!-- About Section -->



        <!-- End About Section -->

        <!-- Footer Section -->
        <section id="footer" class="dark">
            <div class="container">
                <ul>
                    <li><a href="#" align="center">&#64; 2020 Jag Village</a></li>
                    <li><a href="#" align="center"> Privacy Policy</a></li>
                    <li><a href="#" align="center">Terms of Use</a></li>
                </ul>

            </div>
            <a href="#" class="scrollToTop"><i class="fa fa-chevron-up fa-2x" aria-hidden="true"></i></a>
        </section>
        <!-- End Footer Section -->

        <!-- Start Donate Modal  -->

        <!-- End Donate Modal -->

        <!-- Page Preloading -->
        <div id="preloadpage">
            <div class="loadingwrap">
                <div class="loading">
                    <div class="object object1"></div>
                    <div class="object object2"></div>
                    <div class="object object3"></div>
                    <div class="object object4"></div>
                </div>
            </div>
        </div>
        <script src="js/jquery-1.12.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.bxslider.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.form-validator.min.js"></script>
        <script src="js/scrollreveal.min.js"></script>
        <script src="js/script.js"></script>
        <script src="https://cdn.plyr.io/3.4.6/plyr.js"></script>
        <script>
            function myFunction() {
                var copyText = document.getElementById("link");
                copyText.select();
                copyText.setSelectionRange(0, 99999)
                document.execCommand("copy");
                $('#msg').text("Link Copied");
            }
        </script>
        <!-- End Page Preloading -->
    <?php
    } else {
    ?>
        <!-- BEGIN SCRIPTS -->
        <script src="js/jquery-1.12.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.bxslider.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.form-validator.min.js"></script>
        <script src="js/scrollreveal.min.js"></script>
        <script src="js/script.js"></script>
        <script src="https://cdn.plyr.io/3.4.6/plyr.js"></script>
        <script>
            function myFunction() {
                var copyText = document.getElementById("link");
                copyText.select();
                copyText.setSelectionRange(0, 99999)
                document.execCommand("copy");
                $('#msg').text("Link Copied");
            }
        </script>


        <script>
            $(window).on("load", function() {
                $(".modal").modal("show");
            });

            $('#login').click(function() {
                var email = $("#email").val();
                var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
                // alert( pattern.test(emailAddress) );
                var valid = pattern.test(email);
                if (!valid) {
                    $(".error-msg").css('display', 'inline');
                } else {
                    var pass = $("#password").val();
                    var page = $("#page").val();
                    $.ajax({
                        url: "login-modal.php",
                        type: "POST",
                        data: {
                            login: 1,
                            email: email,
                            pass: pass,
                            page: page
                        },
                        success: function(data) {
                            $(".error").html(data);
                        },
                    });
                }

            })
        </script>
    <?php
    }
    ?>
    <!-- END SCRIPTS -->
</body>


</html>
<?php
//  }else {
// 	header("Location: login.php");
//  }
?>