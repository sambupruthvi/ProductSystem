<?php include("../storescripts/connect_to_mysql.php");
	include("../storescripts/connect_legacy_database.php");
	?>
    <?php
	$res1=0;
if(isset($_POST['weight'])&&isset($_POST['charges']))
{

	$weight=$_POST['weight'];
	$charges=$_POST['charges'];
	$sql="UPDATE ShippingHandlingCharges SET charges='$charges' where minWeight<='$weight' and maxWeight>'$weight'";
	$res1=$conn2->query($sql);
	
}
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Store Admin Area</title>
<link rel="stylesheet" href="../style/style.css" type="text/css" media="screen" />
</head>
<body>
<div align="center" id="mainWrapper">
  <?php include_once("../storeadmin/admin_header.php");?>
  <div id="pageContent"><br />
  <h1>Admin Interface</h1>
  <form>
 <fieldset>
  <legend>Current Charges:</legend>
 <?php echo "<table border='2'><h4><tr><td>Minimum Weight</td><td>Maximum Weights</td><td>Charges</td></tr></h4>";
   $sql="select * from ShippingHandlingCharges";
  $res=$conn2->query($sql);
  foreach($res as $row)
  {
  	echo"<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td></tr>";
  }
  echo "</table>";
  ?><br>
  </fieldset>
</form>
<table>
<form name="form_admin" id="form_admin" action="#" method="post">
<tr><td>Weight</td><td><input type="text" name="weight" id="weight"></td></tr>
<tr><td>Charges</td><td><input type="text" name="charges" id="charges"></td></tr>
<tr><td><input type="submit" value="Update"></td></tr>
<tr></tr>
</form>
</table><br>
<?php if($res1)
	echo "Charges have been updated"; ?>
<br></div>
  <?php include_once("../template_footer.php");?>
</div>
</div>
</body>
</html>
