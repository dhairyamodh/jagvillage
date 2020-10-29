<?php
include '../db.php';
if (isset($_POST['upload_blog_img'])) {
    $test = explode('.', $_FILES["file"]["name"]);
    $ext = end($test);
    $name = $_FILES["file"]["name"];
    $location = './upload/blog/' . $name;
    move_uploaded_file($_FILES["file"]["tmp_name"], $location);
    echo '<div class="alert alert-success">Image Uploaded</div>';
}

if (isset($_POST['edit_blog_img'])) {
    $id = $_POST['blog_id'];
    $test = explode('.', $_FILES["file"]["name"]);
    $ext = end($test);
    $name = $_FILES["file"]["name"];
    $location = './upload/blog/' . $name;
    move_uploaded_file($_FILES["file"]["tmp_name"], $location);
    $sql = "update blog set blog_img='$name' where blog_id='$id'";
    if (mysqli_query($con, $sql)) {
        echo '<div class="alert alert-success">Image Uploaded</div>';
    } else {
        echo '<div class="alert alert-danger">Image Not Uploaded</div>';
    }
}

if (isset($_POST['upload_event_img'])) {
    $test = explode('.', $_FILES["file"]["name"]);
    $ext = end($test);
    $name = $_FILES["file"]["name"];
    $location = './upload/event/' . $name;
    move_uploaded_file($_FILES["file"]["tmp_name"], $location);
    echo '<div class="alert alert-success">Image Uploaded</div>';
}

if (isset($_POST['edit_event_img'])) {
    $id = $_POST['event_id'];
    $test = explode('.', $_FILES["file"]["name"]);
    $ext = end($test);
    $name = $_FILES["file"]["name"];
    $location = './upload/event/' . $name;
    move_uploaded_file($_FILES["file"]["tmp_name"], $location);
    $sql = "update event set event_img='$name' where event_id='$id'";
    if (mysqli_query($con, $sql)) {
        echo '<div class="alert alert-success">Image Uploaded</div>';
    } else {
        echo '<div class="alert alert-danger">Image Not Uploaded</div>';
    }
}

if (isset($_POST['upload_avatar'])) {
    $id = $_POST['user_id'];
    $test = explode('.', $_FILES["file"]["name"]);
    $ext = end($test);
    $name = $_FILES["file"]["name"];
    $location = '../images/avatar/' . $name;
    move_uploaded_file($_FILES["file"]["tmp_name"], $location);
    $sql = "update user set user_avatar='$name' where user_id='$id'";
    if (mysqli_query($con, $sql)) {
        echo '<div style="background-color:#07b527;">Image Uploaded</div>';
    } else {
        echo '<div style="background-color:#b51c07;">Image Not Uploaded</div>';
    }
}
