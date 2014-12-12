<html>
<head>
<link href="../css/common.css" rel="stylesheet" type="text/css" />
<link href="../css/main.css" rel="stylesheet" type="text/css" />
<title>Notecard</title>
</head>
<body>
<?php
require_once("../global_vars.php");

$WorkId = "WorkId";

$id = $_GET["id"];
$keyword = $_GET["keyword"];

echo '<div id="nav">';
echo '<a href="../index.html">';
echo 'Home';
echo '</a>';
echo '</div>';

echo '<h1>';
echo 'Notecards for "'.$keyword.'".';
echo '</h1>';

echo '<div id="main">';

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

      echo '<a href="./notecard.php';
      echo '?id='.$row['NotecardId'];
      echo '&workname='.$workname;
      echo '">';
      echo $workname." ".$notecardcoords;
      echo '</a>';
    }
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
