<!DOCTYPE html>
<html>
<head>
<title>Title</title>
</head>
<body>

<?php

$keyword = $_GET["Keyword"];
$comment = $_GET["Comment"];


require_once("global_vars.php");

echo "<div>";
echo "Comment: <strong>".$comment."</strong>";
echo "</div>";

$mysqli = new mysqli( $host, $username, $password, $database);

if( mysqli_connect_errno())
{
	echo "ERROR: Error connecting to the database!";
}
else
{
	$query = "insert into Keyword values(0,";
	$query = $query."'";
	$query = $query.$keyword;
	$query = $query."'";
	$query = $query.",";
	$query = $query."'";
	$query = $query.$comment;
	$query = $query."'";
	$query = $query.");";

	echo "<div>";
	echo $query;
	echo "</div>";

	$result = $mysqli->query($query);
	if( $result)
	{
		echo "SUCCESS!";
		echo "<div><a href='./Keyword_read.php'>Show Table</a></div>";
	}
	else
	{
		echo "ERROR: Error inserting row!";

	}
}

$mysqli->close();
?>

</body>
</html>

