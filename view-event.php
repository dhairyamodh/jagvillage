<?php
session_start();
require('db.php');

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
	<link href='css/owl-carousel.css' rel='stylesheet'>
	<link href='css/carousel.css' rel='stylesheet'>

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
									<!--h2>Event</h2-->
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
		<div class="container">
			<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
				<div class="events-wrap">
					<div class="section-title">
						<h2 class="dark-bg">Upcoming Events
						</h2>
					</div>
					<?php
					$today = date('Y-m-d');
					$sql = "select * from event where event_date > '$today'";
					$run = mysqli_query($con, $sql);
					$i = 0;
					if (mysqli_num_rows($run) > 0) {
						echo '<div class="owl-carousel customers-testimonials">';
						foreach ($run as $row) {
							$i++;
					?>


							<!--TESTIMONIAL 1 -->
							<div class="item">
								<div class="shadow-effect">
									<div class="img-container">
										<img class="img-responsive" src="admin/upload/event/<?php echo $row['event_img']; ?>" alt="">
										<div class="content">
											<h1><i class="fa fa-clock-o"></i> <?php echo date('j M, Y', strtotime($row['event_date']))  ?></h1>
										</div>
									</div>
									<div class="item-details">
										<h5><?php echo $row['event_name']; ?></h5>
										<p><?php echo $row['event_desc']; ?></p>
										<a href="event.php?event_id=<?php echo $row['event_id']; ?>" class="btn btn-primary ">More Details</a>
									</div>

								</div>
							</div>

					<?php }
						echo '</div>';
					} else {
						echo '<h3 class="text-danger text-center" style="padding-bottom:40px;">No Events Available</h3>';
					} ?>
					<div class="section-title">
						<h2 class="dark-bg">Continues Events
						</h2>
					</div>

					<?php
					$today = date('Y-m-d');
					$sql = "select * from event where event_date = '$today'";
					$run = mysqli_query($con, $sql);
					$i = 0;
					if (mysqli_num_rows($run) > 0) {
						echo '<div class="owl-carousel customers-testimonials">';
						foreach ($run as $row) {
							$i++;
					?>


							<!--TESTIMONIAL 1 -->
							<div class="item">
								<div class="shadow-effect">
									<div class="img-container">
										<img class="img-responsive" src="admin/upload/event/<?php echo $row['event_img']; ?>" alt="">
										<div class="content">
											<h1><i class="fa fa-clock-o"></i> <?php echo date('j M, Y', strtotime($row['event_date']))  ?></h1>
										</div>
									</div>
									<div class="item-details">
										<h5><?php echo $row['event_name']; ?></h5>
										<p><?php echo $row['event_desc']; ?></p>
										<a href="event.php?event_id=<?php echo $row['event_id']; ?>" class="btn btn-primary ">More Details</a>
									</div>

								</div>
							</div>

					<?php }
						echo '</div>';
					} else {
						echo '<h3 class="text-danger text-center" style="padding-bottom:40px;">No Events Available</h3>';
					}
					?>

					<div class="section-title">
						<h2 class="dark-bg">Finished Events
						</h2>
					</div>
					<?php
					$today = date('Y-m-d');
					$sql = "select * from event where event_date < '$today'";
					$run = mysqli_query($con, $sql);
					$i = 0;
					if (mysqli_num_rows($run) > 0) {
						echo '<div class="owl-carousel customers-testimonials">';
						foreach ($run as $row) {
							$i++;
					?>


							<!--TESTIMONIAL 1 -->
							<div class="item">
								<div class="shadow-effect">
									<div class="img-container">
										<img class="img-responsive" src="admin/upload/event/<?php echo $row['event_img']; ?>" alt="">
										<div class="content">
											<h1><i class="fa fa-clock-o"></i> <?php echo date('j M, Y', strtotime($row['event_date']))  ?></h1>
										</div>
									</div>
									<div class="item-details">
										<h5><a href="event.php?event_id=<?php echo $row['event_id']; ?>"><?php echo $row['event_name']; ?></a></h5>
										<p><?php echo $row['event_desc']; ?></p>
										<a href="event.php?event_id=<?php echo $row['event_id']; ?>" class="btn btn-primary ">More Details</a>
									</div>

								</div>
							</div>

					<?php }
						echo '</div>';
					} else {
						echo '<h3 class="text-danger text-center" style="padding-bottom:40px;">No Events Available</h3>';
					} ?>

				</div>
			</div>


	</section>

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
	<script src="js/owl-carousel.js"></script>
	<script>
		jQuery(document).ready(function($) {
			"use strict";
			$('.customers-testimonials').owlCarousel({
				loop: false,
				items: 3,
				margin: 30,
				autoplay: false,
				nav: true,
				dots: false,
				autoplayTimeout: 8500,
				smartSpeed: 450,
				navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
				responsive: {
					0: {
						items: 1
					},
					768: {
						items: 3
					},
					1170: {
						items: 3
					}
				}
			});
		});
	</script>


	<!-- END SCRIPTS -->
</body>


</html>