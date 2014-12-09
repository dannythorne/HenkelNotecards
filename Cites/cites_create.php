<?php
require_once("../global_vars.php");

$mysqli = new mysqli( $host, $username, $password, $database);

if( mysqli_connect_errno())
{
  echo "Error connecting.";
}
else
{
  $notecardId = $_POST["notecardId"];
  $workId = $_POST["workId"];
  $coords = $_POST["coords"];

  echo $notecardId;
  echo " cites ";
  echo $workId;
  echo " at ";
  echo $coords;

  $query =        "";
  $query = $query."insert into Cites values(";
  $query = $query.$notecardId;
  $query = $query.",";
  $query = $query.$workId;
  $query = $query.",";
  $query = $query.$coords;
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
