<!DOCTYPE html>
<html>
<head>
<title>Title</title>
</head>
<body>
<?php
$id = $_GET["id"];
$keyword = $_GET["Keyword"];
$comment = $_GET["Comment"];
require_once("global_vars.php");
$mysqli = new mysqli( $host, $username, $password, $database);
if( mysqli_connect_errno())
{
  echo "ERROR: Error connecting to the database.";
}
else
{
  $query = "update Keyword set ";
  $query = $query."Keyword=";
  $query = $query."'";
  $query = $query.$keyword; 
  $query = $query."'";
  $query = $query.", ";
  $query = $query."Comment=";
  $query = $query."'";
  $query = $query.$comment;
  $query = $query."'";
  $query = $query."where id=";
  $query = $query.$id;
  $query = $query.";";
  echo "<div>";
  echo $query;
  echo "</div>";
  $result = $mysqli->query($query);
  if( $result)
  {
    echo "Success!";
    echo "<div><a href='./Keyword_read.php'>Show Table</a></div>";
  }
  else
  {
    echo "ERROR: Error inserting row!";
  }
}
$mysqli->close();
?>
</body>
</html>

