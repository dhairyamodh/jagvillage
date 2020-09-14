<?php
session_start();
//include database connection file
require('../db.php');

//check user aleready logged in or not 
if(empty($_SESSION['admin_email'])){
$msg= '';

//login logic start
  if (isset($_POST['login'])){
    // removes backslashes
$email = stripslashes($_POST['email']);
    //escapes special characters in a string
$email = mysqli_real_escape_string($con,$email);
$password = stripslashes($_POST['password']);
$password = mysqli_real_escape_string($con,$password);
//Checking is user existing in the database or not
    $query = "SELECT * FROM `admin` WHERE admin_email='$email'
and admin_password='".md5($password)."'";
$result = mysqli_query($con,$query) or die(mysql_error());
$rows = mysqli_num_rows($result);
    if($rows==1){
 $_SESSION['admin_email'] = $email;
        // Redirect user to index.php
 header("Location: index.php");
     }else{
$msg = '<label class="help-block form-error">Email or password is incorrect</lable>';
}
  }

?>
<!DOCTYPE html>
<html lang="zxx">
   
<head>
      <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="keyword" content="">
      <meta name="author"  content=""/>
      <!-- Page Title -->
      <title>Signin | Admin dashboard | jagvillage</title>
      <!-- Main CSS -->	  
      <link type="text/css" rel="stylesheet" href="assets/css/style.css"/>
      <!-- Favicon -->	
      <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn"t work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body>
      <!--================================-->
      <!-- Page Content Start -->
      <!--================================-->
      <div class="ht-100v text-center">
         <div class="row pd-0 mg-0">
            
            <div class="col-lg-12 bg-light">
               <div class="ht-100v d-flex align-items-center justify-content-center">
                  <div class="">
                     <h3 class="tx-dark mg-b-5 tx-left">Admin Login</h3>
                     <p class="tx-gray-500 tx-15 mg-b-40">Welcome back! Please signin to continue.</p>
                     <form action="login.php" method="post">
                     <div class="form-group tx-left">
                        <label class="tx-gray-500 mg-b-5">Email address</label>
                        <input type="email" class="form-control" name="email" placeholder="email@domain.com">
                     </div>
                     <div class="form-group">
                        <div class="d-flex justify-content-between mg-b-5">
                           <label class="tx-gray-500 mg-b-0">Password</label>
                        </div>
                        <input type="password" class="form-control" name="password" placeholder="Enter your password">
                     </div>
                     <button name="login" type="submit" class="btn btn-brand btn-block">Sign In</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--/ Page Content End -->
      <!-- jQuery  -->
      <script src="assets/plugins/jquery/jquery.min.js"></script>
      <script src="assets/plugins/bootstrap/bootstrap.bundle.min.html"></script>
      <script src="assets/plugins/feather-icon/feather.min.html"></script>
      <script src="assets/plugins/metisMenu/metisMenu.min.html"></script>
      <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>	  
      <!-- App JS -->
      <script src="assets/js/app.js"></script>
   </body>

</html>

<?php
}else{
  header('Location: index.php');
}
?>