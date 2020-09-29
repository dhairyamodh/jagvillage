<?php
session_start();

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset='utf-8'>
	<!-- Title -->
	<title>It takes village - Jag Village</title>
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
	<link rel="stylesheet" href="https://cdn.plyr.io/3.4.6/plyr.css">

</head>

<body>
	<!-- Top Header Section -->
	<?php include('header1.php') ?>
	<!-- End Top Header Section -->
	<section id="slider">
		<div class="owl_slider top_slider_wrap">
			<ul class="owl-carousel top_slider">
				<li class="style-1" style="background-image: url(images/It-takes-a-Village-Front-Home-page.png);">
					<div class="contentwrap">
						<div class="container">
							<div class="content">
								<div class="slideheadingwrap">
									<!--h2>Contact Us</h2-->
								</div>

							</div>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</section>
	<section id="about">

		<div class="contentwrap">
			<div class="container">
				<div class="content">
					<div class="section-title">
						<h2 class="dark-bg">Get Started
						</h2>
					</div>
					<div class="card col-md-12" style="border: 1px solid #1c1c1c; padding: 20px; border-radius: 10px;">
						<div class="card-header text-center" style="padding-bottom: 10px">
							<span style="font-size: 25px; font-weight: 600; color:#159397">Standard</span>
						</div>
						<div class="card-body text-center">
							<img src="images/It-takes-a-Village-service-page.png" alt="" style="width: 50%">
							<h5 class="card-title"></h5>
							<a href="start-jagvillage-service.php" class="btn btn-primary">Start Service</a>
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
	<script src="https://cdn.plyr.io/3.4.6/plyr.js"></script>
	<script>
		// Dropdown Menu Fade    
		// jQuery(document).ready(function() {
		// 	$(".dropdown").hover(
		// 		function() {
		// 			$('.dropdown-menu', this).fadeIn("fast");
		// 		},
		// 		function() {
		// 			$('.dropdown-menu', this).fadeOut("fast");
		// 		});
		// });
		// jQuery(document).on('click', '.mobile .mega-dropdown', function(e) {
		// 	e.stopPropagation()
		// })
	</script>
	<!-- END SCRIPTS -->
</body>


</html>