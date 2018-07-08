<?php 
	require("../storescripts/connect_to_mysql.php");
	$out="";
	try
	{
	if(isset($_GET['id']))
	{
		$part=$_GET['id'];
	}		
	
	}
	catch(PDOException $e)
	{
		echo "Some thing wrong:".$e->getMessage();
	}
 ?>
 <?php 
	if(isset($_POST['quant']))
	{
		$sql="select availableQuantity from Inventory where PartNumber='$part' limit 1";
		$res=$conn2->query($sql);
		foreach($res as $row)
		$quantity=$row[0];
		
				$quantity=$_POST['quant']+$quantity;
				$sql="UPDATE Inventory SET availableQuantity='$quantity' WHERE PartNumber='$part'";
				$res2=$conn2->query($sql);		
				if($res2)
	$out= "Quantity has been updated"; 
	}
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Receiving Desk Employee Area</title>
<link rel="stylesheet" href="../style/style.css" type="text/css" media="screen" />
</head>
<body>
<div align="center" id="mainWrapper">
  <?php include_once("../header_employee.php");?>
  <div id="pageContent"><br />
  <h1>Receiving Desk Employee Interface</h1>
 
<form action="#" method="post" name="form_quant" id="form_quant"> 
		<table>
			<tr><td>Part Number</td><td><?php echo $part ?>
			<tr><td>Enter the quantity</td><td><input type="text" id="quant" name="quant"></input></td></tr></table>
			<br><input type="submit" value="Update"></input></form>
		<br>
<?php echo $out; ?>
<br><a href="index.php">Home</a>
<br></div>
  <?php include_once("../template_footer.php");?>
</div>
</div>
</div>
</body>
</html>
