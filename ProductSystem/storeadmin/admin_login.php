<?php 

session_start();
if (isset($_SESSION["manager"])) {
    header("location: index.php"); 
    exit();
}
?>
<?php 
// Parse the log in form if the user has filled it out and pressed "Log In"
if ($_SERVER["REQUEST_METHOD"]=="POST") {

	/*$manager = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]); // filter everything but numbers and letters
    $password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]); // filter everything but numbers and letters*/
    // Connect to the MySQL database  
    $manager=$_POST["username"];
	$password=$_POST["password1"];
	include ("../storescripts/connect_to_mysql.php"); 
    $sql = "SELECT id FROM Admin WHERE password='$password' AND username='$manager'"; // query the person
    // ------- MAKE SURE PERSON EXISTS IN DATABASE ---------
	$sql2 = "SELECT COUNT(id) FROM Admin WHERE username='$manager' AND password='$password'";
	//echo $sql;
	//echo $sql2;
    $res=$conn2->query($sql);
	//$res2=$conn2->query($sql2);
	//$count=0;
	/*foreach($res as $row)
	{
		//$count=$row["COUNT(id)"];
		echo $row["id"];
	}*/
	/*foreach($res2 as $row1)
	{
		$count=$row1[COUNT(id)];
	}*/
	//echo $count;
	//$existCount = rowCount($res); // count the row nums
    if ($res !=null) 
	{ // evaluate the count
	     while($row = $res->fetch())
		 { 
             $id = $row["id"];
			 //echo $row["id"];
		 }
		 
		 $_SESSION["id"] = $id;
		 $_SESSION["manager"] = $manager;
		 $_SESSION["password"] = $password;
		 header("location: index.php");
         exit();
    } else
	 {
		echo 'That information is incorrect, try again <a href="admin_login.php">Click Here</a>';
		exit();
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Log In </title>
<link rel="stylesheet" href="../style/style.css" type="text/css" media="screen" />
</head>

<body>
<div align="center" id="mainWrapper">
  <?php include_once("../storeadmin/admin_header.php");?>
  <div id="pageContent"><br />
    <div align="left" style="margin-left:24px;">
      <h2>Please Log In To Manage the Store</h2>
      <form id="form1" name="form1" method="post" action="admin_login.php">
        User Name:<br />
          <input name="username" type="text" name="username" id="username" size="40" />
        <br /><br />
        Password:<br />
       <input name="password1" type="text" name="password1" id="password1" size="40" />
       <br />
       <br />
       <br />
       
         <input type="submit" name="button" id="button" value="Log In" />
       
      </form>
      <p>&nbsp; </p>
    </div>
    <br />
  <br />
  <br />
  </div>
  <?php include_once("../template_footer.php");?>
</div>
</body>
</html>