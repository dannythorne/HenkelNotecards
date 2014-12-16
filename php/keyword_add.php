<?php
require_once("../global_vars.php");

$mysqli = new mysqli( $host, $username, $password, $database);

$Keyword = $mysqli->real_escape_string($_POST["Keyword"]);
$Comment = $mysqli->real_escape_string($_POST["Comment"]);

if( mysqli_connect_errno())
{
  echo "Error connecting.";
}
else
{
  $query = "insert into Keyword values(0,'".$Keyword."','".$Comment."');";
  $result = $mysqli->query($query);
  if( $result)
  {
    echo "Added ";
    echo $Keyword;
    echo ".";
  }
  else
  {
    echo "ERROR";
  }
  $mysqli->close();
}
?>
