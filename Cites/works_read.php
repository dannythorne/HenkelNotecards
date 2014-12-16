<?php
require_once("../global_vars.php");

$id = "id";

$mysqli = new mysqli( $host, $username, $password, $database);

if( mysqli_connect_errno())
{
  echo "Error connecting.";
}
else
{
  $query = "";
  $query = $query."select * from Work ";
  $query = $query." where id in (";
  $query = $query."select WorkId from Cites";
  $query = $query.")";
  $query = $query.";";

  # echo $query;

  $result = $mysqli->query($query);

  if( $result)
  {
    $numrows = $result->num_rows;
    $numcols = $result->field_count;

    while( $row = $result->fetch_assoc())
    {
      $getauthor = "select * from Author where id=".$row['AuthorId'];
      $author = $mysqli->query($getauthor);
      if( $author)
      {
        $authorrow = $author->fetch_assoc();
        $authorname = $authorrow["Name"];
      }
      else
      {
        $authorname = "N/A";
      }

      echo "<option value='".$row[$id]."'>";
      echo "\"".$row['Name']."\" by ".$authorname;
      echo "</option>";
    }
  }
  else
  {
    echo "Error querying.";
  }

}

?>
