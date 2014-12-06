<?php
require_once("../../global_vars.php");

$mysqli = new mysqli( $host, $username, $password, $database);

if( mysqli_connect_errno())
{
  echo "Error connecting.";
}
else
{
  $author = $_POST["name"];

  $query =        "";
  $query = $query."insert into Author values("0,;
  $query = $query.$author;
  $query = $query.");";

  echo "query = ".$query;

  $result = $mysqli->query($query);

  if($result)
  {
    echo "SUCCESS";
  }
  else
  {
    echo "ERROR";
  }

  $mysqli->close();
}

?>
