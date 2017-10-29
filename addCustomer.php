.<?php
	include('../lib/class_lib.php');

	$db_conn = new db_connect();
	$con = $db_conn->connection_db();
?>
<html>
	<head>
		<title> Add Customer </title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/w3.css">
		<link rel="stylesheet" href="css/css.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">	
	</head>

	<body>
		<div class="container">
			<form method="post">
			<div class="form-group">
				<label>Name:</label>
				<input type="text" name="firstname" placeholder="Firstname"  required autofocus>
				<input type="text" name="lastname" placeholder="Lastname"  required> 
			</div>

			<br />

			<div class="form-group">
				<label>Birthdate:</label>
				<input type="date" name="date" required>
			</div>

			<br />

			<div class="form-group">
				<label>Address:</label>
				<input type="text" name="address" style="width: 25%;" required placeholder="Street,Barangay,Town/Municipality" >
			</div>

			<br />

			<div class="form-group">
				<label>Contact Number:</label>
				<input type="number" name="contact">
			</div>

			<br />

			<div class="form-group">
				<label>Email</label>
				<input type="email" name="email" required>
			</div>

			<br />

			<input type="submit" name="save" value="Submit">

			</form>


		</div>
	</body>
	<?php
	if(isset($_POST['save'])){
		
		$fname = $_POST['firstname'];
		$lname = $_POST['lastname'];
		$birth = date_create($_POST['date']);
		$date = date_format($birth,"F j, Y");
		$address = $_POST['address'];
		$num = $_POST['contact'];
		$email = $_POST['email'];

		$query = "INSERT INTO customer(cosLastname,cosFirstname,birthDate,address,contactNum,email) 
					VALUES('$lname','$fname','$date','$address','$num','$email')";
		$re = $con->query($query);

		if($re === TRUE){
			echo '<script> alert("Successful Added");</script>';
			echo '<script> window.open("customerPage.php","_self");</script>';
		}
	}
?>
</html>
