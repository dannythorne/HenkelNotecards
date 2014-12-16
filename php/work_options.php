<?php
require_once("../global_vars.php");

$mysqli = new mysqli( $host, $username, $password, $database);

if( mysqli_connect_errno())
{
  echo "Error connecting";
}
else
{
  $query = "";
  $query = $query."select * from Work;";
  $result = $mysqli->query($query);

  if( $result)
  {
    while( $row = $result->fetch_assoc())
    {
      echo "<option value='".$row["id"]."'>";
      echo $row["Name"];
      echo "</option>";
    }
  }
  else
  {
    echo "<option>";
    echo "Query returned no results.";
    echo "</option>";
  }

  $mysqli->close();
}

?>
