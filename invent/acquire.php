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
    <a class="navbar-brand" href="../index.php">Kape Iligan</a>
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
          <a class="nav-link" href="roasting.php">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Roasting Process</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Customers">
          <a class="nav-link" href="costumerList.php">
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
              <a href="../transaction">Product Order</a>
            </li>
          </ul>
        </li>
<!-- 
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">wala pa</span>
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
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Raw</li>
      </ol>
      <!-- Area Chart Example-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Raw Info</div>
        <div class="card-body">
          <div class="row">
              <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box blue">
                  
                  <div class="portlet-body form">
                    <form role="form" method="post" action="add.php">
                      <div class="form-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Type of Beans</label>
                          <select class="form-control" name="beans">
                            <option value="0">--Select--</option>
                            <?php
                              $statement = "SELECT * FROM `bean`";
                              $res = $con->query($statement);
                              
                              while($resu = $res->fetch_object()) {
                            ?>
                                <option 
                                  <?php 
                                    if(isset($_POST['beans'])){
                                      echo $_POST['beans'] == $resu->beansId? "selected": "";
                                    }  
                                  ?> value='<?php echo $resu->beansId; ?>'>
                                  <?php echo $resu->beansName; ?>
                                </option>;
                            <?php
                              }
                            ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Volume</label>
                          <div class="input-group">
                            <input type="text" class="form-control" required name="volume" placeholder="Volume">
                          </div>
                          <span class="help-block">
                             Input Volume in Grams
                          </span>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Date Acquired</label>
                          <div class="input-group">
                            <input type="date" class="form-control" required name="date_acq" placeholder="Date Acquired">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Supplier</label>
                          <div class="input-group">
                            <input type="text" class="form-control" required name="supplier" placeholder="Supplier">
                          </div>
                        </div>
                      </div>
                      <div class="form-actions">
                        <button type="submit" name="add" class="btn btn-info">Add</button>
                        <button type="button" class="btn btn-default">Cancel</button>
                      </div>
                    </form>
                  </div>
                    
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
              </div>
            </div>
        </div>
        <div class="card-footer small text-muted"></div>
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
   
    
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin.min.js"></script>

    <script src="../js/raw.js"></script>
  </div>
</body>

<script>
jQuery(document).ready(function() {    
   raw.init();
});
</script>

</html>
