<?php
session_start();
$contact_msg = '';
if (isset($_POST['send'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$message = $_POST['message'];

	if ($name != "" && $email != "" && $phone != "" && $message != "") {

		require 'phpmailer/PHPMailerAutoload.php';
		$mail = new PHPMailer;
		$mail->Host = 'mail.jagvillage.com';     //Sets the SMTP hosts of your Email hosting, this for Godaddy
		$mail->Port = 143;                              //Sets the default SMTP server port
		$mail->SMTPAuth = true;                         //Sets SMTP authentication. Utilizes the Username and Password variables
		$mail->SMTPSecure = 'ssl';
		$mail->Username = 'info@jagvillage.com';                  //Sets SMTP username
		$mail->Password = 'jagvillage';                        //Sets connection prefix. Options are "", "ssl" or "tls"
		$mail->setFrom('info@jagvillage.com', 'Jagvillage'); //Sets the From name of the message
		$mail->addAddress('info@jagvillage.com');      //Adds a "To" address
		$mail->addReplyTo('info@jagvillage.com', 'Jagvillage'); //Adds a "Cc" address
		//Sets word wrapping on the body of the message to a given number of characters
		$mail->isHTML(true);                            //Sets message type to HTML
		$mail->Subject = 'User Inquiry';       //An HTML or plain text message body
		$mail->Body = '<html>
	 <body>
		 <p>Name : ' . $name . '</p>
		 <p>Email : ' . $email . '</p>
		 <p>Phone Number : ' . $phone . '</p>
		 <p>Message : ' . $message . '</p>
		 <p>From : Contact Page</p>
		 
	 </body>
	 </html>';
		if ($mail->Send())        //Send an Email. Return true on success or false on error
		{
			$contact_msg = '<label class="help-block form-success">Inquiry sent successfully !!</label>';
		} else {
			$contact_msg = '<label class="help-block form-error">Inquiry not sent !!</label>';
		}
	} else {
		$contact_msg = '<label class="help-block form-error">Please fill up all the fields !!</label>';
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

</head>

<body>
	<!-- Top Header Section -->
	<?php include('header.php') ?>
	<!-- End Top Header Section -->

	<!-- Slider Section -->
	<section id="slider">
		<div class="owl_slider top_slider_wrap">
			<ul class="owl-carousel top_slider">
				<li class="style-1" style="background-image: url(images/slides/contact-slider.png);">
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
	<!-- End Slider Section -->
	<section id="contacts">
		<div class="container">
			<div class="section-title">
				<h2 class="dark-bg">Our Contacts</h2>
			</div>
			<div class="section-body">
				<div class="col-lg-3 col-md-3 col-sm-5 col-xs-10 centered contact-details">
					<div class="social-icons">
						<a href="https://www.facebook.com/jagvillage/" target="_blank"><i class="fa fa-facebook-square fa-3x" aria-hidden="true"></i></a>
						<a href="https://www.instagram.com/j.a.g.village/" target="_blank"><i class="fa fa-instagram fa-3x" aria-hidden="true"></i></a>

						<a href="mailto:info@jagvillage.com" target="_blank"><i class="fa fa-envelope fa-3x" aria-hidden="true"></i></a>
					</div>
					<div class="contacts">

						<span class="details">7054 Lettner Rd, Bowmanville, ON L1C 3K2</span>
						<hr>
						<span class="details">Tel: +1 833 JAG VILL</span> <br>
						<span class="details">Tel: +1 833 524 8455</span>
						<hr>
						<span class="details">Email: info@jagvillage.com</span>
					</div>
				</div>

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 sendmessage">
					<h3 class="black-text">Send us a message</h3>
					<p>Leave us a message and we will get back to you asap</p>
					<!-- Start contact form -->
					<form class="cmxform" action="contact.php" method="post">
						<input id="fname" placeholder="Full Name" type="text" name="name" data-validation="required">
						<input id="femail" placeholder="Email" name="email" type="email" data-validation="email">
						<input id="fphone" placeholder="Phone Number" name="phone" data-validation="required" type="text">
						<textarea id="fmsg" placeholder="Message" name="message" data-validation="required" data-validation-length="min10"></textarea>
						<button class="btn btn-secondary" type="submit" name="send">Submit</button>
					</form>
					<div id="contactemailsendresponse" class="emailsendresponse"><?php echo $contact_msg; ?></div>
					<!-- End Contact form -->
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


</html>