<?php
session_start();
//include database connection file
require('db.php');
//check user aleready logged in or not 
if(empty($_SESSION['email'])){
$msg= '';

//forgot password logic start
  if (isset($_POST['forgot'])){
    // removes backslashes
$email = stripslashes($_POST['email']);
    //escapes special characters in a string
$email = mysqli_real_escape_string($con,$email);
//Checking is user existing in the database or not
    $query = "SELECT * FROM `user` WHERE user_email='$email'";
$result = mysqli_query($con,$query) or die(mysql_error());
$rows = mysqli_num_rows($result);
    if($rows==1){
        $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
 
		function generate_string($input, $strength = 16) {
			$input_length = strlen($input);
			$random_string = '';
			for($i = 0; $i < $strength; $i++) {
				$random_character = $input[mt_rand(0, $input_length - 1)];
				$random_string .= $random_character;
			}
		 
			return $random_string;
		}
		 
		$token = generate_string($char, 20);

		$insert_token = "insert into user_token (user_email,token_key) values('$email','$token')";

		mysqli_query($con,$insert_token);

		$link = 'http://test.jagvillage.com/change-password.php?token='.$token;

    require 'phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;
    $mail->Host = 'mail.jagvillage.com';     //Sets the SMTP hosts of your Email hosting, this for Godaddy
    $mail->Port = 143;                              //Sets the default SMTP server port
    $mail->SMTPAuth = true;                         //Sets SMTP authentication. Utilizes the Username and Password variables
    $mail->SMTPSecure = 'ssl';
    $mail->Username = 'info@jagvillage.com';                  //Sets SMTP username
    $mail->Password = 'jagvillage';                        //Sets connection prefix. Options are "", "ssl" or "tls"
    $mail->setFrom('info@jagvillage.com', 'Jagvillage'); //Sets the From name of the message
    $mail->addAddress($_POST['email']);      //Adds a "To" address
    $mail->addReplyTo('info@jagvillage.com', 'Jagvillage'); //Adds a "Cc" address
    //Sets word wrapping on the body of the message to a given number of characters
    $mail->isHTML(true);                            //Sets message type to HTML
    $mail->Subject = 'Forgot Password';       //An HTML or plain text message body
	$mail->Body = '<html>
	<body>
		<p>Hello '.$_POST['email'].'</p>,
		<p>There was recently a request to change the password on your account.</p>
		<p>If you requested this password change, please click the link below to set a new password</p>
		<p><a href="'.$link.'" target="_blank">Click here to change your password</a></p>
		<p>If the link above does not work, paste this into your browser:</p>
		<p>'.$link.'</p>
		<p>If you don not want to change your password, just ignore this message.</p>
		<p>Thank you.</p>
	</body>
	</html>';

	if($mail->Send())        //Send an Email. Return true on success or false on error
    {
     $msg= '<label class="help-block form-success">We will link to your register email address to reset password</lable>';
    }
    else
    {
		$msg= '<label class="help-block form-error">Mail not Sent</lable>';
	}
     }else{
$msg = '<label class="help-block form-error">You are not registered with this email address!</lable>';
}
  }

?>

<!DOCTYPE html>
<html>
	
<head>
		<meta charset='utf-8'>
		<!-- Title -->
	    <title> Forgot Password | Jag Village</title>
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
										<!--h2>Forgot Password</h2-->
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
					<h2 class="dark-bg">Forgot Password</h2>
				</div>
				<div class="section-body">
					
				    <div class="row">
					    
					    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 sendmessage">
					    	<!-- Start contact form -->
					    	<form class="cmxform" action="forgot-password.php" method="post">
					    		
					    		<input id="femail" placeholder="Enter Email Address" type="email" name="email" data-validation="email">

                                <button class="btn btn-secondary" type="submit" name="forgot">Send  </button>
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