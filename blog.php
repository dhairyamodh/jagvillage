<?php
session_start();
require('db.php');

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
	<style>
		label {
			color: #159397;
			font-weight: 700;
			font-size: 1.1em;
		}

		.btn-reply {
			font-size: 0.95em;
			padding: 0;
			color: #159397;
			margin: 0px 20px 0px 0px;
		}

		.reply,
		.view-reply,
		.hide-reply {
			font-size: 0.95em;
			padding: 0;
			border: none;
			background-color: #fff;
			color: #159397;
			padding-left: 5px;
		}

		.panel {
			border: none;
			box-shadow: none;
		}

		.reply-hr {
			margin: 10px;
			width: 100%;
			height: 0.05em;
			background-color: #159397;
		}

		.btns {
			display: flex;
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
			<ul class="owl-carousel top_slider">
				<li class="style-1" style="background-image: url(images/slides/all-page-slider.png);">
					<div class="contentwrap">
						<div class="container">
							<div class="content">
								<div class="slideheadingwrap">
									<!--h2>Blog</h2 -->
								</div>

							</div>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</section>
	<!-- End Slider Section -->
	<?php

	$id = $_GET['blog_id'];
	?>
	<?php

	$sql = "select * from blog where blog_id='$id'";
	$run = mysqli_query($con, $sql);
	if (mysqli_num_rows($run)) {
		$i = 0;
		while ($row = mysqli_fetch_array($run)) {
			$title = $row['blog_title'];
			$img = $row['blog_img'];
			$desc = $row['blog_desc'];
		}
	?>
		<section id="contacts">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center" style="margin-bottom: 20px;">
						<h2 class="h2" style="border-bottom: 2px solid #159397; padding-bottom: 20px;"><?php echo $title; ?></h2>
					</div>
					<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12" style="margin-bottom:20px;">

						<img src="admin/upload/blog/<?php echo $img; ?>" alt="" style="object-fit:cover; width:100%; border:3px solid #159397; border-radius: 10px;">
					</div>
					<div class="col-lg-7">

						<p style="text-align:justify; font-weight: 600;"><?php echo $desc; ?></p>

					</div>
					<?php
					if (!empty($_SESSION['email'])) {

					?>
						<div class="card col-md-12" style="margin-top:20px;">
							<div class="panel panel-default">
								<div class="panel-body">
									<p style="color: #159397; font-size:20px; font-weight:600">Leave a Comment</p>
									<hr>
									<form class="cmxform" method="post" id="comment_form">
										<!-- <label for="fname">Name</label>
										<input id="fname" placeholder="Enter Name" type="text" name="comment_name" id="comment_name" required> -->
										<input type="hidden" name="comment_name" id="comment_name" value="<?php echo $user_id ?>">
										<!-- <div class="form-group">
									<input type="text" name="comment_name" id="comment_name" class="form-control" placeholder="Enter Name" />
								</div> -->
										<label for="fname">Comment</label>
										<textarea name="comment_content" id="comment_content" placeholder="Enter Comment" rows="5"></textarea>
										<!-- <div class="form-group">
									<textarea name="comment_content" id="comment_content" class="form-control" placeholder="Enter Comment" rows="5"></textarea>
								</div> -->
										<input type="hidden" name="comment_id" id="comment_id" value="0" />
										<input type="hidden" name="blog_id" id="blog_id" value="<?php echo $id ?>" />
										<button class="btn btn-primary" name="submit" id="submit" type="submit">Submit</button><br>
									</form>

									<span id="comment_message"></span>
									<div id="display_comment"></div>

								</div>

							</div>
						</div>
					<?php } ?>
				</div>
			</div>


			</div>

			</div>

		</section>
	<?php
	} else {
		echo '<section id="contacts">
		<div class="container"><h2 class="text-danger text-center">No blog available</h2></div></section>';
	}
	?>

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

	</script>
	<script>
		$(document).ready(function() {

			$('#comment_form').on('submit', function(event) {
				event.preventDefault();
				var form_data = $(this).serialize();
				$.ajax({
					url: "add_comment.php",
					method: "POST",
					data: form_data,
					dataType: "JSON",
					success: function(data) {
						if (data.error != '') {
							$('#comment_form')[0].reset();
							$('#comment_message').html(data.error);
							$('#comment_id').val('0');
							load_comment();
						}
					}
				})
			});

			load_comment();

			function load_comment() {
				var id = $("#blog_id").val();
				$.ajax({
					url: "fetch_comment.php",
					method: "POST",
					data: {
						view_comment: 1,
						id: id
					},
					success: function(data) {
						$('#display_comment').html(data);
					}
				})
			}

			function view_replies(comment_id) {
				$.ajax({
					url: "fetch_comment.php",
					method: "POST",
					data: {
						view_reply: 1,
						comment_id: comment_id
					},
					success: function(data) {
						$('.view-replies' + comment_id).html(data);

					}
				})
			}

			$(document).on('click', '.reply', function() {
				var comment_id = $(this).attr("id");
				$('#comment_id').val(comment_id);
				$('#comment_content').focus();
			});

			$(document).on('click', '.view-reply', function() {
				var comment_id = $(this).attr("id");
				var id = $("#blog_id").val();
				$(this).text('Hide Replies');
				$(this).removeClass('view-reply');
				$(this).addClass('hide-reply');
				$(this).prev().removeClass('fa-chevron-down')
				$(this).prev().addClass('fa-chevron-up')

				view_replies(comment_id)
			});

			$(document).on('click', '.hide-reply', function() {
				$(this).parent().parent().parent().siblings('.replies').html('');
				$(this).text('View Replies');
				$(this).addClass('view-reply');
				$(this).removeClass('hide-reply');
				$(this).prev().removeClass('fa-chevron-up')
				$(this).prev().addClass('fa-chevron-down')
			});

		});
	</script>
	<!-- END SCRIPTS -->
</body>


</html>