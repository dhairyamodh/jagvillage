<?php

//fetch_comment.php

include('db.php');
$id = $_POST['id'];
$query = "
SELECT * FROM comments
WHERE blog_id = '$id'
ORDER BY comment_id DESC
";

$statement = mysqli_query($con, $query);
$count = mysqli_num_rows($statement);
$output = '';
if ($count > 0) {
    $output .= '<hr>
<p style="color: #737373; font-size:20px; font-weight:400">Comments : <span style="color: #159397; font-size:20px; font-weight:600">' . $count . '</span> </p>';
    while ($row = mysqli_fetch_array($statement)) {
        $output .= '
 <div class="panel panel-default">
  <div class="panel-heading">By <b>' . $row["sender_name"] . '</b> on <i>' . date("j, M Y", strtotime($row["date"])) . ' at ' . date("h:i a", strtotime($row["date"])) . '</i></div>
  <div class="panel-body">' . $row["comment"] . '</div>
  
 </div>
 ';
    }
} else {
    $output .= '<hr>
<span style="font-size:20px; font-weight:600" class="text-danger">No Comments</span>';
}

// $data = array(
//     'output' => $output
// );

echo $output;
