<?php
$host = "blitz.cs.niu.edu";
$username = "student";
$password = "student";
$database = "csci467";

try
{
 $conn1 = new PDO("mysql:host=$host;dbname=$database",$username,$password);
 $conn1 -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 //echo "Connected Successfully";
}
catch(Exception $e)
{
echo "Connection failed ".$e->getMessage();
}

?>