
<!DOCTYPE html>
<html>
<head>
<title> Comment delete from CommentCard </title>
</head>
<body>

<?php
  require_once( "global_vars.php" );

  $mysqli = new mysqli( $host, $username, $password, $database );

  if( mysqli_connect_errno() )
  {
    echo "ERROR: ".mysqli_connect_errno();
  }
  else
  {
    $query = "select * from CommentCard;";
    $result = $mysqli->query( $query );

    if( $result )
    {
      $numrows = $result->num_rows;
      $numcols = $result->field_count;

      echo "<form action='CommentCard_delete.php'>";
      echo "<select name ='id'>";

      while( $row = $result->fetch_row() )
      {
        echo "<option value='$row[0]'>";
        echo $row[0];
        echo $row[1];
        echo "</option>";
      }
      echo "</select>";
      echo "&nbsp;";
      echo "<input type='submit' />";
      echo "</form>";

    }
    else
    {
      echo "ERROR querying the database.";
    }
  }
  $mysqli->close();
  $result->free();
?>
</body>
</html>
