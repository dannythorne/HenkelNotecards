
<!DOCTYPE html>
<html>
<head>
<link href="../css/common.css" rel="stylesheet" type="text/css" />
<title> Comment Card update </title>
</head>
<body>

<h1> Update a Comment to the CommentCard Table</h1>

<?php
$id = $_GET["id"];

$host = "";
$username = "agiles0";
$password = "agiles0";
$database = "HenkelNotecards";
$mysqli = new mysqli( $host, $username, $password, $database );

if( mysqli_connect_errno() )
{
  echo "ERROR: ".mysqli_connect_errno();
}
else
{
  $query = "select * from CommentCard where CommentCardId ='$id';";
  $result = $mysqli->query( $query );
  if( $result )
  {
    if( $result->num_rows > 1 )
    {
      echo "Unhandled case: multiple rows returned!";
    }
    else
    {
      $row = $result->fetch_row();
      $Comment = $row[1];
      echo $row[0];
      echo $row[1];

      echo "<form action='CommentCard_update.php'>";

      echo "<input type='hidden' name='id' value='$id'/>";
      echo "<div>Comment: <input type='text' name='Comment' value='$Comment' /> </div>";
      echo "<div><input type='submit' value='Add'/></div>";
      echo "</form>";
    }
  }
  else
  {
    echo "ERROR querying...'$mysqli->error'";
  }
  $result->free();
  $mysqli->close();
}
?>
</body>
</html>
