<!DOCTYPE html>
<html>
<head>
<link href="../css/common.css" rel="stylesheet" type="text/css" />
<title>Cites Table</title>
</head>
<body>

<p id="nav">
<span class="navitem"><a href="../index.html">Index</a></span>
|
<span class="navitem"><a href="./index.html">Cites</a></span>
</p>

<h1>Henkel's Notecards</h1>
<h2>Cites Table</h2>
<h3>Read</h3>

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
