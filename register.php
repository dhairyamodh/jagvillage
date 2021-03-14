<?php
session_start();

//check user aleready logged in or not 
if (empty($_SESSION['email'])) {

    $msg = '';
    //include database connection file
    require('db.php');
    // If form submitted, insert values into the database.
    if (isset($_POST['register'])) {

        // removes backslashes
        $fname = stripslashes($_POST['fname']);
        $lname = stripslashes($_POST['lname']);
        //escapes special characters in a string
        $fname = mysqli_real_escape_string($con, $fname);
        $lname = mysqli_real_escape_string($con, $lname);
        $email = stripslashes($_POST['email']);
        $email = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_POST['password']);
        $cpass = stripslashes($_POST['cpass']);
        if ($password != $cpass) {
            $msg = '<label class="h4" style="color:#f54242;">Password not match !</lable>';
        } else {
            $password = mysqli_real_escape_string($con, $password);

            //check user's email is already exist or not
            $check_email = "select * from user where user_email='$email'";

            $check_run = mysqli_query($con, $check_email);

            if (mysqli_num_rows($check_run) > 0) {
                $msg = '<label class="h4" style="color:#f54242;">Email address already exist !! </lable>';
            } else {
                //insert user registation values in database
                $query = "INSERT into `user` (user_fname, user_lname, user_email, user_password)
VALUES ('$fname', '$lname', '$email', '" . md5($password) . "')";

                $result = mysqli_query($con, $query);
                if ($result) {
                    //create user session id
                    $_SESSION['email'] = $email;
                    $query_user = "SELECT * FROM `user` WHERE user_email='$email'
and user_password='" . md5($password) . "'";
                    $result = mysqli_query($con, $query_user);
                    $row = mysqli_fetch_array($result);
                    $_SESSION['user_id'] = $row['user_id'];
                    echo '<script>window.open("index.php","_self");</script>';
                }
            }
        }
    }

