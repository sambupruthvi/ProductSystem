<?php
$host = "students";
$username = "z1808821";
$password = "1991Jul05";
$database = "z1808821";

try
{
	$conn2 = new PDO("mysql:host=$host;dbname=$database",$username,$password);
	$conn2 -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	//echo "Connected Successfully";
}
catch(Exception $e)
{
	echo "Connection failed ".$e->getMessage();
}
?>