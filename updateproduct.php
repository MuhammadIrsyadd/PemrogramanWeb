<?php
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php');

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['productCode'])) {
          //query SQL
          $productCode_upd = $_GET['productCode'];
          $query = "SELECT * FROM products WHERE productCode = '$productCode_upd'";

          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $productCode = $_POST['productCode'];
      $productName = $_POST['productName'];
      $productLine = $_POST['productLine'];
      $productScale = $_POST['productScale'];
      $productVendor = $_POST['productVendor'];
      $productDescription = $_POST['productDescription'];
      $quantityInStock = $_POST['quantityInStock'];
      $buyPrice = $_POST['buyPrice'];
      $MSRP = $_POST['MSRP'];
      //query SQL
      $sql = "UPDATE products 
      SET productCode='$productCode', productName='$productName', productLine='$productLine', productScale='$productScale', productVendor='$productVendor', 
      productDescription='$productDescription', quantityInStock='$quantityInStock', buyPrice='$buyPrice', MSRP='$MSRP'
      WHERE productCode='$productCode'";

      //eksekusi query
      $result = mysqli_query(connection(),$sql);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }

      //redirect ke halaman lain
      header('Location: product.php?status='.$status);
  }


?>


<!DOCTYPE html>
<html>
  <head>
    <title>Update Products</title>
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
                <a class="nav-link" href="<?php echo "customer.php"; ?>">Customers</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo "product.php"; ?>">Products</a>
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


          <h2 style="margin: 30px 0 30px 0;">Data Products</h2>
          <form action="updateproduct.php" method="POST">
            <?php while($data = mysqli_fetch_array($result)): ?>
            <div class="form-group">
              <label>Product Code</label>
              <input type="text" class="form-control" placeholder="Product Code" name="productCode" value="<?php echo $data['productCode'];  ?>" required="required" readonly>
            </div>
            <div class="form-group">
              <label>Product Name</label>
              <input type="text" class="form-control" placeholder="Product Name" name="productName" value="<?php echo $data['productName'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>Product Line</label>
              <select class="custom-select" name="productLine" value="<?php echo $data['productLine']; ?> required="required">
                <option value="">Pilih Salah Satu</option>
                <option value="Classic Cars" <?php echo $data['productLine'] == 'Classic Cars' ? "selected" : ""; ?>>Classic Cars</option>
                <option value="Motorcycles" <?php echo $data['productLine'] == 'Motorcycles' ? "selected" : ""; ?>>Motorcycles</option>
                <option value="Planes" <?php echo $data['productLine'] == 'Planes' ? "selected" : ""; ?>>Planes</option>
                <option value="Ships" <?php echo $data['productLine'] == 'Ships' ? "selected" : ""; ?>>Ships</option>
                <option value="Trains" <?php echo $data['productLine'] == 'Trains' ? "selected" : ""; ?>>Trains</option>
                <option value="Truck and Buses" <?php echo $data['productLine'] == 'Truck and Buses' ? "selected" : ""; ?>>Truck and Buses</option>
                <option value="Vintage Cars" <?php echo $data['productLine'] == 'Vintage Cars' ? "selected" : ""; ?>>Vintage Cars</option>
              </select>
            </div>
            <div class="form-group">
              <label>Product Scale</label>
              <input type="text" class="form-control" placeholder="Product Scale" name="productScale" value="<?php echo $data['productScale'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>Product Vendor</label>
              <input type="text" class="form-control" placeholder="Vendor" name="productVendor" value="<?php echo $data['productVendor'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>Product Description</label>
              <input type="text" class="form-control" placeholder="Description" name="productDescription" value="<?php echo $data['productDescription'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>Quantity</label>
              <input type="text" class="form-control" placeholder="Quantity" name="quantityInStock" value="<?php echo $data['quantityInStock'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>Price</label>
              <input type="text" class="form-control" placeholder="Price" name="buyPrice" value="<?php echo $data['buyPrice'];  ?>" required="required">
            </div>
            <div class="form-group">
              <label>MSRP</label>
              <input type="text" class="form-control" placeholder="MSRP" name="MSRP" value="<?php echo $data['MSRP']; ?>" required="required">
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