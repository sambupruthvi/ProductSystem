<?php
require("../storescripts/connect_to_mysql.php");
$out="";
try
{
	if(isset($_GET['gid']))
	{
		$grev=$_GET['gid'];
		$order=$_GET['order'];
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
		$summ=$_POST['desc'];
		$stat=$_POST['stat'];
		$sql="UPDATE Grievances SET solution = '$summ', status = '$stat' where gId='$grev'";
		//$sql="insert into Grievances(orderId,email,description,status) values($order,'$mail','$desc','$stat')";
		$res=$conn2->query($sql);		
	if($res)
	$out.= "Grievance  ID::".$grev." Updated"; 
				
	}
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Grievance</title>
<link rel="stylesheet" href="../style/style.css" type="text/css" media="screen" />
</head>
<body>
<div align="center" id="mainWrapper">
  <?php include_once("../storeadmin/admin_header.php");?>
  <div id="pageContent"><br />
  <h1>Update Grievance </h1>
 
<form action="#" method="post" name="form_quant" id="form_quant"> 
		<table>
			<tr><td>Grievance Id</td><td><?php echo $grev ?>
			<tr><td>Order Id</td><td><?php echo $order ?>
			<tr><td>Update Solution</td><td><input type="text" id="desc" name="desc"></input></td></tr>
			<tr><td>Select Status</td><td><select id="stat" name="stat">
  				<option value="updated">updated</option>
  				<option value="closed">closed</option></select>
			</td></tr></table>
			<br><input type="submit" value="Update Grievance"></input></form>
		<br>
<?php echo $out; ?>
<br><a href="grievance.php">Home</a>
<br></div>
  <?php include_once("../template_footer.php");?>
</div>
</div>
</div>
</body>
</html>
