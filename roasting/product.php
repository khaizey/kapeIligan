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
	*{
		padding:0; margin:0;
	}
	.production_div1{	background-color:;
		width:10%; float:left;
	}
	#new_prod_form { padding:2%;
	}
		#new_prod_form button { width:30.5%; padding:2% 1%;
		}
	table { 
		border:1px solid white; width:80%;
	}
	table td {
		border:1px solid black; padding:5px; width:15%; height:15px;
	}
	
</style>	

	<script>
		alert("Robusta (100g package) is out of stock.");
		alert("Need to Roast ARABIKA beans.");
	</script>
</head>
<body>
<script>
	
</script>
<div id="new_prod_form">
	<a href="/index.php"> Home </a> </br>
	
	<table>
		<tr>
			<!-- <th> Date Packed </th>	-->
			<th> Bean type </th>
			<th> Package (grams) </th>
			<th> Quantity (package)</th>
			<th style="color:red"> Roasted Beans Left</th>
		</tr>
		<!--
		<tr>
			<td>2017/10/25</td> <td>Robusta Sapad</td> <td>100 grams</td> <td>30</td>
		</tr>
		<tr>
			<td>2017/10/25</td> <td>Excelsa Sapad</td> <td>500 grams</td> <td>20</td>
		</tr>
		<tr>
			<td>2017/10/23</td> <td>Arabika Tubod</td> <td>100 grams</td> <td>18</td>
		</tr>
		<tr> <td></td> <td></td> <td></td> <td></td> </tr>
		<tr> <td></td> <td></td> <td></td> <td></td> </tr>
		<tr> <td></td> <td></td> <td></td> <td></td> </tr>
		<tr> <td></td> <td></td> <td></td> <td></td> </tr>
		<tr> <td></td> <td></td> <td></td> <td></td> </tr>
		-->
		<tr>
			<td>Robusta Sapad</td> <td>100 grams</td> <td style="background-color:red">0</td> <td>1,250 g</td>
		</tr>
		<tr>
			<td>Excelsa Sapad</td> <td>500 grams</td> <td>20</td> <td>500 g</td>
		</tr>
		<tr>
			<td>Arabika Tubod</td> <td>100 grams</td> <td>18</td> <td style="background-color:red">0 g</td>
		</tr>
		<tr> <td></td> <td></td> <td></td> <td></td></tr>
		<tr> <td></td> <td></td> <td></td> <td></td></tr>
		<tr> <td></td> <td></td> <td></td> <td></td></tr>
		<tr> <td></td> <td></td> <td></td> <td></td></tr>
		<tr> <td></td> <td></td> <td></td> <td></td></tr>
		<tr> <td></td> <td></td> <td></td> <td></td></tr>
	</table>
		</br></br>
		<a href="/product_new.php"> <button>Add Product</button> </a>
</div>








</body>
</html>