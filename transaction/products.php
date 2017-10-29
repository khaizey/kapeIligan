<?php
include("lib/class_lib.php");
$conn = new db_connect();
$con = $conn -> connection_db();
if(isset($_GET['viewingproducts'])){
$productsinput = $_GET['viewingproducts'];}
if(isset($_GET['keysearch'])){
$keysearch = $_GET['keysearch'];}
if(!empty($productsinput)){
$query = "SELECT * FROM product";
$stmt = mysqli_query($con, $query);
    while($row = mysqli_fetch_assoc($stmt)){
$value = $row['productId'];
$productName = $row['productName'];
$productVolume = $row['productVolume'];
$productQty = $row['productQty'];
$productPrice = $row['productPrice'];
echo 'Product:
<select value = "0" name = "product" id = "productselected">
<option value = "0">none</option>';
echo '<option value = "'.$value.'">'.$productName.'</option>';
echo '</select>';
}
}
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