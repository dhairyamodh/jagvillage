<?php

//fetch_comment.php


include('db.php');
if (isset($_POST['view_comment'])) {
    $id = $_POST['id'];
    $query = "
SELECT * FROM comments JOIN user ON comments.sender_name = user.user_id
WHERE blog_id = '$id' AND parent_comment_id='0' ORDER BY comment_id DESC
";

    $statement = mysqli_query($con, $query);
    $count = mysqli_num_rows($statement);
    $output = '';
    if ($count > 0) {
        $output .= '<hr>
<p style="color: #737373; font-size:20px; font-weight:400">Comments</p>';
        while ($row = mysqli_fetch_array($statement)) {
            $output .= '
 <div class="panel panel-default">
  <div class="panel-heading"><b>' . $row["user_fname"] . ' ' . $row["user_lname"] . '</b> <small><i>' . date("j, M Y", strtotime($row["date"])) . '</i></small></div>
  <div class="panel-body">
    <p>' . $row["comment"] . '</p>
    <div class="btns">
        <div class="btn-reply"><i class="fa fa-reply" aria-hidden="true"></i><button type="button" class="reply" id="' . $row["comment_id"] . '">Reply</button></div>';
            $comment_id = $row['comment_id'];
            $check = "SELECT * FROM comments WHERE parent_comment_id = '$comment_id'";
            $check_rn = mysqli_query($con, $check);
            if (mysqli_num_rows(($check_rn)) > 0) {
                $output .= '<div class="btn-reply"><i class="fa fa-chevron-down" aria-hidden="true"></i><button type="button" class="view-reply" id="' . $row["comment_id"] . '">View Replies</button></div>';
            }
            $output .= '</div>
    </div>
    <div class="view-replies' . $row["comment_id"] . ' replies"></div>
    </div>';
        }
    } else {
        $output .= '<hr>
<span style="font-size:20px; font-weight:600" class="text-danger">No Comments</span>';
    }

    echo $output;
}


function get_reply_comment($con, $parent_id = 0, $marginleft = 0)
{
    $query = "
 SELECT * FROM comments JOIN user ON comments.sender_name = user.user_id WHERE parent_comment_id = '" . $parent_id . "'
 ";
    $output = '';

    $result = mysqli_query($con, $query);
    $count = mysqli_num_rows($result);
    if ($parent_id == 0) {
        $marginleft = 0;
    } else {
        $marginleft = $marginleft + 48;
    }
    if ($count > 0) {
        foreach ($result as $row) {
            $output .= '
   <div class="panel panel-default" style="margin-left:' . $marginleft . 'px">
    <div class="panel-heading"><b>' . $row["user_fname"] . ' ' . $row["user_lname"] . ' </b><small><i>' . date("j, M Y", strtotime($row["date"])) . '</i></small> </div>
    <div class="panel-body">
    <p>' . $row["comment"] . '</p>
    <div class="btns">
        <div class="btn-reply"><i class="fa fa-reply" aria-hidden="true"></i><button type="button" class="reply" id="' . $row["comment_id"] . '">Reply</button></div>';
            $comment_id = $row['comment_id'];
            $check = "SELECT * FROM comments WHERE parent_comment_id = '$comment_id'";
            $check_rn = mysqli_query($con, $check);
            if (mysqli_num_rows(($check_rn)) > 0) {
                $output .= '<div class="btn-reply"><i class="fa fa-chevron-down" aria-hidden="true"></i><button type="button" class="view-reply" id="' . $row["comment_id"] . '">View Replies</button></div>';
            }
            $output .= '</div>
    </div>
     <div class="view-replies' . $row["comment_id"] . ' replies"></div>
     </div>';
        }
    }
    return $output;
}
if (isset($_POST['view_reply'])) {
    echo get_reply_comment($con, $_POST['comment_id'], 0);
}
