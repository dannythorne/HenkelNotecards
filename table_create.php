<!DOCTYPE html>
<html>
<head>
<title>Add row o table</title>
<head>
<body>
<?php

$name =$_GET["name"];
$age =$_GET["age"];

echo "<div>";
echo "Name: <strong>".$name."</strong>";
echo "</div>";

echo "<div>";
echo " Age <strong".$age."</strong>';
echo "</div>";

$host="";
$username="sdaqiq0";
$password="";
base="sdaqiq0";

$mysqli=new mysqli($host, $username, $password, $database);
if(mysqli_connect_errno())
{
echo "ERRROR!";
}
else
{
$query="insert into ppl values();";
$result=$mysqli->query($query);
if($result)
{
echo"success!";
}
else
{ 
 echo "error: error inserting row!';
}
}


