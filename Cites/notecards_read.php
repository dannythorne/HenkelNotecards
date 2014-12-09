<?php
require_once("../global_vars.php");

$mysqli = new mysqli( $host, $username, $password, $database);

if( mysqli_connect_errno())
{
  echo "Error connecting.";
}
else
{
  $query = "";
  $query = $query."select * from Notecard ";
  $query = $query." where id in (";
  $query = $query."select NotecardId from Cites";
  $query = $query.")";
  $query = $query.";";

  # echo $query;

  $result = $mysqli->query($query);

  if( $result)
  {
    $numrows = $result->num_rows;
    $numcols = $result->field_count;

    while( $row = $result->fetch_row())
    {
      echo "<option>";
      echo $row[0];
      echo "</option>";
    }
  }
  else
  {
    echo "Error querying.";
  }

}

?>
