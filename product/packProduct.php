<?php   
    require "../lib/class_lib.php";
    $db = new db_connect();
    $conn = $db->connection_db();

    if( !isset( $_SESSION['username'] ) ){
      echo "<script>window.location = '../auth';</script>";
    }
  
  if(isset($_POST['pack_coffee'])) {      $coffee_price=0;
    $pack_coffee =$_POST['pack_coffee'];
    $pack_100 =$_POST['pack_100'];
    $pack_250 =$_POST['pack_250'];
    $pack_500 =$_POST['pack_500'];
    $pack_1000 =$_POST['pack_1000'];
    
      if($pack_coffee=='Robusta'){ $coffee_price+=350; }  // ----- Coffee PRICES
      if($pack_coffee=='Arabica'){ $coffee_price+=800; }
      if($pack_coffee=='Premium'){ $coffee_price+=440; }
        
    if($pack_100 != ''){    
      $conn->query("INSERT INTO product(productName, productVolume, productQty, productPrice) 
          VALUES('$pack_coffee', '100', '$pack_100', '$coffee_price')");
    }
    if($pack_250 != ''){  
      $conn->query("INSERT INTO product(productName, productVolume, productQty, productPrice) 
          VALUES('$pack_coffee', '250', '$pack_250', '$coffee_price')");
    }
    if($pack_500 != ''){  
      $conn->query("INSERT INTO product(productName, productVolume, productQty, productPrice) 
          VALUES('$pack_coffee', '500', '$pack_500', '$coffee_price')");
    }
    if($pack_1000 != ''){ 
      $conn->query("INSERT INTO product(productName, productVolume, productQty, productPrice) 
          VALUES('$pack_coffee', '1000', '$pack_1000', '$coffee_price')");
    }
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
              <a href="../transaction">Product Order</a>
            </li>
          </ul>
        </li>

       <!--  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
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
        <li class="breadcrumb-item active">Product Inventory</li>
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
                  <th>Product</th>
                  <th>100 grams</th>
                  <th>250 grams</th>
                  <th>500 grams</th>
                  <th>1 kilogram</th>
                  <th>Action</th>
                </tr>
              </thead>
              <!-- <tfoot>
                <tr>
                   <th>Product</th>
                  <th>100 grams</th>
                  <th>250 grams</th>
                  <th>500 grams</th>
                  <th>1 kilogram</th>
                  <th>Action</th>
                </tr>
              </tfoot> -->
              <tbody>
                <tr>
                  <form method="post" action="#">
                      <td>
                      <select name="pack_coffee" class="form-control">   
                        <option value="Arabica">Arabica</option>
                        <option value="Robusta">Robusta</option>
                        <option value="Premium">Premium</option>
                      </select>
                      </td>
                      <td> <input type="text" name="pack_100" class="form-control" value=""/> </td>
                      <td> <input type="text" name="pack_250" class="form-control" value=""/> </td>
                      <td> <input type="text" name="pack_500" class="form-control" value=""/> </td>
                      <td> <input type="text" name="pack_1000" class="form-control" value=""/> </td>
                      <td>
                         <input type="submit" name="ADD" class="btn btn-info btn-block" value="ADD">
                      </td>
                    </form>
                </tr>
                 <?php
    $robusta_100 = 0;   $robusta_250 = 0;   $robusta_500 = 0;   $robusta_1000 = 0;
    $arabica_100 = 0;   $arabica_250 = 0;   $arabica_500 = 0;   $arabica_1000 = 0;
    $prem_100 = 0;      $prem_250 = 0;      $prem_500 = 0;      $prem_1000 = 0;
    
      $q_robusta_pkg = "SELECT * FROM product WHERE productName='Robusta'"; //-- Display 100% ROBUSTA Product Inv
      $res_robusta_pkg = $conn->query($q_robusta_pkg);
  
  while ($row_robusta_pkg = $res_robusta_pkg->fetch_assoc()) {
    if($row_robusta_pkg['productVolume']=='100'){ $robusta_100 += $row_robusta_pkg['productQty'];}
    if($row_robusta_pkg['productVolume']=='250'){ $robusta_250 += $row_robusta_pkg['productQty'];}
    if($row_robusta_pkg['productVolume']=='500'){ $robusta_500 += $row_robusta_pkg['productQty'];}
    if($row_robusta_pkg['productVolume']=='1000'){  $robusta_1000 += $row_robusta_pkg['productQty'];}
  }
    $q_arabica_pkg = "SELECT * FROM product WHERE productName='Arabica'"; //-- Display 100% ARABICA Product Inv
    $res_arabica_pkg = $conn->query($q_arabica_pkg);
  
  while ($row_arabica_pkg = $res_arabica_pkg->fetch_assoc()) {
    if($row_arabica_pkg['productVolume']=='100'){ $arabica_100 += $row_arabica_pkg['productQty'];}
    if($row_arabica_pkg['productVolume']=='250'){ $arabica_250 += $row_arabica_pkg['productQty'];}
    if($row_arabica_pkg['productVolume']=='500'){ $arabica_500 += $row_arabica_pkg['productQty'];}
    if($row_arabica_pkg['productVolume']=='1000'){  $arabica_1000 += $row_arabica_pkg['productQty'];}
  }
    $q_premium_pkg = "SELECT * FROM product WHERE productName='Premium'"; //-- Display PREMIUM Coffee Product Inv
    $res_premium_pkg = $conn->query($q_premium_pkg);
  
  while ($row_premium_pkg = $res_premium_pkg->fetch_assoc()) {
    if($row_premium_pkg['productVolume']=='100'){ $prem_100 += $row_premium_pkg['productQty'];}
    if($row_premium_pkg['productVolume']=='250'){ $prem_250 += $row_premium_pkg['productQty'];}
    if($row_premium_pkg['productVolume']=='500'){ $prem_500 += $row_premium_pkg['productQty'];}
    if($row_premium_pkg['productVolume']=='1000'){ $prem_1000 += $row_premium_pkg['productQty'];}
  }
  ?>
  <tr><td>Robusta</td>
    <td><?php echo $robusta_100; ?></td>  <td><?php echo $robusta_250; ?></td>
    <td><?php echo $robusta_500; ?></td>  <td><?php echo $robusta_1000; ?></td>
  </tr>
  <tr><td>Arabica</td>
    <td><?php echo $arabica_100; ?></td>  <td><?php echo $arabica_250; ?></td>
    <td><?php echo $arabica_500; ?></td>  <td><?php echo $arabica_1000; ?></td>
  </tr>
  <tr><td>Premium</td>
    <td><?php echo $prem_100; ?></td>   <td><?php echo $prem_250; ?></td>
    <td><?php echo $prem_500; ?></td>   <td><?php echo $prem_1000; ?></td>
  </tr>
              </tbody>
            </table>
<!-- end table -->
          </div>
        </div>
      <!--   <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
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

</html>
