<?php
require('db.php');
session_start();
 if(!empty($_SESSION['email'])){
?>
<!DOCTYPE html>
<html>
	
<head>
		<meta charset='utf-8'>
		<!-- Title -->
	    <title>It takes village - Jag Village</title>
	    <!-- Meta content -->
	    <meta content='Project' name='description'>
	    <meta content='Jag village' name='keywords'>
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

	<div class="modal fade" id="event-modal" tabindex="-1" role="dialog" id="email_send" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Invite Others</h4>
      </div>
      <div class="modal-body">
        <form action="#" method="post">
            <div class="error"></div>
			<?php 
				$key = $_GET['key'];
				$get_val = "select * from services where service_token='$key'";

				$run = mysqli_query($con,$get_val);

				$row = mysqli_fetch_array($run);

				$email = $_SESSION['email'];
				$sql = "select * from user where user_email = '$email'";
                                        $run1 = mysqli_query($con,$sql);
                                        while($row1=mysqli_fetch_array($run1)){ 
											$fname = $row1['user_fname'];
											$lname = $row1['user_lname'];
										}	
			
			?>
        <div class="form-group">
			<label for="need">To <span class="error-msg" style="font-size: 12px; color: #c73b0c; display:none;">(Email address is invalid!)</span></label>
			<input type="email" id="email" class="form-control " placeholder="Enter email address" >
	    </div>
        <div class="form-group">
			<label for="need">Subject</label>
			<input type="text" id="subject" class="form-control " placeholder="Enter subject" value="<?php echo $fname.' '.$lname; ?> has invited you to join Jagvillage Service for <?php echo $row['recipent_name'] ?>">
		</div>
		<div class="form-group">
			<label for="need">Message</label>
			<textarea class="form-control" name="" id="msg" cols="30" rows="10" placeholder="Enter message"><?php echo $fname.' '.$lname; ?>  invited you to join the J.A.G. Village “It takes a Village Service” for <?php echo $row['recipent_name'] ?>&#13;&#10;&#10;What is the J.A.G. Village "It takes a Village” service?&#13;&#10;&#10;When a person is grieving, we often ask them to reach out if they need something, anything at all, however, they rarely do.  When people are in pain instead of asking them to do more, we the Village (friends, colleagues, family) can reach in.  “It takes a Village” @jagvillage.com is an online platform that helps to organize the support required for everyday needs, both tangible and emotional, of those who are grieving.&#13;&#10;&#10;Helping Hands can begin healing hearts. Please use this link to sign up for a service that meets the unique needs of your person! &#13;&#10;&#10; Please share this email with other friends who may want to help.</textarea>
		</div>
		<div class="form-group">
			<label>CC</label><br>
			<input id="cc" type="checkbox" name="remainder" value="yes">
        	<label for="cc">Send me copy of this email</label>
	    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="send">Send</button>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
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
					<h2 class="dark-bg">Congratulations
                    </h2>
				</div>
				<div class="row">
									<div class="card col-md-12" style="border: 1px solid #1c1c1c; padding: 20px; border-radius: 10px; margin-">
					
					<div class="alert alert-success">Your Jagvillage Service is completed. Time to share!</div>
					
					<div class="card-body text-center">
                        <h6>Here is the unique link for your Jagvillage Service</h6>
                            
                        <input type="text" value="http://jagvillage.com/jagvillage-service.php?key=<?php echo $_GET['key']; ?>" style="width: 50%" id="link">
                        <button class="btn" onclick="myFunction()">Copy link</button>
                        <div id="msg_link" class="text-success text-center"></div>
                        <ul style="margin-top: 20px;">
                            <li>For easy invitations, simply copy & paste this link into an email.</li>
                            <li>TIP: You can always find this link right on your jagvillage</li>
                        </ul>
                        <h4>NEXT STEP: Invite Others</h4>
                        <button  class="btn btn-light email" target="_blank"><i class="fa fa-envelope" aria-hidden="true"></i> Email Invitations</button>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=http://jagvillage.com/jagvillage-service.php?key=<?php echo $_GET['key']; ?>&t=TITLE"
   class="btn btn-info" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i> Share on facebook</a>
                        <a href="https://api.whatsapp.com/send?phone=+1(647)671-4966&text=http://jagvillage.com/jagvillage-service.php?key=<?php echo $_GET['key']; ?>" class="btn btn-success" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i> Share on whatsapp</a>
                        <br>
                        <br>
                        <button onclick='window.location.href="http://jagvillage.com/jagvillage-service.php?key=<?php echo $_GET['key']; ?>"'class="btn btn-light" target="_blank"><i class="fa fa-external-link" aria-hidden="true"></i> View My Jagvillage Service</button>
					</div>
					</div>
					
										
				</div>
			
		</section>
		<!-- End Slider Section -->

		<!-- About Section -->


		
		<!-- End About Section -->

		<!-- Footer Section -->
		<section id="footer" class="dark" >
			<div class="container" >
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
        <script>
            function myFunction() {
  var copyText = document.getElementById("link");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  $('#msg_link').text("Link Copied");
}
$(document).ready(function(){
	$('.email').click(function(){
	$('.modal').modal('show');
})

$('#send').click(function(){
            var email = $("#email").val();
			var subject = $('#subject').val();
			var msg = $('#msg').val();
			var token = '<?php echo $_GET['key']; ?>';
			
			if($("#cc").prop("checked") == true){
                var cc = 'yes';
            }else{
				var cc = 'no';
			}
            var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
				// alert( pattern.test(emailAddress) );
				var valid = pattern.test(email);
				if(!valid){
					$(".error-msg").css('display','inline');
				}else{
					$(".error-msg").css('display','none');
                    $.ajax({
                    url:"login-modal.php",
                    type:"POST",
                    data:{send:1,email:email, subject:subject, msg:msg,cc:cc, token:token},
                    success:function(data)
                    {
                       $(".error").html(data); 
					   $("#email").val('');
					   if(data){
					        setTimeout(function(){ $('.modal').modal('hide'); $(".error").html('');
					   $("#cc").prop("checked") == false;}, 2000);
					   }
					  
					   
					   
                    },
                    });
				}
            
        })   

})

        </script>
        
        <!-- END SCRIPTS -->
	</body>


</html>
<?php
 }else {
	header("Location: login.php");
 }
?>

