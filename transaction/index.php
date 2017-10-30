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
    <a class="navbar-brand" href="../">Kape Iligan</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="../">
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
              <a href="#">Product Order</a>
            </li>
          </ul>
        </li>

        <!-- <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
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
          <a class="nav-link" href="auth/auth.php?logout">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  ../<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Product Order</li>
      </ol>
      <!-- Area Chart Example-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-file"></i> Product Order</div>
        <div class="card-body">
          <div class="row">
              <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box blue">
                  
                  <div class="portlet-body form">
                    <div class="form-body">
                      <div class="form-group">
                        <label for="customer name">Customer name</label>
                        <div class="input-group">
                          <input type = "text" class="form-control" id = "customersearch" name = "customername" placeholder="customer name" onkeyup = "customerinput()" list = "list">
                          <datalist id="list">
                          </datalist>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Product:</label>
                        <div id = "theproducts">
                        <!-- Call FROM PHP FILE
                        Product:
                        <select value = "0" name = "product" id = "productselected">
                        <option value = "0">none</option>';
                        <option value = "'.$value.'">'.$productName.'</option>';
                        </select> -->
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Quantity</label>
                        <div class="input-group">
                          <input type="number" class="form-control" name="quantity" id="quantity" placeholder="amount">
                        </div>
                      </div>
                    </div>
                    <div class="form-actions">
                      <button name = "addtodebt" class="btn btn-info" onclick = "adddebtbutton()">Add</button>
                    </div>
                  </div>
                    
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
              </div>
            </div>
        </div>
        <div class="card-footer small text-muted"></div>
      </div>
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-file"></i> Debts</div>
        <div class="card-body">
          <div class="row">
              <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box blue">
                  
                  <div class="portlet-body form">
                    <div class="form-body">
                      <div class="table-responsive">
    <!-- begin table -->
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th>Name</th>
                              <th>Birthdate</th>
                              <th>Address</th>
                              <th>Contact</th>
                              <th>Email</th>
                              <th>Cash Received</th>
                              <th>Balance</th>
                              <th>Tools</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              $query = "SELECT * FROM customer";
                              $stmt = mysqli_query($con, $query);
                              while($row = mysqli_fetch_assoc($stmt)){
                                $value = $row['customerId'];
                                $cosLastname = $row['cosLastname'];
                                $cosFirstname = $row['cosFirstname'];
                                $birthDate = $row['birthDate'];
                                $address = $row['address'];
                                $contactNum = $row['contactNum'];
                                $email = $row['email'];

                                $totaldebts = 0;
                                $totalpaid = 0;
                                $insidequery = "SELECT * FROM accntspayable t1 INNER JOIN product t2 on t1.productId = t2.productId WHERE customerId = '$value' ";
                                $insidestmt = mysqli_query($con, $insidequery);
                                  while($row = mysqli_fetch_assoc($insidestmt)){
                                      $debtQty = $row['debtQty'];
                                      $productPrice = $row['productPrice'];
                                      $totalprice = $debtQty*$productPrice;
                                      $debtPayment = $row['debtPayment'];
                                      $totaldebts = $totaldebts + $totalprice;
                                      $totalpaid = $totalpaid + $debtPayment;
                                  }


                                  $balance = $totaldebts - $totalpaid;
                                 
                                  echo "<tr>
                                    <td>".$cosLastname.", ".$cosFirstname."</td>
                                    <td>".$birthDate."</td>
                                    <td>".$address."</td>
                                    <td>".$contactNum."</td>
                                    <td>".$email."</td>
                                    <td>".$totalpaid."</td>
                                    <td>".$balance."</td>";
                                    echo '<td><button name = "viewdebts"  class="btn btn-info btn-block" onclick = "names(\''.$cosLastname.', '.$cosFirstname.'\'); viewdebt('.$value.');">view debts</button></td>
                                  </tr>';
                              }
                              ?>
                            
                          </tbody>
                        </table>
            <!-- end table -->
                      </div>
                    </div>
                    <div class="form-actions">
                      
                    </div>
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
    <div class="modal fade" id="debtsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="debtLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body" id="debts">
            <div id = "paymentnotify"></div>
            </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>
    
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

    <script src="../js/raw.js"></script>
  </div>
