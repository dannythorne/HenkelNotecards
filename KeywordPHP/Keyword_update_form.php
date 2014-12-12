<!DOCTYPE html>
<html>
<head>
<title>Update a Keyword Card</title>
</head>
<body>

<h2>Update a Keyword Card</h2>
<?php


$id = $_GET["id"];

require_once("global_vars.php");




$mysqli = new mysqli( $host, $username, $password, $database);
if( mysqli_connect_errno())
{
  echo "Error Connecting...";
}
else
{
  
  $query = "select * from Keyword where id=".$id.";";
  $result = $mysqli->query($query);
  if( $result)
  {
    if( $result->num_rows > 1)
    {
      echo "Unhandled case: Multiple rows returned!";
    }
    else
    {
      $row = $result->fetch_row();
      $keyword= $row[1];
      $comment = $row[2];

      echo '<form action ="Keyword_update.php">';

      echo "<input type='hidden' name='id' value='".$id."' />";
      echo '<div>Keyword: ';
      echo '<input type="text" name="Keyword" value="'.$keyword.'" /></div>';
      echo '<div>Comment:</div>';
      echo '<div>';
      echo '<textarea name="Comment" rows="5" cols="48">'.$comment.'</textarea></div>';
      echo '<div><input type="submit" value="Update" /></div>';
      echo '</form>';
    }
  }
  else
  {
    echo "Error querying...";
  }
  $result->free();
  $mysqli->close();
}





?>
</body>
</html>
