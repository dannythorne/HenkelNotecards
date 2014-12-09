<?php
require_once("../global_vars.php");

$mysqli = new mysqli( $host, $username, $password, $database);

if( mysqli_connect_errno())
{
  echo "Error connecting.";
}
else
{
  $coords = $_POST["coords"];
  $WorkId = $_POST["WorkId"];
  $NotecardId = $_POST["NotecardId"];

  echo "Notecard ";
  echo $NotecardId;
  echo " cites work ";
  echo $WorkId;
  echo " at ";
  echo $coords;
  echo ".";

  $query = "";
  $query = $query."update Cites set coords='".$coords."'";
  $query = $query." where WorkId=".$WorkId;
  $query = $query." and NotecardId=".$NotecardId;

  echo $query;

  $result = $mysqli->query($query);

  if( $result)
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
