<?php

require('db.php');
?>
<section id="header">
	<div class="container">
		<div id="logo" class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
			<a href="index.php"><img src="images/logo.png" alt="Logo" /></a>
		</div>
		<div class="col-lg-10 col-md-10 col-sm-10 col-xs-6 top-navigation">
			<div class="navbar-header">
				<button type="button" data-toggle="collapse" data-target="#defaultmenu" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a href="#" class="navbar-brand"></a>
			</div><!-- end navbar-header -->
			<div class="collapse navbar-collapse yamm">
				<nav class="navbar w3_megamenu" role="navigation" style="min-height: 0; margin-bottom:0">


					<div class="navbar-collapse collapse">
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
							<!-- <li class="<?php echo (basename($_SERVER['PHP_SELF']) == "it-takes-village.php") ? "active" : ""; ?>">
                                <a href="it-takes-village.php">It takes a village</a>
                            </li> -->
							<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "it-takes-village.php") ? "active" : ""; ?> dropdown w3_megamenu-fw"><a href="it-takes-village.php" data-toggle="dropdown" class="dropdown-toggle">It takes a village<b class="caret"></b></a>
								<ul class="dropdown-menu fullwidth">
									<li class="w3_megamenu-content withdesc">
										<div class="row">
											<div class="col-sm-4">
												<h3 class="title">Meals</h3>
												<ul>
													<li><a href="meal-service.php">Breakfast</a></li>
													<li><a href="#">Lunch</a></li>
													<li><a href="#">Supper</a></li>
													<li><a href="#">Snacks</a></li>

												</ul>
											</div>
											<div class="col-sm-4">
												<h3 class="title">Child Care</h3>
												<ul>
													<li><a href="#">In their home</a></li>
													<li><a href="#">At your Home</a></li>
													<li><a href="#">Take them out for an activity</a></li>
													<li><a href="#">Help get child to school/sports</a></li>
												</ul>
											</div>
											<div class="col-sm-4">
												<h3 class="title">Visit</h3>
												<ul>
													<li><a href="#">Take friend out or stay in for a tea/coffee</a></li>
													<li><a href="#">Be someone your friend can call when they are sad</a></li>
													<li><a href="#">Go for a walk with your friend</a></li>
												</ul>
											</div>
											<div class="col-sm-4">
												<h3 class="title">Errands</h3>
												<ul>
													<li><a href="#">Groceries</a></li>
													<li><a href="#">Rides</a></li>
													<li><a href="#">Housework</a></li>
												</ul>
											</div>
											<div class="col-sm-4">
												<h3 class="title">Yard Work</h3>
												<ul>
													<li><a href="#">Gardening</a></li>
													<li><a href="#">Grass cutting</a></li>
													<li><a href="#">Clearing snow</a></li>
												</ul>
											</div>
											<div class="col-sm-4">
												<h3 class="title">Services</h3>
												<ul>
													<li><a href="#">Walking dog</a></li>
													<li><a href="#">Attending appointments</a></li>
												</ul>
											</div>
										</div>
									</li>
								</ul>
							</li>
							<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "resources.php") ? "active" : ""; ?>">
								<a href="resources.php">Resources</a>
							</li>
							<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "contact.php") ? "active" : ""; ?>">
								<a href="contact.php">Contact Us</a>
							</li>
							<?php
							//check user aleready logged in or not 


							if (!empty($_SESSION['email'])) {
								$email = $_SESSION['email'];
								$sql = "select * from user where user_email = '$email'";
								$run = mysqli_query($con, $sql);
								while ($row = mysqli_fetch_array($run)) {
									$fname = $row['user_fname'];
									$lname = $row['user_lname'];
								}

								echo '
                        <li class="dropdown"><a href="#" style="white-space: nowrap; width: 150px; overflow: hidden;text-overflow: ellipsis; " data-toggle="dropdown" class="dropdown-toggle">' . $fname . ' ' . $lname . ' <b class="caret"></b></a>
                                <ul class="dropdown-menu" role="menu">

                                    <li><a href="user/index.php">My Dashboard</a></li>
                                    <li><a href="account.php">My Account</a></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                        ';
							} else {
								echo '<li class="highlighted"><a href="login.php">Login</a></li>';
							}
							?>

							<!-- end dropdown w3_megamenu-fw -->
						</ul><!-- end nav navbar-nav -->
					</div><!-- end #navbar-collapse-1 -->

				</nav><!-- end navbar navbar-default w3_megamenu -->
			</div>
		</div>
	</div>
	<style>
		@media screen and (min-width: 768px) {
			.mobile {
				display: none;
			}
		}
	</style>
	<nav class="navbar w3_megamenu mobile" style="min-height: 0; margin-bottom:0">


		<div id="defaultmenu" class="navbar-collapse collapse">
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
				<!-- <li class="<?php echo (basename($_SERVER['PHP_SELF']) == "it-takes-village.php") ? "active" : ""; ?>">
                                <a href="it-takes-village.php">It takes a village</a>
                            </li> -->
				<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "it-takes-village.php") ? "active" : ""; ?> dropdown w3_megamenu-fw"><a href="it-takes-village.php" data-toggle="dropdown" class="dropdown-toggle">It takes a village<b class="caret"></b></a>
					<ul class="dropdown-menu fullwidth">
						<li class="w3_megamenu-content withdesc">
							<div class="row">
								<div class="col-sm-4">
									<h3 class="title">Meals</h3>
									<ul>
										<li><a href="#">Breakfast</a></li>
										<li><a href="#">Lunch</a></li>
										<li><a href="#">Supper</a></li>
										<li><a href="#">Snacks</a></li>

									</ul>
								</div>
								<div class="col-sm-4">
									<h3 class="title">Child Care</h3>
									<ul>
										<li><a href="#">In their home</a></li>
										<li><a href="#">At your Home</a></li>
										<li><a href="#">Take them out for an activity</a></li>
										<li><a href="#">Help get child to school/sports</a></li>
									</ul>
								</div>
								<div class="col-sm-4">
									<h3 class="title">Visit</h3>
									<ul>
										<li><a href="#">Take friend out or stay in for a tea/coffee</a></li>
										<li><a href="#">Be someone your friend can call when they are sad</a></li>
										<li><a href="#">Go for a walk with your friend</a></li>
									</ul>
								</div>
								<div class="col-sm-4">
									<h3 class="title">Errands</h3>
									<ul>
										<li><a href="#">Groceries</a></li>
										<li><a href="#">Rides</a></li>
										<li><a href="#">Housework</a></li>
									</ul>
								</div>
								<div class="col-sm-4">
									<h3 class="title">Yard Work</h3>
									<ul>
										<li><a href="#">Gardening</a></li>
										<li><a href="#">Grass cutting</a></li>
										<li><a href="#">Clearing snow</a></li>
									</ul>
								</div>
								<div class="col-sm-4">
									<h3 class="title">Services</h3>
									<ul>
										<li><a href="#">Walking dog</a></li>
										<li><a href="#">Attending appointments</a></li>
									</ul>
								</div>
							</div>
						</li>
					</ul>
				</li>
				<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "resources.php") ? "active" : ""; ?>">
					<a href="resources.php">Resources</a>
				</li>
				<li class="<?php echo (basename($_SERVER['PHP_SELF']) == "contact.php") ? "active" : ""; ?>">
					<a href="contact.php">Contact Us</a>
				</li>
				<?php
				//check user aleready logged in or not 


				if (!empty($_SESSION['email'])) {
					$email = $_SESSION['email'];
					$sql = "select * from user where user_email = '$email'";
					$run = mysqli_query($con, $sql);
					while ($row = mysqli_fetch_array($run)) {
						$fname = $row['user_fname'];
						$lname = $row['user_lname'];
					}

					echo '
                        <li class="dropdown"><a href="#" style="white-space: nowrap; width: 100%; overflow: hidden;text-overflow: ellipsis; " data-toggle="dropdown" class="dropdown-toggle">' . $fname . ' ' . $lname . ' <b class="caret"></b></a>
                                <ul class="dropdown-menu" role="menu">

                                    <li><a href="user/index.php">My Dashboard</a></li>
                                    <li><a href="account.php">My Account</a></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                        ';
				} else {
					echo '<li class="highlighted"><a href="login.php">Login</a></li>';
				}
				?>

				<!-- end dropdown w3_megamenu-fw -->
			</ul><!-- end nav navbar-nav -->


		</div>
	</nav>

</section>