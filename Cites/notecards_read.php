<?php
require_once("../global_vars.php");

$id = "Id"; // ...pending change to "id".

$mysqli = new mysqli( $host, $username, $password, $database);

if( mysqli_connect_errno())
{
  echo "Error connecting.";
}
else
{
  $query = "";
  $query = $query."select * from Notecard ";
  $query = $query." where id in (";
  $query = $query."select NotecardId from Cites";
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
      $getkeyword = "";
      $getkeyword = $getkeyword."select * from Keyword";
      $getkeyword = $getkeyword."            , KeywordNotecard";
      $getkeyword = $getkeyword."            , Notecard";
      $getkeyword = $getkeyword."        where ";
      $getkeyword = $getkeyword."Keyword.id=KeywordNotecard.KeywordId";
      $getkeyword = $getkeyword." and ";
      $getkeyword = $getkeyword."Notecard.id=KeywordNotecard.NotecardId";
      $getkeyword = $getkeyword." and ";
      $getkeyword = $getkeyword."Notecard.id=".$row[$id];
      $getkeyword = $getkeyword.";";

      $keyword = $mysqli->query($getkeyword);
      $keywords = "";
      while( $keywordrow = $keyword->fetch_assoc())
      {
        $keywords = $keywords." \"".$keywordrow["Keyword"]."\"";
      }

      $getwork = "select * from Work where id=".$row['workId'].";";
      $work = $mysqli->query($getwork);
      $workrow = $work->fetch_assoc();
      $workname = $workrow["Name"];

      echo "<option value='".$row[$id]."'>";
      echo $keywords." in ".$workname;
      echo "</option>";
    }
  }
  else
  {
    echo "Error querying.";
  }

}

?>
