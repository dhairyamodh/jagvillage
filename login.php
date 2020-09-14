<?php
session_start();
//include database connection file
require('db.php');

//check user aleready logged in or not 
if(empty($_SESSION['email'])){
$msg= '';

//login logic start
  if (isset($_POST['login'])){
    // removes backslashes
$email = stripslashes($_POST['email']);
    //escapes special characters in a string
$email = mysqli_real_escape_string($con,$email);
$password = stripslashes($_POST['password']);
$password = mysqli_real_escape_string($con,$password);
//Checking is user existing in the database or not
    $query = "SELECT * FROM `user` WHERE user_email='$email'
and user_password='".md5($password)."'";
$result = mysqli_query($con,$query) or die(mysql_error());
$count = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);
    if($count==1){
 $_SESSION['email'] = $email;
  $_SESSION['user_id'] = $row['user_id'];
        // Redirect user to index.php
 header("Location: index.php");
     }else{
$msg = '<label class="help-block form-error">Email or password is incorrect</lable>';
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
	    <meta content='Hope Charity' name='keywords'>
	    <meta content='width=device-width, initial-scale=1' name='viewport'>
        <!-- Favicon -->
        <link rel='shortcut icon' href='favicon.png' type='image/png'/>
	    <!-- Google Fonts -->
	    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet"> 
	    <!-- Style Sheets -->
	    <link href='css/bootstrap.min.css' rel='stylesheet'>
	    <link href='css/font-awesome-4.7.0/css/font-awesome.min.css' rel='stylesheet'>
	    <link href='css/animate.css' rel='stylesheet'>
	    <link href='css/jquery.bxslider.css' rel='stylesheet'>
	    <link href='css/owl.carousel.min.css' rel='stylesheet'>
	    <link href='css/template.css' rel='stylesheet'>
		
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
										<!--h2>Login</h2-->
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
					<h2 class="dark-bg">Login</h2>
				</div>
				<div class="section-body">
					
				    <div class="row">
					    
					    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 sendmessage">
					    	<!-- Start contact form -->
					    	<form class="cmxform" action="login.php" method="post">
					    		
					    		<input id="femail" placeholder="Enter Email Address" type="email" name="email" data-validation="email">
					    		<input type="password" name="password" placeholder="Enter Password" >
                                <a href="forgot-password.php">Forgot Password?</a>
								<br>

                                <button class="btn btn-secondary" type="submit" name="login">Login</button><br>
                                <span>Don't have account? <a href="register.php">Create an account</a></span>
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
			<div class="container" >
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
		<!-- End Page Preloading -->

        <!-- BEGIN SCRIPTS -->
        <script src="js/jquery-1.12.4.min.js"></script>  
		<script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.bxslider.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.form-validator.min.js"></script>
        <script src="js/scrollreveal.min.js"></script>
        <script src="js/script.js"></script>

		<script async defer
		    src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;key=AIzaSyC2rmifeU7p_fNAEfqOPFEytxVFCt61Xmc&amp;callback=initMap">
		</script>

        <!-- END SCRIPTS -->
	</body>


</html>

<?php
}else{
  header('Location: index.php');
}
?>