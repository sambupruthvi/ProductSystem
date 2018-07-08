<?php include("../storescripts/connect_to_mysql.php");
?>
 
 
 <!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin View Orders</title>
<link rel="stylesheet" href="../style/style.css" type="text/css" media="screen" />
</head>
<body>
<div align="center" id="mainWrapper">
  <?php include_once("../storeadmin/admin_header.php");?>
  <div id="pageContent"><br />
 <fieldset>
  <legend>All Orders:</legend>
 <?php echo "<table border='2'><h4><tr><td>Order ID</td><td>Customer Name</td><td>Email</td><td>Customer Address</td><td>Total Price</td><td>Status</td></tr></h4>";
   $sql="select * from Orders";
  $res=$conn2->query($sql);
  foreach($res as $row)
  {
  	echo"<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[6]."</td><td>".$row[7]."</td></tr>";
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