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

$mysqli = new mysqli( $host, $username, $password, $database);

if( mysqli_connect_errno())
{
  echo "Error connecting.";
}
else
{

  echo "<div id='comment'>";
  $query = "";
  $query = $query."select * from Keyword where id=".$id.";";
  $result = $mysqli->query($query);
  if( $result)
  {
    $row = $result->fetch_assoc();
    echo $row["Comment"];
  }
  else
  {
  }
  echo "</div>";

  echo "<div>";
  echo "<button onclick='add()'>";
  echo "+";
  echo "</button>";
  echo "</div>";

  echo '<div id="add">';
  echo "</div>";

  echo '<div id="main">';

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

  echo '</div>';

  $mysqli->close();
}
?>

<script>
function add()
{
  var add = document.getElementById("add");
  if( add.style.display == "block") // true only after first click
  {
    add.style.display = "none"; // hide it
  }
  else
  {
    if( !add.style.display) // never been clicked
    {
      var form = document.createElement("form");

      var div;

      // Work dropdown and coords field
      div = document.createElement("div");

      var coordsField = document.createElement("input");
      coordsField.type = "text";
      coordsField.value = "Coords";
      div.appendChild(coordsField);

      div.appendChild(document.createTextNode(" in "));
      var workSelect = document.createElement("select");
      var workOption = document.createElement("option");
      workOption.innerHTML = "Work";
      workSelect.appendChild(workOption);

      var req = new XMLHttpRequest();
      req.onreadystatechange = function()
      {
        if( req.readyState == 4 && req.status == 200)
        {
          workSelect.innerHTML+= req.responseText;
        }
      }
      req.open("GET","work_options.php",true);
      req.send();

      div.appendChild(workSelect);

      form.appendChild(div);

      // Comment textarea
      div = document.createElement("div");
      var commentField = document.createElement("textarea");
      commentField.value = "Comment";
      commentField.rows = "5";
      commentField.cols = "48";
      div.appendChild(commentField);
      form.appendChild(div);

      // Button
      var button = document.createElement("button");
      button.type = "button";
      button.innerHTML = "Add (not yet functional)";
      form.appendChild(button);

      add.appendChild(form);

      // Put the following styles in a stylesheet?
      add.style.position = "absolute";
      add.style.backgroundColor = "#90c090";
      add.style.padding = "1em";
      add.style.borderRadius = "8px";
    }

    add.style.display = "block"; // initialize display style
    // NOTE: Prior to this, the display style of the add div was a "computed"
    // style and no value was being stored in add.style.display (unless someone
    // puts a style attribute on the add div to specify the display style
    // explicely inline, which hopefully will never happen).
  }
}
</script>

</body>
</html>
