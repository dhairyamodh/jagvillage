<?php 
if($_FILES["file"]["name"] != '')
{
 $test = explode('.', $_FILES["file"]["name"]);
 $ext = end($test);
 $name = $_FILES["file"]["name"];
 $location = './upload/blog/' . $name;  
 move_uploaded_file($_FILES["file"]["tmp_name"], $location);
 echo '<div class="alert alert-success">Image Uploaded</div>';
}


?>