<?php
session_start();
//include database connection file
require('db.php');

//check user aleready logged in or not 
if (!empty($_SESSION['email'])) {
	$msg = '';

	$email = $_SESSION['email'];

	$get_details = "select * from user where user_email = '$email'";
	$run_details = mysqli_query($con, $get_details);
	$row_details = mysqli_fetch_array($run_details);

	//login logic start
	if (isset($_POST['save'])) {
		// removes backslashes
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		if ($password != "") {
			$rpass = $_POST['rpassword'];
			if ($password == $rpass) {
				//Checking is user existing in the database or not
				$pass = md5($password);
				$query = "update user set user_fname='$fname', user_lname='$lname', user_password='$pass' WHERE user_email='$email'";
				$result = mysqli_query($con, $query);
				if ($result) {
					// Redirect user to index.php
					$msg = '<div class="alert alert-success">Account Details Updated!!</div>';
				} else {
					$msg = '<div class="alert alert-danger">Email or password is incorrect</div>';
				}
			} else {
				$msg = '<div class="alert alert-danger">Password not match!</div>';
			}
		} elseif ($password == "") {
			$query = "update user set user_fname='$fname', user_lname='$lname' WHERE user_email='$email'";
			$result = mysqli_query($con, $query);
			if ($result) {
				// Redirect user to index.php
				$msg = '<div class="alert alert-success">Account Details Updated!!</div>';
			} else {
				$msg = '<div class="alert alert-danger">Email or password is incorrect</div>';
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
		<meta content='Jag village' name='keywords'>
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
			label {
				color: #159397;
				font-weight: 700;
				font-size: 1.1em;
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

			</div>
		</section>
		<!-- End Slider Section -->
		<section id="contacts">
			<div class="container padd">
				<div class="section-title">
					<h2 class="dark-bg">MY Account</h2>
				</div>
				<div class="section-body">

					<div class="row">

						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 sendmessage">
							<!-- Start contact form -->
							<div id="contactemailsendresponse" class="emailsendresponse"><?php echo $msg; ?></div>
							<form class="cmxform" action="account.php" method="post">
								<h5>General Information</h5>
								<label for="fname">First Name</label>
								<input id="fname" placeholder="Enter First Name" type="text" name="fname" required value="<?php echo $row_details['user_fname']; ?>">
								<label for="fname">Last Name</label>
								<input id="lname" placeholder="Enter Last Name" type="text" name="lname" required value="<?php echo $row_details['user_lname']; ?>">
								<label for="fname">Email Address</label>

								<input id="femail" placeholder="Enter Email Address" type="email" name="email" data-validation="email" value="<?php echo $row_details['user_email']; ?>" readonly>
								<hr>
								<label for="fname">Change Your Password</label>
								<input type="password" name="password" placeholder="Enter Your New Password">
								<label for="fname">Re-enter password</label>
								<input type="password" name="rpassword" placeholder="Enter Your Re-Password">
								<br>

								<button class="btn btn-primary" type="submit" name="save"><i class="fa fa-check"></i> Save Changes</button><br>
							</form>

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

		<script async defer src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;key=AIzaSyC2rmifeU7p_fNAEfqOPFEytxVFCt61Xmc&amp;callback=initMap">
		</script>

		<!-- END SCRIPTS -->
	</body>

	</html>

<?php
} else {
	header('Location: login.php');
}
?>