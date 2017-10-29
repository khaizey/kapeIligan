<?php   
    require "lib/class_lib.php";
    $db = new db_connect();
    $conn = $db->connection_db();

    if( !isset( $_SESSION['username'] ) ){
      echo "<script>window.location = '../auth';</script>";
    }
  
  if(isset($_POST['proc_date'])) {
    $new_date =$_POST['proc_date'];
    $new_coffee =$_POST['proc_coffee'];
    $new_in =$_POST['proc_IN'];
    $new_out =$_POST['proc_OUT'];
      
    $conn->query("INSERT INTO production(rawInvent, volumeInput, volumeOut, productDate) 
        VALUES('$new_coffee', '$new_in', '$new_out', '$new_date')");
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
  <title>Kape Iligan - Product Inventory Monitoring System</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
   <img src="images/logo.png" style="height:50px;padding-right:10px;" alt="logo">
    <a class="navbar-brand" href="index.php">Kape Iligan</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
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
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
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
        <li class="breadcrumb-item active">Roasting Process</li>
      </ol>

      <ol class="breadcrumb">
        <li class="breadcrumb-item active" style="font-size:30px;">Beans on hand</li>
        <li class="form-control" style="font-size:25px;"><?php
            $arabica_total = 0;     
            $robusta_total = 0;
              $q_wh_total = "SELECT * FROM rawinvent";  //----- Compute Bean(raw) TOTAL Quantity (+)
              $res_wh_total = $conn->query($q_wh_total);
            
            while ($row_wh_total = $res_wh_total->fetch_assoc()) {
              if($row_wh_total['beansId']==1){  
                $robusta_total += $row_wh_total['volAmount'];
              }
                else {  $arabica_total += $row_wh_total['volAmount'];   // Arabica:173579 | Robusta:124604
                }
            }
            
            $q_production_all = "SELECT * FROM production";     //----- Compute Bean(raw) TOTAL Quantity (-)
              $res_production_all = $conn->query($q_production_all);
            
            while ($row_production_all = $res_production_all->fetch_assoc()) {
                $this_raw_inv = $row_production_all['rawInvent'];  //- this raw_inv (production)

              $q_inv_bean = "SELECT * FROM rawinvent WHERE rawInvent='$this_raw_inv' LIMIT 1";      
              $res_inv_bean = $conn->query($q_inv_bean);
              $volumeInput = (float)$row_production_all['volumeInput'];
                
                while ($row_inv_bean = $res_inv_bean->fetch_assoc()) {  // Get Bean type
                    if($row_inv_bean['beansId']==1){
                      $robusta_total -= $volumeInput;
                    }
                    if($row_inv_bean['beansId']==2){
                      $arabica_total -= $volumeInput;
                    }
                  }
            } 
            echo 'Robusta: '.$robusta_total.' grams </br>'.'Arabica: '.$arabica_total.' grams </br>';
            ?> 
</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Roasting Process</div>
        <div class="card-body">
          <div class="table-responsive">
<!-- begin table -->
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Roasting Date</th>
                  <th>Coffee Source</th>
                  <th>Raw Beans (g)</th>
                  <th>Roasted Beans (g)</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Roasting Date</th>
                  <th>Coffee Source</th>
                  <th>Raw Beans (g)</th>
                  <th>Roasted Beans (g)</th>
                  <th>action</th>
                </tr>
              </tfoot>
              <tbody>
                <tr><form method="POST" action="#">
                  <td>
                    <input type="text" name="proc_date" class="form-control" value="<?php echo date("Y/m/d"); ?>"/>
                  </td>
                  <td>
                    <select name="proc_coffee" class="form-control">     
                      <?php                               //----- Compute Bean(raw) TOTAL Quantity
                      $q_rob_wh = "SELECT * FROM rawinvent WHERE beansId='1' ORDER BY rawInvent DESC LIMIT 1";  
                      $res_rob_wh = $conn->query($q_rob_wh);
                        while ($row_rob_wh = $res_rob_wh->fetch_assoc()) {
                          echo '<option value="'.$row_rob_wh['rawInvent'].'">'.'Robusta'.'</option>';
                        }
                      $q_arab_wh = "SELECT * FROM rawinvent WHERE beansId='2' ORDER BY rawInvent DESC LIMIT 1"; 
                      $res_arab_wh = $conn->query($q_arab_wh);
                        while ($row_arab_wh = $res_arab_wh->fetch_assoc()) {
                          echo '<option value="'.$row_arab_wh['rawInvent'].'">'.'Arabica'.'</option>';
                        }
                      ?>
                    </select>
                  </td>                  
                  <td><input type="text" name="proc_IN" class="form-control" required></td>
                  <td><input type="text" name="proc_OUT" class="form-control" required></td>
                  <td>
                    <input type="submit" name="ADD" class="btn btn-info btn-block" value="ADD">
                  </td>
                  </form>
                </tr>
                 <?php
                    $q_production = "SELECT * FROM production ORDER BY productDate ASC"; //----- Display Production History
                    $res_production = $conn->query($q_production);
                    while ($row_production = $res_production->fetch_assoc()) {
                      $coffee_id = $row_production['rawInvent'];
                      $q_coffee = "SELECT * FROM rawinvent WHERE rawInvent='$coffee_id'"; 
                        $res_coffee = $conn->query($q_coffee);
                      
                      while ($row_coffee = $res_coffee->fetch_assoc()) {
                        if($row_coffee['beansId']==1){ $coffee_s = 'Robusta';
                        }
                          else{ $coffee_s = 'Arabica'; }
                      }
                      echo '<tr>';
                        echo '<td>'.$row_production['productDate'].'</td>';     
                        echo '<td>'.$coffee_s.'</td>';
                        echo '<td>'.$row_production['volumeInput'].'</td>';
                        echo '<td>'.$row_production['volumeOut'].'</td>';  
                        echo '<td> <input type="submit" name="ADD" class="btn btn-info btn-block" value="DELETE"><td>' ;  
                      echo '</tr>';
                    }
                  ?>
              </tbody>
            </table>
<!-- end table -->
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Kape Iligan 2017</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>
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
