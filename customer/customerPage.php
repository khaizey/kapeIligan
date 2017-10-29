<?php
	include('../lib/class_lib.php');

	$db_conn = new db_connect();
	$con = $db_conn->connection_db();

	$qry = "SELECT * FROM customer";
	$sql = $con->query($qry);	
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

	<style type="text/css">
	table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
	}

	td, th {
	    border: 1px solid #dddddd;
	    text-align: left;
	    padding: 8px;
	}

	tr:nth-child(even) {
	    background-color: #dddddd;
	}
	.del {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
	}

	.edit {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
	}

	.add:link, .add:visited {
    background-color: #f44336;
    color: white;
    padding: 14px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
	}	
	.add:hover, .add:active {
    background-color: red;
	}
	</style>

	<body>
		<div class="container">
			<div class="table-responsive">
				<table>
					<tr>
						<th> Last Name</th>
						<th> First Name</th>
						<th> Birthdate</th>
						<th> Address</th>
						<th> Contact Number</th>
						<th> Email</th>
						<th> Action</th>
					</tr>
					<?php while($row = mysqli_fetch_array($sql)):?>
					<tr>
						<td> <?php echo $row['cosLastname']; ?> </td>
						<td> <?php echo $row['cosFirstname']; ?> </td>
						<td> <?php echo $row['birthDate']; ?> </td>
						<td> <?php echo $row['address']; ?> </td>
						<td> <?php echo $row['contactNum']; ?> </td>
						<td> <?php echo $row['email']; ?> </td>
						<td>
							<form method="POST">
								<button class="del" type="submit" name="del">Delete</button>
								<a class="edit" href="editCustomer.php?id=<?php echo $row['customerId']; ?>" > Edit </a>
							</form>
						</td>
					</tr>
					<?php endwhile; ?> 	
				</table>
			</div>
		</div>
	</body>
	<br />
	<a class="add" href="addCustomer.php"> Add Customer </a>
</html>
