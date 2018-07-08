<?php
require("../storescripts/connect_legacy_database.php");
require("../storescripts/connect_to_mysql.php");
if(isset($_POST['hid']))
{  
	$order=$_POST['hid'];
		$out="----------------------------------------------------------------\n                          INVOICE                                         \n----------------------------------------------------------------\n|".str_pad(" Product",40)."|".str_pad("Quantity",10)."|".str_pad("Price",6)."|\n";
   $ship_out="----------------------------------------------------------------\n                      SHIPPING ADDRESS                                    \n----------------------------------------------------------------\n";
	  $orderNumber = $order;
	  
	  $querya = "SELECT partNumber,description,quantity,weight FROM OrderItems WHERE orderId = ".$orderNumber.";";
	  $res=$conn2->query($querya);
	  $out.="|Part Number | Description | Quantity | Weight | \n";
	  foreach($res as $row)
	  {
	  	$out.="|".str_pad("$row[0]",5)."|".str_pad("$row[1]",40)."|".str_pad("$row[2]",6)."|".str_pad("$row[3]",6)."| \n";
	  }
	  $name1=$_SERVER["DOCUMENT_ROOT"] . "/Packing_List_$orderNumber.txt";
	  $fp = fopen($name1,"wb");
	  fwrite($fp,$out);
	  fclose($fp);
	  //header('Content-Type: charset=utf-8');
	  //header("Content-disposition: attachment; filename=$name1");
	  
	  
	$querya = "SELECT orderId,customerName,itemsPrice,shippingHandling,totalPrice FROM Orders WHERE orderId = ".$orderNumber.";";
	$res=$conn2->query($querya);
	foreach($res as $row)
	{
		$out.="OrderID :: ".str_pad("$row[0]",10)."| \n";
		$out.="Customer Name :: ".str_pad("$row[1]",40)."| \n";
		$out.="Items Price :: ".str_pad("$row[2]",10)."| \n";
		$out.="Shipping & Handling Charges :: ".str_pad("$row[3]",10)."| \n";
		$out.="Total Price :: ".str_pad("$row[4]",10)."| \n";
	}
	$name2=$_SERVER["DOCUMENT_ROOT"] . "/Invoice_$orderNumber.txt";
	$fp = fopen($name2,"wb");
	fwrite($fp,$out);
	fclose($fp);
	//header('Content-Type: charset=utf-8');
	//header("Content-disposition: attachment; filename=$name2");
	
	
	$query1="select orderId,customerName,customerAddress from Orders where orderId=$orderNumber;";
	$res2=$conn2->query($query1);
	foreach($res2 as $row2)
	{
		$ship_out.="OrderID :: ".str_pad("$row2[0]",10)."| \n";
		$ship_out.="Customer Name :: ".str_pad("$row2[1]",40)."| \n";
		$ship_out.="Customer Address :: ".str_pad("$row2[2]",100)."| \n";
	}
	$name3=$_SERVER["DOCUMENT_ROOT"] . "/Shipping_Address_$orderNumber.txt";
	$fp1=fopen($name3,"wb");
	fwrite($fp1,$ship_out);
	fclose($fp1);
	echo "Generated";
	$sql="update Orders set status='shipped' where orderId=".$order.";";
	$res=$conn2->query($sql);
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Invoice and Shipping labels generated</title>
</head>

<body>
<div align="center" id="mainWrapper">
<?php include_once("../header_employee.php"); ?>
<div id="pageContent">
  <div style="margin:24px; text-align:center;">
	<br/>
  
  <h4>Packing Lists have been Generated</h4>
  <h4>Invoice has been Generated</h4>
  <h4>Shipping Label has been Generated</h4>
  <h6>Order status Updated</h6>	
  <br><a href="index.php">Home</a>
</div> </div>



<?php include_once("../template_footer.php"); ?>
</div>	
</body>
</html>