<?php

	include "../lib/class_lib.php";
	
	$db_con = new db_connect();
	$con = $db_con->connection_db();

	$auth = new auth();

	if( isset( $_POST['login'] ) ) {
		$username = $auth->setUsername(addslashes($_POST['username']));
		$password = $auth->setPassword(sha1(addslashes($_POST['password'])));

		if( $auth->login($con) == "not_login" ) {
			echo "<script>alert('Wrong username and password!');window.location = '../auth';</script>";
		}
		else{
			echo "<script>alert('Welcome ".$_SESSION['username']."!');window.location = '../';</script>";
		}
	}
	elseif( isset( $_GET['logout'] ) ){

		echo "<script>alert('Bye ".$_SESSION['username']."!');window.location = '../auth';</script>";
		$auth->logout();
		
	}
	
	
