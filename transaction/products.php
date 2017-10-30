<?php
include("../lib/class_lib.php");
$conn = new db_connect();
$con = $conn -> connection_db();
if(isset($_GET['viewingproducts'])){
	$productsinput = $_GET['viewingproducts'];
}
if(isset($_GET['keysearch'])){
	$keysearch = $_GET['keysearch'];
}
	
if(!empty($productsinput)){
		echo '
		<select name = "product" class="form-control" id = "productselected">';
	$query = "SELECT * FROM product ORDER BY productName, productVolume";
	$stmt = mysqli_query($con, $query);
	$currentname = 'none';
	$currentvolume = '';
	$qtytotal = 0;
	while($row = mysqli_fetch_assoc($stmt)){
		$value = $row['productId'];
		$productName = $row['productName'];
		$productVolume = $row['productVolume'];
		$productQty = $row['productQty'];
		$productPrice = $row['productPrice'];
	
		if($currentvolume!=$productVolume){
			if($currentname != 'none'){echo '<option value = "'.$currentname.'-'.$currentvolume.'">'.$currentname.', '.$currentvolume.' g, remaining: '.$qtytotal.'</option>';}
			else{echo '<option value = "null">none</option>';}
			$currentname = $productName;
			$currentvolume = $productVolume;
			$qtytotal = 0;
			}
				$qtytotal = $qtytotal + $productQty;
		

	}

		// echo '<option value = "a1">Arabica 100g</option>';
		// 	echo '<option value = "a2">Arabica 250g</option>';
		// 		echo '<option value = "a3">Arabica 500g</option>';
		// 			echo '<option value = "a4">Arabica 1000g</option>';
		// 				echo '<option value = "r1">Robusta 100g</option>';
		// 					echo '<option value = "r2">Robusta 250g</option>';
		// 						echo '<option value = "r3">Robusta 500g</option>';
		// 							echo '<option value = "r4">Robusta 1000g</option>';
		// 								echo '<option value = "p1">Premium 100g</option>';
		// 								echo '<option value = "p2">Premium 250g</option>';
		// 								echo '<option value = "p3">Premium 500g</option>';
		// 								echo '<option value = "p4">Premium 1000g</option>';
	//}
			echo '</select>';
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