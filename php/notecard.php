<html>
<head>
<link href="../css/common.css" rel="stylesheet" type="text/css" />
<link href="../css/main.css" rel="stylesheet" type="text/css" />
<title>Notecard</title>
</head>
<body>
<?php
require_once("../global_vars.php");

$id = $_GET["id"];
$workname = $_GET["workname"];

echo '<div id="nav">';
echo '<a href="../index.html">';
echo 'Home';
echo '</a>';
echo '</div>';


echo '<h1>';
echo 'Notecard';
echo '</h1>';

echo '<div id="main">';

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
        echo '<a href="./keyword.php?id='.$keywordrow["KeywordId"].'&keyword='.$keywordrow["Keyword"].'">';
        echo $keywordrow["Keyword"];
        echo "</a>";
      }
    }
    else
    {
    }

    echo "<span>";
    echo $workname;
    echo " ";
    echo $row["coords"];
    echo "</span>";
    echo "<div>";
    echo $row["Comment"];
    echo "</div>";
  }
  else
  {
    echo "ERROR";
  }

  $mysqli->close();
}
echo '</div>';

?>
</body>
</html>
