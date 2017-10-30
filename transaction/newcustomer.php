<?php
include("../lib/class_lib.php");
$conn = new db_connect();
$con = $conn -> connection_db();


        $newLastname = $_GET['newLastname'];
        $newFirstname = $_GET['newFirstname'];
        $BirthDate = $_GET['BirthDate'];
        $address = $_GET['address'];
        $contactnumber = $_GET['contactnumber'];
        $email = $_GET['email'];

        $queryinsert = "INSERT INTO customer(cosLastname, cosFirstname, birthDate, address, contactNum, email) VALUES ('$newLastname', '$newFirstname' , '$BirthDate' , '$address', '$contactnumber', '$email');";  
// simple query  
$stmtinsert = $con->query($queryinsert);
if($stmtinsert){
	echo '<div class = "notification">New Customer Added!</div>';
}
else{
	echo '<script language="JavaScript" type="text/javascript">';
	echo 'alert("Failed to add!");';
	//echo 'window.location.href = "../availablesubjects.html"';
	echo '</script>';
}

?>