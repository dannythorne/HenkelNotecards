<!DOCTYPE html>
<html>
<head>
<link href="../../css/common.css" rel="stylesheet" type="text/css" />
<title>Author | Create</title>
</head>
<body>
<p id="nav">
<span class="navitem"><a href="../../index.html">Index</a></span>
|
<span class="navitem"><a href="../index.html">Author</a></span>
</p>
<h1>Henkel's NoteCards</h1>
<h2>Author Table</h2>
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
	$author = $_GET["author"];
	if( $author === "" )
	{
		echo "Can't add empty author name.";
		echo "<p id='nav'>";
		echo "<span class='navitem'><a href='./'>Add an author</a></span>";
		echo "</p>";
	}
	else
	{

		$query = $query."insert into Author values(0,";
		$query = $query."'".$author."');";

		$result = $mysqli->query($query);

		if($result)
		{
			echo "$author "; 
			echo "added.";

			echo "<p id='nav'>";
			echo "<span class='navitem'><a href='./'>Add another author</a></span>";
		}
		else
		{
			echo "Error";
			echo "<span class='navitem'><a href='./'>Add an author</a></span>";
		}
	}
}
$mysqli->close();
$mysqli->free();

?>


</body>
</html>
