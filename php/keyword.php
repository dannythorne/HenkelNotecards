<?php
require_once("../global_vars.php");

$id = $_GET["id"];
$keyword = $_GET["keyword"];
echo 'Notecard for "'.$keyword.' (id='.$id.')". (TODO)';

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
      echo " Notecard ".$row['NotecardId']." ";
    }
  }
  else
  {
    echo "ERROR";
  }

  $mysqli->close();
}

?>
