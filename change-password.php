<?php
session_start();
//include database connection file
require('db.php');

//check user aleready logged in or not 
if(empty($_SESSION['email'])){
$msg= '';

$token = $_GET['token'];

    
    $get_val = "select * from user_token where token_key='$token'";

    $run_val = mysqli_query($con,$get_val);
    
    $row_val = mysqli_fetch_array($run_val);

    $count = mysqli_num_rows($run_val);

    if($count > 0){

    $email = $row_val['user_email'];

//change password logic start
  if (isset($_POST['change'])){
    // removes backslashes
$password = stripslashes($_POST['password']);
$password = mysqli_real_escape_string($con,$password);

$cpass = stripslashes($_POST['cpass']);
$cpass = mysqli_real_escape_string($con,$cpass);



if($password != "" && $cpass != ""){
  
if($password == $cpass){
    $query = "update user set user_password ='".md5($password)."' WHERE user_email='$email'";
    $result = mysqli_query($con,$query) or die(mysql_error());
        if($result){
            $msg = '<label class="help-block form-success">Password chnaged successfully</lable>';
            $delete = "delete from user_token where token_key='$token'";

             mysqli_query($con,$delete);

        }else{
            $msg = '<label class="help-block form-error">Password not chnaged</lable>';
        }
    }else{
    $msg = '<label class="help-block form-error">Password not match</lable>';
    }
     }else{
$msg = '<label class="help-block form-error">Please fill all the fields</lable>';
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
										<h2>Login</h2>
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
					    	<form class="cmxform" action="change-password.php?token=<?php echo $_GET['token']; ?>" method="post">
					    		
					    		<input type="password" name="password" placeholder="Enter New Password" data-validation="required">
					    		<input type="password" name="cpass" placeholder="Enter Confirm Password" data-validation="required">

                                <button class="btn btn-secondary" type="submit" name="change">Change Password</button>
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
					<li><a href="#">Link 1</a></li>
					<li><a href="#">Link 2</a></li>
					<li><a href="#">Link 3</a></li>
				</ul>
				<p>&#64; 2020 Jag Village</p>
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
    header('location:index.php');
}
}else{
  header('Location: index.php');
}
?>