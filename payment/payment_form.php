<?php
session_start();
// include the config file
include('./config.php');

if($_POST['p_id'] == $_SESSION['p_id'] && $_POST['price']== $_SESSION['price'] ){

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sanitize  posted values and insert into the table

// insert into order table
$sql = "INSERT INTO orders ( name, phone_no, district, block_name, panchayat_name, delivery_address, p_name)
VALUES ('John', 'Doe', 'john@example.com')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


}




?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PayUmoney BOLT PHP7 Kit</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<!-- this meta viewport is required for BOLT //-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" >
<!-- BOLT Sandbox/test //-->
<script id="bolt" src="https://sboxcheckout-static.citruspay.com/bolt/run/bolt.min.js" bolt-
color="e34524" bolt-logo="http://boltiswatching.com/wp-content/uploads/2015/09/Bolt-Logo-e14421724859591.png"></script>
<!-- BOLT Production/Live //-->
<!--// script id="bolt" src="https://checkout-static.citruspay.com/bolt/run/bolt.min.js" bolt-color="e34524" bolt-logo="http://boltiswatching.com/wp-content/uploads/2015/09/Bolt-Logo-e14421724859591.png"></script //-->

</head>
<style type="text/css">
	.main {
		margin-left:30px;
		font-family:Verdana, Geneva, sans-serif, serif;
	}
	.text {
		float:left;
		width:180px;
	}
	.dv {
		margin-bottom:5px;
	}
</style>
<body>
<div class="main">
	<div>
    	<img src="images/payumoney.png" />
    </div>
    <div>
    	<h3>PHP7 BOLT Kit</h3>
    </div>
	<form action="#" id="payment_form">
    <input type="hidden" id="udf5" name="udf5" value="BOLT_KIT_PHP7" />
    <input type="hidden" id="surl" name="surl" value="<?php echo getCallbackUrl(); ?>" />
    <div class="dv">
    <span class="text"><label>Merchant Key:</label></span>
    <span><input type="text" id="key" name="key" placeholder="Merchant Key" value="" /></span>
    </div>
    
    <div class="dv">
    <span class="text"><label>Merchant Salt:</label></span>
    <span><input type="text" id="salt" name="salt" placeholder="Merchant Salt" value="" /></span>
    </div>
    
    <div class="dv">
    <span class="text"><label>Transaction/Order ID:</label></span>
    <span><input type="text" id="txnid" name="txnid" placeholder="Transaction ID" value="<?php echo  "Txn" . rand(10000,99999999)?>" /></span>
    </div>
    
    <div class="dv">
    <span class="text"><label>Amount:</label></span>
    <span><input type="text" id="amount" name="amount" placeholder="Amount" value="6.00" /></span>    
    </div>
    
    <div class="dv">
    <span class="text"><label>Product Info:</label></span>
    <span><input type="text" id="pinfo" name="pinfo" placeholder="Product Info" value="P01,P02" /></span>
    </div>
    
    <div class="dv">
    <span class="text"><label>First Name:</label></span>
    <span><input type="text" id="fname" name="fname" placeholder="First Name" value="" /></span>
    </div>
    
    <div class="dv">
    <span class="text"><label>Email ID:</label></span>
    <span><input type="text" id="email" name="email" placeholder="Email ID" value="" /></span>
    </div>
    
    <div class="dv">
    <span class="text"><label>Mobile/Cell Number:</label></span>
    <span><input type="text" id="mobile" name="mobile" placeholder="Mobile/Cell Number" value="" /></span>
    </div>
    
    <div class="dv">
    <span class="text"><label>Hash:</label></span>
    <span><input type="text" id="hash" name="hash" placeholder="Hash" value="" /></span>
    </div>
    
    
    <div><input type="submit" value="Pay" onclick="launchBOLT(); return false;" /></div>
	</form>
</div>
</body>
</html>

