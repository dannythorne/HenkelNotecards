<?php
require_once("../global_vars.php");

$mysqli = new mysqli($host,$username,$password,$database);

if( mysqli_connect_errno())
{
  echo "Error connecting.";
}
else
{
  $query = "select * from Cites;";
  $result = $mysqli->query($query);

  if( $result)
  {
    $numrows = $result->num_rows;
    $numcols = $result->field_count;

    $fields = $result->fetch_fields();

    echo "<option value=''>Select a reference to edit.</option>";

    while( $row = $result->fetch_row())
    {
      echo "<option value='";
      echo $row[0];
      echo " ";
      echo $row[1];
      echo "'>";
      echo $row[2];
      echo "</option>";
    }
  }
  else
  {
    echo "Error querying.";
  }

  $mysqli->close();
}
?>
