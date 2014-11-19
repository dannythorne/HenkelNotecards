<-- jfkdal;fjdf -->
<!DOCTYPE HTML>
<html>
<head>
<title>Henkel's Notecards | Authors</title>
</head>
<body>
<h1>Henkel's Notecards</h1>
<h2>Author Table</h2>

<?PHP
	require_once("global_vars.php");

	$mysqli = new mysqli($host, $username, $password, $database);

	if( mysqli_connect_errno() )
	{
		echo "PHP ERROR: ".mysqli_connect_errno();
	}
	else
	{

		$query = "select Name from Author;";

		$result = $mysqli->query($query);

		if( $result )
		{

			$num_rows = $result->num_rows;
			$field_count = $result->field_count;
			$fields = $result->fetch_fields(); //returns an array

			echo "<table>";
			echo "<tr>";

			for($i = 0; $i < $field_count; $i++)
			{
				echo "<th>";
				echo $fields[$i]->name;
				echo "</th>";
			}
			echo "</tr>";

			while( $row = $result->fetch_row() )
			{
				echo "<tr>";
				for( $i=0; $i<$field_count; $i++ )
				{
					echo "<td>";
					echo "$row[$i]";
					echo "</td>";
				}
			}
			echo "</table>";
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
