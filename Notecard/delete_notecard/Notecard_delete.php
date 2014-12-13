<!DOCTYPE html>
<html>
<head>
<link href="../../css/common.css" rel="stylesheet" type="text/css" />
<title>Notecard Delete</title>
</head>
<body>
<p id="nav">
<span class="navitem"><a href="../../index.html">Index</a></span>
|
<span class="navitem"><a href="../index.html">Notecard</a></span>
</p>
<h1>Henkel's NoteCards</h1>
<h2>Notecard Table</h2>
<h3>Delete</h3>

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
  $query = $query."delete from Notecard where id=";
  $query = $query.$id;
  $result = $mysqli->query($query);
  if($result)
  {
		echo "$id "; 
		echo "deleted.";
		echo "<p id='nav'>";
		echo "<span class='navitem'><a href='./'>Delete another Notecard</a></span>";
		echo "</p>";
  }
  else
  {
		echo "Error";
		echo "<p id='nav'>";
		echo "<span class='navitem'><a href='./'>Delete an Notecard</a></span>";
		echo "</p>";
	}
}
$mysqli->close();
$mysqli->free();
?>