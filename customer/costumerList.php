<?php
include('../lib/class_lib.php');

$db_conn = new db_connect();
$con = $db_conn->connection_db();

$qry = "SELECT * FROM customer";
$sql = $con->query($qry);
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
    <a class="navbar-brand" href="index.php">Kape Iligan</a>
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
             <a href="invent/raw.php">Raw Beans</a>
            </li>
            <li>
              <a href="product.php">Retail Beans</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Roasting Process">
          <a class="nav-link" href="../roasting.php">
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
              <a href="order.php">Product Order</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">wala pa</span>
          </a>
        </li>
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
          <a class="nav-link" href="auth/auth.php?logout">
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
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Customers</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Customer List
            <div class="btn-group" style="float:right;">
                    <a id="acquire" class="btn btn-success" href="addCusto.php">
                        Add Customer <i class="fa fa-plus"></i>
                    </a>
                  </div>
        </div>
          <br/>
        <div class="card-body">
          <div class="table-responsive">
<!-- begin table -->
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Last Name</th>
                  <th>First Name</th>
                  <th>Birthdate</th>
                  <th>Address</th>
                  <th>Contact Number</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
              </thead>
              <!-- <tfoot>
                <tr>
                  <th>Customer Name</th>
                  <th>Ordered Product</th>
                  <th>Date Ordered</th>
                  <th>Total Payment</th>
                  <th>Date Paid</th>
                  <th>Cash Received</th>
                  <th>Balance</th>
                  <th>Transactions</th>
                </tr>
              </tfoot> -->
              <tbody>
                <?php while($row = mysqli_fetch_array($sql)):?>
                <tr>
                  <td> <?php echo $row['cosLastname']; ?> </td>
                  <td> <?php echo $row['cosFirstname']; ?> </td>
                  <td> <?php echo $row['birthDate']; ?> </td>
                  <td> <?php echo $row['address']; ?> </td>
                  <td> <?php echo $row['contactNum']; ?> </td>
                  <td> <?php echo $row['email']; ?> </td>
                  <td>
                    <form method="post">
                      <input type="hidden" name="remove" value="<?php echo $row['customerId']; ?>">
                      <button class="btn btn-info btn-block" type="submit" name="del">Delete</button>
                      <a class="btn btn-info btn-block" href="editCusto.php?id=<?php echo $row['customerId']; ?>" > Edit </a>
                    </form>
                  </td>
                  <?php endwhile; 
                  if(isset($_POST['del'])){
                    $id = $_POST['remove'];
                    ?>
                    <script>
                    var t = confirm("Are You Sure?");
                      if(t === true){
                        <?php
                          $dlt = "DELETE FROM customer WHERE customerId='$id'";
                          if($con->query($dlt) === TRUE){
                        ?>
                        alert("Successful Deleted");
                        window.open("costumerList.php","_self");
                        <?php
                          }
                        ?>
                   }
                   else{
                    alert("Keep Going");
                   }
                   </script>
                   <?php
                  }
                  ?>
                </tr>
              </tbody>
            </table>
<!-- end table -->
          </div>
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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
  </div>
</body>

</html>
../