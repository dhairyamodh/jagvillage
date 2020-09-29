<?php
 session_start();
?>
<!DOCTYPE html>
<html>
	
<head>
		<meta charset='utf-8'>
		<!-- Title -->
	    <title>Volunteer to help - Jag Village</title>
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
			<input type="email" id="email" class="form-control " placeholder="Enter email address">
	    </div>
        <div class="form-group">
			<label for="need">Password</label>
			<input type="password" id="password" class="form-control " placeholder="Enter password">
	    </div>
		<span>Don't have account? <a href="register.php">Create an account</a></span>

        <input type="hidden" id="page" value="<?php echo 'http://' . $_SERVER['HTTP_HOST'] .$_SERVER['REQUEST_URI']; ?>">
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


		<!-- Top Header Section -->
        <?php 
        if(!empty($_SESSION['email'])){
           
        include('header.php');
        
        if(isset($_GET['id'])) {
			$id = $_GET['id'];
			$get_cate = "select * from category_date where cate_id='$id'";
			$data_cate = mysqli_query($con,$get_cate);
			$row_cate = mysqli_fetch_array($data_cate);
			$key = $row_cate['service_token'];
			$date = $row_cate['date'];
			$time = $row_cate['time'];
			$service = $row_cate['category'];
			
            $get_data = "select * from services where service_token='$key'";
            $data_run = mysqli_query($con,$get_data);
    
            $row_data = mysqli_fetch_array($data_run);
            
            $org_id = $row_data['user_id'];

			$get_org = "select * from user where user_id='$org_id'";
			$run_org = mysqli_query($con,$get_org);
			$row_org = mysqli_fetch_array($run_org);
            if(isset($_POST['volunteer'])){
                $date = $_POST['date'];
                $volunteer = $_POST['vol'];
                
                    $fname1 = $fname;
                    $lname1 = $lname;
                    $email1 = $email;
					$vol_email = $email;
                $meal = $_POST['meal'];
                $notes = $_POST['notes'];
                $remainder = $_POST['remainder'];
                $rec_email = $row_data['recipent_email'];
                $org_email = $row_org['user_email'] ;
                
                $volunteer_add = "update volunteer set meal='$meal', notes='$notes', remainder_email='$remainder' where date='$date' and token='$key' and cate_id='$id'";
                $run_change = mysqli_query($con,$volunteer_add);
                if($run_change){
                    
                    require 'phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;
    $mail->Host = 'mail.jagvillage.com';     //Sets the SMTP hosts of your Email hosting, this for Godaddy
    $mail->Port = 993;                              //Sets the default SMTP server port
    $mail->SMTPAuth = true;                         //Sets SMTP authentication. Utilizes the Username and Password variables
    $mail->SMTPSecure = 'ssl';
    $mail->Username = 'info@jagvillage.com';                  //Sets SMTP username
    $mail->Password = 'jagvillage';                        //Sets connection prefix. Options are "", "ssl" or "tls"
    $mail->setFrom('info@jagvillage.com', 'Jagvillage'); //Sets the From name of the message
    $mail->addAddress($vol_email);      //Adds a "To" address
    $mail->addReplyTo('info@jagvillage.com', 'Jagvillage'); //Adds a "Cc" address
    //Sets word wrapping on the body of the message to a given number of characters
    $mail->isHTML(true);                            //Sets message type to HTML
    $mail->Subject = 'Jagvillage Service';       //An HTML or plain text message body
	$mail->Body = '<!doctype html>
	<html>
	  <head>
		<meta name="viewport" content="width=device-width" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
                          <img src="http://jagvillage.com/images/logo.png" /></center>
							<p>Hi '.$fname.' '.$lname.'</p>
							<h5>
							You made changes in jagvillage services 
							<br>
							New date is '.date('l', strtotime($date)).', '.date('F j Y', strtotime($date)).' Time is:'.$time.' Service name is:'.$service.'.
							<br><br>
							jagvillage.com is an online platform that helps to organize the support required for everyday needs, both tangible and emotional, of those who are grieving.<br><br>
							Please share this email with othes.
							To make changes, read volunteer instructions or view a map, use the following button:</h5>
							<h5>You can view the Jagvillage Service by clicking the following button.</h5>
							<table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
							  <tbody>
								<tr>
								  <td align="left">
									<table border="0" cellpadding="0" cellspacing="0">
									  <tbody>
										<tr>
										  <td> <a href="http://jagvillage.com/jagvillage-service.php?key='.$key.'&date='.$date.'" target="_blank">Open the Jagvillage</a> </td>
										</tr>
									  </tbody>
									</table>
								  </td>
								</tr>
							  </tbody>
							</table>
							<p>This message was sent by '.$row_org["user_fname"].' '.$row_org["user_lname"].'. To respond, simply reply to this message.</p>
		  
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
					  <td class="content-block powered-by">
						<a href="http://jagvillage.com">Jagvillage</a>.
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

	if($mail->Send()){
		// echo $vol_email;
	} 
	
	$mail_rec = new PHPMailer;
	$mail_rec->Host = 'mail.jagvillage.com';     //Sets the SMTP hosts of your Email hosting, this for Godaddy
    $mail_rec->Port = 993;                              //Sets the default SMTP server port
    $mail_rec->SMTPAuth = true;                         //Sets SMTP authentication. Utilizes the Username and Password variables
    $mail_rec->SMTPSecure = 'ssl';
    $mail_rec->Username = 'info@jagvillage.com';                  //Sets SMTP username
    $mail_rec->Password = 'jagvillage';                        //Sets connection prefix. Options are "", "ssl" or "tls"
    $mail_rec->setFrom('info@jagvillage.com', 'Jagvillage'); //Sets the From name of the message
    $mail_rec->addAddress($rec_email);      //Adds a "To" address
    $mail_rec->addReplyTo('info@jagvillage.com', 'Jagvillage'); //Adds a "Cc" address
    //Sets word wrapping on the body of the message to a given number of characters
    $mail_rec->isHTML(true);                            //Sets message type to HTML
    $mail_rec->Subject = 'Jagvillage Service';       //An HTML or plain text message body
	$mail_rec->Body = '<!doctype html>
	<html>
	  <head>
		<meta name="viewport" content="width=device-width" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		
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
                          <img src="http://jagvillage.com/images/logo.png" /></center>
							<p>Hi '.$rec_email.'</p>
							<h5>'.$fname.' '.$lname.'. made changes to jagvillage services '.$row_data['recipent_name'].' on '.date('l', strtotime($date)).', '.date('F j Y', strtotime($date)).' Time is:'.$time.' Service name is:'.$service.'.</h5>

							<h5>You can view Jagvillage Service by clicking the following button.</h5>
							
							<table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
							  <tbody>
								<tr>
								  <td align="left">
									<table border="0" cellpadding="0" cellspacing="0">
									  <tbody>
										<tr>
                                          <td> <a href="http://jagvillage.com/jagvillage-service.php?key='.$key.'" target="_blank">View</a> </td>
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
					  <td class="content-block powered-by">
						<a href="http://jagvillage.com">Jagvillage</a>.
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

    if($mail_rec->Send()){
		// echo $rec_email;
	} 
	
	$mail_org = new PHPMailer;
	$mail_org->Host = 'mail.jagvillage.com';     //Sets the SMTP hosts of your Email hosting, this for Godaddy
    $mail_org->Port = 993;                              //Sets the default SMTP server port
    $mail_org->SMTPAuth = true;                         //Sets SMTP authentication. Utilizes the Username and Password variables
    $mail_org->SMTPSecure = 'ssl';
    $mail_org->Username = 'info@jagvillage.com';                  //Sets SMTP username
    $mail_org->Password = 'jagvillage';                        //Sets connection prefix. Options are "", "ssl" or "tls"
    $mail_org->setFrom('info@jagvillage.com', 'Jagvillage'); //Sets the From name of the message
    $mail_org->addAddress($org_email);      //Adds a "To" address
    $mail_org->addReplyTo('info@jagvillage.com', 'Jagvillage'); //Adds a "Cc" address
    //Sets word wrapping on the body of the message to a given number of characters
    $mail_org->isHTML(true);                            //Sets message type to HTML
    $mail_org->Subject = 'Jagvillage Service';       //An HTML or plain text message body
	$mail_org->Body = '<!doctype html>
	<html>
	  <head>
		<meta name="viewport" content="width=device-width" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		
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
                          <img src="http://jagvillage.com/images/logo.png" /></center>
						  <p>Hi '.$org_email.'</p>
						  <h5>'.$fname.' '.$lname.'. made changes in jagvillage services '.$row_data['recipent_name'].' on '.date('l', strtotime($date)).', '.date('F j Y', strtotime($date)).' Time is:'.$time.' Service name is:'.$service.'.</h5>  

						  <h5>You can view Jagvillage Service by clicking the following button.</h5>

							<table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
							  <tbody>
								<tr>
								  <td align="left">
									<table border="0" cellpadding="0" cellspacing="0">
									  <tbody>
										<tr>
										  <td> <a href="http://jagvillage.com/jagvillage-service.php?key='.$key.'" target="_blank">View</a> </td>
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
					  <td class="content-block powered-by">
						<a href="http://jagvillage.com">Jagvillage</a>.
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

	if($mail_org->Send()){
		// echo $org_email;
	}
                    echo '<script>window.open("confirm.php?key='.$key.'","_self");</script>';   

                }
                 echo '<script>window.open("confirm.php?key='.$key.'","_self");</script>';   
            }
        ?>
        <div class="modal fade cancel" id="event-modal" tabindex="-1" role="dialog" id="addcalendar" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Confirm</h4>
      </div>
      <div class="modal-body">
        <form action="delete-vol.php" method="post">
        <div class="form-group">
        <p><b>The scheduled participant will be cancelled. this item will become available for others to book.</b></p>
        <h6 id="date"></h6>
			<label for="need">The reciepent will be notified of the cancellation. To include personal message, enter it below.</label>
            <textarea name="note" class="form-control" id="" cols="30" rows="10"></textarea>
	    </div>
      </div>
      <input type="hidden" name="token" value="<?php echo $key; ?>">
      <input type="hidden" name="date" value="<?php echo $date; ?>">
       <input type="hidden" name="cate_id" value="<?php echo $_GET['id']; ?>">
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger" name="cancel">Cancel Booking</button>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
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
					<h2 class="dark-bg">Volunteer
                    </h2>
                    
				</div>
				<div class="row">
                <div class="col-md-12">
                <div class="panel panel-default" style="border: 1px solid #159397;">
                    <div class="panel-body">
                    <h5 style="color:#159397">Jagvillage Service for</h5>
                    <h2><?php echo $row_data['recipent_name'];?> </h2>
                    </div>
                    
                    </div>
                </div>
                <div class="card col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                    <strong>Preferred delivery time</strong>
                    <?php 
						$get_time = "select * from category_date where service_token='$key' and date = '$date'";
						$run_time = mysqli_query($con,$get_time);
						$row_time = mysqli_fetch_array($run_time);
					?>
                    <p><?php echo ($row_time['time'] != "") ? $row_time['time'] : "Not specified";?></p>
                    <strong>Special Instructions</strong>
                    <p><?php echo ($row_data['instuction'] != "") ? $row_data['instuction'] : "Not specified";?></p>
                    <strong>Comments</strong>
                    <p><?php echo ($row_data['allergies'] != "") ? $row_data['allergies'] : "Not specified";?></p>
                    
                        </div>
                    
                    </div>
                </div>
									<div class="col-md-9">
					
                                    <div class="panel panel-default">
                    <div class="panel-body">
                    <div class="section-body">
					<div class="alert alert-info">Please enter a service description and any notes.</div>
				    <div class="row">
                        <?php 
                            $check = "select * from volunteer where token='$key' and date='$date' and cate_id='$id'";
                            $c_run = mysqli_query($con,$check);
                            $c_row = mysqli_fetch_array($c_run);
                        ?>
					    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 sendmessage">
					    	<!-- Start contact form -->
					    	<form class="cmxform" action="change-volunteer.php?id=<?php echo $id; ?>" method="post">
					    		<label for="date">Date</label>
					    		<input id="date" type="text" name="date" value="<?php echo $date; ?>" readonly>
					    		<label for="vol">Volunteer</label>
					    		<input id="date" type="text" name="vol_email" value="<?php echo $c_row['vol_email']; ?>" readonly>
                                <label for="meal">Jagvillage Service</label>
					    		<input id="meal" type="text" name="meal" value="<?php echo $c_row['meal']; ?>">
                                <label for="notes">Notes</label>
					    		<input id="notes" type="text" name="notes" placeholder="Optional" value="<?php echo $c_row['notes']; ?>">
                                <label>Reminder Email</label><br>
					    		<input id="check" type="checkbox" name="remainder" placeholder="Optional" value="yes" <?php if($c_row['remainder_email'] == "yes"){ echo 'checked';} ?>>
                                <label for="check">One day before</label>
								<br>
                                <input type="hidden" name="token" value="<?php echo $key; ?>">
                                <button class="btn btn-danger cancel-booking" date="<?php echo $date; ?>"  type="button" name="cancel"><i class="fa fa-close"></i> Cancel Booking</button>
                                <button class="btn btn-primary" type="submit" name="volunteer"><i class="fa fa-check"></i> Save Changes</button>
                                </form>
					    	<div id="contactemailsendresponse" class="emailsendresponse"></div>
					    	<!-- End Contact form -->
					    </div>
				    </div>
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
					<li><a href="develop-by.php" align="center">Copyright 2020 &#64; Design & Develop By Jag Village</a></li>
					<li><a href="terms-of-use.php" align="center"> Privacy Policy</a></li>
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
        <script>
            $(document).ready(function(){
                $('#vol').change(function(){
                    var val = $(this).children("option:selected").val();
                    if(val == "new"){
                        $('#show').css('display','block');
                    }else{
                        $('#show').css('display','none');
                    }
                })
                $('.cancel-booking').click(function(){
                    var date = $(this).attr('date');
                    $('#date').text(date);
                    $('.cancel').modal('show');
                })
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
            function myFunction() {
  var copyText = document.getElementById("link");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  $('#msg').text("Link Copied");
}
        </script>
        
            
            <script>
           $( window ).on( "load", function() {
            $(".login").modal("show");
    });
            
        $('#login').click(function(){
            var email = $("#email").val();
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


