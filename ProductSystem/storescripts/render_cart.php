<?php
session_start();
if(isset($_POST['custom']))
{
	$prod_id_array=unserialize($_POST['custom']);
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>render cart</title><?php include("../template_header.php"); ?>
</head>

<body>
 <div align="center">
  <form action="ship_details.php" name="form_2" id="form_2" method="post" style="align:center"> 
	<input type="hidden" name="custom1" id="custom1" value="<?php echo htmlentities($_POST['custom']) ?>" >
	<h5><?php $prod_id_array ?></h5>
	<h5>Order Total Price::<?php echo $_SESSION['grandTotal'];?></h5>
    <input type="submit" value="Check out" />
    </form>  
</div>
</body>
<?php include("../template_footer.php"); ?>
</html>
