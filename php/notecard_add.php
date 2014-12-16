<?php
require_once("../global_vars.php");

$mysqli = new mysqli( $host, $username, $password, $database);

$WorkId = $_POST["WorkId"];
$KeywordId = $_POST["KeywordId"];
$coords = $mysqli->real_escape_string($_POST["coords"]);
$Passage = $mysqli->real_escape_string($_POST["Passage"]);
$Comment = $mysqli->real_escape_string($_POST["Comment"]);

if( mysqli_connect_errno())
{
  echo "Error connecting.";
}
else
{
  $query = "insert into Notecard values(0,'".$coords."','".$Passage."','".$Comment."',0,".$WorkId.");";

  $result = $mysqli->query($query);

  if( $result)
  {
    echo "Added notecard.";

    $query = "insert into KeywordNotecard values(".$KeywordId.",".$mysqli->insert_id.")";

    $result = $mysqli->query($query);

    if( $result)
    {
      echo " Added KeywordNotecard relationship.";
    }
    else
    {
      echo "ERROR";
    }
  }
  else
  {
    echo "ERROR";
  }

  $mysqli->close();
}

?>
