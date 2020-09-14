<?php
 session_start();

 require('db.php');

  if (isset($_POST['submit'])){
$rname = $_POST['rname'];
$remail = $_POST['remail'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$postal = $_POST['postal'];
$phone = $_POST['phone'];
$category = $_POST['category'];
$need = $_POST['need'];
$dates = $_POST['dates'];
$adult_cook = $_POST['adult_cook'];
$kids_cook = $_POST['kids_cook'];
$time = $_POST['time'];
$cancer = $_POST['cancer'];
$instruction = $_POST['instruction'];
$fav_meal = $_POST['fav_meal'];
$least_meal = $_POST['least_meal'];
$allergy = $_POST['allergy'];



$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
 
function generate_string($input, $strength = 16) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
 
    return $random_string;
}

$token = generate_string($permitted_chars, 10);


    $query = "insert into services (recipent_name,recipent_email,recipent_address,recipent_city,recipent_state,recipent_postal,recipent_phone,category,needed,dates,adult_cook,kids_cook,delivery_time,cancer_status,instuction,favorite_meals,least_meals,allergies,service_token) values('$rname','$remail','$address','$city','$state','$postal','$phone','$category','$need','$dates','$adult_cook','$kids_cook','$time','$cancer','$instruction','$fav_meal','$least_meal','$allergy','$token')";
$run = mysqli_query($con,$query);

 
if($run){
	echo '<script>window.open("activation.php?key='.$token.'","_self");</script>';
}
echo $msg;
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
		<link href='css/datepicker.css' rel='stylesheet'>
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
							<div class="container">
							<div class="section-title">					
					<h2 class="dark-bg">START A SERVICE
                    </h2>
				</div>
									<div class="wizard-section">
		<div class="row no-gutters">
			
			<div class="col-lg-12 col-md-12">
				<div class="form-wizard">
					<form action="start-meal.php" method="post" role="form">
						<div class="form-wizard-header">
							<ul class="list-unstyled form-wizard-steps clearfix">
								<li class="active"><span>1. Enter recipent</span></li>
								<li><span>2. Select Dates</span></li>
								<li><span>3. Add preferences</span></li>
							</ul>
						</div>
						<fieldset class="wizard-fieldset show">
							<h5>THIS SERVICE IS FOR</h5>
							<div class="row">
							<div class="col-md-6">
							<div class="form-group">
								<input type="text" class="form-control wizard-required" name="rname" id="fname">
								<label for="fname" class="wizard-form-text-label">Recipent Name*</label>
								<div class="wizard-form-error"></div>
							</div>
							</div>
							<div class="col-md-6">
								
							<div class="form-group">
								<input type="email" class="form-control wizard-required" name="remail" id="lname">
								<label for="lname" class="wizard-form-text-label">Recipent Email Address*</label>
								<div class="wizard-form-error"></div>
							</div>
							</div>
							<div class="col-md-12">
								
							<div class="form-group">
								<input type="text" class="form-control" name="address" id="add">
								<label for="add" class="wizard-form-text-label">Address</label>
								<div class="wizard-form-error"></div>
							</div>
							</div>
							<div class="col-md-6">
								
							<div class="form-group">
								<input type="text" class="form-control wizard-required" name="city" id="city">
								<label for="city" class="wizard-form-text-label">City*</label>
								<div class="wizard-form-error"></div>
							</div>
							</div>
							<div class="col-md-6">
								
							<div class="form-group">
								<input type="text" class="form-control wizard-required" name="state" id="state">
								<label for="state" class="wizard-form-text-label">State/Prov.*</label>
								<div class="wizard-form-error"></div>
							</div>
							</div>
							<div class="col-md-6">
							<div class="form-group">
								<input type="text" class="form-control wizard-required" name="postal" id="zcode">
								<label for="zcode" class="wizard-form-text-label">Postal Code*</label>
								<div class="wizard-form-error"></div>
							</div>
							</div>
							<div class="col-md-6">
							<div class="form-group">
								<input type="text" class="form-control" name="phone" id="phone">
								<label for="phone" class="wizard-form-text-label">Phone (optional)</label>
								<div class="wizard-form-error"></div>
							</div>
							</div>
							</div>
							
							
							
							<div class="form-group clearfix">
								<a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
							</div>
						</fieldset>	
						<fieldset class="wizard-fieldset">
							<h5>SELECT DATE ON CALENDER</h5>
							<div class="col-md-12">
							<div class="form-group">
							<select class="form-control" name="category">
							<option selected disabled>Category</option>
							<option value="(breakfast, lunch, dinner)">Meals </option>
							<option value="(Gardening, Grass cutting, Cleaning snow)">Yard Work </option>
							<option value="(in home, at your home or take them out for an activity, help get them to school)">Child Support </option>
							<option value="(Take out or stay in for a tea/coffee, someone you can call when you are sad, someone who will go for a walk with you)">Visits </option>
							<option value="(do or pick up groceries, rides to places, housework)">Errands </option>
							<option value="(Walking dog, housework, attending appointments with you)">Service </option>
							<option value="(Walking dog, housework, attending appointments with you)">Other</option>
							</select>
							</div>

							</div>
							<div class="col-md-12" style="margin-bottom: 20px">
							<div class="form-group">
								<input type="text" class="form-control " name="need" id="need">
								<label for="need" class="wizard-form-text-label">Needed</label>
								<div class="wizard-form-error"></div>
							</div>
							<div>Example: Dinner</div>
							</div>
							<div class="col-md-12">
							<label >Select Dates</label>
							</div>
							<input type="hidden" id="datepicker_send" name="dates">
							<div id="datetimepicker12" ></div>
							
							<div class="form-group clearfix">
								<a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
								<a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
							</div>
						</fieldset>	
						
						<fieldset class="wizard-fieldset">
							<h5>Other Information</h5>
							<div class="row">
						<!--	<div class="col-md-6">
							<div class="form-group">
								<input type="text" class="form-control " name="adult_cook" id="adult">
								<label for="adult" class="wizard-form-text-label">adults to cook for</label>
								<div class="wizard-form-error"></div>
							</div>
							</div>
							<div class="col-md-6">
								
							<div class="form-group">
								<input type="text" class="form-control" name="kids_cook" id="kids">
								<label for="kids" class="wizard-form-text-label">kids to cook for</label>
								<div class="wizard-form-error"></div>
							</div>
							</div> -->
							<div class="col-md-12">
							<div class="form-group">
							<select class="form-control" name="time">
							<option value="">Preferred delivery time</option>
							<option value="">11am - 12pm</option>
							<option value="">12am - 1pm</option>
							<option value="">1pm - 2pm</option>
							<option value="">7pm - 8pm</option>
							<option value="">8pm - 9pm</option>
							<option value="">9pm - 10pm</option>
							</select>
							</div>
							<div>Example: from 5PM - 6PM</div>

							</div>
							</div>
							<div class="row">
							
							<div class="col-md-12">
								
							<div class="form-group">
								<textarea name="instruction" cols="30" rows="5" class="form-control"></textarea>
								<label for="kids" class="wizard-form-text-label">Special instructions</label>
								<div class="wizard-form-error"></div>
							</div>
							<div>Example : List any dropoff, delivery, or other instructions</div>
							</div>
						
							
							<div class="col-md-12">
								
							<div class="form-group">
								<textarea name="allergy" cols="30" rows="5" class="form-control"></textarea>
								<label for="kids" class="wizard-form-text-label">Any Other Comments</label>
								<div class="wizard-form-error"></div>
							</div>
								
							</div>
							</div>
							<!-- <div class="form-group">
								Payment Type
								<div class="wizard-form-radio">
									<input name="radio-name" id="mastercard" type="radio">
									<label for="mastercard">Master Card</label>
								</div>
								<div class="wizard-form-radio">
									<input name="radio-name" id="visacard" type="radio">
									<label for="visacard">Visa Card</label>
								</div>
							</div>
							<div class="form-group">
								<input type="text" class="form-control wizard-required" id="honame">
								<label for="honame" class="wizard-form-text-label">Holder Name*</label>
								<div class="wizard-form-error"></div>
							</div>
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6">
									<div class="form-group">
										<input type="text" class="form-control wizard-required" id="cardname">
										<label for="cardname" class="wizard-form-text-label">Card Number*</label>
										<div class="wizard-form-error"></div>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6">
									<div class="form-group">
										<input type="text" class="form-control wizard-required" id="cvc">
										<label for="cvc" class="wizard-form-text-label">CVC*</label>
										<div class="wizard-form-error"></div>
									</div>
								</div>
							</div> -->
							
							<div class="form-group clearfix">
								<a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
								<button type="submit" name="submit" class="form-wizard-submit float-right">Submit</a>
							</div>
						</fieldset>	
					</form>
				</div>
			</div>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>  
		<script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.bxslider.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.form-validator.min.js"></script>
        <script src="js/scrollreveal.min.js"></script>
		<script src="js/script.js"></script>
		<script src="https://cdn.plyr.io/3.4.6/plyr.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
        <script>
        jQuery(document).ready(function() {
	// click on next button
	jQuery('.form-wizard-next-btn').click(function() {
		var parentFieldset = jQuery(this).parents('.wizard-fieldset');
		var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
		var next = jQuery(this);
		var nextWizardStep = true;
		parentFieldset.find('.wizard-required').each(function(){
			var thisValue = jQuery(this).val();

			if( thisValue == "") {
				jQuery(this).siblings(".wizard-form-error").slideDown();
				nextWizardStep = false;
			}
			else {
				jQuery(this).siblings(".wizard-form-error").slideUp();
			}
		});
		if( nextWizardStep) {
			next.parents('.wizard-fieldset').removeClass("show","400");
			currentActiveStep.removeClass('active').addClass('activated').next().addClass('active',"400");
			next.parents('.wizard-fieldset').next('.wizard-fieldset').addClass("show","400");
			jQuery(document).find('.wizard-fieldset').each(function(){
				if(jQuery(this).hasClass('show')){
					var formAtrr = jQuery(this).attr('data-tab-content');
					jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(function(){
						if(jQuery(this).attr('data-attr') == formAtrr){
							jQuery(this).addClass('active');
							var innerWidth = jQuery(this).innerWidth();
							var position = jQuery(this).position();
							jQuery(document).find('.form-wizard-step-move').css({"left": position.left, "width": innerWidth});
						}else{
							jQuery(this).removeClass('active');
						}
					});
				}
			});
		}
	});
	//click on previous button
	jQuery('.form-wizard-previous-btn').click(function() {
		var counter = parseInt(jQuery(".wizard-counter").text());;
		var prev =jQuery(this);
		var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
		prev.parents('.wizard-fieldset').removeClass("show","400");
		prev.parents('.wizard-fieldset').prev('.wizard-fieldset').addClass("show","400");
		currentActiveStep.removeClass('active').prev().removeClass('activated').addClass('active',"400");
		jQuery(document).find('.wizard-fieldset').each(function(){
			if(jQuery(this).hasClass('show')){
				var formAtrr = jQuery(this).attr('data-tab-content');
				jQuery(document).find('.form-wizard-steps .form-wizard-step-item').each(function(){
					if(jQuery(this).attr('data-attr') == formAtrr){
						jQuery(this).addClass('active');
						var innerWidth = jQuery(this).innerWidth();
						var position = jQuery(this).position();
						jQuery(document).find('.form-wizard-step-move').css({"left": position.left, "width": innerWidth});
					}else{
						jQuery(this).removeClass('active');
					}
				});
			}
		});
	});
	//click on form submit button
	jQuery(document).on("click",".form-wizard .form-wizard-submit" , function(){
		var parentFieldset = jQuery(this).parents('.wizard-fieldset');
		var currentActiveStep = jQuery(this).parents('.form-wizard').find('.form-wizard-steps .active');
		parentFieldset.find('.wizard-required').each(function() {
			var thisValue = jQuery(this).val();
			if( thisValue == "" ) {
				jQuery(this).siblings(".wizard-form-error").slideDown();
			}
			else {
				jQuery(this).siblings(".wizard-form-error").slideUp();
			}
		});
	});
	// focus on input field check empty or not
	jQuery(".form-control").on('focus', function(){
		var tmpThis = jQuery(this).val();
		if(tmpThis == '' ) {
			jQuery(this).parent().addClass("focus-input");
		}
		else if(tmpThis !='' ){
			jQuery(this).parent().addClass("focus-input");
		}
	}).on('blur', function(){
		var tmpThis = jQuery(this).val();
		if(tmpThis == '' ) {
			jQuery(this).parent().removeClass("focus-input");
			jQuery(this).siblings('.wizard-form-error').slideDown("3000");
		}
		else if(tmpThis !='' ){
			jQuery(this).parent().addClass("focus-input");
			jQuery(this).siblings('.wizard-form-error').slideUp("3000");
		}
	});
});

$(function () {
            $('#datetimepicker12').datepicker({
                sideBySide: true,
				multidate: true,
  inline: true
            }).on('changeDate', showTestDate);
        });
		function showTestDate(){
  var value = $('#datetimepicker12').datepicker('getFormattedDate');
  $("#datepicker_send").val(value);
}
        </script>
        <!-- END SCRIPTS -->
	</body>


</html>

