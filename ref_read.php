<!DOCTYPE html>
<html>
<head>
<title>Henkel's NoteCards | Refs Table</title>
</head>
<body>

<h1>Henkel's NoteCards</h1>
<h2>Refs Table</h2>

<?php
require_once("global_vars.php");

$mysqli = new mysqli($host,$username,$password,$database);

if( mysqli_connect_errno())
{
  echo "Error connecting.";
}
else
{
  $query = "select * from Refs;";
  $result = $mysqli->query($query);

  if( $result)
  {
    $numrows = $result->num_rows;
    $numcols = $result->field_count;

    $fields = $result->fetch_fields();

    echo "<table>";

    echo "<tr>";
    for( $i=0; $i<$numcols; $i++)
    {
      echo "<th>";
      echo $fields[$i]->name;
      echo "</th>";
    }
    echo "</tr>";

    while( $row = $result->fetch_row())
    {
      echo "<tr>";
      for( $i=0; $i<$numcols; $i++)
      {
        echo "<td>";
        echo $row[$i];
        echo "</td>";
      }
      echo "</tr>";
    }

    echo "</table>";
  }
  else
  {
    echo "Error querying.";
  }

  $mysqli->close();
}

?>

</body>
</html>
