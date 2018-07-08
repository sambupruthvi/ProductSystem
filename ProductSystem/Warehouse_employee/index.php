<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Warehouse Employee Interface</title>
<link rel="stylesheet" href="../style/style.css" type="text/css" media="screen" />
</head>
<body>
<div align="center" id="mainWrapper">
  <?php 
  require("../storescripts/connect_to_mysql.php");
//  require("../storescripts/connect_to_mysql.php");
  require("../storescripts/connect_legacy_database.php");
  include_once("../header_employee.php");
  $out="vvyh";
  ?>
  <div id="pageContent"><br />
  <h1>Warehouse Employee Interface</h1>
 <fieldset>
  <legend>Orders to be processed</legend>
  <?php 
  
  $order=0;
  $sql="select distinct orderId from Orders where status='open'";
  $res=$conn2->query($sql);
  echo "<table border='2'><h4><tr><td>Order ID</td><td>Status</td></tr></h4>";
  foreach($res as $row)
  {
	  $order=$row[0];
  echo "<form action='generate.php' method='post'><tr><td>".$row[0]."</td><td><input type='hidden' id='hid' name='hid' value=".$row[0]."><input type='submit' value='Process'></td></tr>";
  echo "</form>";
  }
  
  echo "</table>";


  ?>
  <br>
  <br>
 </fieldset>



</div>
  <?php include_once("../template_footer.php");?>
</div>
</div>
</div>
</body>
</html>