?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset='utf-8'>
        <!-- Title -->
        <title>Jag Village</title>
        <!-- Meta content -->
        <meta content='Project' name='description'>
        <meta content='Jag Village' name='keywords'>
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
        <style>
            .fa-close {
                color: #eb4034;
            }

            .fa-check {
                color: #51af53;
            }
        </style>
    </head>

    <body>
        <!-- Top Header Section -->
        <?php include('header.php') ?>
        <!-- End Top Header Section -->

        <!-- Slider Section -->
        <section id="slider">
            <div class="owl_slider top_slider_wrap">
                <ul class="owl-carousel top_slider">
                    <li class="style-1" style="background-image: url(images/slides/all-page-slider.png);">
                        <div class="contentwrap">
                            <div class="container">
                                <div class="content">
                                    <div class="slideheadingwrap">
                                        <!--h2>Register</h2-->
                                    </div>
                                    <div class="description_wrap">
                                        <div class="description hidden-xs">

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <!-- End Slider Section -->
        <section id="contacts">
            <div class="container padd">
                <div class="section-title">
                    <h2 class="dark-bg">Register</h2>
                </div>
                <div class="section-body">

                    <div class="row">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 sendmessage">
                            <!-- Start contact form -->
                            <form class="cmxform" action="register.php" method="post">
                                <input type="text" name="fname" placeholder="Enter First Name">
                                <input type="text" name="lname" placeholder="Enter Last Name">
                                <input id="femail" placeholder="Enter Email Address" type="email" name="email" data-validation="email">
                                <input type="password" name="password" placeholder="Enter Password" id="password">
                                <div id="popover-password">
                                    <p>Password Strength: <span id="result"> </span></p>
                                    <div class="progress">
                                        <div id="password-strength" class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                        </div>
                                    </div>
                                    <ul class="list-unstyled" style="margin-bottom:">
                                        <li class=""><span class="low-upper-case"><i class="fa fa-close" aria-hidden="true"></i></span>&nbsp; 1 lowercase &amp; 1 uppercase</li>
                                        <li class=""><span class="one-number"><i class="fa fa-close" aria-hidden="true"></i></span> &nbsp;1 number (0-9)</li>
                                        <li class=""><span class="one-special-char"><i class="fa fa-close" aria-hidden="true"></i></span> &nbsp;1 Special Character (!@#$%^&*).</li>
                                        <li class=""><span class="eight-character"><i class="fa fa-close" aria-hidden="true"></i></span>&nbsp; Atleast 8 Character</li>
                                    </ul>
                                    <input type="password" name="cpass" placeholder="Enter Confirm Password">
                                    <button class="btn btn-secondary" type="submit" name="register">Register</button>
                            </form>
                            <div id="contactemailsendresponse" class="emailsendresponse"><?php echo $msg; ?></div>
                            <!-- End Contact form -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer Section -->
        <section id="footer" class="dark">
            <div class="container">
                <ul>
                    <li><a href="develop-by.php" align="center">Copyright 2020 &#64; Design & Develop By Jag Village</a></li>
                    <li><a href="privacy-policy.php" align="center"> Privacy Policy</a></li>
                    <li><a href="terms-of-use.php" align="center">Terms of Use</a></li>
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
        <!-- End Page Preloading -->

        <!-- BEGIN SCRIPTS -->
        <script src="js/jquery-1.12.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.bxslider.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.form-validator.min.js"></script>
        <script src="js/scrollreveal.min.js"></script>
        <script src="js/script.js"></script>



        <!-- END SCRIPTS -->
    </body>

    <script>
        (function($) {
            $.fn.inputFilter = function(inputFilter) {
                return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
                    if (inputFilter(this.value)) {
                        this.oldValue = this.value;
                        this.oldSelectionStart = this.selectionStart;
                        this.oldSelectionEnd = this.selectionEnd;
                    } else if (this.hasOwnProperty("oldValue")) {
                        this.value = this.oldValue;
                        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                    } else {
                        this.value = "";
                    }
                });
            };
        }(jQuery));

        $(".intTextBox").inputFilter(function(value) {
            return /^-?\d*$/.test(value);
        });

        $(document).ready(function() {

            $('#password').keyup(function() {
                var password = $('#password').val();
                if (checkStrength(password) == false) {
                    $('#password-strength').css('width', '100%');
                    $('#sign-up').attr('disabled', true);
                }
            });
            $('#cpass').blur(function() {
                if ($('#password').val() !== $('#cpass').val()) {
                    $('#popover-cpassword').removeClass('hide');
                    $('#sign-up').attr('disabled', true);
                } else {
                    $('#popover-cpassword').addClass('hide');
                    $('#sign-up').attr('disabled', false);
                }
            });

            function checkStrength(password) {
                var strength = 0;

                //If password contains both lower and uppercase characters, increase strength value.
                if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) {
                    strength += 1;
                    $('.low-upper-case').addClass('text-success');
                    $('.low-upper-case i').removeClass('fa-close').addClass('fa-check');
                    $('#popover-password-top').addClass('hide');


                } else {
                    $('.low-upper-case').removeClass('text-success');
                    $('.low-upper-case i').addClass('fa-close').removeClass('fa-check');
                    $('#popover-password-top').removeClass('hide');
                }

                //If it has numbers and characters, increase strength value.
                if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) {
                    strength += 1;
                    $('.one-number').addClass('text-success');
                    $('.one-number i').removeClass('fa-close').addClass('fa-check');
                    $('#popover-password-top').addClass('hide');

                } else {
                    $('.one-number').removeClass('text-success');
                    $('.one-number i').addClass('fa-close').removeClass('fa-check');
                    $('#popover-password-top').removeClass('hide');
                }

                //If it has one special character, increase strength value.
                if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) {
                    strength += 1;
                    $('.one-special-char').addClass('text-success');
                    $('.one-special-char i').removeClass('fa-close').addClass('fa-check');
                    $('#popover-password-top').addClass('hide');

                } else {
                    $('.one-special-char').removeClass('text-success');
                    $('.one-special-char i').addClass('fa-close').removeClass('fa-check');
                    $('#popover-password-top').removeClass('hide');
                }

                if (password.length > 7) {
                    strength += 1;
                    $('.eight-character').addClass('text-success');
                    $('.eight-character i').removeClass('fa-close').addClass('fa-check');
                    $('#popover-password-top').addClass('hide');

                } else {
                    $('.eight-character').removeClass('text-success');
                    $('.eight-character i').addClass('fa-close').removeClass('fa-check');
                    $('#popover-password-top').removeClass('hide');
                }




                // If value is less than 2
                if (strength < 2) {
                    $('#result').removeClass()
                    $('#password-strength').addClass('progress-bar-danger');

                    $('#result').addClass('text-danger').text('Very Week');
                    $('#password-strength').css('width', '10%');
                } else if (strength == 2) {
                    $('#result').addClass('good');
                    $('#password-strength').removeClass('progress-bar-danger');
                    $('#password-strength').addClass('progress-bar-warning');
                    $('#result').addClass('text-warning').text('Week')
                    $('#password-strength').css('width', '60%');
                    return 'Week'
                } else if (strength == 4) {
                    $('#result').removeClass()
                    $('#result').addClass('strong');
                    $('#password-strength').removeClass('progress-bar-danger');
                    $('#password-strength').removeClass('progress-bar-warning');
                    $('#password-strength').addClass('progress-bar-success');
                    $('#result').addClass('text-success').text('Strong');
                    $('#password-strength').css('width', '100%');

                    return 'Strong'

                }
            }
        });
    </script>

    </html>

<?php
} else {
    header('Location: index.php');
}
?>