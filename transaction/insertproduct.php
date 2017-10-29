<?php
include("lib/class_lib.php");
$conn = new db_connect();
$con = $conn -> connection_db();


$debtorname = $_GET['debtorname'];

$productdebt = $_GET['productdebt'];

$productquantity = $_GET['productquantity'];

if(empty($productquantity)){
	echo '<div class = "notification">Please specify Quantity!</div>';
	exit();
}


if (strpos($debtorname, ", ") !== false) {
$pieces = explode(", ", $debtorname);
$cosLastname = $pieces[0];
$cosFirstname = $pieces[1];
}else{
	$cosLastname = $debtorname;
	$cosFirstname = 'none';
}

$countquery = "SELECT * FROM customer WHERE cosLastname = '$cosLastname' AND cosFirstname = '$cosFirstname'";
$result=mysqli_query($con,$countquery);
$rowcount=mysqli_num_rows($result);

if($rowcount > 0){
$query = "SELECT * FROM customer WHERE cosLastname = '$cosLastname' AND cosFirstname = '$cosFirstname'";
$stmt = mysqli_query($con, $query);
    while($row = mysqli_fetch_assoc($stmt)){
    	$debtorid = $row['customerId'];
    	}

	if($productdebt !=0){
	$queryinsert = "INSERT INTO accntspayable(debtQty, debtDate, debtPayment, customerId, productId) VALUES ('$productquantity', 'test' , '0' , '$debtorid', '$productdebt');";  
// simple query  
$stmtinsert = $con->query($queryinsert);
if($stmtinsert){
	echo '<div class = "notification">Succesfull!</div>';
}
else{
	echo '<script language="JavaScript" type="text/javascript">';
	echo 'alert("Failed to add!");';
	//echo 'window.location.href = "../availablesubjects.html"';
	echo '</script>';
}
}else{
	echo '<div class = "notification">Please Select Product</div>';
}
}else{
	echo '<div class = "notification">No Customer!</div>';

	echo '<input style = "width:100%;" type = "text" id = "newLastname" placeholder = "Last Name">';	
	echo '<input style = "width:100%;" type = "text" id = "newFirstname" placeholder = "First Name">';	
	echo '<input style = "width:100%;" type = "text" id = "BirthDate" placeholder = "Birthdate">';		
	echo '<input style = "width:100%;" type = "text" id = "address" placeholder = "address">';	
	echo '<input style = "width:100%;" type = "text" id = "contactnumber" placeholder = "contactnumber">';	
	echo '<input style = "width:100%;" type = "text" id = "email" placeholder = "email">';
	echo '<button name = "newcustomer" onclick = "addnewcustomer()">New Customer</button>';	
}

?>