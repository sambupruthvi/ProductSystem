<?php 
require("connect_to_mysql.php");
session_start();
$prod_id_array="";
$out="";
if(isset($_POST['custom2']))
{
	$prod_id_array=unserialize($_POST['custom2']);
	//$prod_id_array=serialize($prod_id_array);
}


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Customer Details</title>
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen"/>
</head>

<body>
<div align="center" id="mainWrapper">
<?php include_once("../template_header.php"); ?>
<div id="pageContent">
  <div style="margin:24px; text-align:left;">
	<br/>
  </div>
  <?php echo $prod_id_array; ?>
  <form action="PaymentPage.php" name="cust_details" id="cust_details" method="post">
  <input type="hidden" name="custom3" id="custom3" value="<?php echo htmlentities($_POST['custom2']); ?>">
  <table>
  <?php $prod_id_array=serialize($prod_id_array)?>
  <tr><td></td><td><h5 align="center">Please Enter Your Details</h5></td>
  <tr><td>Name:</td><td><input type="text" id="cust_name" name="cust_name" required/></td>
  <tr><td>Email:</td><td><input type="text" id="cust_email" name="cust_email" required/></td>
  <tr><td>Shipping Address:</td><td><textarea name="address" id="address" required></textarea></td></tr>
  <tr><td></td><td><input type="submit" name="Submit" value="Submit"></td></tr>
  <?php echo $out; ?></table></form>
</div> 



<?php include_once("../template_footer.php"); ?>
</div>	
</body>
</html>
