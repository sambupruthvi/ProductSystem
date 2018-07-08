<?php include("../storescripts/connect_to_mysql.php");
?>
 
 
 <!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin View Grievances</title>
<link rel="stylesheet" href="../style/style.css" type="text/css" media="screen" />
</head>
<body>
<div align="center" id="mainWrapper">
  <?php include_once("../storeadmin/admin_header.php");?>
  <div id="pageContent"><br />
 <fieldset>
  <legend>All Grievances:</legend>
 <?php echo "<table border='2'><h4><tr><td>Grievance Id</td><td>Order ID</td><td>Email</td><td>Description</td><td>Solution</td><td>Status</td></tr></h4>";
   $sql="select * from Grievances";
  $res=$conn2->query($sql);
  foreach($res as $row)
  {
  	echo"<tr><td><a href='update_grievance.php?gid=".$row[0]."&order=".$row[1]."'>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td></tr>";
  }
  echo "</table>";
  ?><br>
  </fieldset>
</div>
  <?php include_once("../template_footer.php");?>
</div>
</div>
</body>
</html>