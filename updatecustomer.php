<?php
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php');

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['customerNumber'])) {
          //query SQL
          $customerNumber_upd = $_GET['customerNumber'];
          $query = "SELECT * FROM customers WHERE customerNumber = '$customerNumber_upd'";

          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customerNumber = $_POST['customerNumber'];
    $customerName = $_POST['customerName'];
    $contactLastName = $_POST['contactLastName'];
    $contactFirstName = $_POST['contactFirstName'];
    $phone = $_POST['phone'];
    $addressLine1 = $_POST['addressLine1'];
    $addressLine2 = $_POST['addressLine2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postalCode = $_POST['postalCode'];
    $country = $_POST['country'];
    $salesRepEmployeeNumber = $_POST['salesRepEmployeeNumber'];
    $creditLimit = $_POST['creditLimit'];
    //query SQL
    $sql = "UPDATE customers 
    SET customerNumber='$customerNumber', customerName='$customerName', contactLastName='$contactLastName', contactFirstName='$contactFirstName', phone='$phone', 
    addressLine1='$addressLine1', addressLine2='$addressLine2', city='$city', state='$state',postalCode= '$postalCode', country='$country', salesRepEmployeeNumber='$salesRepEmployeeNumber',creditLimit='$creditLimit'
    WHERE customerNumber='$customerNumber'";

    //eksekusi query
    $result = mysqli_query(connection(),$sql);
    if ($result) {
      $status = 'ok';
    }
    else{
      $status = 'err';
    }

    //redirect ke halaman lain
    header('Location: customer.php?status='.$status);
}
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Update Customer</title>
    <!-- load css boostrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Accessing Database</a>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column" style="margin-top:100px;">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo "employees.php"; ?>">Employees</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "productline.php"; ?>">Product Lines</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo "customer.php"; ?>">Customers</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "product.php"; ?>">Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "inputcustomer.php"; ?>">Input Customers</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "inputproduct.php"; ?>">Input Products</a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">


          <h2 style="margin: 30px 0 30px 0;">Data Customers</h2>
          <form action="updatecustomer.php" method="POST">
            <?php while($data = mysqli_fetch_array($result)): ?>
            <div class="form-group">
              <label>Cust. Num.</label>
              <input type="text" class="form-control" placeholder="Cust. Num." name="customerNumber" value="<?php echo $data['customerNumber'];  ?>" required="required" readonly>
            </div>
            <div class="form-group">
              <label>Cust. Name</label>
              <input type="text" class="form-control" placeholder="Cust. Name" name="customerName" value="<?php echo $data['customerName'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>Last Name</label>
              <input type="text" class="form-control" placeholder="Last Name" name="contactLastName" value="<?php echo $data['contactLastName'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>First Name</label>
              <input type="text" class="form-control" placeholder="First Name" name="contactFirstName" value="<?php echo $data['contactFirstName'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>Phone</label>
              <input type="text" class="form-control" placeholder="Phone" name="phone" value="<?php echo $data['phone'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>Address 1</label>
              <input type="text" class="form-control" placeholder="Address 1" name="addressLine1" value="<?php echo $data['addressLine1'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>Address 2</label>
              <input type="text" class="form-control" placeholder="Address 2" name="addressLine2" value="<?php echo $data['addressLine2'];  ?>">
            </div>
            <div class="form-group">
              <label>City</label>
              <input type="text" class="form-control" placeholder="City" name="city" value="<?php echo $data['city'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>State</label>
              <input type="text" class="form-control" placeholder="State" name="state" value="<?php echo $data['state'];  ?>">
            </div>
            <div class="form-group">
              <label>Postal Code</label>
              <input type="text" class="form-control" placeholder="Postal Code" name="postalCode" value="<?php echo $data['postalCode'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>Country</label>
              <input type="text" class="form-control" placeholder="Country" name="country" value="<?php echo $data['country'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>Sales Emp. Num.</label>
              <select class="custom-select" name="salesRepEmployeeNumber" value="<?php echo $data['salesRepEmployeeNumber']; ?> required="required">
                <option value="">Pilih Salah Satu</option>
                <option value="1056" <?php echo $data['salesRepEmployeeNumber'] == 1056 ? "selected" : ""; ?>>1056</option>
                <option value="1002" <?php echo $data['salesRepEmployeeNumber'] == 1002 ? "selected" : ""; ?>>1002</option> 
                <option value="1076" <?php echo $data['salesRepEmployeeNumber'] == 1076 ? "selected" : ""; ?>>1076</option>
                <option value="1088" <?php echo $data['salesRepEmployeeNumber'] == 1088 ? "selected" : ""; ?>>1088</option>
                <option value="1102" <?php echo $data['salesRepEmployeeNumber'] == 1102 ? "selected" : ""; ?>>1102</option>
                <option value="1143" <?php echo $data['salesRepEmployeeNumber'] == 1143 ? "selected" : ""; ?>>1143</option>
                <option value="1165" <?php echo $data['salesRepEmployeeNumber'] == 1165 ? "selected" : ""; ?>>1165</option>
                <option value="1166" <?php echo $data['salesRepEmployeeNumber'] == 1166 ? "selected" : ""; ?>>1166</option>
                <option value="1188" <?php echo $data['salesRepEmployeeNumber'] == 1188 ? "selected" : ""; ?>>1188</option>
                <option value="1216" <?php echo $data['salesRepEmployeeNumber'] == 1216 ? "selected" : ""; ?>>1216</option>
                <option value="1286" <?php echo $data['salesRepEmployeeNumber'] == 1286 ? "selected" : ""; ?>>1286</option>
                <option value="1323" <?php echo $data['salesRepEmployeeNumber'] == 1323 ? "selected" : ""; ?>>1323</option>
                <option value="1337" <?php echo $data['salesRepEmployeeNumber'] == 1337 ? "selected" : ""; ?>>1337</option>
                <option value="1370" <?php echo $data['salesRepEmployeeNumber'] == 1370 ? "selected" : ""; ?>>1370</option>
                <option value="1401" <?php echo $data['salesRepEmployeeNumber'] == 1401 ? "selected" : ""; ?>>1401</option>
                <option value="1501" <?php echo $data['salesRepEmployeeNumber'] == 1501 ? "selected" : ""; ?>>1501</option>
                <option value="1611" <?php echo $data['salesRepEmployeeNumber'] == 1611 ? "selected" : ""; ?>>1611</option>
                <option value="1612" <?php echo $data['salesRepEmployeeNumber'] == 1612 ? "selected" : ""; ?>>1612</option>
                <option value="1619" <?php echo $data['salesRepEmployeeNumber'] == 1619 ? "selected" : ""; ?>>1619</option>
                <option value="1621" <?php echo $data['salesRepEmployeeNumber'] == 1621 ? "selected" : ""; ?>>1621</option>
                <option value="1625" <?php echo $data['salesRepEmployeeNumber'] == 1625 ? "selected" : ""; ?>>1625</option>
                <option value="1702" <?php echo $data['salesRepEmployeeNumber'] == 1702 ? "selected" : ""; ?>>1702</option>
              </select>
            </div>
            <div class="form-group">
              <label>Credit Limit</label>
              <input type="text" class="form-control" placeholder="Credit Limit" name="creditLimit" value="<?php echo $data['creditLimit'];  ?>" required="required">
            </div>
            <?php endwhile; ?>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        </main>
      </div>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>
