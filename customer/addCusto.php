<?php
  require "../lib/class_lib.php";
  $db = new db_connect();
  $con = $db->connection_db();

  if( !isset( $_SESSION['username'] ) ){
    echo "<script>window.location = '../auth';</script>";
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Kape Iligan - Product Inventory System</title>
  <!-- Bootstrap core CSS-->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <img src="../images/logo.png" style="height:50px;padding-right:10px;" alt="logo">
    <a class="navbar-brand" href="#">Kape Iligan</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="../index.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Inventory">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Inventory</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
             <a href="../invent/raw.php">Raw Beans</a>
            </li>
            <li>
             <a href="../product/packProduct.php">Retail Beans</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Roasting Process">
          <a class="nav-link" href="../roasting/roasting.php">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Roasting Process</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Customers">
          <a class="nav-link" href="../customer/costumerList.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Customers</span>
          </a>
        </li>

       <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Transactions</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="../order.php">Product Order</a>
            </li>
          </ul>
          </li>
        </li>

       <!--  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">hapt na</span>
          </a>
        </li> -->
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="../auth/auth.php?logout">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="../index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Customers</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Add Customer</div>

          <div class="card-body">

          <form method="post">
            <div class="form-group">
              <label>Customer Name:</label> 
              <div class="form-row">          
                <div class="col-md-6">
                  <input type="text" placeholder="Firstname" class="form-control" name="firstname" style="width: 500px;" required>
                </div>
                <div class="col-md-6">
                   <input type="text" placeholder="Lastname" class="form-control" style="width:500px;" name="lastname" required> 
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">          
                <div class="col-md-6">
                  <label>Birthdate:</label>
                  <input type="text" class="form-control" style="width:500px;" name="date" placeholder="Example: January 21, 1960" required>
                </div>
                <div class="col-md-6">
                  <label>Address:</label>
                  <input type="text" name="address" class="form-control" style="width:500px;" style="width: 25%;" placeholder="Street,Barangay,Town/Municipality" required >
                </div>
              </div>
            </div>
              <div class="form-group">
              <div class="form-row">          
                <div class="col-md-6">
                  <label>Contact Number:</label>
                  <input type="number" class="form-control" style="width:500px;" style="width: 25%;" name="contact" required>
                </div>
                <div class="col-md-6">
                  <label>Email</label>
                 <input type="email" name="email" class="form-control" style="width:500px;" required>
                </div>
              </div>
            </div>
            <input type="submit" class="btn btn-info btn-block" style="float:right;width:300px;" name="save" value="Submit">
          </form>
        </div>
         
        <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © ClearGlass 2017</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="../vendor/datatables/jquery.dataTables.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="../js/sb-admin-datatables.min.js"></script>
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
			echo '<script> window.open("costumerList.php","_self");</script>';
		}
	}
?>

</html>
../