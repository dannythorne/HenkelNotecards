(!DOTYPE html)
<html>
<head>
<title> Bla</title>
</head>
<body>

<?php
echo "hello, PHP!";

$host ="";

$username ="sdaqiq0";

$password ="";

$database ="sdaqiq0";

$mysqli = new mysqli($host, $username, $password, $database);
if( mysqli_connect_errno())
{echo "<div>";
 echo "Error";
 echo "</div>;


}
else
{ echo "<div>Connected Successfully!</div>";
 $mysqli->close();
}
$mysqli->close();

?>
</body>
</html>

