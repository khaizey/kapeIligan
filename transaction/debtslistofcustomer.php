<?php
include("../lib/class_lib.php");
$conn = new db_connect();
$con = $conn -> connection_db();
$debtorid = $_GET['debtorid'];

$totaldebts = 0;
$totalpaid = 0;
$query = "SELECT * FROM accntspayable t1 INNER JOIN product t2 on t1.productId = t2.productId WHERE customerId = '$debtorid' ";
$stmt = mysqli_query($con, $query);
    while($row = mysqli_fetch_assoc($stmt)){
    	$debtQty = $row['debtQty'];
    	$debtDate = $row['debtDate'];
    	$debtPayment = $row['debtPayment'];
    	$customerId = $row['customerId'];
    	$productId = $row['productId'];
    	$productName = $row['productName'];
    	$productVolume = $row['productVolume'];
    	$productPrice = $row['productPrice'];

    	$totalprice = $debtQty*$productPrice;
                $totaldebts = $totaldebts + $totalprice;
            $totalpaid = $totalpaid + $debtPayment;

echo '<div class = "col-md-12">Price: '.$productPrice.', Quantity: '.$debtQty.', Date: '.$debtDate.', Product: '.$productName.', Volume: '.$productVolume.', Total Payables: '.$totalprice.' Paid: '.$debtPayment.'</div>';
}

$balance = $totaldebts - $totalpaid;
echo 'Total Balance: '.$balance;
echo '<input type = "number" id = "topay">';
echo '<button onclick = "pay('.$debtorid.')">Pay</button>';

?>