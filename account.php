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
		$mname = $_POST['mname'];
		$lname = $_POST['lname'];
		$dob = $_POST['day'] . '-' . $_POST['month'] . '-' . $_POST['year'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$home_phone = $_POST['home_phone'];
		$business_phone = $_POST['business_phone'];
		$mobile_phone = $_POST['mobile_phone'];
		$fax_number = $_POST['fax_number'];
		$address_one = $_POST['address_one'];
		$address_two = $_POST['address_two'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$zip = $_POST['zip'];
		$country = $_POST['country'];
		$tagline = $_POST['tagline'];
		$interest = $_POST['interest'];
		if ($password != "") {
			$rpass = $_POST['rpassword'];
			if ($password == $rpass) {
				//Checking is user existing in the database or not
				$pass = md5($password);
				$query = "update user set user_mname='$mname', user_dob='$dob', user_home_phone='$home_phone', user_business_phone='$business_phone',user_mobile_phone='$mobile_phone',user_fax_number='$fax_number',user_address_one='$address_one',user_address_two='$address_two',user_city='$city',user_state='$state',user_zip='$zip',user_country='$country',user_tagline='$tagline',user_interest='$interest', user_password='$pass' WHERE user_email='$email'";
				$result = mysqli_query($con, $query);
				if ($result) {
					// Redirect user to index.php
					$msg = 1;
					header('Location: ' . $_SERVER['REQUEST_URI'] . '?msg=' . $msg);
				} else {
					$msg = '<div class="alert alert-danger">Email or password is incorrect</div>';
				}
			} else {
				$msg = '<div class="alert alert-danger">Password not match!</div>';
			}
		} elseif ($password == "") {
			$query = "update user set user_mname='$mname', user_dob='$dob', user_home_phone='$home_phone', user_business_phone='$business_phone',user_mobile_phone='$mobile_phone',user_fax_number='$fax_number',user_address_one='$address_one',user_address_two='$address_two',user_city='$city',user_state='$state',user_zip='$zip',user_country='$country',user_tagline='$tagline',user_interest='$interest' WHERE user_email='$email'";
			$result = mysqli_query($con, $query);
			if ($result) {
				// Redirect user to index.php
				$msg = 1;
				header('Location: ' . $_SERVER['REQUEST_URI'] . '?msg=' . $msg);
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
						<style>
							.file {
								padding: 10px;
								width: 40px;
								height: 40px;
								display: flex;
								justify-content: center;
								align-items: center;
								border-radius: 50%;
								background: #159397;
								color: #fff;
								position: absolute;
								top: 15px;
								right: 30px;
								cursor: pointer;
								transition: all 0.5s ease-in-out;
							}

							.file:hover {
								background: #0c5759;
							}

							input[type="file"] {
								display: none;
							}

							.toast {
								color: #fff;
								width: 100%;
							}

							.toast div {
								padding: 10px;
								width: 100%;
							}
						</style>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 sendmessage">
							<!-- Start contact form -->
							<div id="contactemailsendresponse" class="emailsendresponse"><?php
																							if (isset($_GET['msg'])) {
																								echo '<div class="alert alert-success">Account Details Updated!!</div>';
																							}
																							echo $msg; ?></div>
							<form class="cmxform" action="account.php" method="post">
								<h5>General Information</h5>
								<div class="row">
									<div class="col-md-4">
										<label class="file"><i class="fa fa-pencil"></i>
											<input type="file" size="60" id="avatar_file" user_id="<?php echo $row_details['user_id']; ?>">
										</label>
										<img id="avatar" src="<?php echo ($row_details['user_avatar'] != '') ? 'images/avatar/' . $row_details['user_avatar'] : 'images/profile.png'; ?>" style="width: 100%; height:350px; object-fit:cover; border:3px solid #159397;">
										<div class="toast">
										</div>
									</div>
									<div class="col-md-8">
										<div class="row">
											<div class="col-md-12">
												<label for="fname">First Name</label>
												<input id="fname" placeholder="Enter First Name" type="text" name="fname" readonly value="<?php echo $row_details['user_fname']; ?>">
											</div>
											<div class="col-md-12">
												<label for="mname">Middle Name</label>
												<input id="mname" placeholder="Enter Middle Name" type="text" name="mname" value="<?php echo $row_details['user_mname']; ?>">
											</div>
											<div class="col-md-12">
												<label for="lname">Last Name</label>
												<input id="lname" placeholder="Enter Last Name" type="text" name="lname" readonly value="<?php echo $row_details['user_lname']; ?>">
											</div>
										</div>
										<label for="fname">Birth Date </label>
										<div class="row">
											<div class="col-md-4">
												<select name="year" id="year" onchange="change_year(this)"></select>
											</div>
											<div class="col-md-4">
												<select name="month" id="month" onchange="change_month(this)"></select>
											</div>
											<div class="col-md-4">
												<select name="day" id="day"></select>
											</div>
										</div>
									</div>
								</div>
								<hr>
								<h5>Contact Information</h5>
								<div class="row">
									<div class="col-md-12">
										<label for="email">Email Address</label>
										<input id="email" placeholder="Enter Email Address" type="email" name="email" required value="<?php echo $row_details['user_email']; ?>" readonly>
									</div>
									<div class="col-md-3">
										<label for="hphone">Home Phone</label>
										<input id="hphone" placeholder="Enter Home Phone" type="text" name="home_phone" value="<?php echo $row_details['user_home_phone']; ?>">
									</div>
									<div class="col-md-3">
										<label for="bphone">Business Phone</label>
										<input id="bphone" placeholder="Enter Business Phone" type="text" name="business_phone" value="<?php echo $row_details['user_business_phone']; ?>">
									</div>
									<div class="col-md-3">
										<label for="mphone">Mobile Phone</label>
										<input id="mphone" placeholder="Enter Mobile Phone" type="text" name="mobile_phone" value="<?php echo $row_details['user_mobile_phone']; ?>">
									</div>
									<div class="col-md-3">
										<label for="fnumber">Fax Number</label>
										<input id="fnumber" placeholder="Enter Fax Number" type="text" name="fax_number" value="<?php echo $row_details['user_fax_number']; ?>">
									</div>
									<div class="col-md-12">
										<label for="add1">Address 1</label>
										<input id="add1" placeholder="Enter Address 1" type="text" name="address_one" value="<?php echo $row_details['user_address_one']; ?>">
									</div>
									<div class="col-md-12">
										<label for="add2">Address 2</label>
										<input id="add2" placeholder="Enter Address 2" type="text" name="address_two" value="<?php echo $row_details['user_address_two']; ?>">
									</div>
									<div class="col-md-3">
										<label for="city">City</label>
										<input id="city" placeholder="Enter City" type="text" name="city" value="<?php echo $row_details['user_city']; ?>">
									</div>
									<div class="col-md-3">
										<label for="state">State/Province</label>
										<input id="state" placeholder="Enter State/Province" type="text" name="state" value="<?php echo $row_details['user_state']; ?>">
									</div>
									<div class="col-md-3">
										<label for="zip">ZIP/Postal Code</label>
										<input id="zip" placeholder="Enter ZIP/Postal Code" type="text" name="zip" value="<?php echo $row_details['user_zip']; ?>">
									</div>
									<div class="col-md-3">
										<label for="country">Country</label>
										<input id="country" placeholder="Enter Country" type="text" name="country" value="<?php echo $row_details['user_country']; ?>">
									</div>
								</div>
								<hr>
								<h5>Personal Information</h5>
								<div class="row">
									<div class="col-md-12">
										<label for="tag">Tagline</label>
										<input id="tag" placeholder="Enter Tagline" type="text" name="tagline" value="<?php echo $row_details['user_tagline']; ?>">
									</div>
									<div class="col-md-12">
										<label for="interest">Interest/Hobbies</label>
										<input id="interest" placeholder="Enter Interest/Hobbies" type="text" name="interest" value="<?php echo $row_details['user_interest']; ?>">
									</div>
								</div>

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
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha256-yE5LLp5HSQ/z+hJeCqkz9hdjNkk1jaiGG0tDCraumnA=" crossorigin="anonymous"></script>
		<script>
			$('#hphone').mask('(999)999-9999');
			$('#bphone').mask('(999)999-9999');
			$('#mphone').mask('(999)999-9999');
			$('#fnumber').mask('999 999 9999');
			$('input[name="zip"]').mask('S0S 0S0');
		</script>
		<script>
			var Days = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]; // index => month [0-11]
			$(document).ready(function() {
				var option = '<option value="day"  disabled>Select Day</option>';
				var selectedDay = "day";
				for (var i = 1; i <= Days[0]; i++) { //add option days
					option += '<option value="' + i + '">' + i + '</option>';
				}
				$('#day').append(option);
				$('#day').val('<?php echo date('j', strtotime($row_details['user_dob'])); ?>');

				var option = '<option value="month"  disabled>Select Month</option>';
				var selectedMon = "month";
				for (var i = 1; i <= 12; i++) {
					option += '<option value="' + i + '">' + i + '</option>';
				}
				$('#month').append(option);
				$('#month').val('<?php echo (int) date('m', strtotime($row_details['user_dob'])); ?>');

				var d = new Date();
				var option = '<option value="year"  disabled>Select Year</option>';
				selectedYear = "year";
				for (var i = 1930; i <= d.getFullYear(); i++) { // years start i
					option += '<option value="' + i + '">' + i + '</option>';
				}
				$('#year').append(option);
				$('#year').val('<?php echo date('Y', strtotime($row_details['user_dob'])); ?>');

				$('body').on('change', "#avatar_file", function() {
					var id = $(this).attr('user_id');
					var error_images = '';
					var name = document.getElementById("avatar_file").files[0].name;
					var form_data = new FormData();
					var ext = name.split('.').pop().toLowerCase();
					if (jQuery.inArray(ext, ['jpg', 'png', 'jpeg', 'gif']) == -1) {
						error_images += "Invalid Image File";
					}
					var oFReader = new FileReader();
					oFReader.readAsDataURL(document.getElementById("avatar_file").files[0]);
					var f = document.getElementById("avatar_file").files[0];
					var fsize = f.size || f.fileSize;
					if (fsize > 2000000) {
						error_images += '<p>' + i + ' File Size is very big</p>';
					} else {
						form_data.append("file", document.getElementById('avatar_file').files[0]);
					}
					if (error_images == '') {
						form_data.append('user_id', id);
						form_data.append('upload_avatar', 1);
						$.ajax({
							url: "admin/upload.php",
							method: "POST",
							data: form_data,
							contentType: false,
							cache: false,
							processData: false,
							beforeSend: function() {
								$('.lds-ring').css('display', 'block');
								$('.toast').html('<div style="background-color:#deda07;">Uploading</div>');
							},
							success: function(data) {
								$('.lds-ring').css('display', 'none');
								$('.toast').html(data);
								location.reload(true);
							}
						});
					} else {
						return false;
					}
				});


			});

			function isLeapYear(year) {
				year = parseInt(year);
				if (year % 4 != 0) {
					return false;
				} else if (year % 400 == 0) {
					return true;
				} else if (year % 100 == 0) {
					return false;
				} else {
					return true;
				}
			}

			function change_year(select) {
				if (isLeapYear($(select).val())) {
					Days[1] = 29;

				} else {
					Days[1] = 28;
				}
				if ($("#month").val() == 2) {
					var day = $('#day');
					var val = $(day).val();
					$(day).empty();
					var option = '<option value="day"  disabled>Select Day</option>';
					for (var i = 1; i <= Days[1]; i++) { //add option days
						option += '<option value="' + i + '">' + i + '</option>';
					}
					$(day).append(option);
					if (val > Days[month]) {
						val = 1;
					}
					$(day).val(val);
				}
			}

			function change_month(select) {
				var day = $('#day');
				var val = $(day).val();
				$(day).empty();
				var option = '<option value="day"  disabled>Select Day</option>';
				var month = parseInt($(select).val()) - 1;
				for (var i = 1; i <= Days[month]; i++) { //add option days
					option += '<option value="' + i + '">' + i + '</option>';
				}
				$(day).append(option);
				if (val > Days[month]) {
					val = 1;
				}
			}
		</script>

		<!-- END SCRIPTS -->
	</body>

	</html>

<?php
} else {
	header('Location: login.php');
}
?>