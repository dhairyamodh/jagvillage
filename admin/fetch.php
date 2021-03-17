<?php

//fetch_comment.php


include('../db.php');
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
        $output .= '';
        while ($row = mysqli_fetch_array($statement)) {
            $output .= '
            <tr>
  <td>' . $row["user_fname"] . ' </td>
    <td>' . $row["comment"] . '</td>
    <td><a href="#" id="' . $row["comment_id"] . '" class="text-danger deletecomment">Delete</a></td>
    </tr>
    ';
        }
    } else {
        $output .= '
        <tr>
        <td colspan="3" class="text-center">No Comments Found</td>
          </tr>';
    }

    echo $output;
}
