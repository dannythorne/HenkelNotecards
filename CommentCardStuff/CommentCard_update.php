
<!DOCTYPE html>
<html>
<head>
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
    $comment = $_GET["comment"];
    echo $id;
    echo $comment;

    $query = "update CommentCard ";
    $query = $query."set ";
    $query = $query."comment=$comment ";
    $query = $query."where id=$id ";

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
