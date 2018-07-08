<?php
require("storescripts/connect_to_mysql.php");
$out="";
try
{
	if(isset($_GET['id']))
	{
		$order=$_GET['id'];
		$mail=$_GET['email'];
	}

}
catch(PDOException $e)
{
	echo "Some thing wrong:".$e->getMessage();
}
?>
 <?php 
	if(isset($_POST['desc']))
	{
		$desc=$_POST['desc'];
		$stat="open";
		$sql="insert into Grievances(orderId,email,description,status) values($order,'$mail','$desc','$stat')";
		$res=$conn2->query($sql);		
	if($res)
	$out.= "Grievance Raised, ID::"; 
	$sql1="select max(gId) from Grievances";
	$res1=$conn2->query($sql1);
	foreach($res1 as $row1)
	{
		$out.=$row1[0];
	}
				
	}
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Customer Grievance</title>
<link rel="stylesheet" href="../style/style.css" type="text/css" media="screen" />
</head>
<body>
<div align="center" id="mainWrapper">
  <?php include_once("template_header.php");?>
  <div id="pageContent"><br />
  <h1>Enter Grievance Details</h1>
 
<form action="#" method="post" name="form_quant" id="form_quant"> 
		<table>
			<tr><td>Order Id</td><td><?php echo $order ?>
			<tr><td>Order Id</td><td><?php echo $mail ?>
			<tr><td>Describe your Grievance</td><td><input type="text" id="desc" name="desc"></input></td></tr></table>
			<br><input type="submit" value="Raise Grievance"></input></form>
		<br>
<?php echo $out; ?>
<br><a href="index.php">Home</a>
<br></div>
  <?php include_once("template_footer.php");?>
</div>
</div>
</div>
</body>
</html>
