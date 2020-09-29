<html>
   
   <head>
      <title>Sending HTML email using PHP</title>
   </head>
   
   <body>
      
      <?php
      try {
          
            require "PHPMailerAutoload.php";
            $mail = new PHPMailer;
            $mail->Host = 'mail.jagvillage.com';     //Sets the SMTP hosts of your Email hosting, this for Godaddy
            $mail->Port = 465;                              //Sets the default SMTP server port
            $mail->SMTPAuth = true;                         //Sets SMTP authentication. Utilizes the Username and Password variables
            $mail->SMTPSecure='ssl';
            $mail->Username = 'info@jagvillage.com';                  //Sets SMTP username
            $mail->Password = 'jagvillage';                        //Sets connection prefix. Options are "", "ssl" or "tls"
           $mail->setFrom('info@jagvillage.com', 'Jagvillage'); //Sets the From name of the message
            $mail->addAddress('info@jagvillage.com');      //Adds a "To" address
           // $mail->isHTML(true);                            //Sets message type to HTML
            $mail->Subject = 'Invoice for item(s) from your order';             //Sets the Subject of the message
            $mail->Body = 'welcome';
                      
            if($mail->send()){
                echo "send";
            }else{
                echo "not send";
            }

      } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
      
   </body>
</html>