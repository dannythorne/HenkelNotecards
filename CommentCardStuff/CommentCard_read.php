
<!DOCTYPE html>
<html>
<head>
<title>CommentCard Read </title>
</head>
<body>
<?php
$host ="";
$username ="agiles0";
$password ="agiles0";
$database ="HenkelNotecards";

$mysqli = new mysqli( $host, $username, $password, $database);
if( mysqli_connect_errno() )
{
  echo "Error connecting to database 'HenkelNotecards'";
}
else
{
  echo "DEBUG: Successful connection to the database.";
}

$query = "Select * from CommentCard;";
$result = mysqli->query( query );

if( $result )
{
  echo "Successful Query!";
  $numrows = $result->num_rows;
  $numcols = $result->field_count;
  $fields  = $result->fetch_fields(); // returns an array

  echo "<div>";
  echo "numrows ".$numrows;
  echo "</div>";

  echo "<div>";
  echo "numcols ".$numcols;
  echo "</div>";

  echo "<tr>";
  for( $i = 0; $i < $numcols; $i++)
  {
    echo "<th>";
    echo $fields[$i]->name;
    echo "</th>";
  }
  echo "</th>";

  while( $row = $result->fetch_row() )
  {
    echo "<th>";

    for( $i = 0; $i < $numcols; $i++)
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
  echo "Error: ".$mysqli->error;
}
$result->free();
$mysqli->close();
?>
</body>
</html>
