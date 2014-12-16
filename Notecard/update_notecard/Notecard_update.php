<!DOCTYPE html>
<html>
<head>
<link href="../../css/common.css" rel="stylesheet" type="text/css" />
<title>Notecard Update</title>
</head>
<body>
<p id="nav">
<span class="navitem"><a href="../../index.html">Index</a></span>
|
<span class="navitem"><a href="../index.html">Notecard</a></span>
</p>
<h1>Henkel's NoteCards</h1>
<h2>Notecard Table</h2>
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
	$id = $_GET["id"];
	$newName = $_GET["name"];
	if( $newName === "" )
	{
		echo "Can't add empty Notecard name.";
		echo "<p id='nav'>";
		echo "<span class='navitem'><a href='./'>Update an Notecard</a></span>";
		echo "</p>";
	}
	else
	{
		
		$query = $query."update Notecard set name='$newName' where id=$id;";
		$result = $mysqli->query($query);
		if($result)
		{
			echo "Notecard updated.";
			echo "<p id='nav'>";
			echo "<span class='navitem'><a href='./'>Update another Notecard</a></span>";
			echo "</p>";
		}
		else
		{
			echo "Error";
			echo "<p id='nav'>";
			echo "<span class='navitem'><a href='./'>Update an Notecard</a></span>";
			echo "</p>";
		}
	}
}
$mysqli->close();
$mysqli->free();
?>
</body>
</html>