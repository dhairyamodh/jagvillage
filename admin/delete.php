<?php
require('../db.php');

if (isset($_POST['delete_blog'])) {
    $id = $_POST['delete_blog'];
    $delete = "delete from blog where blog_id='$id'";

    $run = mysqli_query($con, $delete);
    if ($run) {
        echo '<script>window.open("view-blog.php","_self");</script>';
    } else {
        echo '<script>window.open("view-blog.php","_self");</script>';
    }
}

if (isset($_POST['delete_event'])) {
    $id = $_POST['delete_event'];
    $delete = "delete from event where event_id='$id'";

    $run = mysqli_query($con, $delete);
    if ($run) {
        echo '<script>window.open("view-event.php","_self");</script>';
    } else {
        echo '<script>window.open("view-event.php","_self");</script>';
    }
}

if (isset($_POST['delete_comment'])) {
    $id = $_POST['delete_comment'];
    $delete = "delete from comments where comment_id='$id'";

    $run = mysqli_query($con, $delete);
    if ($run) {
        echo '<script>window.open("view-event.php","_self");</script>';
    } else {
        echo '<script>window.open("view-event.php","_self");</script>';
    }
}
