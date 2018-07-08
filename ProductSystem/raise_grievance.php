<?php
include("storescripts/connect_to_mysql.php");
//include("../storescripts/connect_legacy_database.php");
$output="";
$id=0;
$email=null;
try
{

	if(isset($_POST['order']))
	{
		$order=$_POST['order'];
		$sql="select * from Orders where orderId=".$order.";";
		$res=$conn2->query($sql);
		if($res!=null)
		{
			$output.="<table border='1'><tr><th>Order ID</th><th>Customer Name</th><th>Email</th><th>Status</th></tr>";
			foreach($res as $row)
			{
				$output.= "<tr><td><a href='raise.php?id=".$row[0]."&email=".$row[2]."'>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[7]."</td></tr>";
			}
			$output.="</table>";
		}
		else
		{
			$output.="<h4>No entries found, Please try again</h4>";
		}
			
	}

	if(isset($_POST['email']))
	{
		$mail=$_POST['email'];
		$sql1="select * from Orders where email like '%".$mail."%';";
		$res1=$conn2->query($sql1);
		if($res1!=null)
		{
			$output.="<table border='1'><tr><th>Order ID</th><th>Customer Name</th><th>Email</th><th>Status</th></tr>";
			foreach($res1 as $row1)
			{
				$output.= "<tr><td><a href='raise.php?id=".$row1[0]."&email=".$row1[2]."'>".$row1[0]."</td><td>".$row1[1]."</td><td>".$row1[2]."</td><td>".$row1[7]."</td></tr>";
			}
			$output.="</table>";
		}
		else
		{
			$output.="<h4>No entries found, Please try again</h4>";
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
<title>View Customer Grievances</title>
<link rel="stylesheet" href="../style/style.css" type="text/css" media="screen" />
</head>
<body>
<div align="center" id="mainWrapper">
  <?php include_once("template_header.php");?>
  <div id="pageContent"><br />
  <h3>Please enter any of the info to search</h3>
<table>
<form name="form_ware" id="form_part" action="raise_grievance.php" method="post">
<tr><td>Search by Order ID</td><td><input type="text" name="order" id="order"></input></td><td><input type="submit" value="Search"></td></tr>
</form>
<form name="form_ware" id="form_desc" action="raise_grievance.php" method="post">
<tr><td>Search by Email</td><td><input type="text" name="email" id="email"></input></td><td><input type="submit" value="Search"></td></tr>
</form>
<?php echo $output; ?></table><br>
	</div>
</div><?php include_once("template_footer.php");?>
</body>
</html>
