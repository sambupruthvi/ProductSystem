<?php
include("../storescripts/connect_to_mysql.php");
//include("../storescripts/connect_legacy_database.php");
$output="";
$id=0;
try
{
	
	if(isset($_POST['num']))
	{
	$num=$_POST['num'];
	$sql="select * from Inventory where partNumber=".$num.";";
	$res=$conn2->query($sql);
	if($res)
	foreach($res as $row)
		{
		$output.= "<table border='1' width='400'><tr><td><a href='update.php?id=".$row[0]."'>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td></tr></table>";
		$id=$row['number'];
		}
	}

	if(isset($_POST['descr']))
	{
	$descr1=$_POST['descr'];
	$sql1="select * from Inventory where description like '%".$descr1."%';";
	$res1=$conn2->query($sql1);
	if($res1)
	{
		$output.="<table border=1 width='400'>";
		foreach($res1 as $row)
		{
			$output.= "<tr><td><a href='update.php?id=".$row[0]."'>".$row[0]."</a></td><td>".$row[1]."</td><td>".$row[2]."</td></tr>";
			//	$id=$row[0];
		}
		$output.="</table>";
	}
	}
	
}
catch(PDOException $e)
{
	$output.="No item found".$e->getMessage();
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
<table>
<form name="form_ware" id="form_part" action="index.php" method="post">
<tr><td>Enter part number</td><td><input type="text" name="num" id="num"></input></td><td><input type="submit" value="Search"></td></tr>
</form>
</table>
<table>
<form name="form_ware" id="form_desc" action="index.php" method="post">
<tr><td>Enter description of Auto part</td><td><input type="text" name="descr" id="descr"></input></td><td><input type="submit" value="Search"></td></tr>
</form>
</table><br>
<?php echo $output; ?>
</br></div>
  <?php include_once("../template_footer.php");?>
</div>
</div>
</div>
</body>
</html>
