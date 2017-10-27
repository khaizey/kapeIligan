<?php
include("lib/class_lib.php");
$conn = new db_connect();
$con = $conn -> connection_db();


$debtorid = $_GET['debtorid'];

$productdebt = $_GET['productdebt'];

$productquantity = $_GET['productquantity'];



	
	$queryinsert = "INSERT INTO accntspayable(debtQty, debtDate, debtPayment, customerId, productId) VALUES ('$productquantity', 'test' , '0' , '$debtorid', '$productdebt');";  


// simple query  
$stmtinsert = $con->query($queryinsert);
if($stmtinsert){
	echo '<div class = "failnotification">Succesfull!</div>';
}
else{
	echo '<script language="JavaScript" type="text/javascript">';
	echo 'alert("Failed to add!");';
	//echo 'window.location.href = "../availablesubjects.html"';
	echo '</script>';
}


?>