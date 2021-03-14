<?php
require_once './stripeconfig.php';

// Include database connection file  
include_once './db.php';

$payment_id = $statusMsg = '';
$ordStatus = 'error';

// Check whether stripe token is not empty 
if (!empty($_POST['stripeToken'])) {

    // Retrieve stripe token, card and user info from the submitted form data 
    $token  = $_POST['stripeToken'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $pincode = $_POST['pincode'];
    if (isset($_POST['price']) && !empty($_POST['price'])) {
        $itemPrice = $_POST['price'];
    }
    if (isset($_POST['amount']) && !empty($_POST['amount'])) {
        $itemPrice = $_POST['amount'];
    }

    //Include Stripe PHP library 
    require_once 'stripe-php/init.php';

    // Set API key 
    \Stripe\Stripe::setApiKey(STRIPE_API_KEY);

    // Add customer to stripe 
    try {
        $customer = \Stripe\Customer::create(array(
            'email' => $email,
            'source'  => $token
        ));
    } catch (Exception $e) {
        $api_error = $e->getMessage();
    }

    if (empty($api_error) && $customer) {

        // Convert price to cents 
        $itemPriceCents = ($itemPrice * 100);

        // Charge a credit or a debit card 
        try {
            $charge = \Stripe\Charge::create(array(
                'customer' => $customer->id,
                'amount'   => $itemPriceCents,
                'currency' => 'CAD',
                'description' => 'Donation'
            ));
        } catch (Exception $e) {
            $api_error = $e->getMessage();
        }

        if (empty($api_error) && $charge) {

            // Retrieve charge details 
            $chargeJson = $charge->jsonSerialize();

            // Check whether the charge is successful 
            if ($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1) {
                // Transaction details  
                $transactionID = $chargeJson['balance_transaction'];
                $paidAmount = $chargeJson['amount'];
                $paidAmount = ($paidAmount / 100);
                $paidCurrency = $chargeJson['currency'];
                $payment_status = $chargeJson['status'];

                // Insert tansaction data into the database 
                $sql = "INSERT INTO donations(name,email,mobile,address,state,country,pincode,item_price,paid_amount,paid_amount_currency,txn_id,payment_status,created,modified) VALUES('" . $name . "','" . $email . "','" . $mobile . "','" . $address . "','" . $state . "','" . $country . "','" . $pincode . "','" . $itemPrice . "','" . $paidAmount . "','" . $paidCurrency . "','" . $transactionID . "','" . $payment_status . "',NOW(),NOW())";
                $insert = $con->query($sql);
                $payment_id = $con->insert_id;

                // If the order is successful 
                if ($payment_status == 'succeeded') {
                    $ordStatus = 'success';
                    $statusMsg = 'Your Payment has been Successful!';
                } else {
                    $statusMsg = "Your Payment has Failed!";
                }
            } else {
                $statusMsg = "Transaction has been failed!";
            }
        } else {
            $statusMsg = "Charge creation failed! $api_error";
        }
    } else {
        $statusMsg = "Invalid card details! $api_error";
    }
} else {
    $statusMsg = "Error on form submission.";
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

</head>

<body style="background-color: #f1f1f1;">
    <!-- Top Header Section -->
    <?php include('header.php') ?>
    <!-- End Top Header Section -->
    <style>
    </style>
    <!-- Slider Section -->
    <section id="slider">

    </section>
    <!-- End Slider Section -->
    <section id="contacts">
        <div class="container" style="background-color: #fff; padding:30px">
            <div style="display: flex;justify-content:center;align-items:center;flex-direction:column">
                <img src="./images/<?php echo ($ordStatus == 'success') ? 'success.png' : 'error.png'; ?>" width="150px">
                <h3 class="text-<?php echo ($ordStatus == 'success') ? 'success' : 'danger'; ?>"><?php echo $statusMsg; ?></h3>
            </div>
            <h4>Payment Information</h4>
            <p><b>Reference Number:</b> <?php echo $payment_id; ?></p>
            <p><b>Transaction ID:</b> <?php echo $transactionID; ?></p>
            <p><b>Paid Amount:</b> <?php echo $paidAmount . ' ' . $paidCurrency; ?></p>
            <p><b>Payment Status:</b> <?php echo $payment_status; ?></p>


        </div>
    </section>


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



    <!-- END SCRIPTS -->
</body>


</html>