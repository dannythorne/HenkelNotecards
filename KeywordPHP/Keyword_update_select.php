<html>
<head>

</head>
<body>

<?php

require_once("global_vars.php");



$mysqli = new mysqli($host, $username, $password, $database);
if(mysqli_connect_errno())
{
	echo "Error connecting to the database.";
}
else
{
	$query = "select * from Keyword;";
	$result = $mysqli->query($query);
	if( $result)
	{
		$numrows = $result->num_rows;
		$numcols = $result->field_count;

		echo "<form action='Keyword_update_form.php'>";
		echo "<select name='id'>";
		while( $row = $result->fetch_row())
		{
			echo "<option ";
			echo "value='".$row[0]."'";
			echo ">";
			echo $row[1];
			echo "</option>";
		}
		echo "</select>";
		echo "&nbsp;";
		echo "<input type='submit' />";
		echo "</form>";
	}
	else
	{
		echo "Error querying the database.";
	} 
	$mysqli->close();
}
?>

</body>
</html>
