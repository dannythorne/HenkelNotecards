<?php
require_once("../global_vars.php");

$mysqli = new mysqli( $host, $username, $password, $database);

if( mysqli_connect_errno())
{
  echo "Error connecting.";
}
else
{
  $WorkId = $_POST["WorkId"];
  $NotecardId = $_POST["NotecardId"];

  echo "Notecard ";
  echo $NotecardId;
  echo " cites work ";
  echo $WorkId;
  echo ".";

  $query = "";
  $query = $query."delete from Cites ";
  $query = $query." where WorkId=".$WorkId;
  $query = $query." and NotecardId=".$NotecardId;
  $query = $query.";";

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
