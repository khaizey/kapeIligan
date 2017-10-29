<?php	
/*
	session_start();	
	
	if(!isset(	$_SESSION['user']	)) {
		header("location:index.php");
	}
		include("connect.php");
		
	$login_user = $_SESSION['user'];
		$q_profile = "SELECT * FROM user WHERE username='$login_user'";	
		$r_profile = $conn->query($q_profile);
		
		while ($row = $r_profile->fetch_assoc()) {
			$_SESSION['userid'] = $row["userid"];
		}	*/
?>
<!DOCTYPE html>
<html>
<head> 
		<!-- <link rel="stylesheet" type="text/css" href="style.css"> 	-->
<style>
	.production_div1{	background-color:;
		width:20%; float:left;
	}
	#new_prod_form { padding:2%;
	}
		#new_prod_form input { width:20%;
		}
		#new_prod_form select { width:20%;
		}
		#new_prod_form button { width:30.5%; padding:2% 1%;
		}
</style>		
</head>
<body>
<script>
	
</script>
<div id="new_prod_form">
	<a href="/index.php"> Home </a> </br>
	
	<h2> Add New Product </h2></br>
	<div class="production_div1">Date:</div>	
		<?php echo date("Y/m/d"); ?> </br></br>
	<div class="production_div1">Bean Source:</div>
	<select id="bean">
	  <option value="Robusta">Robusta Sapad</option>
	  <option value="Robusta">Arabika Panuruganan</option>
	  <option value="Excelsa">Excelsa</option>
	</select>									</br>
	
	<div class="production_div1">.</div>
		<input type="text" style="color:red; border:none" name="" value="1250 grams left" readonly>			</br></br>
		
	<div class="production_div1">Package:</div>
	<select id="batch">
	  <option value="1">100 g</option>
	  <option value="2">250 g</option>
	  <option value="3">500 g</option>
	  <option value="3">1 kilo</option>
	</select>									</br></br>
	<div class="production_div1">Quantity:</div>
		<input type="text" name="" value="" >			</br></br>
	
	<a href="/product.php"> <button>Add Product</button> </a>
	
	
</div>
</body>
</html>