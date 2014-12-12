<?php
require_once("../global_vars.php");

$id = $_GET["id"];
$workname = $_GET["workname"];

$mysqli = new mysqli( $host, $username, $password, $database);

if( mysqli_connect_errno())
{
  echo "Error connecting";
}
else
{
  $query = "";
  $query = $query.'select * from Notecard where id='.$id.';';

  $result = $mysqli->query($query);
  if( $result)
  {
    $row = $result->fetch_assoc();

    $getkeywords = "";
    $getkeywords = $getkeywords."select * from ";
    $getkeywords = $getkeywords."  Keyword";
    $getkeywords = $getkeywords.", KeywordNotecard";
    $getkeywords = $getkeywords.", Notecard";
    $getkeywords = $getkeywords." where ";
    $getkeywords = $getkeywords." Keyword.id=KeywordNotecard.KeywordId ";
    $getkeywords = $getkeywords." and ";
    $getkeywords = $getkeywords." Notecard.id=KeywordNotecard.NotecardId ";
    $getkeywords = $getkeywords." and ";
    $getkeywords = $getkeywords." Notecard.id=".$id;
    $getkeywords = $getkeywords.";";
    $keywords = $mysqli->query($getkeywords);
    if($keywords)
    {
      while( $keywordrow = $keywords->fetch_assoc())
      {
        echo " - ";
        echo '<a href="./keyword.php?id='.$keywordrow["KeywordId"].'&keyword='.$keywordrow["Keyword"].'">';
        echo $keywordrow["Keyword"];
        echo "</a>";
        echo " - ";
      }
    }
    else
    {
    }

    echo "<h1>";
    echo $workname;
    echo " ";
    echo $row["coords"];
    echo "</h1>";
    echo $row["Comment"];
  }
  else
  {
    echo "ERROR";
  }

  $mysqli->close();
}

?>
