<?php 

  include ('conn.php'); 

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['employeeNumber'])) {
          //query SQL
          $employeeNumber_upd = $_GET['employeeNumber'];
          $query = "DELETE FROM employees WHERE employeeNumber = '$employeeNumber_upd'"; 

          //eksekusi query
          $result = mysqli_query(connection(),$query);

          if ($result) {
            $status = 'ok';
          }
          else{
            $status = 'err';
          }

          //redirect ke halaman lain
          header('Location: employees.php?status='.$status);
      }  
  }

  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['productLine'])) {
        //query SQL
        $productLine_upd = $_GET['productLine'];
        $query = "DELETE FROM productlines WHERE productLine = '$productLine_upd'"; 

        //eksekusi query
        $result = mysqli_query(connection(),$query);

        if ($result) {
          $status = 'ok';
        }
        else{
          $status = 'err';
        }

        //redirect ke halaman lain
        header('Location: productline.php?status='.$status);
    }  
}
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  if (isset($_GET['customerNumber'])) {
      //query SQL
      $customerNumber_upd = $_GET['customerNumber'];
      $query = "DELETE FROM customers WHERE customerNumber = '$customerNumber_upd'"; 

      //eksekusi query
      $result = mysqli_query(connection(),$query);

      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }

      //redirect ke halaman lain
      header('Location: customer.php?status='.$status);
  }  
}
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  if (isset($_GET['productCode'])) {
      //query SQL
      $productCode_upd = $_GET['productCode'];
      $query = "DELETE FROM products WHERE productCode = '$productCode_upd'"; 

      //eksekusi query
      $result = mysqli_query(connection(),$query);

      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }

      //redirect ke halaman lain
      header('Location: product.php?status='.$status);
  }  
}