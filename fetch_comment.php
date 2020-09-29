<?php

//fetch_comment.php

include('db.php');

$query = "
SELECT * FROM comments

ORDER BY comment_id DESC
";

$statement = mysqli_query($con, $query);
$output = '';

while ($row = mysqli_fetch_array($statement)) {
    $output .= '
 <div class="panel panel-default">
  <div class="panel-heading">By <b>' . $row["sender_name"] . '</b> on <i>' . date("j, M Y - h:i a", strtotime($row["date"])) . '</i></div>
  <div class="panel-body">' . $row["comment"] . '</div>
  
 </div>
 ';
}

echo $output;
