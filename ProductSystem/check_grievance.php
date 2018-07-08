<?php
include("storescripts/connect_to_mysql.php");
//include("../storescripts/connect_legacy_database.php");
$output="";

	if(isset($_POST['order']))
	{
		$order=$_POST['order'];
		$sql="select * from Grievances where orderId=".$order.";";
		$res=$conn2->query($sql);
		if($res){
			$output.= "<table border='1'><tr><th>Grievance ID</th><th>Order ID</th><th>Description</th><th>Solution</th><th>Status</th></tr>";
			foreach($res as $row)
			{
				$output.= "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td></tr>";
				$id=$row['number'];
			}
		$output."</table>";
		}
		else
		{
			$output.="<h4>No entries found, Please try again</h4>";
		}
	}

	if(isset($_POST['grId']))
	{
		$grId=$_POST['grId'];
		$sql1="select * from Grievances where gid =".$grId.";";
		$res1=$conn2->query($sql1);
		if($res1){
			$output.= "<table border='1'><tr><th>Grievance ID</th><th>Order ID</th><th>Description</th><th>Solution</th><th>Status</th></tr>";
			foreach($res1 as $row1)
			{
				$output.= "<tr><td>".$row1[0]."</td><td>".$row1[1]."</td><td>".$row1[3]."</td><td>".$row1[4]."</td><td>".$row1[5]."</td></tr>";
			}
			$output."</table>";
		}
		else 
		{
			$output.="<h4>No entries found, Please try again</h4>";
		}
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
<form name="form_ware" id="form_part" action="check_grievance.php" method="post">
<tr><td>Enter Order ID</td><td><input type="text" name="order" id="order"></input></td><td><input type="submit" value="Search"></td></tr>
</form>
<form name="form_ware" id="form_desc" action="check_grievance.php" method="post">
<tr><td>Enter Grievance ID</td><td><input type="text" name="grId" id="grId"></input></td><td><input type="submit" value="Search"></td></tr>
</form>
<?php echo $output; ?></table><br>
	</div>
</div><?php include_once("template_footer.php");?>
</body>
</html>
