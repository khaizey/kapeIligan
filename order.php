<?php
  require "lib/class_lib.php";
  $db = new db_connect();
  $con = $db->connection_db();
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
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark" >
  <div class="container" id="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Product Order Form
        <button class="close" type="button" data-dismiss="container" aria-label="Close">
              <span aria-hidden="true">×</span>
        </button>
      </div>

      <div class="card-body">
        <form>
          <div class="form-group">
            <div class="form-group">
            <label for="customerName">Customer Name</label>
            <input class="form-control" id="customerName" type="text" aria-describedby="emailHelp" placeholder="Customer Name">
          </div>
            <div class="form-row">          
              <div class="col-md-6">
                <label for="beanName">Bean Type</label>
                <select class="form-control" name="productName">
                     <option value="0">--Select--</option>
                            <?php
                              $statement = "SELECT Distinct `productName` from `product`";
                              $res = $con->query($statement);
                              
                              while($resu = $res->fetch_object()) {
                            ?>
                                <option 
                                  <?php 
                                    if(isset($_POST['productName'])){
                                      echo $_POST['productName'] == $resu->productId? "selected": "";
                                    }  
                                  ?> value='<?php echo $resu->productId; ?>'>
                                  <?php echo $resu->productName; ?>
                     </option>;
                            <?php
                              }
                            ?>
                </select>
              </div>
              <div class="col-md-6">
                <label for="orderQty">Qty(g)</label>
                 <select class="form-control" name="qty">
                     <option value="0">--Select--</option>
                            <?php
                              $statement = "SELECT DISTINCT `productVolume` FROM `product` ";
                              $res = $con->query($statement);
                              
                              while($resu = $res->fetch_object()) {
                            ?>
                                <option 
                                  <?php 
                                    if(isset($_POST['qty'])){
                                      echo $_POST['qty'] == $resu->productId? "selected": "";
                                    }  
                                  ?> value='<?php echo $resu->productId; ?>'>
                                  <?php echo $resu->productVolume; ?>
                     </option>;
                            <?php
                              }
                            ?>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Password</label>
                <input class="form-control" id="exampleInputPassword1" type="password" placeholder="Password">
              </div>
              <div class="col-md-6">
                <label for="exampleConfirmPassword">Confirm password</label>
                <input class="form-control" id="exampleConfirmPassword" type="password" placeholder="Confirm password">
              </div>
            </div>
          </div>
          <a class="btn btn-primary btn-block" href="login.html">Submit</a>
        </form>
        <!-- <div class="text-center">
          <a class="d-block small mt-3" href="login.html">Login Page</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div> -->
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
