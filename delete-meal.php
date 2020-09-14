<?php
require('db.php');

if(isset($_GET['key'])){
    $key = $_GET['key'];
    $delete = "delete from volunteer where token='$key'";

    $run = mysqli_query($con,$delete);
    if($run){
        echo '<script>alert("Jagvillage Service Deleted Successfully!");</script>';
    }else{
        echo '<script>alert("Jagvillage Service Not Deleted");</script>';
    }

}

?>