<?php


//0.get parameters input
$light = 0;
$humi = 0;
$temp = 0;


if (!empty($_GET['light'])) {
  $light = $_GET['light'];
}
if (!empty($_GET['humi'])) {
  $humi = $_GET['humi'];
}
if (!empty($_GET['temp'])) {
  $temp = $_GET['temp'];
}

//1.conncet db
$mysqli = new mysqli("localhost","test123","test123","aiotdb");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
else
{
	echo "Succes";
}
//2.query db
$sqlquery = "insert into sensors (light,humi,temp) VALUES ($light,$humi,$temp)";
$result = $mysqli -> query($sqlquery);


//3.close db

$mysqli -> close();

header( "Location: http://localhost/aiot/");

?>