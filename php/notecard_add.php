<?php
require_once("../global_vars.php");

$mysqli = new mysqli( $host, $username, $password, $database);

$WorkId = $_POST["WorkId"];
$KeywordId = $_POST["KeywordId"];
$coords = $mysqli->real_escape_string($_POST["coords"]);
$Passage = $mysqli->real_escape_string($_POST["Passage"]);
$Comment = $mysqli->real_escape_string($_POST["Comment"]);

echo "[";
echo $WorkId;
echo "]";
echo "[";
echo $KeywordId;
echo "]";
echo "[";
echo $coords;
echo "]";
echo "[";
echo $Comment;
echo "]";
echo "[";
echo $Passage;
echo "]";

if( mysqli_connect_errno())
{
  echo "Error connecting.";
}
else
{
  $query = "insert into Notecard values(0,'".$coords."','".$Passage."','".$Comment."',0,".$WorkId.");";

  $result = $mysqli->query($query);

  if( $result) { echo "SUCCESS"; } else { echo "ERROR"; }

  $query = "insert into KeywordNotecard values(".$KeywordId.",".$mysqli->insert_id.")";

  $result = $mysqli->query($query);

  if( $result) { echo "SUCCESS"; } else { echo "ERROR"; }

  $mysqli->close();
}

?>
