<?php
$host = "";
$username = "mmoore0";
$password = "mmoore0";
$database = "HenkelNotecards";

$mysqli = new mysqli($host, $username, $password, $database);

if( mysqli_connect_errno()){
  echo "<div>";
  echo "ERROR: ".mysqli_connect_errno();
  echo "</div>";
}
else{
  $query = "select * from Work;";
  $result = $mysqli->query($query);

  if($result){
    $numrows = $result->num_rows; 
    $numcols = $result->field_count; 
    $fields = $result->fetch_fields();

    echo "<div>";
    echo "Rows: ".$numrows;
    echo "</div>";

    echo "<div>";
    echo "Columns: ".$numcols;
    echo "</div>";

    echo "<table border='1' cellpadding='10' cellspacing='0'>";

    echo "<tr>";
    for($i=0; $i<$numcols; $i++){
      echo "<th>";
      echo $fields[$i]->name;
      echo "</th>";
    }
    echo "</tr>";

    while($row = $result->fetch_row()){
      echo"<tr>";

      for($i=0; $i<$numcols; $i++){
        echo "<td>";
        echo "$row[$i]";
        echo "</td>";
      }

      echo"<tr>";
    }

    echo "</table>";
  }
  else{
    echo "Error: ".$mysqli->error;
  }

  $result->free();

  $mysqli->close();
}

?>
