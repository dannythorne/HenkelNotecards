<!DOCTYPE HTML>
<html>
<head>
<link href="../../css/common.css" rel="stylesheet" type="text/css"/>
<title>Author | Update</title>
</head>
<body>

<p id="nav">
<span class="navitem"><a href="../../">Index</a></span>
|
<span class="navitem"><a href="../">Author</a></span>
</p>

<h1>Henkel's NoteCards</h1>
<h2>Author Table</h2> 
<h3>Update</h3> 
<h4>Update an Author's name</h4>

<?PHP
require_once("../../global_vars.php");
$mysqli = new mysqli($host, $username, $password, $database);
if( mysqli_connect_errno() )
{
	echo "PHP ERROR: ".mysqli_connect_errno();
}
else
{
	$query = "select Name, id from Author;";
	$result = $mysqli->query($query);
	if( $result )
	{
		$num_rows = $result->num_rows;
		$field_count = $result->field_count;
		$fields = $result->fetch_fields(); //returns an array

		echo '<form action="author_update.php">';
		echo '<div>';
		echo 'Select an Author: <select name="name"/>';
		while( $row = $result->fetch_row() )
		{
			for( $i=0; $i<$field_count; $i+=2 )
			{
				echo"<option value='".$row[$i]."'>'".$row[$i]."'</option>";
			}
		}
		echo '</select>';
		echo '</div>';
		echo '<div>';
		echo 'Enter New Name: <input type="text" name="newName"/>';
		echo '</div>';
		echo '<input type="submit" value="submit"/>';
		echo '</form>';
	}
	else
	{
		echo "QUERY FAILED: ".$mysqli->error;
	}

	$mysqli->free();
	$mysqli->close();
}
?>
</body>
</html>
