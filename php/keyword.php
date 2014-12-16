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
    echo "Query returned no results.";
  }
  echo "</div>";

  echo "<div>";
  echo "<button onclick='showAddBox(".$id.")'>";
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
function showAddBox(id)
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
      form.name = "add";

      var keyword_id_hidden_input = document.createElement("input");
      keyword_id_hidden_input.type = "hidden";
      keyword_id_hidden_input.name = "keyword_id";
      keyword_id_hidden_input.value = id;
      form.appendChild(keyword_id_hidden_input);

      var div;

      // Work dropdown and coords field
      div = document.createElement("div");

      var coordsField = document.createElement("input");
      coordsField.name = "coords";
      coordsField.type = "text";
      coordsField.value = "Coords";
      div.appendChild(coordsField);

      div.appendChild(document.createTextNode(" in "));
      var workSelect = document.createElement("select");
      workSelect.name = "work_select";
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

      // Passage textarea
      div = document.createElement("div");
      var passageField = document.createElement("textarea");
      passageField.name = "passage";
      passageField.value = "Passage";
      passageField.rows = "5";
      passageField.cols = "48";
      div.appendChild(passageField);
      form.appendChild(div);

      // Comment textarea
      div = document.createElement("div");
      var commentField = document.createElement("textarea");
      commentField.name = "comment";
      commentField.value = "Comment";
      commentField.rows = "5";
      commentField.cols = "48";
      div.appendChild(commentField);

      form.appendChild(div);

      // Button
      var button = document.createElement("button");
      button.type = "button";
      button.innerHTML = "Add";
      button.onclick = submitNotecard;
      form.appendChild(button);

      add.appendChild(form);

      // Put the following styles in a stylesheet?
      add.style.position = "absolute";
      add.style.backgroundColor = "#90c090";
      add.style.padding = "1em";
      add.style.borderRadius = "8px";
    }

    add.style.display = "block"; // initialize display style
    // NOTE: Prior to the first time that this point in the code is reached,
    // the display style of the add div was a "computed" style and no value was
    // being stored in add.style.display (unless someone puts a style attribute
    // on the add div to specify the display style explicely inline, which
    // hopefully will never happen).
  }
}

function submitNotecard()
{
  var div = document.getElementById("add");

  var args;
  args = "";
  args+= "WorkId="+document.add.work_select.value;
  args+= "&";
  args+= "KeywordId="+document.add.keyword_id.value;
  args+= "&";
  args+= "coords="+document.add.coords.value;
  args+= "&";
  args+= "Passage="+document.add.passage.value;
  args+= "&";
  args+= "Comment="+document.add.comment.value;

  var req;
  req = new XMLHttpRequest();
  req.onreadystatechange = function()
  {
    if( req.readyState == 4 && req.status == 200)
    {
      div.appendChild(document.createTextNode(req.responseText));
    }
  }
  req.open("POST","notecard_add.php",true);
  req.setRequestHeader("content-type","application/x-www-form-urlencoded");
  req.send(args);
}
</script>

</body>
</html>
