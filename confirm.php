<?php
 session_start();
require('db.php');
 
 if(!empty($_SESSION['email'])){
?>
<!DOCTYPE html>
<html>
	
<head>
		<meta charset='utf-8'>
		<!-- Title -->
        <?php if(isset($_GET['key'])) {
            $key = $_GET['key'];
            $get_data = "select * from volunteer where token='$key'";
            $data_run = mysqli_query($con,$get_data);

            $row_data = mysqli_fetch_array($data_run);

         ?>
	    <title>Volunteer Confirmed - Jag Village</title>
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
		<link rel="stylesheet" href="https://cdn.plyr.io/3.4.6/plyr.css">
		
	</head>
	<body>
		<!-- Top Header Section -->
		<?php include('header.php') ?>
		<!-- End Top Header Section -->
		<!-- Slider Section -->
		<section id="slider">
			
						<div class="contentwrap">
							<div class="container">
								
							</div>
			</div>
		</section>
        
		<section id="about">
			<div class="container">
				<div class="section-title">					
					<h2 class="dark-bg">Confirmed
                    </h2>
				</div>
				<div class="row">
                
                <div class="card col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                    <strong>Date</strong>
                    <p style="color: #159397"><?php echo $row_data['date'];?></p>
                    <strong>Volunteer</strong>
                    <p style="color: #159397"><?php echo $row_data['vol_fname'].' '.$row_data['vol_lname'];?></p>
                    <strong>Jagvillage Service</strong>
                    <p style="color: #159397"><?php echo $row_data['meal'];?></p>
                    <strong>Notes</strong>
                    <p style="color: #159397"><?php echo $row_data['notes'];?></p>
                    
                    </div>
                </div>
                <button onclick='window.location.href="jagvillage-service.php?key=<?php echo $key; ?>"' class="btn btn-light " target="_blank"> Retun to service</button>			
					</div>
                    
					</div>
					</div>
						</div>				
				</div>
			
		</section>
                    <?php } ?>
		<!-- End Slider Section -->

		<!-- About Section -->


		
		<!-- End About Section -->

		<!-- Footer Section -->
		<section id="footer" class="dark" >
			<div class="container" >
				<ul>
					<li><a href="#" align="center">&#64; 2020 Jag Village</a></li>
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
            function myFunction() {
  var copyText = document.getElementById("link");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  $('#msg').text("Link Copied");
}
        </script>
        
        <!-- END SCRIPTS -->
	</body>


</html>
<?php
 }else {
	header("Location: login.php");
 }
?>

