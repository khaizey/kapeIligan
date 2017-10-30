<?php
include("../lib/class_lib.php");
$conn = new db_connect();
$con = $conn -> connection_db();
$keysearch = $_GET['keysearch'];

if(!empty($keysearch)){
$query = "SELECT * FROM customer WHERE cosLastname LIKE '%$keysearch%' OR cosFirstname LIKE '%$keysearch%'";
$stmt = mysqli_query($con, $query);
    while($row = mysqli_fetch_assoc($stmt)){
$value = $row['customerId'];
$cosLastname = $row['cosLastname'];
$cosFirstname = $row['cosFirstname'];
$birthDate = $row['birthDate'];
$address = $row['address'];
echo '<option value = "';
echo ''.$cosLastname.', ';
echo ''.$cosFirstname.'">';
}
}
?>