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

    echo "<option value=''>Select a reference.</option>";

    while( $row = $result->fetch_assoc())
    {
      $getwork = "select * from Work where id=".$row['WorkId'].";";
      $work = $mysqli->query($getwork);
      if($work)
      {
        $workrow = $work->fetch_assoc();
        $workname = $workrow["Name"];
      }
      else
      {
        $workname = "N/A";
      }

      echo "<option value='";
      echo $row['WorkId'];
      echo "|";
      echo $row['NotecardId'];
      echo "|";
      echo $row['coords'];
      echo "|";
      echo $workname;
      echo "'>";
      echo "Notecard ".$row['NotecardId']." cites "
                      .$workname." at "
                      .$row['coords'];
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
