<?php
require_once("../global_vars.php");

$mysqli = new mysqli( $host, $username, $password, $database);

if( mysqli_connect_errno())
{
 echo "Error connecting.";
}
else
{
  $query = "select * from Keyword;";
  $result = $mysqli->query($query);

  if( $result)
  {
    while( $row = $result->fetch_assoc())
    {
      echo '<a href="./php/keyword.php?id='.$row["id"].'&keyword='.$row["Keyword"].'">';
      echo $row["Keyword"];
      echo "</a>";
    }
  }
  else
  {
    echo "ERROR";
  }

  $mysqli->close();
}

?>
