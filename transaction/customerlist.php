<?php
include("lib/class_lib.php");
$conn = new db_connect();
$con = $conn -> connection_db();
if(isset($_GET['viewingcustomers'])){
$customerinput = $_GET['viewingcustomers'];}
if(!empty($customerinput)){
$query = "SELECT * FROM customer";
$stmt = mysqli_query($con, $query);
    while($row = mysqli_fetch_assoc($stmt)){
$value = $row['customerId'];
$cosLastname = $row['cosLastname'];
$cosFirstname = $row['cosFirstname'];
$birthDate = $row['birthDate'];
$address = $row['address'];
$contactNum = $row['contactNum'];
$email = $row['email'];

$totaldebts = 0;
$totalpaid = 0;
$insidequery = "SELECT * FROM accntspayable t1 INNER JOIN product t2 on t1.productId = t2.productId WHERE customerId = '$value' ";
$insidestmt = mysqli_query($con, $insidequery);
    while($row = mysqli_fetch_assoc($insidestmt)){
    		$debtQty = $row['debtQty'];
    		$productPrice = $row['productPrice'];
    		$totalprice = $debtQty*$productPrice;
    		$debtPayment = $row['debtPayment'];
    		$totaldebts = $totaldebts + $totalprice;
    		$totalpaid = $totalpaid + $debtPayment;
    }


$balance = $totaldebts - $totalpaid;
echo '<div class = "col-md-12">'.$cosLastname.' '.$cosFirstname.' '.$birthDate.' '.$address.' '.$contactNum.' '.$email.' Cash Received: '.$totalpaid.' Balance: '.$balance.'<button name = "viewdebts" onclick = "viewdebt('.$value.')">view debts</button> </div>';
}

}
?>