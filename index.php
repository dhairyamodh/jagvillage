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
		$mail->Port = 993;                              //Sets the default SMTP server port
		$mail->SMTPAuth = true;                         //Sets SMTP authentication. Utilizes the Username and Password variables
		$mail->SMTPSecure = 'ssl';
		$mail->Username = 'info@jagvillage.com';                  //Sets SMTP username
		$mail->Password = 'jagvillage';                        //Sets connection prefix. Options are "", "ssl" or "tls"
		$mail->setFrom('info@jagvillage.com', 'Jagvillage'); //Sets the From name of the message
		$mail->addAddress('info@jagvillage.com');      //Adds a "To" address
		$mail->addReplyTo('info@jagvillage.com', 'jagvillage'); //Adds a "Cc" address
		//Sets word wrapping on the body of the message to a given number of characters
		$mail->isHTML(true);                            //Sets message type to HTML
		$mail->Subject = 'User Inquiry';       //An HTML or plain text message body
		$mail->Body = '<html>
	<body>
		<p>Name : ' . $name . '</p>
		<p>Email : ' . $email . '</p>
		<p>Phone Number : ' . $phone . '</p>
		<p>Message : ' . $message . '</p>
		<p>From : Home Page</p>
		
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

	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">

</head>

<body>
	<!-- Top Header Section -->
	<?php include('header.php'); ?>
	<!-- End Top Header Section -->
	<!-- Slider Section -->
	<section id="slider">
		<div class="owl_slider top_slider_wrap">
			<ul class="owl-carousel top_slider">
				<li class="style-1" style="background-image: url(images/slides/slider_1.png);">
					<div class="contentwrap">
						<div class="container">
							<div class="content">
								<!--	<h3 class="slider-tag">Style 1</h3> -->
								<div class="slideheadingwrap">
									<!--	<h2>Crisis Prevention and Recovery</h2> -->
								</div>
								<div class="description_wrap">
									<div class="description hidden-xs">
										<!--	Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.-->
									</div>
								</div>
								<!-- <a class="btn1" href="#">More Details</a> -->
								<!--	<a class="btn2" href="#" data-toggle="modal" data-target=".donate_0">Donate</a> -->
							</div>
						</div>
					</div>
				</li>
				<li class="style-2" style="background-image: url(images/slides/all-page-slider.png);">
					<div class="contentwrap">
						<div class="container">
							<div class="content">
								<!--	<h3 class="slider-tag">Style 2</h3> -->
								<div class="slideheadingwrap">
									<!--	<h2>Help For the Children</h2> -->
								</div>
								<div class="description_wrap">
									<div class="description_wrap">
										<div class="description hidden-xs">
											<!--	Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.-->
										</div>
									</div>
								</div>
								<!--	<a class="btn1" href="#">More Details</a> -->
								<!--	<a class="btn2" href="#" data-toggle="modal" data-target=".donate_0">Donate</a> -->
							</div>
						</div>
					</div>
				</li>
				<!--<li class="style-3" style="background-image: url(images/slides/img_5.jpg);">
						<div class="contentwrap">
							<div class="container">
								<div class="content">
									<h3 class="slider-tag">Style 3</h3>
									<div class="slideheadingwrap">
										<h2>Help Poor Urban Families</h2>
									</div>
									<div class="description_wrap">
										<div class="description hidden-xs">
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
										</div>
									</div>
									<a class="btn1" href="#">More Details</a>
									<a class="btn2" href="#" data-toggle="modal" data-target=".donate_0">Donate</a>
								</div>
							</div>
						</div>
					</li> -->
				<!-- <li class="style-4" style="background-image: url(images/slides/img_6.jpg);">
						<div class="contentwrap">
							<div class="container">
								<div class="content">
									<h3 class="slider-tag">Style 4</h3>
									<div class="slideheadingwrap">
										<h2>A Helping Hand</h2>
									</div>
									<div class="description hidden-xs">
										Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
									</div>
									<a class="btn1" href="#">More Details</a>
									<a class="btn2" href="#" data-toggle="modal" data-target=".donate_0">Donate</a>
								</div>
							</div>
						</div>
					</li> -->
				<li class="style-1" style="background-image: url(images/slides/slider_4.png);">
					<div class="contentwrap">
						<div class="container">
							<div class="content">
								<!--	<h3 class="slider-tag">Style 5</h3> -->
								<div class="slideheadingwrap">
									<!--	<h2>Hope for the hopeless</h2> -->
								</div>
								<div class="description hidden-xs">
									<!--		Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. -->
								</div>
								<!--	<a class="btn1" href="#">More Details</a> -->
								<!--	<a class="btn2" href="#" data-toggle="modal" data-target=".donate_0">Donate</a> -->
							</div>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</section>
	<!-- End Slider Section -->

	<!-- About Section -->
	<section id="about">
		<div class="container">
			<div class="section-title">
				<h2 class="dark-bg">About</h2>
			</div>
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<h3>About jag Village</h3>
					<p style="text-align:justify; font-weight: 600;">Jorja’s Awesome Grief Village (J.A.G. Village) is a legacy built on the strongest foundation of compassion, love and kindness. It is a space for honouring grief and our loved ones, tolerating the intolerable, and for collective healing.</p>
					<p style="text-align:justify; font-weight: 600;">We understand that grief touches every part of our lives, and is not a problem to be fixed, but love that needs to be carried, nurtured and honoured. Our relationships do not die when our people die, we have opportunities to continue these relationships into our futures, J.A.G. Village is evidence of this.</p>
					<p><a href="about.php" class="btn btn-secondary">Read More</a></p>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<h3>Our Mission</h3>
					<div class="ourpoints">
						<div class="row point">
							<div class="icon-space">
								<i class="fa fa-dot-circle-o fa-3x"></i>
							</div>
							<div class="text-space text">
								<p style="text-align:justify; font-weight: 600;">J.A.G. Village is a social enterprise that is dedicated to providing support, a sense of community and empowering children, youth, and their families who are anticipating or have experienced the loss of a loved one through counselling, grief education and collective healing activities.</p>
							</div>
						</div>
						<h3>Our Vision</h3>
						<div class="row point">
							<div class="icon-space">
								<i class="fa fa-dot-circle-o fa-3x"></i>
							</div>
							<div class="text-space text">
								<p style="text-align:justify; font-weight: 600;">To promote and create a culture both internally and externally of J.A.G. Village where individuals, families and communities recognize that grief is not a problem to be solved, it is love that needs to be nurtured, carried and honoured, even when that love and/or grief is complicated.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End About Section -->

	<!-- Meet The Team Section -->
	<section id="meettheteam" class="dark bg">
		<div class="container">
			<div class="section-title">
				<h2 class="color-bg">Meet Our Team</h2>
			</div>
			<div class="row topspace ">
				<div class="col-sm-6 visible-lg visible-sm visible-md" align="center">

					<img src="images/team/Jodi.jpg" alt="Team Member" style="width: 35%; margin-bottom:10px;object-fit: cover;">
					<span style="text-align:center; margin-top:10px;" class="name">Jodi Gorham </span>


				</div>
				<div class="col-sm-6 visible-lg visible-sm visible-md" align="center">
					<img src="images/team/Jen.jpg" alt="Team Member" style="width: 33%; margin-bottom:10px; object-fit: cover;">
					<span style="text-align:center; margin-top:10px;" class="name">Jennifer Maddigan</span>


				</div>
			</div>
		</div>
		<div class="owl_slider team_slider_wrap visible-xs">
			<ul class="owl-carousel team_slider">
				<li>
					<div class="image">
						<img src="images/team/Jodi.jpg" alt="Team Member" />
					</div>
					<div class="name">
						Jodi Gorham
					</div>
				</li>
				<li>
					<div class="image">
						<img src="images/team/Jen.jpg" alt="Team Member" />
					</div>
					<div class="name">
						Jennifer Maddigan
					</div>

				</li>

			</ul>
		</div>
		</div>

		</div>
	</section>
	<!-- End Meet The Team Section -->

	<!-- Projects Section -->
	<section id="projects">
		<div class="container">
			<div class="section-title">
				<h2 class="dark-bg">our services</h2>
			</div>
			<div class="row">

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="owl_slider projects_slider_wrap">
						<ul class="owl-carousel projects_slider">

							<li>
								<div class="row" style="padding-left: 10px; padding-right: 10px;">
									<div class="col-md-6">
										<img src="images/service-bereavement-counelling2.png" style="object-fit: cover;" />
									</div>
									<div class="col-md-6">
										<h5>BEREAVEMENT COUNSELLING</h5>
										<h6>In Person,online or Phone sessions</h6>
										<p style="text-align:justify; font-weight: 600;">J.A.G. Village is committed to supporting individuals and families who are anticipating or have experienced the loss of a loved one.</p>
										<a href="https://jagvillage.janeapp.com/" class="btn btn-primary" target="_blank">Book Now</a><a href="http://jagvillage.com/service.php" class="btn btn-secondary">Learn More</a>
									</div>
								</div>

							</li>
							<li>
								<div class="row" style="padding-left: 10px; padding-right: 10px;">
									<div class="col-md-6">
										<img src="images/home_education.JPG" style="object-fit: cover;" />
									</div>
									<div class="col-md-6">
										<h5>EDUCATION AND CONSULTATION</h5>
										<h6>To support grieving children and youth</h6>
										<p style="text-align:justify; font-weight: 600;">At J.A.G. Village we are dedicated to nurturing, educating and creating healthy grieving communities where grief is honoured and supported.</p>
										<a href="https://jagvillage.janeapp.com/" class="btn btn-primary" target="_blank">Book Now</a><a href="http://jagvillage.com/service.php" class="btn btn-secondary">Learn More</a>
									</div>
								</div>
							</li>
							<li>
								<div class="row" style="padding-left: 10px; padding-right: 10px;">
									<div class="col-md-6">
										<img src="images/home_button.png" style="object-fit: cover;" />
									</div>
									<div class="col-md-6">
										<h5>BUTTON MAKING & GRIEF WEAR</h5>
										<h6>Represent and honour your person.</h6>
										<p style="text-align:justify; font-weight: 600;">Buttons and Grief Wear (tee and sweatshirts) can be physical symbols of loss that allow you to continue sharing your loved one with the world.</p>
										<a href="https://jagvillage.janeapp.com/" class="btn btn-primary" target="_blank">Book Now</a><a href="http://jagvillage.com/service.php" class="btn btn-secondary">Learn More</a>
									</div>
								</div>
							</li>
							<li>
								<div class="row" style="padding-left: 10px; padding-right: 10px;">
									<div class="col-md-6">
										<img src="images/family_program.png" style="object-fit: cover;" />
									</div>
									<div class="col-md-6">
										<h5>FAMILY PROGRAMS</h5>
										<h6>Hope for the Family</h6>
										<p style="text-align:justify; font-weight: 600;">CAREGIVER SUPPORT | FAMILY ACTIVITIES</p>
										<a href="https://jagvillage.janeapp.com/" class="btn btn-primary" target="_blank">Book Now</a><a href="http://jagvillage.com/service.php" class="btn btn-secondary">Learn More</a>
									</div>
								</div>
							</li>
							<li>
								<div class="row" style="padding-left: 10px; padding-right: 10px;">
									<div class="col-md-6">
										<img src="images/children_youth.png" style="object-fit: cover;" />
									</div>
									<div class="col-md-6">
										<h5>CHILDREN & YOUTH PROGRAMS</h5>
										<h6>The Village Youth R.O.A.D.E.</h6>
										<p style="text-align:justify; font-weight: 600;">The Youth R.O.A.D.E. is a youth engagement program built on KLC (Kindness, Love and Compassion). Children and youth will plan and schedule monthly activities for fellow bereaved peers. These activities may include: recreation, art, celebrations, board games and etc.</p>
										<a href="https://jagvillage.janeapp.com/" class="btn btn-primary" target="_blank">Book Now</a><a href="http://jagvillage.com/service.php" class="btn btn-secondary">Learn More</a>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<!-- Volunteer Form -->
		<!-- Modal -->
		<!--	<div id="volunteerformModal" class="modal fade" role="dialog">
			    <div class="modal-dialog">
				  
				    <div class="modal-content">
					    <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					        <h4 class="modal-title">Volunteer Application</h4>
					    </div>
					    <div class="modal-body">
					        <form id="VolunteerForm" action="https://www.ileadafricamedia.com/themes/themeforest/hope_charity/volunteer_form_submit.php" method="post">
					        	<div class="row">
					        		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					        			<input type="text" name="surname" placeholder="Surname" data-validation="length" data-validation-length="min3">
							        	<input type="text" name="firstname" placeholder="First Name" data-validation="length" data-validation-length="min3">
							        	<input type="text" name="phone" placeholder="Phone Number">
							        	<input type="text" name="email" placeholder="Email" data-validation="email">
							        	<textarea name="address" placeholder="Address" style="height:140px;" data-validation="length" data-validation-length="min3"></textarea>
					        		</div>
					        		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					        			<div class="formlabel">Gender:</div>
					        			<div class="fieldcollection">
						        			<div class="row">
						        				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			                                        <input id="male" type="radio" name="gender" value="male">
			                                        <label for="male"><span><span></span></span> Male</label>
			                                    </div>
	                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					                                <input id="female" type="radio" name="gender" value="female">
					                                <label for="female"><span><span></span></span> Female</label>
					                            </div>
				                            </div>
				                        </div>

			                            <div class="formlabel">Age Group:</div>
			                            <div class="fieldcollection">
						        			<div class="row">
						        				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			                                        <input id="under18" type="radio" name="age" value="under18">
			                                        <label for="under18"><span><span></span></span> Under 18</label>
			                                    </div>
	                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					                                <input id="18-15" type="radio" name="age" value="18-25">
			                                        <label for="18-25"><span><span></span></span> 18-25</label>
					                            </div>
				                            </div>
				                            <div class="row">
						        				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			                                        <input id="26-40" type="radio" name="age" value="26-40">
			                                        <label for="26-40"><span><span></span></span> 26-40</label>
			                                    </div>
	                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					                                <input id="41-55" type="radio" name="age" value="41-55">
			                                        <label for="41-55"><span><span></span></span> 41-55</label>
					                            </div>
				                            </div>
	                                        <div class="row">
						        				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			                                        <input id="over55" type="radio" name="age" value="55+">
			                                        <label for="over55"><span><span></span></span> 55+</label>
			                                    </div>
	                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					                            </div>
				                            </div>
                                        </div>
			                            <div class="formlabel">Please tell us why you want to volunteer with our organization?</div>
					        			<textarea name="why" style="height:110px;"></textarea>
					        		</div>
	                            </div>
	                            <button class="btn btn-secondary submit">Submit</button>
					        </form>
					        <div id="volunteeremailsendresponse" class="emailsendresponse"></div>
					    </div>
				    </div>
			    </div>
			</div>
			<!-- Modal -->

	</section>
	<!-- End Projects Section -->

	<!-- Causes Section -->
	<!--	<section id="causes" class="dark bg">
			<div class="container">
				<div class="section-title">
					<h2 class="color-bg">On Demand Service</h2>
				</div>
				<div class="row topspace">
					<div class="owl_slider causes_slider_wrap">
						<ul class="owl-carousel causes_slider">
							<li>
								<div class="cause-wrap">
									<img src="images/cause_education.png" alt="Cause Image"/>
									<div class="cause-title">
										IT TAKES A VILLAGE
									</div>
									<div class="cause-progress">
										<div class="progress">
										    <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%">
											    80%
										    </div>
										</div>
										<div class="figure">
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
												<div class="donations">Want to Donate ?</div>
											</div>
											
										</div>
									</div>
									<div class="cause-bottom">
										<a href="#" class="light-text" data-toggle="modal" data-target=".cause_1">View Details</a> | <span class="donate-link"><a href="#" data-toggle="modal" data-target=".donate_0">Donate</a></span>
									</div>
								</div>
                            </li>
							<li>
								<div class="cause-wrap">
									<img src="images/cause_refugees.jpg" alt="Cause Image"/>
									<div class="cause-title">
										EDUCATION AND CONSULTATION
									</div>
									<div class="cause-progress">
										<div class="progress">
										    <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">70%</div>
										</div>
										<div class="figure">
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
												<div class="donations">Want to Donate ?</div>
											</div>											
										</div>
									</div>
									<div class="cause-bottom">
										<a href="#" class="light-text" data-toggle="modal" data-target=".cause_2">View Details</a> | <span class="donate-link"><a href="#" data-toggle="modal" data-target=".donate_0">Donate</a></span>
									</div>
								</div>
							</li>
							<li>
								<div class="cause-wrap">
									<img src="images/cause_street.jpg" alt="Cause Image"/>
									<div class="cause-title">
										BEREAVEMENT COUNSELLING
									</div>
									<div class="cause-progress">
										<div class="progress">
										    <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">40%</div>
										</div>
										<div class="figure">
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
												<div class="donations">Want to Donate ?</div>
											</div>											
										</div>
									</div>
									<div class="cause-bottom">
										<a href="#" class="light-text" data-toggle="modal" data-target=".cause_3">View Details</a> | <span class="donate-link"><a href="#" data-toggle="modal" data-target=".donate_0">Donate</a></span>
									</div>
								</div>
							</li>
							<li>
								<div class="cause-wrap">
									<img src="images/cause_refugees.jpg" alt="Cause Image"/>
									<div class="cause-title">
										CHILDREN & YOUTH PROGRAMS
									</div>
									<div class="cause-progress">
										<div class="progress">
										    <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">70%</div>
										</div>
										<div class="figure">
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
												<div class="donations">Want to Donate ?</div>
											</div>											
										</div>
									</div>
									<div class="cause-bottom">
										<a href="#" class="light-text" data-toggle="modal" data-target=".cause_1">View Details</a> | <span class="donate-link"><a href="#" data-toggle="modal" data-target=".donate_0">Donate</a></span>
									</div>
								</div>
							</li>
									
						</ul>
					</div>
				</div>
			</div> -->
	<!-- Start Modals -->
	<!-- Start Cause 1 modal -->
	<div class="modal fade cause_1" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Education for the less fortunate</h4>
				</div>
				<div class="modal-body">
					<img src="images/education_big.jpg" alt="">
					<hr>
					<p style="text-align:justify; font-weight: 600;">Lorem psum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".donate_0">Make Donation</button>
				</div>
			</div>
		</div>
	</div>
	<!-- End Cause 1 modal -->

	<!-- End Modals -->
	</section>
	<!-- End Causes Section -->

	<!-- News & Events Section -->
	<section id="projects" class="dark bg">
		<div class="container">
			<div class="section-title">
				<h2 class="color-bg">it takes a village</h2>
			</div>
			<!--	<div class="row">
				<div style="padding: 20px; color:#bbb;">
					    <h4 style="color:#fff">Join Our Village</h4>
					    <p style="text-align:justify; font-weight: 600;">The loss of a loved one affects every aspect of life. “It Takes A Village” is an online platform that organizes support for the everyday needs, both tangible and emotional, of those who are grieving. Please create an account for a person/family you wish to support and invite others to sign up for helpful tasks on specific days/times.</p>
                        <p><a href="it-takes-village.php" class="btn btn-primary">Learn More</a></p>
					</div>
				</div> -->
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="padding: 20px; color:#bbb;">
					<h4 style="color:#fff">Join Our Village</h4>
					<p style="text-align:justify; font-weight: 600;">The loss of a loved one affects every aspect of life. “It Takes A Village” is an online platform that organizes support for the everyday needs, both tangible and emotional, of those who are grieving. Please create an account for a person/family you wish to support and invite others to sign up for helpful tasks on specific days/times.</p>
					<p><a href="it-takes-village.php" class="btn btn-primary">Learn More</a></p>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<img src="images/It-takes-a-Village-Front-Home-page.png" alt="">

				</div>
			</div>
		</div>
	</section>

	<section id="newsandevents">
		<div class="container">
			<div class="section-title">
				<h2 class="dark-bg">News & Events</h2>
			</div>
			<div class="row">
				<!-- Start News -->
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="latestnews">
					<h3>JAG JOURNALING</h3>
					<!-- start news item -->
					<?php
					$sql = "select * from blog limit 0,3";
					$run = mysqli_query($con, $sql);
					$i = 0;
					while ($row = mysqli_fetch_array($run)) {
						$i++;
					?>
						<div class="newsitem">
							<div class="row">
								<div class="col-lg-5 col-md-5 col-sm-5 col-xs-6">
									<img src="admin/upload/blog/<?php echo $row['blog_img']; ?>" alt="">
								</div>
								<div class="col-lg-7 col-md-7 col-sm-7 col-xs-6">
									<div class="news-text-wrap">
										<div class="news-title"><?php echo $row['blog_title']; ?>
										</div>
										<div class="news-text">
											<p style="text-align:justify; font-weight: 600; white-space: nowrap; 
												width: 100%; 
												overflow: hidden;
												text-overflow: ellipsis; "><?php echo $row['blog_desc']; ?></p>
											<p><a href="blog.php?blog_id=<?php echo $row['blog_id']; ?>" class="dark light-text">More Details</a></p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- end news item -->
					<?php } ?>
					<!-- Start News 1 modal -->
					<a class="btn btn-secondary text-uppercase" href="view-blog.php">See all blogs</a>
					<!-- End news item 2 -->
					<!-- Start News 2 modal -->

					<!-- End News 2 modal -->
				</div>
				<!-- End News -->

				<!-- Starts Events -->
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="events-wrap">
						<h3>Upcoming Events</h3>
						<?php
						$sql = "select * from event limit 0,3";
						$run = mysqli_query($con, $sql);
						$i = 0;
						while ($row = mysqli_fetch_array($run)) {
							$i++;
						?>
							<div class="event-item">
								<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 event-date"><?php echo date('j', strtotime($row['event_date']))  ?><br /><span class="month"><?php echo date('M', strtotime($row['event_date']))  ?></span></div>
								<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 event-info">
									<div class="event-title" style="color:#00000;"><?php echo $row['event_name']; ?></div>
									<div class="event-text">
										<p style="text-align:justify; font-weight: 600; color:#00000;"><?php echo $row['event_desc']; ?></p>
									</div>
									<p>
										<font color="white"><a href="event.php?event_id=<?php echo $row['event_id']; ?>" class="color-bg">More Details</a></font>
									</p>
								</div>
							</div>
						<?php } ?>
					</div>
					<a class="btn btn-secondary text-uppercase" href="view-event.php">See all events</a>
				</div>
				<!-- End Events -->

				<!-- Start Event 1 modal popup -->
				<div class="modal fade event_1" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title">Event Title</h4>
							</div>
							<div class="modal-body">
								<img src="images/education_big.jpg" alt="">
								<hr>
								<p style="text-align:justify; font-weight: 600;">Lorem psum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
							</div>
							<div class="modal-footer">
								<!-- <button type="button" class="btn btn-primary">Make Donation</button> -->
							</div>
						</div>
					</div>
				</div>
				<!-- Start Event 1 modal popup -->

			</div>
		</div>
	</section>
	<!-- End News & Events Section -->

	<!-- Our Sponsors Section 
		<section id="sponsors">
			<div class="container">
				<div class="section-title">
					<h2 class="dark-bg">Our Sponsors</h2>
				</div>
				<div class="section-body">
					<div class="bx_slider sponsor_slider_wrap">
						<ul class="sponsor_slider">
						    <li><img src="images/sponsors/1.png" alt="" /></li>
						    <li><img src="images/sponsors/2.png" alt="" /></li>
						    <li><img src="images/sponsors/3.png" alt="" /></li>
						    <li><img src="images/sponsors/4.png" alt="" /></li>
						    <li><img src="images/sponsors/5.png" alt="" /></li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		
		 End Our Sponsors Section -->

	<!-- Our Contacts Section -->
	<section id="contacts" class="colored">
		<div class="container">
			<div class="section-title">
				<h2 class="dark-bg">Our Contacts</h2>
			</div>
			<div class="section-body">
				<!-- <div class="col-lg-3 col-md-3 col-sm-5 col-xs-10 centered contact-details">
					<div class="social-icons">
						<a href="https://www.facebook.com/jagvillage/" target="_blank"><i class="fa fa-facebook-square fa-3x" aria-hidden="true"></i></a>
						<a href="https://www.instagram.com/j.a.g.village/" target="_blank"><i class="fa fa-instagram fa-3x" aria-hidden="true"></i></a>

						<a href="mailto:info@jagvillage.com" target="_blank"><i class="fa fa-envelope fa-3x" aria-hidden="true"></i></a>
					</div>
					<div class="contacts">
						<span class="details">Tel: +1 833 JAG VILL</span><br>
						<span class="details">Tel: +1 833 524 8455</span>
						<hr>
						<span class="details">Email: info@jagvillage.com</span>
					</div>
				</div> -->
				<div class="row">
					<!--
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					    	<h3 class="black-text">Our Location</h3>
					    	<p>132 Lorem Ipsum, Dolor sit, City, Country</p>
							
					    	<div id="map"></div>
							 
					    </div>
						 -->
					<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 sendmessage">
						<h3 class="black-text">Send us a message</h3>
						<p style="color:#000">Leave us a message and we will get back to you asap</p>
						<!-- Start contact form -->
						<form class="cmxform" action="index.php" method="post">
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
		</div>
	</section>
	<!-- End Our Contacts Section -->

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
	<div class="modal fade donate_0" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">DONATE via Paypal</h4>
				</div>
				<div class="modal-body">
					<!-- Start Donate Form -->
					<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" id="DonateForm">
						<input type="hidden" name="payment_type" value="one_time">
						<input type="hidden" name="cmd" value="_donations">
						<input type="hidden" name="a3" value="30">
						<input type="hidden" name="p3" value="1">
						<input type="hidden" name="t3" value="M">
						<input type="hidden" name="src" value="1">
						<input type="hidden" name="currency_code" value="USD">
						<!-- <input type="hidden" name="item_name" value="hat"> -->
						<input type="hidden" name="amount" value="" data-validation="required">
						<input type="hidden" name="business" value="info@ileadafricamedia.com">
						<div class="row">
							<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
								<div class="bolden">
									<input id="d10" type="radio" name="xamount" value="10.00">
									<label for="d10">$10</label>
								</div>
								<div class="bolden">
									<input id="d25" type="radio" name="xamount" value="25.00">
									<label for="d25">$25</label>
								</div>
								<div class="bolden">
									<input id="d50" type="radio" name="xamount" value="50.00">
									<label for="d50">$50</label>
								</div>
								<div class="bolden">
									<input id="d100" type="radio" name="xamount" value="100.00">
									<label for="d100">$100</label>
								</div>
							</div>
							<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
								<input type="text" name="yamount" placeholder="Other amount $" data-validation="number" data-validation-allowing="float" data-validation-optional="true">
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<input id="monthly" type="checkbox" name="monthly" value="Children's Education">
								<label for="monthly"><span><span></span></span> I would like to make this a <b>monthly</b> contribution</label>
							</div>
						</div>
						<div class="formlabel"><strong>DONATE FOR:</strong></div>
						<div class="fieldcollection">
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<input id="cause1" type="radio" name="item_name" value="Children's Education">
									<label for="cause1"><span><span></span></span> Bereavement Counselling</label>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<input id="cause2" type="radio" name="item_name" value="Refugee assistance">
									<label for="cause2"><span><span></span></span> Education and Consultation</label>
								</div>

							</div>
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<input id="cause3" type="radio" name="item_name" value="Medical care">
									<label for="cause3"><span><span></span></span> Family Programs</label>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<input id="cause4" type="radio" name="item_name" value="Food for children">
									<label for="cause4"><span><span></span></span> Children &amp; Youth Programs </label>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<input id="cause5" type="radio" name="item_name" value="War in Syria">
									<label for="cause5"><span><span></span></span> It Takes a Village</label>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<input id="cause6" type="radio" name="item_name" value="Any Cause" checked="checked">
									<label for="cause6"><span><span></span></span> Button Making &amp; Grief Wear</label>
								</div>
							</div>
						</div>
				</div>
				<button type="submit" class="btn btn-primary" data-toggle="modal" data-target=".donate_0">Make Donation</button>
				</form>
				<!-- End Donate Form -->
			</div>
		</div>
	</div>
	</div>
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