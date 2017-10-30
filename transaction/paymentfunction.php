<?php
include("../lib/class_lib.php");
$conn = new db_connect();
$con = $conn -> connection_db();
$amount = $_GET['amount'];
$ide = $_GET['ide'];

$suc = "";
$query = "SELECT * FROM accntspayable t1 INNER JOIN product t2 on t1.productId = t2.productId WHERE customerId = '$ide' ";
$stmt = mysqli_query($con, $query);
    while($row = mysqli_fetch_assoc($stmt)){
        $accntsId = $row['accntsId'];
        $debtQty = $row['debtQty'];
        $debtDate = $row['debtDate'];
        $debtPayment = $row['debtPayment'];
        $customerId = $row['customerId'];
        $productId = $row['productId'];
        $productName = $row['productName'];
        $productVolume = $row['productVolume'];
        $productPrice = $row['productPrice'];
        $totalprice = $debtQty*$productPrice;

        if($amount != 0){
            $amount = $amount - ($totalprice - $debtPayment);

            $placeamount = $totalprice;

            if($amount <= ($totalprice - $debtPayment)){
            $placeamount = $placeamount + $amount;
            $amount = 0;
            }


            $inputquery = "UPDATE accntspayable SET debtPayment = '$placeamount' WHERE accntsId = '$accntsId'";
            $stmtinsert = $con->query($inputquery);
            if($stmtinsert){
            $suc =  "successfully";
            }
            else{

            }
        }
    }
    echo $suc;

?>