</body>



   <script type="text/javascript">
    function names(foo){
     //alert("s")
      document.getElementById("debtLabel").innerHTML = foo;
      $('#debtsModal').modal('show'); 
    }
        function codeAddress() {
            
      
        var xmlhttpmain = new XMLHttpRequest();
        xmlhttpmain.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("theproducts").innerHTML = this.responseText;
               
            }
        };
         //theid = window.localStorage.getItem("userid");
        xmlhttpmain.open("GET", "products.php?viewingproducts=1", true);
        xmlhttpmain.send();
    
    }
  function customerlister() {
    var xmlhttpmain = new XMLHttpRequest();
    xmlhttpmain.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("customerlist").innerHTML = this.responseText;
      }
    };
    //theid = window.localStorage.getItem("userid");
    customer = document.getElementById("customerfinder").value;
    xmlhttpmain.open("GET", "customerlist.php?viewingcustomers=1&thiscustomer="+customer, true);
    xmlhttpmain.send();

  }
        function customersearch() {
            
      
        var xmlhttpmain = new XMLHttpRequest();
        xmlhttpmain.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("customerlistings").innerHTML = this.responseText;
            }
        };
         //theid = window.localStorage.getItem("userid");
                 customer = document.getElementById("customerfinder").value;
        xmlhttpmain.open("GET", "customersearchlist.php?keysearch="+customer, true);
        xmlhttpmain.send();
    
    }
            function customerinput() {
            
      
        var xmlhttpmain = new XMLHttpRequest();
        xmlhttpmain.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("list").innerHTML = this.responseText;
            }
        };
        keysearch = document.getElementById("customersearch").value;
         //theid = window.localStorage.getItem("userid");
        xmlhttpmain.open("GET", "products.php?keysearch="+keysearch, true);
        xmlhttpmain.send();
    }


  function adddebtbutton() {
    var xmlhttpmain = new XMLHttpRequest();
    xmlhttpmain.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        
        if( this.responseText == "quant" ){
          alert("Please specify Quantity!");
        }
        else if( this.responseText == "addcusto" ){
          window.location = '../customer/addCusto.php';
        }
        else if( this.responseText == "Succesfull!" ){
          alert("Succesfull");
        }
      }
    };
    debtorname = document.getElementById("customersearch").value;
    productdebt = document.getElementById("productselected").value;
    productquantity = document.getElementById("quantity").value;


    xmlhttpmain.open("GET", "insertproduct.php?debtorname="+debtorname+"&productdebt="+productdebt+"&productquantity="+productquantity, true);
    xmlhttpmain.send();
  }

function viewdebt(onager) {
  var xmlhttpmain = new XMLHttpRequest();
  xmlhttpmain.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("debts").innerHTML = this.responseText;
    }
  };
  // keysearch = document.getElementById("customersearch").value;
  //theid = window.localStorage.getItem("userid");
  xmlhttpmain.open("GET", "debtslistofcustomer.php?debtorid="+onager, true);
  xmlhttpmain.send();
}
      function addnewcustomer() {
            
      
        var xmlhttpmain = new XMLHttpRequest();
        xmlhttpmain.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("response").innerHTML = this.responseText;
            }
        };
        // keysearch = document.getElementById("customersearch").value;
         //theid = window.localStorage.getItem("userid");
         newLastname = document.getElementById("newLastname").value;
         newFirstname = document.getElementById("newFirstname").value;
         BirthDate = document.getElementById("BirthDate").value;
         address = document.getElementById("address").value;
         contactnumber = document.getElementById("contactnumber").value;
         email = document.getElementById("email").value;
        xmlhttpmain.open("GET", "newcustomer.php?newLastname="+newLastname
          +"&newFirstname="+newFirstname
          +"&BirthDate="+BirthDate
          +"&address="+address
          +"&contactnumber="+contactnumber
          +"&email="+email, true);
        xmlhttpmain.send();
    }

  function pay(ide) {


    var xmlhttpmain = new XMLHttpRequest();
    xmlhttpmain.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      if( this.responseText == "successfully" ){
        alert("successfully pay!");
         $('#debtsModal').modal('hide'); 
      }
     // document.getElementById("paymentnotify").innerHTML = this.responseText;
        //viewdebt(ide);
      }
    };
    amount = document.getElementById("topay").value;
    xmlhttpmain.open("GET", "paymentfunction.php?amount="+amount+"&ide="+ide, true);
    xmlhttpmain.send();
  }

        
        window.onload = codeAddress;
    
        
       
        </script>      
</script>

</html>
