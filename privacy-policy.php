<?php
 session_start();

?>
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
										<!--h2>Services</h2-->
									</div>
									
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</section>
		<!-- End Slider Section -->
		
        <section id="about">
			<div class="container">
				<div class="section-title">
					<h2 class="dark-bg">Privacy Policy</h2>
				</div>
				<p>J.A.G. Village is committed to providing website users with a website which respects
their privacy. In particular, the protection of confidential member information is of
paramount importance to J.A.G. Village. In this context, the Social Work and Social
Service Work Act, 1998 provides for the confidentiality of information related to the
administration of the Act.</p>
				<p>Through this website and Jane App, J.A.G. Village only obtains specific personal
information from you, such as your name, phone number, address, or e-mail address, if
you supply such information (by, for example, sending us an e-mail, submitting an
inquiry, and/or you participate in the “It Takes a Village” service, and/or providing such
information in a secure portion of the site). Additional information, such as reasons for
seeking services, will be requested to be provided in an intake form via Jane App,
however, clients can refuse to provide this information online at any time. J.A.G. Village
requires all clients to read, review, and acknowledge the consent forms presented in the
request for intake information through Jane App.</p>

<p>J.A.G. Village will not trade, sell or rent your personal information. J.A.G. Village takes
precautions — including administrative, technical, and physical measures — to
safeguard your personal information against loss, theft, and misuse, as well as
unauthorized access, disclosure, alteration, and destruction. You can help by also
taking precautions to protect your personal information when you are on the Internet.
For example, change your passwords often using a combination of letters and numbers.</p>

<p>J.A.G. Village regularly reviews their information-handling practices. If you have any
questions or comments in this regard, please use contact: info@jagvillage.com.</p>
				</div>
        </section>
		
		
		
		<section id="footer" class="dark">
			<div class="container" >
					<ul>
					<li><a href="develop-by.php" align="center">Copyright 2020 &#64; Design & Develop By Jag Village</a></li>
					<li><a href="privacy-policy.php" align="center"> Privacy Policy</a></li>
					<li><a href="terms-of-use.php" align="center">Terms of Use</a></li>
				</ul>
				
			</div>
			<a href="#" class="scrollToTop"><i class="fa fa-chevron-up fa-2x" aria-hidden="true"></i></a>
		</section>
		
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