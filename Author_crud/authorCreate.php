<!DOCTYPE HTML>
<html>
<head>
<title>Henkel's Notecards | Authors</title>
</head>
<body>
<h1>Henkel's Notecards</h1>
<h2>Author Table</h2>
<h3>Add an author</h3>

<?PHP
	require_once("global_vars.php");

	$mysqli = new mysqli($host, $username, $password, $database);

	if( mysqli_connect_errno() )
	{
		echo "Your dumb and I hate you."
	}
	else
	{
		// Create a box to type in an author name
		// maybe show the author table to make it easy for the user
		// Check user input to make sure it is a valid string
		// add given author to the author table.
	}

</body>
</html>
