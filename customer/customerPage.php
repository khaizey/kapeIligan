<?php
	include('../lib/class_lib.php');

	$db_conn = new db_connect();
	$con = $db_conn->connection_db();

	$qry = "SELECT * FROM customer";
	$sql = $con->query($qry);

	while($row = mysqli_fetch_array($sql)):
?>
<html>
	<head>
		<title>Customer Info </title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/w3.css">
		<link rel="stylesheet" href="css/css.css">
		<link rel="stylesheet" href="css/font-awesome.min.css">
	</head>

	<body>
		<div class="container">
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tr>
						<th> Last Name</th>
						<th> First Name</th>
						<th> Birthdate</th>
						<th> Address</th>
						<th> Contact Number</th>
						<th> Email</th>
						<th> Action</th>
					</tr>

					<tr>
						<td> <?php echo $row['cosLastname']; ?> </td>
						<td> <?php echo $row['cosFirstname']; ?> </td>
						<td> <?php echo $row['birthDate']; ?> </td>
						<td> <?php echo $row['address']; ?> </td>
						<td> <?php echo $row['contactNum']; ?> </td>
						<td> <?php echo $row['email']; ?> </td>
						<td>
							<button type="submit" name="delete">Delete</button>
							<button type="submit" name="edit">Edit</button>
						</td>
					</tr>
				</table>
			</div>
			<a href="addCustomer.php" type="button"> Add Customer </a> 	
		</div>
	</body>
<?php endwhile; ?>
</html>