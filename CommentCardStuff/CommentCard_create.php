
<!DOCTYPE html>
<html>
<head>
<title>CommentCard create </title>
<link href="../css/common.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h1>Comment Card Create</h1>

<?php
  require_once("global_vars.php");
  $comment = $_GET["comment"];

  echo "<div>";
  echo "Comment: <strong>$comment</strong>";
  echo "</div>";


  $mysqli = new mysqli( $host, $username, $password, $database);

  if( mysqli_connect_errno() )
  {
    echo "Error: Error connecting to the database!";
  }
  else
  {
    $query = "insert into CommentCard values( 0,";
    $query = $query."'".$comment."');";

    $result = $mysqli->query( $query );

    if( $result )
    {
      echo "Success";
    }
    else
    {
      echo "Error: Error inserting row!";
    }
  }
  $mysqli->close();
?>

</body>
</html>
