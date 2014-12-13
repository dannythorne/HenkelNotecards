<!DOCTYPE html>
<html>
<head>
<link href="../../css/common.css" rel="stylesheet" type="text/css" />
<title>Notecard Create</title>
</head>
<body>
<p id="nav">
<span class="navitem"><a href="../../index.html">Index</a></span>
|
<span class="navitem"><a href="../index.html">Notecard</a></span>
</p>
<h1>Henkel's NoteCards</h1>
<h2>Notecard Table</h2>
<h3>Create</h3>

<?php
require_once("../../global_vars.php");
$mysqli = new mysqli( $host, $username, $password, $database );
if( mysqli_connect_errno() )
{
  echo "Connection error.";
}
else
{
	$Notecard = $_GET["Notecard"];
	if( $Notecard === "" )
	{
		echo "Can't add empty Notecard name.";
		echo "<p id='nav'>";
		echo "<span class='navitem'><a href='./'>Add a Notecard</a></span>";
		echo "</p>";
	}
	else
	{
		$query = $query."insert into Notecard values(0,";
		$query = $query."'".$Notecard."');";
		$result = $mysqli->query($query);
		if($result)
		{
			echo "$Notecard "; 
			echo "added.";
			echo "<p id='nav'>";
			echo "<span class='navitem'><a href='./'>Add Notecard Notecard</a></span>";
		}
		else
		{
			echo "Error";
			echo "<span class='navitem'><a href='./'>Add an Notecard</a></span>";
		}
	}
}
$mysqli->close();
$mysqli->free();
?>


</body>
</html>
