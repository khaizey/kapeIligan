<?php
	include('../lib/class_lib.php');

	$db_conn = new db_connect();
	$con = $db_conn->connection_db();

	$id = $_GET['id'];

	$qru = "SELECT * FROM customer WHERE customerId='$id'";
	$res = $con->query($qru);
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
				<?php while($row = mysqli_fetch_array($res)):?>
			<div class="form-group">
				<label>Name:</label>
				<input type="text" name="firstname" value="<?php echo $row['cosFirstname']; ?>"  required>
				<input type="text" name="lastname" value="<?php echo $row['cosLastname']; ?>"  required> 
			</div>

			<br />

			<?php
				// $ge = date_create($row['birthDate']);
				// $eg = date_format($ge, "m-d-Y");
			?>
			<div class="form-group">
				<label>Birthdate:</label>
				<input type="text" name="date" value="<?php echo $row['birthDate'];?>" required readonly>
			</div>

			<br />

			<div class="form-group">
				<label>Address:</label>
				<input type="text" name="address" style="width: 25%;"value="<?php echo $row['address']; ?>" required >
			</div>

			<br />

			<div class="form-group">
				<label>Contact Number:</label>
				<input type="number" name="contact" value="<?php echo $row['contactNum']; ?>">
			</div>

			<br />

			<div class="form-group">
				<label>Email</label>
				<input type="email" name="email" required value="<?php echo $row['email']; ?>">
			</div>

			<br />

			<?php endwhile; ?>

			<input type="submit" name="save" value="Submit">

			</form>

		</div>
	</body>
	<?php
	if(isset($_POST['save'])){
		
		$fname = $_POST['firstname'];
		$lname = $_POST['lastname'];
		$birth = $_POST['date'];
		$address = $_POST['address'];
		$num = $_POST['contact'];
		$email = $_POST['email'];

		$query = "UPDATE customer SET cosLastname='$lname',cosFirstname='$fname',birthDate='$birth',address='$address',contactNum='$num',email='$email' WHERE customerId='$id'";
		$re = $con->query($query);

		if($re === TRUE){
			echo '<script> alert("Successful Updated");</script>';
			echo '<script> window.open("customerPage.php","_self");</script>';
		}
	}
?>
</html>
