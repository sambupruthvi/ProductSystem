<?php
include("storescripts/connect_legacy_database.php");
$dynamiclist="";
$sql="select * from parts order by number";
$res=$conn1->query($sql);
$dynamiclist.='<table width="" border="0" cellspacing="0" cellpadding="6">';
$i=0;
foreach($res as $row)
{
	$number=$row["number"];
	$part=$row["description"];
	$price=$row["price"];
	$pic=$row["pictureURL"];
	if($i%3==0)
	$dynamiclist .='
        <tr>
          <td width="11%" valign="top"><a href="product.php?id=' . $number . '"><img style="border:#666 1px solid;" src="' . $pic . '" width="77" height="102" border="1" /></a></td>
          <td width="22%" valign="top">' . $part . '<br />
            $' . $price . '<br />
            <a href="product.php?id=' . $number . '">View Product Details</a></td>';
	else
	$dynamiclist .='<td width="11%" valign="top"><a href="product.php?id=' . $number . '"><img style="border:#666 1px solid;" src="' . $pic . '" width="77" height="102" border="1" /></a></td>
          <td width="22%" valign="top">' . $part . '<br />
            $' . $price . '<br />
            <a href="product.php?id=' . $number . '">View Product Details</a></td>';
			$i++;
       
}
$dynamiclist .=' </tr></table>';
//echo $dynamiclist;
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Store Home page</title>
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen"/>
</head>

<body>
<div align="center" id="mainWrapper">
<?php include_once("template_header.php"); ?>

<div id="pageContent">
  
  <?php echo $dynamiclist; ?></div>
<?php include_once("template_footer.php"); ?>	
</div>
</body>
</html>