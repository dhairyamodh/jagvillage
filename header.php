
<?php 

require('db.php');
?>
<section id="header">
			<div class="container">
				<div id="logo" class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
					<a href="index-2.php"><img src="images/logo.png" alt="Logo"/></a>
				</div>
				<div class="col-lg-9 col-md-8 col-sm-8 col-xs-6 top-navigation">
					<div class="navbar-header">
		                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mobilemenu">
		                    <span class="sr-only">Toggle navigation</span>
		                    <span class="icon-bar"></span>
		                    <span class="icon-bar"></span>
		                    <span class="icon-bar"></span>
		                </button>
                    </div>
                    <div class="collapse navbar-collapse yamm">
		                <ul class="nav navbar-nav">
			                <li class="<?php echo (basename($_SERVER['PHP_SELF']) == "index.php") ? "active" : ""; ?>">
			                    <a href="index.php">Home</a>
			                </li>
			                <li class="<?php echo (basename($_SERVER['PHP_SELF']) == "about.php") ? "active" : ""; ?>">
								<a href="about.php">About Us</a>
								
			                </li>
			                <li class="<?php echo (basename($_SERVER['PHP_SELF']) == "service.php") ? "active" : ""; ?>">
			                    <a href="service.php">Services</a>
			                </li>
			                <li class="<?php echo (basename($_SERVER['PHP_SELF']) == "it-takes-village.php") ? "active" : ""; ?>">
			                    <a href="it-takes-village.php">It takes a village</a>
							</li>
							<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "resources.php") ? "active" : ""; ?>">
			                    <a href="resources.php">Resources</a>
			                </li>
							<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "contact.php") ? "active" : ""; ?>">
			                    <a href="contact.php">Contact Us</a>
							</li>
							
                            <?php 
								//check user aleready logged in or not 
								

if(!empty($_SESSION['email'])){
	$email = $_SESSION['email'];
	$sql = "select * from user where user_email = '$email'";
                                        $run = mysqli_query($con,$sql);
                                        while($row=mysqli_fetch_array($run)){ 
											$fname = $row['user_fname'];
											$lname = $row['user_lname'];
										}
	
	echo '<li class="highlighted dropdown"><a href="#">'.$fname.' '.$lname.'</a>
    <div class="dropdown-content">
    <a href="user/index.php">My Dashboard</a>
    <a href="account.php">My Account</a>
    <a href="logout.php">Logout</a>
  </div>
  </li>'; }
else{
    echo '<li class="highlighted"><a href="login.php">Login</a></li>';
}
                                ?>
			                
		                </ul>
                    </div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="collapse" id="mobilemenu">
						<ul class="nav mobile-nav">
						<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "index.php") ? "active" : ""; ?>">
			                    <a href="index.php">Home</a>
			                </li>
			                <li class="<?php echo (basename($_SERVER['PHP_SELF']) == "about.php") ? "active" : ""; ?>">
								<a href="about.php">About Us</a>
								
			                </li>
			                <li class="<?php echo (basename($_SERVER['PHP_SELF']) == "service.php") ? "active" : ""; ?>">
			                    <a href="service.php">Services</a>
			                </li>
			                <li class="<?php echo (basename($_SERVER['PHP_SELF']) == "it-takes-village.php") ? "active" : ""; ?>">
			                    <a href="it-takes-village.php">It takes a village</a>
							</li>
							<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "resources.php") ? "active" : ""; ?>">
			                    <a href="resources.php">Resources</a>
			                </li>
							<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "contact.php") ? "active" : ""; ?>">
			                    <a href="contact.php">Contact Us</a>
							</li>
							<?php 
								//check user aleready logged in or not 
								

if(!empty($_SESSION['email'])){
	$email = $_SESSION['email'];
	$sql = "select * from user where user_email = '$email'";
                                        $run = mysqli_query($con,$sql);
                                        while($row=mysqli_fetch_array($run)){ 
											$fname = $row['user_fname'];
											$lname = $row['user_lname'];
										}
	
	echo '<li class="drop" style="display:flex; justify-content:center;align-items:center; padding:10px 15px; text-align:center; color:#000000">'.$fname.' '.$lname.'<i class="fa fa-caret-down" style="margin-left: 10px"></i></li>
	<li class="dropdowns hide"><a href="user/index.php">My Dashboard</a></li>
	<li class="dropdowns hide"><a href="account.php">My Account</a></li>
	<li class="dropdowns hide"><a href="logout.php">Logout</a></li>'; }
else{
    echo '<li class="highlighted"><a href="login.php">Login</a></li>';
}
                                ?>
		                </ul>
		            </div>
				</div>
			</div>
			<script src="js/jquery-1.12.4.min.js"></script>  
				<script>
					$(".drop").click(function(){
						if($('.dropdowns').hasClass('hide')){
							$('.dropdowns').addClass('show');
							$('.dropdowns').removeClass('hide');
							$(this).children().addClass('fa-caret-up');
							$(this).children().removeClass('fa-caret-down');
						}
						else{
						$('.dropdowns').addClass('hide');    
						$('.dropdowns').removeClass('show');
							$(this).children().removeClass('fa-caret-up');
							$(this).children().addClass('fa-caret-down');  
						}
					})
				</script>
		</section>