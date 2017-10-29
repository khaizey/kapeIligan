<?php		
	  require "../lib/class_lib.php";
	  $db = new db_connect();
	  $conn = $db->connection_db();

	  if( !isset( $_SESSION['username'] ) ){
	    echo "<script>window.location = '../auth';</script>";
	  }
	
	if(isset($_POST['pack_coffee'])) {			$coffee_price=0;
		$pack_coffee =$_POST['pack_coffee'];
		$pack_100 =$_POST['pack_100'];
		$pack_250 =$_POST['pack_250'];
		$pack_500 =$_POST['pack_500'];
		$pack_1000 =$_POST['pack_1000'];
		
			if($pack_coffee=='Robusta'){ $coffee_price+=350; }	// ----- Coffee PRICES
			if($pack_coffee=='Arabica'){ $coffee_price+=800; }
			if($pack_coffee=='Premium'){ $coffee_price+=440; }
				
		if($pack_100 != ''){		
			$conn->query("INSERT INTO product(productName, productVolume, productQty, productPrice) 
					VALUES('$pack_coffee', '100', '$pack_100', '$coffee_price')");
		}
		if($pack_250 != ''){	
			$conn->query("INSERT INTO product(productName, productVolume, productQty, productPrice) 
					VALUES('$pack_coffee', '250', '$pack_250', '$coffee_price')");
		}
		if($pack_500 != ''){	
			$conn->query("INSERT INTO product(productName, productVolume, productQty, productPrice) 
					VALUES('$pack_coffee', '500', '$pack_500', '$coffee_price')");
		}
		if($pack_1000 != ''){	
			$conn->query("INSERT INTO product(productName, productVolume, productQty, productPrice) 
					VALUES('$pack_coffee', '1000', '$pack_1000', '$coffee_price')");
		}
	}	
?>
<!DOCTYPE html>
<html>
<head> 
<style>
	*{ padding:0; margin:0; }
	.production_div1{ width:10%; float:left;}
	#new_prod_form { padding:2%;}
	#new_prod_form button{ width:30.5%; padding:2% 1%;}
	table { border:1px solid white; width:80%;}
	table td { border:1px solid black; padding:5px; width:15%; height:15px;}
	input { padding:2px; width:96%; }
	select { padding:2px; width:98%; }
</style>
<script>
</script>		
</head>
<body>
<div id="new_prod_form">	
  <table>
	<tr> <th>Product</th> <th>100 grams</th> <th>250 grams</th> <th>500 grams</th> <th>1 kilogram</th> </tr>
	<tr>
	<form method="post" action="#">
		<td>
		<select name="pack_coffee">		
			<option value="Arabica">Arabica</option>
			<option value="Robusta">Robusta</option>
			<option value="Premium">Premium</option>
		</select>
		</td>
		<td> <input type="text" name="pack_100" value=""/> </td>
		<td> <input type="text" name="pack_250" value=""/> </td>
		<td> <input type="text" name="pack_500" value=""/> </td>
		<td> <input type="text" name="pack_1000" value=""/> </td>
		<td style="border:none;"> <input type="submit" value="ADD" /> </td>
	</form>
	</tr>
	<?php
		$robusta_100 = 0;		$robusta_250 = 0;		$robusta_500 = 0;		$robusta_1000 = 0;
		$arabica_100 = 0;		$arabica_250 = 0;		$arabica_500 = 0;		$arabica_1000 = 0;
		$prem_100 = 0;			$prem_250 = 0;			$prem_500 = 0;			$prem_1000 = 0;
		
			$q_robusta_pkg = "SELECT * FROM product WHERE productName='Robusta'";	//-- Display 100% ROBUSTA Product Inv
			$res_robusta_pkg = $conn->query($q_robusta_pkg);
	
	while ($row_robusta_pkg = $res_robusta_pkg->fetch_assoc()) {
		if($row_robusta_pkg['productVolume']=='100'){	$robusta_100 += $row_robusta_pkg['productQty'];}
		if($row_robusta_pkg['productVolume']=='250'){	$robusta_250 += $row_robusta_pkg['productQty'];}
		if($row_robusta_pkg['productVolume']=='500'){	$robusta_500 += $row_robusta_pkg['productQty'];}
		if($row_robusta_pkg['productVolume']=='1000'){	$robusta_1000 += $row_robusta_pkg['productQty'];}
	}
		$q_arabica_pkg = "SELECT * FROM product WHERE productName='Arabica'";	//-- Display 100% ARABICA Product Inv
		$res_arabica_pkg = $conn->query($q_arabica_pkg);
	
	while ($row_arabica_pkg = $res_arabica_pkg->fetch_assoc()) {
		if($row_arabica_pkg['productVolume']=='100'){	$arabica_100 += $row_arabica_pkg['productQty'];}
		if($row_arabica_pkg['productVolume']=='250'){	$arabica_250 += $row_arabica_pkg['productQty'];}
		if($row_arabica_pkg['productVolume']=='500'){	$arabica_500 += $row_arabica_pkg['productQty'];}
		if($row_arabica_pkg['productVolume']=='1000'){	$arabica_1000 += $row_arabica_pkg['productQty'];}
	}
		$q_premium_pkg = "SELECT * FROM product WHERE productName='Premium'";	//-- Display PREMIUM Coffee Product Inv
		$res_premium_pkg = $conn->query($q_premium_pkg);
	
	while ($row_premium_pkg = $res_premium_pkg->fetch_assoc()) {
		if($row_premium_pkg['productVolume']=='100'){	$prem_100 += $row_premium_pkg['productQty'];}
		if($row_premium_pkg['productVolume']=='250'){	$prem_250 += $row_premium_pkg['productQty'];}
		if($row_premium_pkg['productVolume']=='500'){	$prem_500 += $row_premium_pkg['productQty'];}
		if($row_premium_pkg['productVolume']=='1000'){	$prem_1000 += $row_premium_pkg['productQty'];}
	}
	?>
	<tr><td>Robusta</td>
		<td><?php echo $robusta_100; ?></td>	<td><?php echo $robusta_250; ?></td>
		<td><?php echo $robusta_500; ?></td>	<td><?php echo $robusta_1000; ?></td>
	</tr>
	<tr><td>Arabica</td>
		<td><?php echo $arabica_100; ?></td>	<td><?php echo $arabica_250; ?></td>
		<td><?php echo $arabica_500; ?></td>	<td><?php echo $arabica_1000; ?></td>
	</tr>
	<tr><td>Premium</td>
		<td><?php echo $prem_100; ?></td>		<td><?php echo $prem_250; ?></td>
		<td><?php echo $prem_500; ?></td>		<td><?php echo $prem_1000; ?></td>
	</tr>
  </table>
</div>








</body>
</html>