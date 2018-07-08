<?php
//echo $_GET['id'];
if(isset($_GET['id']))
{
	include("storescripts/connect_legacy_database.php");
	$num=$_GET['id'];
	//$num=preg_replace('#[^0-9]#i', '', $_GET['num']);
	$sql="select * from parts where number='$num'";
	$res=$conn1->query($sql);
	foreach($res as $row)
	{
	$num=$row["number"];
	$part=$row["description"];
	$price=$row["price"];
	$pic=$row["pictureURL"];
	
	}
}
else
{
	echo "Data to render this page is missing";
	exit();
}
//mysql_close();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $part; ?></title>
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" />
</head>
<body>
<div align="center" id="mainWrapper">
  <?php include_once("template_header.php");?>
  <div id="pageContent">
  <table width="100%" border="0" cellspacing="0" cellpadding="15">
  <tr>
    <td width="19%" valign="top"><img src="<?php echo $pic; ?>" width="142" height="188" alt="<?php echo $part; ?>" /><br />
      <a href="<?php echo $pic; ?>">View Full Size Image</a></td>
    <td width="81%" valign="top"><h3><?php echo $part; ?></h3>
      <p><?php echo "$".$price; ?><br />
        <br />
        
        </p>
      <form id="form1" name="form1" method="post" action="cart.php">
        <p>
          <input type="hidden" name="pid" id="pid" value="<?php echo $num; ?>" />
          Quantity
          
          <input type="text" name="quant" id="quant" />
        </p>
        <p>
          <input type="submit" name="button" id="button" value="Add to Shopping Cart" />
        </p>
      </form>
      </td>
    </tr>
</table>
  </div>
  <?php include_once("template_footer.php");?>
</div>
</body>
</html>