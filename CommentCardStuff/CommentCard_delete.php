<!DOCTYPE html>
<html>
<head>
<link href="../css/common.css" rel="stylesheet" type="text/css" />
<title> Comment Card delete </title>
</head>
<body>
<?php
  require_once( "global_vars.php" );
  $id = $_GET['id'];
  $mysqli = new mysqli( $host, $username, $password, $database );
  if( mysqli_connect_errno() )
  {
    echo "ERROR: ".mysqli_connect_errno();
  }
  else
  {
    $query = "delete from CommentCard where CommentCardId=$id;";
    $result = $mysqli->query( $query );
    if( $result )
    {
      echo "Successful query.";
    }
    else
    {
      echo "ERROR QUERYING: ".$mysqli->error;
    }
  }

?>
</body>
</html>
