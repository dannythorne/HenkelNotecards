<!DOCTYPE html>
<html>
<head>
<title>Keyword_read</title>
</head>
<body>

<?php

require_once("global_vars.php");

$mysqli = new mysqli( $host, $username, $password, $database);

if( mysqli_connect_errno())
{
	echo "<div>";
	echo "Error: ".mysqli_connect_errno();
	echo "</div>";
}
else
{
	echo "<div>Connected Successfully!</div>";
	$query = "select * from Keyword;";
	$result = $mysqli->query($query);

	if( $result)
	{
		echo "Query worked!";

		$numrows = $result->num_rows;
		$numcols = $result->field_count;
		$fields = $result->fetch_fields();

		echo "<div>";
		echo "numrows: ".$numrows;
		echo "</div>";

		echo "<div>";
		echo "numcols: ".$numcols;
		echo "</div>";

		echo "<table border='1' cellpadding='4' cellspacing='0'>";
		echo "<tr>";

		for( $i = 0; $i < $numcols; $i++)
		{
			echo "<th>";
			echo $fields[$i]->name;
			echo "</th>";
		}
		echo "</tr>";

		while( $row = $result->fetch_row())
		{
			echo "<tr>";

			for( $i = 0; $i < $numcols; $i++)
			{
				echo "<td>";
				echo $row[$i];
				echo "</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	}
	else
	{
		echo "ERROR: ".$mysqli->error;
	}

	$result->free();
	$mysqli->close();
}
?>

</body>
</html>
