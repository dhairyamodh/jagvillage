<?php
 session_start();
require('db.php');

 
?>
<!DOCTYPE html>
<html>
	
<head>
		<meta charset='utf-8'>
		<!-- Title -->
        <?php if(isset($_GET['key'])) {
            $key = $_GET['key'];
            $get_data = "select * from services where service_token='$key'";
            $data_run = mysqli_query($con,$get_data);

            $row_data = mysqli_fetch_array($data_run);
        }
         ?>
	    <title>Meal for <?php echo $row_data['recipent_name'];?> - Jag Village</title>
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
		<link rel="stylesheet" href="https://cdn.plyr.io/3.4.6/plyr.css">
		
	</head>
	<body>


    <div class="modal fade email_send" id="event-modal" tabindex="-1" role="dialog" id="email_send" aria-labelledby="myModalLabel" aria-hidden="true">
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
			<input type="email" id="email1" class="form-control " placeholder="Enter email address" >
	    </div>
        <div class="form-group">
			<label for="need">Subject</label>
			<input type="text" id="subject" class="form-control " placeholder="Enter subject" value="<?php echo $fname.' '.$lname; ?> has invited you to join Jagvillage Service for <?php echo $row['recipent_name'] ?>">
		</div>
		<div class="form-group">
			<label for="need">Message</label>
			<textarea class="form-control" name="" id="msg" cols="30" rows="10" placeholder="Enter message"><?php echo $fname.' '.$lname; ?> has invited you to join Jagvillage Service for <?php echo $row['recipent_name'] ?>&#13;&#10;&#10;What is a jagvillage?&#13;&#10;When a friend is in need, everyonr asks "What can i do to help?" The answer is always to provide support through a meal, When many friends provide support through meal, This is Jagvillage.&#13;&#10;&#10;jagvillage.com us a free meal calendar tool that makes planning among a wide group easy and less stressful.&#13;&#10;&#10;Please share this email with othes.</textarea>
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

    <div class="modal fade login" id="event-modal" tabindex="-1" role="dialog" id="login" aria-labelledby="myModalLabel" aria-hidden="true">
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
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="login">Login</button>
        </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade cancel" id="event-modal" tabindex="-1" role="dialog" id="addcalendar" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Confirm</h4>
      </div>
      <div class="modal-body">
        <form action="cancel-jagvillage-service.php" method="post">
       
        <p><b>The scheduled participant will be cancelled. this item will become available for others to book.</b></p>
        
      </div>
      <input type="hidden" name="token" value="<?php echo $_GET['key']; ?>">
      <input type="hidden" name="date" id="date" value="<?php echo $_GET['date']; ?>">
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger" name="cancel">Cancel Services</button>
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
				<!-- <div class="section-title">					
					<h2 class="dark-bg">Congratulations
                    </h2>
				</div> -->
				<div class="row">
                <div class="col-md-12">
                <div class="panel panel-default" style="border: 1px solid #159397;">
                    <div class="panel-body">
                    <h5 style="color:#159397">Jagvillage Service for</h5>
                    <h2><?php echo $row_data['recipent_name'];?></h2>
                    </div>
                    
                    </div>
                </div>
                <div class="card col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                    <strong>Organizer</strong>
                    <div style="color: #159397">
                    <?php
                    $id = $row_data['user_id'];
                        $get_org = "select * from user where user_id='$id'";
                        $row_org = mysqli_fetch_array(mysqli_query($con,$get_org));

                        echo $row_org['user_fname'].' '.$row_org['user_lname'];
                    ?>
                    </div>
                    <hr>
                    <strong>Recipient</strong>
                    <div style="color: #159397"><?php echo $row_data['recipent_name'];?></div>
                    <hr>
                    <input type="text" class="form-control" value="http://test.jagvillage.com/jagvillage-service.php?key=<?php echo $_GET['key']; ?>" style="width: 100%; margin-bottom: 10px;">
                        <button class="btn btn-light btn-block email" target="_blank"><i class="fa fa-envelope" aria-hidden="true"></i> Invitations</button>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=http://test.jagvillage.com/jagvillage-service.php?key=<?php echo $_GET['key']; ?>&t=TITLE" class="btn btn-info btn-block" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i> Share</a>
                        <a href="https://api.whatsapp.com/send?phone=+1(647)671-4966&text=http://test.jagvillage.com/jagvillage-service.php?key=<?php echo $_GET['key']; ?>" class="btn btn-success btn-block" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i> Share</a>
                        </div>
                    
                    </div>
                </div>
									<div class="col-md-8">
					
                                    <div class="panel panel-default">
                    <div class="panel-body">
                         <div class="col-md-4">
                         <strong>Location</strong><br>
                         <?php echo ($row_data['recipent_address'] != "") ? $row_data['recipent_address'] : "Not specified"; ?>,<br>
                         <?php echo ($row_data['recipent_city'] != "") ? $row_data['recipent_city'] : "Not specified";?>,<br>
                         <?php echo ($row_data['recipent_state'] != "") ? $row_data['recipent_state'] : "Not specified";?>,<br>
                         <?php echo ($row_data['recipent_postal'] != "") ? $row_data['recipent_postal'] : "Not specified";?><br>
                         <a href="https://maps.google.com/maps?f=q&hl=en&q=<?php echo $row_data['recipent_address'].'+'.$row_data['recipent_city'].'+'.$row_data['recipent_state'].'+'.$row_data['recipent_postal'];?>"><i class="fa fa-map-marker" aria-hidden="true"></i> Map</a>
                         </div>
                         <div class="col-md-4">
                         
                         <strong>Special Instructions</strong>
                         <p><?php echo ($row_data['instuction'] != "") ? $row_data['instuction'] : "Not specified";?></p>
                         </div>
                         <div class="col-md-4">
                         <strong>Comments</strong>
                         <p><?php echo ($row_data['allergies'] != "") ? $row_data['allergies'] : "Not specified";?></p>
                         
                         </div>
					</div>
					</div>
                    <h6>Calendar</h6>
                    <div class="panel panel-default">
                    <div class="panel-body">
                    <div>
                    <?php 
                    $today = date("m/d/Y");
                    $get_cate = "select * from category_date where service_token='$key'";
                    $run_cate = mysqli_query($con,$get_cate);
                    while($row_cate = mysqli_fetch_array($run_cate)){
                            $date = $row_cate['date'];
                    ?>
        <div class="row"><div class="col-sm-3 col-xs-4 text-center"><h6><?php echo date('F j Y', strtotime($row_cate['date'])); ?></h6><?php echo date('l', strtotime($row_cate['date'])); ?>, <?php echo $row_cate['time'] ?></div>
        <div class="col-sm-2 col-xs-8">
        <strong><?php echo $row_cate['category'] ?></strong>
        </div>
        <div class="col-sm-3 col-xs-8">
        <?php 
        $check = "select * from volunteer where token='$key' and date='$date'";
        $c_run = mysqli_query($con,$check);
        $c_row = mysqli_fetch_array($c_run);

        $r_email = "select * from services where service_token='$key'";
        $r_run = mysqli_query($con,$r_email);
        $r_row = mysqli_fetch_array($r_run);

        if($r_row['recipent_email'] == $email){ ?>
        
        <span class="visible-xs-inline"></span></div><div class="col-sm-4 col-sm-offset-0 col-xs-offset-4 col-xs-8"><a class="btn btn-primary btn-block cancel_meal" date="<?php echo $row_cate['date']; ?>">Cancel Service</a></div></div>
        <?php }elseif(!empty($c_row['vol_email']) && $c_row['vol_email'] == $email) {  ?>
        
        <strong class="text-danger">Already been volunteered</strong>
        <span class="visible-xs-inline"></span></div><div class="col-sm-4 col-sm-offset-0 col-xs-offset-4 col-xs-8"><a class="btn btn-secondary btn-block" href="change-volunteer.php?id=<?php echo $row_cate['cate_id']; ?>">Make Changes</a></div></div>
        <?php }else{ ?>
            <a class="text-success" href="volunteer.php?id=<?php echo $row_cate['cate_id']; ?>">
        <strong>This date is available</strong>
        <span class="visible-xs-inline"></span></div><div class="col-sm-4 col-sm-offset-0 col-xs-offset-4 col-xs-8"><a class="btn btn-primary btn-block" href="volunteer.php?id=<?php echo $row_cate['cate_id']; ?>">Volunteer for this</a></div></div>
        </a>
        <?php } ?>
                        <?php } ?>
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
		<section id="footer" class="dark" >
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

$(document).ready(function(){
	$('.email').click(function(){
	$('.email_send').modal('show');
})

$('.cancel_meal').click(function(){
    var date = $(this).attr('date');
    $('#date').val(date);
	$('.cancel').modal('show');
})

$('#send').click(function(){
            var email = $("#email1").val();
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

});
        </script>
		<!-- End Page Preloading -->
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
<?php
//  }else {
// 	header("Location: login.php");
//  }
?>

