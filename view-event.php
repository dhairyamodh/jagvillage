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
					<h3 class="black-text">Upcoming Events</h3>
					<?php
					$sql = "select * from event";
					$run = mysqli_query($con, $sql);
					$i = 0;
					while ($row = mysqli_fetch_array($run)) {
						$i++;
					?>
						<div class="event-item">
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 event-date"><?php echo date('j', strtotime($row['event_date']))  ?><br /><span class="month"><?php echo date('M', strtotime($row['event_date']))  ?></span></div>
							<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 event-info">
								<div class="event-title"><?php echo $row['event_name']; ?></div>
								<div class="event-text">
									<p style="text-align:justify; font-weight: 600;"><?php echo $row['event_desc']; ?></p>
								</div>
								<p><a href="event.php?event_id=<?php echo $row['event_id']; ?>" class="dark light-text">More Details</a></p>
							</div>
						</div>
					<?php } ?>
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



	<!-- END SCRIPTS -->
</body>


</html>