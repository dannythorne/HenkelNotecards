<?php

$host = "";
$username = "mmoore0";
$password = "mmoore0";
$database = "HenkelNotecards";

$mysqli = new mysqli($host, $username, $password, $database);

if(mysqli_connect_errno()){
  echo "Error connecting to 'HenkelNotecards'";
}
else{
  $query = "select * from Work;";

  $result = $mysqli->query($query);

  if($result){
    $numrows = $result->num_rows;
    $numcols = $result->field_count;

    echo "<form>";
    echo "<select>";

    while($row = $result->fetch_row()){
      echo "<option";
      echo " value='".$row[0]."'";
      echo ">";
      echo $row[1];
      echo "</option>";
    }

    echo "</select>";
    echo "</form>";
  }
  else{
    echo "FAILURE";
  }
}
?>
