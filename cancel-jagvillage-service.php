<?php
require('db.php');

if(isset($_POST['cancel'])){
    $key = $_POST['token'];
    $date = $_POST['date'];
    $delete = "delete from category_date where service_token='$key' and date='$date'";
    $run = mysqli_query($con,$delete);
    
    if($run){
        echo '<script>alert("Jagvillage Service Cancelled Successfully!");
        window.open("jagvillage-service.php?key='.$key.'","_self");
        </script>';
    }else{
        echo '<script>alert("Jagvillage Service not cancelled!");</script>';
    }

}

?>c