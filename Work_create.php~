<!DOCTYPE html>
<html>
<head>
<title>Add a Row to the Work Table</title>
<style>

</style>
</head>

<body>

<?php

$name = $_GET["name"];
$abbr = $_GET["abbr"];
$year = $_GET["year"];
$author = $_GET["author"];

echo "<div>";
echo "Name: <strong>".$name."</strong>";
echo "</div>";

echo "<div>";
echo "Abbreviation: <strong>".$abbr."</strong>";
echo "</div>";

echo "<div>";
echo "Year: <strong>".$year."</strong>";
echo "</div>";

echo "<div>";
echo "Author: <strong>".$author."</strong>";
echo "</div>";

$host = "";
$username = "mmoore0";
$password = "mmoore0";
$database = "HenkelNotecards";

$mysqli = new mysqli($host, $username, $password, $database);

if(mysqli_connect_errno()){
  echo "Error connecting to database";
}
else{
  $query = "insert into Work values(0,'".$name."','".$abbr."',".$year.",".$author.");";

  $result = $mysqli->query($query);

  if($result){
    echo "SUCCESS";
  }
  else{
    echo "FAILURE";
  }
}
?>

<div><a href="./Work_read.php">Show Table</a></div>

<script>
</script>

</body>
</html>
