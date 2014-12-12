<?php
require_once("../global_vars.php");

$WorkId = "workId"; // ...should be WorkId

$id = $_GET["id"];
$keyword = $_GET["keyword"];
echo '<h1>';
echo 'Notecards for "'.$keyword.'".';
echo '</h1>';

$mysqli = new mysqli( $host, $username, $password, $database);

if( mysqli_connect_errno())
{
  echo "Error connecting.";
}
else
{
  $query = "";
  $query = $query."select * from Keyword, KeywordNotecard, Notecard";
  $query = $query." where Keyword.id=KeywordNotecard.KeywordId";
  $query = $query." and Notecard.id=KeywordNotecard.NotecardId";
  $query = $query." and Keyword.id=".$id;
  $query = $query.";";
  //echo $query;

  $result = $mysqli->query($query);
  if( $result)
  {
    while( $row = $result->fetch_assoc())
    {
      $getnotecard = "select * from Notecard where id=".$row['NotecardId'].";";
      $notecard = $mysqli->query($getnotecard);
      if( $notecard)
      {
        $notecardrow = $notecard->fetch_assoc();
        $notecardworkid = $notecardrow[$WorkId];
        $notecardcoords = $notecardrow["coords"];
      }
      else
      {
        $notecardworkid = "N/A";
        $notecardcoords = "N/A";
      }

      $getwork = 'select * from Work where id='.$notecardworkid.';';
      $work = $mysqli->query($getwork);
      if( $work)
      {
        $workrow = $work->fetch_assoc();
        $workname = $workrow["Name"];
      }
      else
      {
        $workname = "N/A";
      }

      echo ' - ';
      echo '<a href="./notecard.php?id='.$row['NotecardId'].'">';
      echo $workname." ".$notecardcoords;
      echo '</a>';
      echo ' - ';
    }
  }
  else
  {
    echo "ERROR";
  }

  $mysqli->close();
}

?>
