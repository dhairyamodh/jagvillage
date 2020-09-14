<!DOCTYPE html>

<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="ThemeStarz">

    <link href="assets/fonts/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="assets/fonts/elegant-fonts.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700,900" rel="stylesheet">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="assets/css/trackpad-scroll-emulator.css" type="text/css">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">

    <title>Soon</title>

</head>

<body class=" frame">

<div id="outer-wrapper" class="animate translate-z-in">
    <div id="inner-wrapper">
        <div id="table-wrapper" class="center">
            <div class="container">
                <div id="row-header">
                    <header><a href="#" id="brand" class="animate animate fade-in animation-time-3s"><img src="assets/img/logo.png" alt=""></a></header>
                </div>
                <!--end row-header-->
                <div id="row-content">
                    <div id="content-wrapper">
                        <div id="content" class="animate translate-z-in animation-time-2s delay-03s">
                            <h1>Coming Soon!</h1>
                            <h2 class="opacity-70">We are working hard to bring you new experience</h2>
                            
                             <a href="index.php" class="btn btn-secondary">Home</a> <a href="about.php" class="btn btn-secondary">About Us</a> <a href="service.php" class="btn btn-secondary">Services</a> <a href="contact.php" class="btn btn-secondary">Contact</a>
                           
                        </div>
                        <!--end content-->
                    </div>
                    <!--end content-wrapper-->
                </div>
                <!--end row-content-->
                <div id="row-footer">
                    
                </div>
                <!--end row-footer-->
            </div>
            <!--end container-->
        </div>
        <!--end table-wrapper-->
        <div class="background-wrapper has-vignette">
            <div id="particles-js"></div>
            <div class="bg-transfer opacity-70"><img src="assets/img/background-16.jpg" alt=""></div>
        </div>
        <!--end background-wrapper-->
    </div>
    <!--end inner-wrapper-->
</div>
<!--end outer-wrapper-->


<script type="text/javascript" src="assets/js/jquery-2.2.1.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js"></script>
<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.trackpad-scroll-emulator.min.js"></script>
<script type="text/javascript" src="assets/js/particles.min.js"></script>
<script type="text/javascript" src="assets/js/custom.js"></script>

<script type="text/javascript">
    var latitude = 34.038405;
    var longitude = -117.946944;
    var markerImage = "assets/img/map-marker-w.png";
    var mapTheme = "dark";
    var mapElement = "map-contact";
    google.maps.event.addDomListener(window, 'load', simpleMap(latitude, longitude, markerImage, mapTheme, mapElement));

    particlesJS.load("particles-js", "assets/json/particles-spark.json");

</script>


</body>
