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
// $adult_cook = $_POST['adult_cook'];
// $kids_cook = $_POST['kids_cook'];
$time = $_POST['time'];
// $cancer = $_POST['cancer'];
$instruction = $_POST['instruction'];
// $fav_meal = $_POST['fav_meal'];
// $least_meal = $_POST['least_meal'];
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
$user_id = $_SESSION['user_id'];

$email = $_SESSION['email'];
	$sql = "select * from user where user_email = '$email'";
                                        $run = mysqli_query($con,$sql);
                                        while($row=mysqli_fetch_array($run)){ 
											$fname = $row['user_fname'];
											$lname = $row['user_lname'];
										}
		if($date != "" && $time != ""){								
    $query = "insert into services (user_id,recipent_name,recipent_email,recipent_address,recipent_city,recipent_state,recipent_postal,recipent_phone,category,needed,dates,delivery_time,cancer_status,instuction,allergies,service_token) values('$user_id','$rname','$remail','$address','$city','$state','$postal','$phone','$category','$need','$dates','$time','$cancer','$instruction','$allergy','$token')";
$run = mysqli_query($con,$query);

 
if($run){
	echo '<script>window.open("activation.php?key='.$token.'","_self");</script>';
	require 'phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;
    $mail->Host = 'mail.jagvillage.com';     //Sets the SMTP hosts of your Email hosting, this for Godaddy
    $mail->Port = 993;                              //Sets the default SMTP server port
    $mail->SMTPAuth = true;                         //Sets SMTP authentication. Utilizes the Username and Password variables
    $mail->SMTPSecure = 'ssl';
    $mail->Username = 'info@jagvillage.com';                  //Sets SMTP username
    $mail->Password = 'jagvillage';                        //Sets connection prefix. Options are "", "ssl" or "tls"
    $mail->setFrom('info@jagvillage.com', 'Jagvillage'); //Sets the From name of the message
    $mail->addAddress($remail);      //Adds a "To" address
    $mail->addReplyTo('info@jagvillage.com', 'Jagvillage'); //Adds a "Cc" address
    //Sets word wrapping on the body of the message to a given number of characters
    $mail->isHTML(true);                            //Sets message type to HTML
    $mail->Subject = 'Jagvillage Service';       //An HTML or plain text message body
	$mail->Body = '<!doctype html>
	<html>
	  <head>
		<meta name="viewport" content="width=device-width" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Simple Transactional Email</title>
		<style>
		  /* -------------------------------------
			  GLOBAL RESETS
		  ------------------------------------- */
		  img {
			border: none;
			-ms-interpolation-mode: bicubic;
			max-width: 100%; }
		  body {
			background-color: #f6f6f6;
			font-family: sans-serif;
			-webkit-font-smoothing: antialiased;
			font-size: 14px;
			line-height: 1.4;
			margin: 0;
			padding: 0; 
			-ms-text-size-adjust: 100%;
			-webkit-text-size-adjust: 100%; }
		  table {
			border-collapse: separate;
			mso-table-lspace: 0pt;
			mso-table-rspace: 0pt;
			width: 100%; }
			table td {
			  font-family: sans-serif;
			  font-size: 14px;
			  vertical-align: top; }
		  /* -------------------------------------
			  BODY & CONTAINER
		  ------------------------------------- */
		  .body {
			background-color: #f6f6f6;
			width: 100%; }
		  /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
		  .container {
			display: block;
			Margin: 0 auto !important;
			/* makes it centered */
			max-width: 580px;
			padding: 10px;
			width: 580px; }
		  /* This should also be a block element, so that it will fill 100% of the .container */
		  .content {
			box-sizing: border-box;
			display: block;
			Margin: 0 auto;
			max-width: 580px;
			padding: 10px; }
		  /* -------------------------------------
			  HEADER, FOOTER, MAIN
		  ------------------------------------- */
		  .main {
			background: #fff;
			border-radius: 3px;
			width: 100%; }
		  .wrapper {
			box-sizing: border-box;
			padding: 20px; }
		  .footer {
			clear: both;
			padding-top: 10px;
			text-align: center;
			width: 100%; }
			.footer td,
			.footer p,
			.footer span,
			.footer a {
			  color: #999999;
			  font-size: 12px;
			  text-align: center; }
		  /* -------------------------------------
			  TYPOGRAPHY
		  ------------------------------------- */
		  h1,
		  h2,
		  h3,
		  h4 {
			color: #000000;
			font-family: sans-serif;
			font-weight: 400;
			line-height: 1.4;
			margin: 0;
			Margin-bottom: 30px; }
		  h1 {
			font-size: 35px;
			font-weight: 300;
			text-align: center;
			text-transform: capitalize; }
		  p,
		  ul,
		  ol {
			font-family: sans-serif;
			font-size: 14px;
			font-weight: normal;
			margin: 0;
			Margin-bottom: 15px; }
			p li,
			ul li,
			ol li {
			  list-style-position: inside;
			  margin-left: 5px; }
		  a {
			color: #3498db;
			text-decoration: underline; }
		  /* -------------------------------------
			  BUTTONS
		  ------------------------------------- */
		  .btn {
			box-sizing: border-box;
			width: 100%; }
			.btn > tbody > tr > td {
			  padding-bottom: 15px; }
			.btn table {
			  width: auto; }
			.btn table td {
			  background-color: #ffffff;
			  border-radius: 5px;
			  text-align: center; }
			.btn a {
			  background-color: #ffffff;
			  border: solid 1px #3498db;
			  border-radius: 5px;
			  box-sizing: border-box;
			  color: #3498db;
			  cursor: pointer;
			  display: inline-block;
			  font-size: 14px;
			  font-weight: bold;
			  margin: 0;
			  padding: 12px 25px;
			  text-decoration: none;
			  text-transform: capitalize; }
		  .btn-primary table td {
			background-color: #3498db; }
		  .btn-primary a {
			background-color: #3498db;
			border-color: #3498db;
			color: #ffffff; }
		  /* -------------------------------------
			  OTHER STYLES THAT MIGHT BE USEFUL
		  ------------------------------------- */
		  .last {
			margin-bottom: 0; }
		  .first {
			margin-top: 0; }
		  .align-center {
			text-align: center; }
		  .align-right {
			text-align: right; }
		  .align-left {
			text-align: left; }
		  .clear {
			clear: both; }
		  .mt0 {
			margin-top: 0; }
		  .mb0 {
			margin-bottom: 0; }
		  .preheader {
			color: transparent;
			display: none;
			height: 0;
			max-height: 0;
			max-width: 0;
			opacity: 0;
			overflow: hidden;
			mso-hide: all;
			visibility: hidden;
			width: 0; }
		  .powered-by a {
			text-decoration: none; }
		  hr {
			border: 0;
			border-bottom: 1px solid #f6f6f6;
			Margin: 20px 0; }
		  /* -------------------------------------
			  RESPONSIVE AND MOBILE FRIENDLY STYLES
		  ------------------------------------- */
		  @media only screen and (max-width: 620px) {
			table[class=body] h1 {
			  font-size: 28px !important;
			  margin-bottom: 10px !important; }
			table[class=body] p,
			table[class=body] ul,
			table[class=body] ol,
			table[class=body] td,
			table[class=body] span,
			table[class=body] a {
			  font-size: 16px !important; }
			table[class=body] .wrapper,
			table[class=body] .article {
			  padding: 10px !important; }
			table[class=body] .content {
			  padding: 0 !important; }
			table[class=body] .container {
			  padding: 0 !important;
			  width: 100% !important; }
			table[class=body] .main {
			  border-left-width: 0 !important;
			  border-radius: 0 !important;
			  border-right-width: 0 !important; }
			table[class=body] .btn table {
			  width: 100% !important; }
			table[class=body] .btn a {
			  width: 100% !important; }
			table[class=body] .img-responsive {
			  height: auto !important;
			  max-width: 100% !important;
			  width: auto !important; }}
		  @media all {
			.ExternalClass {
			  width: 100%; }
			.ExternalClass,
			.ExternalClass p,
			.ExternalClass span,
			.ExternalClass font,
			.ExternalClass td,
			.ExternalClass div {
			  line-height: 100%; }
			.apple-link a {
			  color: inherit !important;
			  font-family: inherit !important;
			  font-size: inherit !important;
			  font-weight: inherit !important;
			  line-height: inherit !important;
			  text-decoration: none !important; } 
			.btn-primary table td:hover {
			  background-color: #34495e !important; }
			.btn-primary a:hover {
			  background-color: #34495e !important;
			  border-color: #34495e !important; } }
		</style>
	  </head>
	  <body class="">
		<table border="0" cellpadding="0" cellspacing="0" class="body">
		  <tr>
			<td>&nbsp;</td>
			<td class="container">
			  <div class="content">
				
				<table class="main">
	
				  <!-- START MAIN CONTENT AREA -->
				  <tr>
					<td class="wrapper">
					  <table border="0" cellpadding="0" cellspacing="0">
						<tr>
						  <td>
						  <center>
                          <img src="http://test.jagvillage.com/images/logo.png" /></center>
							
							<p>Hi '.$rname.'</p>
							<h5>This meal is created for you from '.$fname.' '.$lname.'</h5>
							<table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
							  <tbody>
								<tr>
								  <td align="left">
									<table border="0" cellpadding="0" cellspacing="0">
									  <tbody>
										<tr>
										  <td> <a href="http://test.jagvillage.com/jagvillage-service.php?key='.$token.'" target="_blank">View</a> </td>
										</tr>
									  </tbody>
									</table>
								  </td>
								</tr>
							  </tbody>
							</table>
							
		  
						  </td>
						</tr>
					  </table>
					</td>
				  </tr>
	
				<!-- END MAIN CONTENT AREA -->
				</table>
	
				<!-- START FOOTER -->
				<div class="footer">
				  <table border="0" cellpadding="0" cellspacing="0">
					<tr>
					  <td class="content-block">
						<span class="apple-link">Coloured.com.ng | Feminism | Culture | Law | Feminists Rising</span>
						
					  </td>
					</tr>
					<tr>
					  <td class="content-block powered-by">
						Powered by <a href="https://fb.me/jalasem">Jalasem</a>.
					  </td>
					</tr>
				  </table>
				</div>
				<!-- END FOOTER -->
				
			  <!-- END CENTERED WHITE CONTAINER -->
			  </div>
			</td>
			<td>&nbsp;</td>
		  </tr>
		</table>
	  </body>
	</html>';

	$mail->Send(); 

	$mail->Host = 'mail.jagvillage.com';     //Sets the SMTP hosts of your Email hosting, this for Godaddy
    $mail->Port = 993;                              //Sets the default SMTP server port
    $mail->SMTPAuth = true;                         //Sets SMTP authentication. Utilizes the Username and Password variables
    $mail->SMTPSecure = 'ssl';
    $mail->Username = 'info@jagvillage.com';                  //Sets SMTP username
    $mail->Password = 'jagvillage';                        //Sets connection prefix. Options are "", "ssl" or "tls"
    $mail->setFrom('info@jagvillage.com', 'Jagvillage'); //Sets the From name of the message
    $mail->addAddress($email);      //Adds a "To" address
    $mail->addReplyTo('info@jagvillage.com', 'Jagvillage'); //Adds a "Cc" address
    //Sets word wrapping on the body of the message to a given number of characters
    $mail->isHTML(true);                            //Sets message type to HTML
    $mail->Subject = 'Jagvillage Service';       //An HTML or plain text message body
	$mail->Body = '<!doctype html>
	<html>
	  <head>
		<meta name="viewport" content="width=device-width" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Simple Transactional Email</title>
		<style>
		  /* -------------------------------------
			  GLOBAL RESETS
		  ------------------------------------- */
		  img {
			border: none;
			-ms-interpolation-mode: bicubic;
			max-width: 100%; }
		  body {
			background-color: #f6f6f6;
			font-family: sans-serif;
			-webkit-font-smoothing: antialiased;
			font-size: 14px;
			line-height: 1.4;
			margin: 0;
			padding: 0; 
			-ms-text-size-adjust: 100%;
			-webkit-text-size-adjust: 100%; }
		  table {
			border-collapse: separate;
			mso-table-lspace: 0pt;
			mso-table-rspace: 0pt;
			width: 100%; }
			table td {
			  font-family: sans-serif;
			  font-size: 14px;
			  vertical-align: top; }
		  /* -------------------------------------
			  BODY & CONTAINER
		  ------------------------------------- */
		  .body {
			background-color: #f6f6f6;
			width: 100%; }
		  /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
		  .container {
			display: block;
			Margin: 0 auto !important;
			/* makes it centered */
			max-width: 580px;
			padding: 10px;
			width: 580px; }
		  /* This should also be a block element, so that it will fill 100% of the .container */
		  .content {
			box-sizing: border-box;
			display: block;
			Margin: 0 auto;
			max-width: 580px;
			padding: 10px; }
		  /* -------------------------------------
			  HEADER, FOOTER, MAIN
		  ------------------------------------- */
		  .main {
			background: #fff;
			border-radius: 3px;
			width: 100%; }
		  .wrapper {
			box-sizing: border-box;
			padding: 20px; }
		  .footer {
			clear: both;
			padding-top: 10px;
			text-align: center;
			width: 100%; }
			.footer td,
			.footer p,
			.footer span,
			.footer a {
			  color: #999999;
			  font-size: 12px;
			  text-align: center; }
		  /* -------------------------------------
			  TYPOGRAPHY
		  ------------------------------------- */
		  h1,
		  h2,
		  h3,
		  h4 {
			color: #000000;
			font-family: sans-serif;
			font-weight: 400;
			line-height: 1.4;
			margin: 0;
			Margin-bottom: 30px; }
		  h1 {
			font-size: 35px;
			font-weight: 300;
			text-align: center;
			text-transform: capitalize; }
		  p,
		  ul,
		  ol {
			font-family: sans-serif;
			font-size: 14px;
			font-weight: normal;
			margin: 0;
			Margin-bottom: 15px; }
			p li,
			ul li,
			ol li {
			  list-style-position: inside;
			  margin-left: 5px; }
		  a {
			color: #3498db;
			text-decoration: underline; }
		  /* -------------------------------------
			  BUTTONS
		  ------------------------------------- */
		  .btn {
			box-sizing: border-box;
			width: 100%; }
			.btn > tbody > tr > td {
			  padding-bottom: 15px; }
			.btn table {
			  width: auto; }
			.btn table td {
			  background-color: #ffffff;
			  border-radius: 5px;
			  text-align: center; }
			.btn a {
			  background-color: #ffffff;
			  border: solid 1px #3498db;
			  border-radius: 5px;
			  box-sizing: border-box;
			  color: #3498db;
			  cursor: pointer;
			  display: inline-block;
			  font-size: 14px;
			  font-weight: bold;
			  margin: 0;
			  padding: 12px 25px;
			  text-decoration: none;
			  text-transform: capitalize; }
		  .btn-primary table td {
			background-color: #3498db; }
		  .btn-primary a {
			background-color: #3498db;
			border-color: #3498db;
			color: #ffffff; }
		  /* -------------------------------------
			  OTHER STYLES THAT MIGHT BE USEFUL
		  ------------------------------------- */
		  .last {
			margin-bottom: 0; }
		  .first {
			margin-top: 0; }
		  .align-center {
			text-align: center; }
		  .align-right {
			text-align: right; }
		  .align-left {
			text-align: left; }
		  .clear {
			clear: both; }
		  .mt0 {
			margin-top: 0; }
		  .mb0 {
			margin-bottom: 0; }
		  .preheader {
			color: transparent;
			display: none;
			height: 0;
			max-height: 0;
			max-width: 0;
			opacity: 0;
			overflow: hidden;
			mso-hide: all;
			visibility: hidden;
			width: 0; }
		  .powered-by a {
			text-decoration: none; }
		  hr {
			border: 0;
			border-bottom: 1px solid #f6f6f6;
			Margin: 20px 0; }
		  /* -------------------------------------
			  RESPONSIVE AND MOBILE FRIENDLY STYLES
		  ------------------------------------- */
		  @media only screen and (max-width: 620px) {
			table[class=body] h1 {
			  font-size: 28px !important;
			  margin-bottom: 10px !important; }
			table[class=body] p,
			table[class=body] ul,
			table[class=body] ol,
			table[class=body] td,
			table[class=body] span,
			table[class=body] a {
			  font-size: 16px !important; }
			table[class=body] .wrapper,
			table[class=body] .article {
			  padding: 10px !important; }
			table[class=body] .content {
			  padding: 0 !important; }
			table[class=body] .container {
			  padding: 0 !important;
			  width: 100% !important; }
			table[class=body] .main {
			  border-left-width: 0 !important;
			  border-radius: 0 !important;
			  border-right-width: 0 !important; }
			table[class=body] .btn table {
			  width: 100% !important; }
			table[class=body] .btn a {
			  width: 100% !important; }
			table[class=body] .img-responsive {
			  height: auto !important;
			  max-width: 100% !important;
			  width: auto !important; }}
		  @media all {
			.ExternalClass {
			  width: 100%; }
			.ExternalClass,
			.ExternalClass p,
			.ExternalClass span,
			.ExternalClass font,
			.ExternalClass td,
			.ExternalClass div {
			  line-height: 100%; }
			.apple-link a {
			  color: inherit !important;
			  font-family: inherit !important;
			  font-size: inherit !important;
			  font-weight: inherit !important;
			  line-height: inherit !important;
			  text-decoration: none !important; } 
			.btn-primary table td:hover {
			  background-color: #34495e !important; }
			.btn-primary a:hover {
			  background-color: #34495e !important;
			  border-color: #34495e !important; } }
		</style>
	  </head>
	  <body class="">
		<table border="0" cellpadding="0" cellspacing="0" class="body">
		  <tr>
			<td>&nbsp;</td>
			<td class="container">
			  <div class="content">
				
				<table class="main">
	
				  <!-- START MAIN CONTENT AREA -->
				  <tr>
					<td class="wrapper">
					  <table border="0" cellpadding="0" cellspacing="0">
						<tr>
						  <td>
						  <center>
                          <img src="http://test.jagvillage.com/images/logo.png" /></center>
							<p>Hi '.$fname.' '.$lname.'</p>
							<h5>Thank you for creating a Jagvillage Service for '.$rname.'. The unique link associated with this Jagvillage Service is:</h5>
							
							<table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
							  <tbody>
								<tr>
								  <td align="left">
									<table border="0" cellpadding="0" cellspacing="0">
									  <tbody>
										<tr>
										  <td> <a href="http://test.jagvillage.com/jagvillage-service.php?key='.$token.'" target="_blank">View</a> </td>
										</tr>
									  </tbody>
									</table>
								  </td>
								</tr>
							  </tbody>
							</table>
							<p>Tip #1: Invite Others</p><br>
							<p>Each volunteer must click or enter the above unique web address. You can provide it to them by:</p>
							<br>
							<p>1.) Pasting the link above into an email<br>
							2.) Sharing the link to Facebook or Twitter<br>
							3.) Clicking the orange "Invite" button on the Jagvillage Service Trai</p>
		  
						  </td>
						</tr>
					  </table>
					</td>
				  </tr>
	
				<!-- END MAIN CONTENT AREA -->
				</table>
	
				<!-- START FOOTER -->
				<div class="footer">
				  <table border="0" cellpadding="0" cellspacing="0">
					<tr>
					  <td class="content-block">
						<span class="apple-link">Coloured.com.ng | Feminism | Culture | Law | Feminists Rising</span>
						
					  </td>
					</tr>
					<tr>
					  <td class="content-block powered-by">
						Powered by <a href="https://fb.me/jalasem">Jalasem</a>.
					  </td>
					</tr>
				  </table>
				</div>
				<!-- END FOOTER -->
				
			  <!-- END CENTERED WHITE CONTAINER -->
			  </div>
			</td>
			<td>&nbsp;</td>
		  </tr>
		</table>
	  </body>
	</html>';

	$mail->Send(); 
			}else{
				$msg = '<div class="alert alert-danger">Please fill up required details</div>';
			}
	
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
		<link href='css/datepicker.css' rel='stylesheet'>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.css">
		<style>
		.closeon {
			font-size:13px;
		}
		</style>
	</head>
	<body>
	<div class="modal fade login" id="event-modal" tabindex="-1" role="dialog" id="addcalendar" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" onclick="window.location='it-takes-village.php';"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Login to continue</h4>
      </div>
      <div class="modal-body">
        <form action="#" method="post">
            <div class="error"></div>
        <div class="form-group">
			<label for="need">Email Address <span class="error-msg" style="font-size: 12px; color: #c73b0c; display:none;">(Email address is invalid!)</span></label>
			<input type="email" id="loginemail" class="form-control " placeholder="Enter email address">
	    </div>
        <div class="form-group">
			<label for="need">Password</label>
			<input type="password" id="password" class="form-control " placeholder="Enter password">
	    </div>
        <input type="hidden" id="page" value="<?php echo 'http://' . $_SERVER['HTTP_HOST'] .$_SERVER['REQUEST_URI']; ?>">
		<span>Don't have account? <a href="register.php">Create an account</a></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" onclick="window.location='it-takes-village.php';">Close</button>
        <button type="button" class="btn btn-primary" id="login">Login</button>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
	<div class="modal fade date-calandar" id="event-modal" tabindex="-1" role="dialog" id="addcalendar" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Add to Calendar</h4>
      </div>
      <div class="modal-body">
        <form name="save-event" method="post">
		<div class="col-md-12">
							<div class="form-group">
							<label for="need" class="wizard-form-text-label">Category</label>
							<select class="form-control" id="categories">
							<option selected disabled>--Select Category--</option>
							<option value="Meals">Meals </option>
							<option value="Yard Work">Yard Work </option>
							<option value="Child Support">Child Support </option>
							<option value="Visits">Visits </option>
							<option value="Errands">Errands </option>
							<option value="Service">Service </option>
							<option value="Other">Other</option>
							</select>
							</div>

							</div>
							<div class="col-md-12" style="margin-bottom: 20px">
							<div class="form-group">
							<label for="need" class="wizard-form-text-label">Needed</label>
								<input type="text" class="form-control " placeholder="Example: Dinner" id="need">
								<div class="wizard-form-error"></div>
							</div>
							</div>
							<div class="col-md-12">
							<label >Select Dates</label>
							</div>
							
							<div id="datetimepicker12" ></div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" id="save-event" class="btn btn-primary">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
		<!-- Top Header Section -->
		<?php 
		if(!empty($_SESSION['email'])){
		include('header.php') ?>
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
					<form action="start-jagvillage-service.php" method="post" role="form">
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
							
								<input type="email" class="form-control wizard-required" name="remail" id="email" />
								
								<label for="email" class="wizard-form-text-label">Recipent Email Address* <span class="error-msg">(Email address is invalid!)</span></label>
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
								<input type="text" class="form-control wizard-required" name="postal" id="zcode" maxlength="6">
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
								<a href="javascript:;" class="form-wizard-next-btn float-right disabled" id="next">Next</a>
							</div>
						</fieldset>	
						<fieldset class="wizard-fieldset">
							<h5>SELECT DATE ON CALENDER</h5>
							<!-- <button type="button" id="modal" class="btn btn-primary" data-toggle="modal" data-target="#addcalendar">Add to Calendar</button> -->
							<div id='calendar' style="margin-top: 30px; margin-bottom: 30px;"></div>
							
							<input type="hidden" id="datepicker_send" name="dates">
							<input type="hidden" id="category" name="category">
							<input type="hidden" id="needed" name="need">
							<div class="form-group clearfix">
								<a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
								<a href="javascript:;" class="form-wizard-next-btn float-right disabled" id="calendar_next">Next</a>
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
							<select class="form-control" name="time" required>
							<option value="">Preferred delivery time *</option>
							<option value="10am - 11am">10am - 11am</option>
							<option value="11am - 12pm">12am - 12pm</option>
							<option value="12pm - 1pm">12pm - 1pm</option>
							<option value="1pm - 2pm">1pm - 2pm</option>
							<option value="2pm - 3pm">2pm - 3pm</option>
							<option value="3pm - 4pm">3pm - 4pm</option>
							<option value="4pm - 5pm">4pm - 5pm</option>
							<option value="5pm - 6pm">5pm - 6pm</option>
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
					<li><a href="develop-by.php" align="center">&#64; 2020 Jag Village</a></li>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>  
		<script src="js/bootstrap.min.js"></script>
		
        <script src="js/jquery.bxslider.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.form-validator.min.js"></script>
        <script src="js/scrollreveal.min.js"></script>
		<script src="js/script.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.7.0/moment.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.min.js"></script>
		<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
        <script>
			$("#phone").inputmask({"mask": "+1 (999) 999-9999"});
			
			function isValidEmailAddress(emailAddress) {
				var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
				// alert( pattern.test(emailAddress) );
				var valid = pattern.test(emailAddress);
				if(!valid){
					$(".error-msg").css('display','inline');
				}else{
					$("#next").removeClass("disabled");
					$(".error-msg").css('display','none');
				}
			};
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
	jQuery(".form-control").parent().addClass("focus-input");
	// focus on input field check empty or not
	jQuery(".form-control").on('focus', function(){
		
			
		
	}).on('blur', function(){
		var tmpThis = jQuery(this).val();
		if(tmpThis == '' ) {
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
				startDate: new Date(),
  inline: true
            }).on('changeDate', showTestDate);
        });
		function showTestDate(){
  var value = $('#datetimepicker12').datepicker('getFormattedDate');
  $("#datepicker_send").val(value);
}

$(document).ready(function() {
	$("#next").click(function (e) {
    e.preventDefault();

    setTimeout(function () {
        $("#calendar").fullCalendar("render");
    }, 300); // Set enough time to wait until animation finishes;
	
});
$("#calendar_next").click(function(){

		if($("#datepicker_send").val() == ""){
			alert("Please select the date");
		}else{
			$(this).removeClass("disabled");
		}
	})
  $("#calendar").fullCalendar({
    header: {
      left: "prev,next today",
      right: "title"
    },

    navLinks: true, // can click day/week names to navigate views
    selectable: true,
    selectHelper: true,
    editable: true,
    eventLimit: true, // allow "more" link when too many events

    dayClick: function(date, jsEvent, view,start,end) {
		var check = moment(start).format('YYYY-MM-DD')
    var today = moment(new Date()).format('YYYY-MM-DD')
    if(check >= today){
      // Display the modal.
      // You could fill in the start and end fields based on the parameters
	//   var events = $('#calendar').fullCalendar('clientEvents');
    //     for (var i = 0; i < events.length; i++) {
    //         if (moment(start).isSame(moment(events[i].start))) {
    //             alert("You have already added an event");
    //             break;
    //         }
    //         else if (i == events.length - 1) {
    //             alert("not same");
    //         }
    //     }
      $(".date-calandar").modal("show");
      $(".date-calandar")
        .find("#need")
        .val("");
		$( "#datetimepicker12" ).datepicker( "setDate", moment(start).format("MM-DD-YYYY"));
	}else{
		alert("Date must be in the future");
	}
    },
        
    eventRender: function(event, element) {
      //dynamically prepend close button to event
      element
        .find(".fc-content")
        .prepend("<span class='closeon material-icons'>&#xe5cd;</span>");
      element.find(".closeon").on("click", function() {
        $("#calendar").fullCalendar("removeEvents", event._id);
      });
    },

    eventClick: function(calEvent, jsEvent) {
      // Display the modal and set event values.
      $(".date-calandar").modal("show");
      $(".date-calandar")
        .find("#title")
        .val(calEvent.title);
      $(".date-calandar")
        .find("#starts-at")
        .val(calEvent.start);
      $(".date-calandar")
        .find("#ends-at")
        .val(calEvent.end);
      $("#save-event").hide();
    }
  });

  // Bind the dates to datetimepicker.
	
  

  //click to save "save"
  $("#save-event").on("click", function(event) {
    var category = $("#categories").val(); 
    var need = $("#need").val(); 
	$("#needed").val(need);
	$("#category").val(category);
	var eventData;
	


    if (category) {
		var date = $("#datepicker_send").val();
		var str_array = date.split(',');
		for(var i = 0; i < str_array.length; i++) {
   // Trim the excess whitespace.
   str_array[i] = str_array[i].replace(/^\s*/, "").replace(/\s*$/, "");
   eventData = 
		  {
        title: category,
        start: moment(str_array[i]).format("YYYY-MM-DD"),
        end: moment(str_array[i]).format("YYYY-MM-DD"),
		  }
		  $("#calendar").fullCalendar("renderEvent", eventData, true); // stick? = true
}
$(".date-calandar")
      .find("input")
      .val("");
    // hide modal
    $(".date-calandar").modal("hide");
	if(date != ""){
	$("#calendar_next").removeClass('disabled');
	}
    }else{
		alert("Please Select Category");
	}
    // Clear modal inputs
    
  });
  
});
$("#email").change(function(){
				isValidEmailAddress($(this).val());
			})
		</script>
		<?php
        }else{
            ?>
        <!-- BEGIN SCRIPTS -->
        <script src="js/jquery-1.12.4.min.js"></script>  
		<script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.bxslider.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.form-validator.min.js"></script>
        <script src="js/scrollreveal.min.js"></script>
		<script src="js/script.js"></script>
        
        
            
            <script>
           $( window ).on( "load", function() {
            $(".login").modal("show");
    });
            
        $('#login').click(function(){
            var email = $("#loginemail").val();
            var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
				// alert( pattern.test(emailAddress) );
				var valid = pattern.test(email);
				if(!valid){
					$(".error-msg").css('display','inline');
				}else{
					var pass = $("#password").val();
					var page = $("#page").val();
                    $.ajax({
                    url:"login-modal.php",
                    type:"POST",
                    data:{login:1,email:email, pass:pass, page:page},
                    success:function(data)
                    {
                       $(".error").html(data); 
                    },
                    });
				}
            
        })   
            </script>
            <?php
        }
        ?>
        <!-- END SCRIPTS -->
	</body>


</html>
