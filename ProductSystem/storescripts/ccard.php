
<?php 
include("connect_to_mysql.php");
if(isset($_POST['custom3']))
{
	$prod_id_array=unserialize($_POST['custom3']);
}
if(isset($_POST['cust_name'])&&isset($_POST['address'])&&$_POST['address']!=""&&$_POST['cust_name']!="")
{
	//echo "contents in array".$prod_id_array;
$name=$_POST['cust_name'];
//$email=$_POST['cust_email'];
$address=$_POST['address'];
$sql="INSERT INTO orders(cust_name,ship_address,prod_quant) VALUES('$name','$address','$prod_id_array')";
$res=$conn2->query($sql);	
}
?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>