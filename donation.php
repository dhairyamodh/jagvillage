<?php
session_start();
require_once './stripeconfig.php'
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
	<link rel="stylesheet" href="https://cdn.plyr.io/3.4.6/plyr.css">

</head>

<body>
	<!-- Top Header Section -->
	<?php include('header.php') ?>
	<!-- End Top Header Section -->

	<!-- Slider Section -->
	<section id="slider">
		<!-- <div class="owl_slider top_slider_wrap">
			<ul class="owl-carousel top_slider">
				<li class="style-1" style="background-image: url(images/slides/all-page-slider.png);">
					<div class="contentwrap">
						<div class="container">
							<div class="content">
								<div class="slideheadingwrap">
								</div>


							</div>
						</div>
					</div>
				</li>
			</ul>
		</div> -->
	</section>
	<!-- End Slider Section -->

	<!-- About Section -->

	<section id="contacts">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="dark-bg">Donate</h2>
					</div>
				</div>
				<div class=" col-md-5">
					<div class="card" style="border: 1px solid rgba(0,0,0,.125); border-radius: .25rem;">
						<div class="card-body">
							<img src="./images/donate1.JPG">
							<h4 style="padding:15px;text-transform:uppercase;text-align:center"> this is
								one way to provide a helping hand.</h4>
							<div class="hungry">
								<div class="prices">
									<div class="selection">
										<input id="25" name="amount" type="radio" value="25">
										<label for="25">25$</label>
									</div>
									<div class="selection">
										<input id="50" name="amount" type="radio" value="50">
										<label for="50">50$</label>
									</div>
									<div class="selection">
										<input id="100" name="amount" type="radio" value="100">
										<label for="100">100$</label>
									</div>
									<div class="selection">
										<input id="other" name="amount" type="radio" value="other">
										<label for="other">other</label>
									</div>
								</div>
								<!-- <div class="prices">
									<div class="selection">
										<input id="500" name="amount" type="radio" value="500">
										<label for="500">500$</label>
									</div>
									<div class="selection">
										<input id="1000" name="amount" type="radio" value="1000">
										<label for="1000">1000$</label>
									</div>
									<div class="selection">
										<input id="other" name="amount" type="radio" value="other">
										<label for="other">other</label>
									</div>
								</div> -->
								<div style="width: 100%;margin-top:10px;border:none;">
									<form action="https://www.paypal.com/donate" method="post" target="_top">
										<input type="hidden" name="hosted_button_id" value="PD3N6VW5U3WL6" />
										<input type="submit" class="btn btn-primary" border="0" style="border: none;background-color:#444;color:#fff;font-size:1.1em;font-weight:500;width:100%" name="submit" title="Donate to jagvillage" value="Donate with paypal" />
										<!-- <img alt="" border="0" src="https://www.paypal.com/en_CA/i/scr/pixel.gif" width="1" height="1" /> -->
									</form>
									<button class="btn btn-primary donate" disabled style="width: 100%;">Donate with card</button>
								</div>
							</div>

						</div>
					</div>

				</div>
				<div class="col-md-6">
					<div class="container-donate">
						<img src="./images/donate.JPG" alt="Snow" style="width:100%;height:500px">
						<div class="centered">The death of a loved one is one of the most
							devastating experiences we can have in
							our lifetime. Having access to affordable
							grief & bereavement services can make all
							the difference. We do not always know
							how to support our friends and family, this is
							one way to provide a helping hand.</div>
					</div>

				</div>
				<div class="col-md-12">


					<p style="text-align:justify; font-weight: 600;">Disclaimer: Although we are unable to provide tax receipts to you,
						our promise is for every dollar you give we will add 5% onto your gift
						up to a maximum of 100$ to also support accessible service.</p>
				</div>
				<div class="col-md-12" id="info" style="display: none;">
					<hr>

					<h4>Your Information</h4>
					<div class="section-body">

						<div class="row">
							<style>
								.field {
									width: 100%;
									background-color: transparent;
									border: 1px solid #000;
									color: #333333;
									margin-bottom: 20px;
									padding: 6px 15px;
								}
							</style>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 sendmessage">
								<div id="paymentResponse"></div>
								<form class="cmxform" method="post" action="payment.php" id="paymentFrm">
									<input type="hidden" name="price" class="price">
									<div class="row">
										<div class="col-md-4">
											<input type="text" name="name" placeholder="Enter Name" id="name">
										</div>
										<div class="col-md-4">
											<input id="email" placeholder="Enter Email Address" type="email" name="email" data-validation="email">
										</div>
										<div class="col-md-4">
											<input id="phone" placeholder="Enter Phone Number" type="text" name="mobile" data-validation="phone">
										</div>
										<div class="col-md-12">
											<input id="address" placeholder="Enter Address" type="text" name="address">
										</div>
										<div class="col-md-4">
											<select name="country" id="country">
											</select>
										</div>
										<div class="col-md-4">
											<input id="state" placeholder="Enter Province/State" type="text" name="state">
										</div>
										<div class="col-md-4">
											<input id="pin" placeholder="Enter Postal/Zip code" type="text" name="pincode" maxlength="6">
										</div>
										<div class="form-group col-md-4">
											<label>CARD NUMBER <img src="./images/visa-mastercard-amex.png" width="100px"></label>
											<div id="card_number" class="field"></div>
										</div>
										<div class="row col-md-4">
											<div class="left col-md-6">
												<div class="form-group">
													<label>EXPIRY DATE</label>
													<div id="card_expiry" class="field"></div>
												</div>
											</div>
											<div class="right col-md-6">
												<div class="form-group">
													<label>CVC CODE</label>
													<div id="card_cvc" class="field"></div>
												</div>
											</div>
										</div>
										<div class="col-md-4 field-amount" style="display: none;">
											<label>Amount</label>
											<input id="amount" placeholder="Enter Amount" type="text" name="amount">
										</div>
									</div>


									<button class="btn btn-secondary" id="payBtn" type="submit" name="register">Donate Now!</button>
								</form>

							</div>
						</div>
					</div>
				</div>

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
	<script src="https://cdn.plyr.io/3.4.6/plyr.js"></script>
	<script src="https://js.stripe.com/v3/"></script>
	<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
	<script>
		$('input[name="mobile"]').inputmask({
			"mask": "(999) 9999999999"
		})
		$('input[name="amount"]').inputmask('Regex', {
			regex: "^[0-9]{1,9}(\\.\\d{1,2})?$"
		})
		$(document).ready(function() {
			$('input[name="amount"]').click(function() {
				var amount = $(this).val();
				$('.price').val(amount)
				if (amount) {
					$('.donate').removeAttr('disabled');
					if (amount == 'other') {
						$('.price').css('display', 'none')
						$('.field-amount').css('display', 'block')
						$('#amount').css('display', 'block')
					} else {
						$('.field-amount').css('display', 'none')
						$('#amount').css('display', 'none')
					}
				}
			})

			$('.donate').click(function() {
				$('#info').css('display', 'block')
			})

			$.ajax({
				url: "https://restcountries.eu/rest/v2/all",
				method: 'GET',
				success: function(results) {
					var output = Object.entries(results).map(([key, value]) => (value.name));
					$('#country').append('<option selected disabled>--select country--</option>')
					output.forEach(element => {
						return $('#country').append('<option value="' + element + '">' + element + '</option>');
					});
				}
			});

		})

		var stripe = Stripe('<?php echo STRIPE_PUBLISHABLE_KEY; ?>');

		// Create an instance of elements
		var elements = stripe.elements();

		var style = {
			base: {
				lineHeight: '1.4',
				color: '#444',
				backgroundColor: '#fff',
				border: '1px solid #0000',
				'::placeholder': {
					color: '#888',
				},
			},
			invalid: {
				color: '#eb1c26',
			}
		};

		var cardElement = elements.create('cardNumber', {
			style: style
		});
		cardElement.mount('#card_number');

		var exp = elements.create('cardExpiry', {
			'style': style
		});
		exp.mount('#card_expiry');

		var cvc = elements.create('cardCvc', {
			'style': style
		});
		cvc.mount('#card_cvc');

		// Validate input of the card elements
		var resultContainer = document.getElementById('paymentResponse');
		cardElement.addEventListener('change', function(event) {
			if (event.error) {
				resultContainer.innerHTML = '<p class="alert alert-danger">' + event.error.message + '</p>';
			} else {
				resultContainer.innerHTML = '';
			}
		});

		// Get payment form element
		var form = document.getElementById('paymentFrm');

		// Create a token when the form is submitted.
		form.addEventListener('submit', function(e) {
			e.preventDefault();
			createToken();
		});

		// Create single-use token to charge the user
		function createToken() {
			stripe.createToken(cardElement).then(function(result) {
				if (result.error) {
					// Inform the user if there was an error
					resultContainer.innerHTML = '<p class="alert alert-danger">' + result.error.message + '</p>';
				} else {
					// Send the token to your server
					stripeTokenHandler(result.token);
				}
			});
		}

		// Callback to handle the response from stripe
		function stripeTokenHandler(token) {
			// Insert the token ID into the form so it gets submitted to the server
			var hiddenInput = document.createElement('input');
			hiddenInput.setAttribute('type', 'hidden');
			hiddenInput.setAttribute('name', 'stripeToken');
			hiddenInput.setAttribute('value', token.id);
			form.appendChild(hiddenInput);

			// Submit the form
			form.submit();
		}
	</script>
	<!-- END SCRIPTS -->
</body>


</html>