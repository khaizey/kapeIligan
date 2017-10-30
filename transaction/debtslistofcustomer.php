<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th>Price</th>
      <th>Quantity</th>
      <th>Date</th>
      <th>Product</th>
      <th>Volume</th>
      <th>Total Payables</th>
      <th>Paid</th>
    </tr>
  </thead>
  <tbody>
                        
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
    echo "
    <tr>
        <td>".$productPrice."</td>
        <td>".$debtQty."</td>
        <td>".$debtDate."</td>
        <td>".$productName."</td>
        <td>".$productVolume."</td>
        <td>".$totalprice."</td>
        <td>".$debtPayment."</td>
    </tr>";
}

$balance = $totaldebts - $totalpaid;
echo "
    <tr>
        <td colspan = '4'>Total Balance</td>
        <td>".$balance."</td>
        <td><input type = 'number' id = 'topay'></td>";
   echo '<td><button class="btn btn-info btn-block" onclick = "pay('.$debtorid.')">Pay</button></td>
    </tr>';
?>
    </tbody>
</table>