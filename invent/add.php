<?php

  require "../lib/class_lib.php";
  $db = new db_connect();
  $con = $db->connection_db();

  if( isset( $_POST['add'] ) )
  {
  	$bean = addslashes($_POST['beans']);
  	$volume = addslashes($_POST['volume']);
  	$date_acq = addslashes($_POST['date_acq']);
  	$supplier = addslashes($_POST['supplier']);

  	$query = "INSERT INTO `rawinvent` (`beansId`, `volAmount`, `supplier`,dateAcquired) 
  			VALUES ('$bean', '$volume', '$supplier','$date_acq');";
  	$insert_rows = $con->query($query);	
	if( $insert_rows ){
		echo "<script>alert('Successfully added!');window.location = 'raw.php';</script>";
	}
	else{
		exit();
	}
  }
