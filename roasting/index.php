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
</head>
<body>
<script>
	
</script>
<div id="new_prod_form">
	<a href="/production.php"> <button>Production</button> </a> </br></br>
	
	<a href="/product.php"> <button>View Package Inventory</button> </a>
</div>








</body>
</html>