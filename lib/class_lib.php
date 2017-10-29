<?php
	session_start();
	
	class db_connect {
	
		public $hostname = "localhost";
		public $username = "root";
		public $password = "";
		public $dbname = "kapeiligan";
		
		function connection_db(){
			//Precondition: System isn't accessed the database;
			//Postcondition: function accessed the database, and returns the variable for it.
			$var_db = new mysqli($this->hostname,$this->username,$this->password,$this->dbname);
			
			if (!$var_db){
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			
			return $var_db;
		}

	}
	
	class auth {
		
		private $username = "";
		private $password = "";
		
		function setUsername($foo){	$this->username = $foo;	}
		function getUsername(){	return $this->username;	}
		function setPassword($foo){	$this->password = $foo;	}
		function getPassword(){	return $this->password;	}
		
		function login($db_con){
			$username = auth::getUsername();
			$password = auth::getPassword();
			$statement = "SELECT * from admin WHERE username = '$username' and password = '$password'";
			$res = $db_con->query($statement);
			$ren = $res->num_rows;
			if( $ren != 0 )
			{
				$resu = $res->fetch_object();
				$_SESSION['username'] = auth::getUsername();
				
			}else{
				return "not_login";
			}
		}
	}
	
	
?>