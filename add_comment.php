<?php

//add_comment.php

include('db.php');

$error = '';
$comment_name = '';
$comment_content = '';

if (empty($_POST["comment_name"])) {
    $error .= '<p class="text-danger">Name is required</p>';
} else {
    $comment_name = $_POST["comment_name"];
}

if (empty($_POST["comment_content"])) {
    $error .= '<p class="text-danger">Comment is required</p>';
} else {
    $comment_content = $_POST["comment_content"];
}
$comment_id = $_POST["comment_id"];
if ($error == '') {
    $query = "
 insert into comments 
 (comment_id, comment, sender_name,date) 
 VALUES ('$comment_id','$comment_content','$comment_name',now())
 ";
    // $run = mysqli_query($con, $query);
    $error = mysqli_query($con, $query) ? '<label class="text-success">Comment Added</label>' : '<label class="text-danger">Comment Not Added</label>';
}

$data = array(
    'error'  => $error
);

echo json_encode($data);
