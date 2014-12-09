
<!DOCTYPE html>
<html>
<head>
<link href="../css/common.css" rel="stylesheet" type="text/css" />
<title>CommentCard update </title>
</head>
<body>

<?php
  require_once( "global_vars.php" );

  $mysqli = new mysqli( $host, $username, $password, $database );
  if( mysqli_connect_errno() )
  {
    echo "Error: Error connecting to the database!";
  }
  else
  {
    $id      = $_GET["id"];
    $comment = $_GET["Comment"];
    echo $id;
    echo $comment;

    $query = "update CommentCard ";
    $query = $query."set ";
    $query = $query."Comment='$comment' ";
    $query = $query."where CommentCardId=$id;";

    $result = $mysqli->query( $query );

    if( $result )
    {
      echo "Success!";
    }
    else
    {
      echo "Error querying database.";
    }

  }
  $result->free();
  $mysqli->close();
?>

</body>
</html>
