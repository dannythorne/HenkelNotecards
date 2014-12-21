<!DOCTYPE html>
<html>
<head>
<link href="../../css/common.css" rel="stylesheet" type="text/css" />
<title>Author | Update</title>
</head>
<body>
<p id="nav">
<span class="navitem"><a href="../../index.html">Index</a></span>
|
<span class="navitem"><a href="../index.html">Author</a></span>
</p>
<h1>Henkel's NoteCards</h1>
<h2>Author Table</h2>
<h3>Update</h3>

<?php
require_once("../../global_vars.php");

$mysqli = new mysqli( $host, $username, $password, $database );

if( mysqli_connect_errno() )
{
  echo "Connection error.";
}
else
{
	$currentName = $_GET["name"];
	$newName = $_GET["newName"];
	if( $newName === "" )
	{
		echo "Can't add empty author name.";
		echo "<p id='nav'>";
		echo "<span class='navitem'><a href='./'>Update an author</a></span>";
		echo "</p>";
	}
	else
	{
		
		$query = $query."update Author set name='$newName' where name='$currentName';";

		$result = $mysqli->query($query);

		if($result)
		{
			echo "Author updated.";
			echo "<p id='nav'>";
			echo "<span class='navitem'><a href='./'>Update another author</a></span>";
			echo "</p>";
		}
		else
		{
			echo "Error";
			echo "<p id='nav'>";
			echo "<span class='navitem'><a href='./'>Update an author</a></span>";
			echo "</p>";
		}
	}
}
$mysqli->close();
$mysqli->free();
?>
</body>
</html>
