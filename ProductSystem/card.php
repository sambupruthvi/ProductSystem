<html>
   <head>
       <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link href="stylesheet.css" type="text/css" rel="stylesheet">
   </head>
    <body>
        <div id="cardDetails">
          <form action="#" >
           <div class="cardHeader"><b>Card Details </b></div>
            <table>
                <tr>
                    <td><p>Card Number</p></td>
                    <td><input type="text" id="cardNumberBox"class="form-control"/></td>
                </tr>
                <tr>
                    <td><p>Expiry Date</p></td>
                    <td><input type="text" placeholder="MM/YYYY"id="expiryDateBox" class="form-control"/></td>
                </tr>
                <tr>
                    <td><p>Holder Name</p></td>
                    <td><input type="text" id="holderNameBox" class="form-control"/></td>
                </tr>
                <tr>
                    <td><p>cvv</p></td>
                    <td><input type="text" id="CvvBox" class="form-control"/></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <table class="cardButtons">
                            <tr>
                                <td><input type="button" id="proceed"class="btn-default" onclick="this.form.submit()" value="Proceed">
                                </td>
                                <td><input type="reset" id="cancel" class="btn-default" value="Cancel">
                                </td>
                            </tr>
                        </table>
                    </td>
                    
                </tr>
            </table>
            
        </div>
        </form>
        </div>
        <script src="card.js" type="application/javascript"></script>
    </body>
</html>
<?php

    $cardNumber=$_POST['cardNumberBox'];
    $expiryDate=$_POST['expiryDateBox'];
    $holderName=$_POST['holderNameBox'];
    $cvv=$_POST['CvvBox'];
 

    $connection = mysql_connect("localhost", "root", "");
    $db = mysql_select_db("your database", $connection);
    $query = mysql_query("Your Query", $connection);
    header("location:login.php");
?>


?>