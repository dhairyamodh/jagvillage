<?php
require('db.php');

if(isset($_POST['cancel'])){
    $key = $_POST['token'];
    $date = $_POST['date'];
    $id = $_POST['cate_id'];
    $delete = "delete from category_date where service_token='$key' and date='$date' and cate_id='$id'";
    $run = mysqli_query($con,$delete);
    
    if($run){
        
        $get_org_rec = "select * from services where service_token='$key'";
        
        $run_org_rec = mysqli_query($con,$get_org_rec);
        $row_org_rec = mysqli_fetch_array($run_org_rec);
        $rec_email = $row_org_rec['recipent_email'];
        $rec_name = $row_org_rec['recipent_name'];
        $org = $row_org_rec['user_id'];
        
        $get_org = "select * from user where user_id='$org'";
        $run_org = mysqli_query($con,$get_org);
        $row_org = mysqli_fetch_array($run_org);
        $org_email = $row_org['user_email'];
        $org_name = $row_org['use_fname'].' '.$row_org['user_lname'];
        
        $get_vol = "select * from volunteer where token='$key'";
        $run_vol = mysqli_query($con,$get_vol);
        $row_vol = mysqli_fetch_array($run_vol);
        $vol_email = $row_vol['vol_email'];
        $vol_fname = $row_vol['vol_fname'];
        $vol_lname = $row_vol['vol_lname'];
        
        
        
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
							<p>Hi '.$vol_fname.' '.$vol_lname.'</p>
							<h4>'.$rec_name.' cancelled the jagvillage service.</h4>
							
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

// 	if($mail->Send()){
// 	    echo $vol_email.','.$vol_fname.$vol_lname;
// 	} 
	$mail->Send();

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
							<p>Hi '.$rec_name.'</p>
							<h4>'.$rec_name.' cancelled the jagvillage service.</h4>
							
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
// if($mail_rec->Send()){
// 	 echo $rec_email.','.$rec_name;
// 	} 
    $mail_rec->Send(); 
	
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
						  <p>Hi '.$org_name.'</p>
						  <h5>'.$rec_name.' cancelled the jagvillage service.</h5>
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
// if($mail_org->Send()){
// 	echo $org_email.','.$org_name;
// 	} 
	$mail_org->Send(); 
        echo '<script>alert("Jagvillage Service Cancelled Successfully!");
        window.open("jagvillage-service.php?key='.$key.'","_self");
        </script>';
    }else{
        echo '<script>alert("Jagvillage Service not cancelled!");</script>';
    }

}

?>c