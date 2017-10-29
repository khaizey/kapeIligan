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
	#new_prod_form button{ width:30.5%; padding:2% 1%;
	}
	table { 
		border:1px solid white; width:80%;
	}
	table td {
		border:1px solid black; padding:5px; width:15%; height:15px;
	}
	
</style>
<script>
	alert("Need to Resupply EXCELSA beans (raw).");
</script>		
</head>
<body>
<div id="new_prod_form">
	<a href="/index.php"> Home </a> </br>
	
	<table>
		<tr>
			<th> Date </th>
			<th> Batch</th>
			<th> Coffee Source</th>
			<th> IN (Raw Beans) </th>
			<th> OUT (Roasted Beans)</th>
		</tr>
		<tr>
			<td>2017/10/25</td> <td>1</td> <td>Robusta Sapad</td> <td>1.25 kilos</td> <td>1 kilo</td>
		</tr>
		<tr>
			<td>2017/10/25</td> <td>2</td> <td>Excelsa Sapad</td> <td>1.25 kilos</td> <td>1 kilo</td>
		</tr>
		<tr> <td></td> <td></td> <td></td> <td></td> <td></td> </tr>
		<tr> <td></td> <td></td> <td></td> <td></td> <td></td> </tr>
		<tr> <td></td> <td></td> <td></td> <td></td> <td></td> </tr>
		<tr> <td></td> <td></td> <td></td> <td></td> <td></td> </tr>
		<tr> <td></td> <td></td> <td></td> <td></td> <td></td> </tr>
		<tr> <td></td> <td></td> <td></td> <td></td> <td></td> </tr>
	</table>
	</br>
	<a href="/production_new.php"> <button>Add New Batch</button> </a>
</div>








</body>
</html>