<?php 

  include ('conn.php');

  $status = '';
  //Mengecek apakah ada form yang dipost
  $nama= "";
  $email ="";
  $password = "";
  $ulangi_password = "";
  $telepon = "";
  $alamat = "";

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama= $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $ulangi_password = $_POST['ulangi_password'];
    $telepon = $_POST['telepon'];
    $alamat = $_POST['alamat'];

      //query SQL
      if(isset($_POST['syarat']) && isset($_POST['daftar']) ){
            if($password == $ulangi_password){
              $sql = "SELECT * FROM admin where email = '$email'";
              $result = mysqli_query(connection(), $sql);
              $data = mysqli_num_rows($result);
              if($data==0){
                // $Epassword = password_hash($password, PASSWORD_DEFAULT);
                $query = "INSERT INTO admin(nama, email, no_telp, alamat, password) VALUES('$nama','$email','$telepon','$alamat','$password')"; 
                $hasil = mysqli_query(connection(),$query);
                  if ($hasil) {
                     header('location: a_signin.php');
                  }
                  else{
                    ?>
                    <div class="alert alert-warning mt-3 text-center" role="alert">
                      ERROR!
                    </div>
                  <?php
                  }
                }
                else{
                  ?>
                    <div class="alert alert-warning mt-3 text-center" role="alert">
                      Email sudah terdaftar
                    </div>
                <?php
                }
              }
              else{
                  ?>
                  <div class="alert alert-warning mt-3 text-center" role="alert">
                    Password Tidak Cocok
                  </div>
                <?php
              } 
         }    
        else{
          ?>
            <div class="alert alert-warning mt-3 text-center" role="alert">
              Setujui dahulu Syarat & Ketentuan
            </div>
          <?php
        }
        
      if(isset($_POST['hapus']) ){
        $email ="";
        $nama= "";
        $password = "";
        $cpassword = "";
        $no_tlp = "";
        $alamat = "";
      }
      }  
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/sign.css">
  <title> Signup Page </title>
</head>

<body>
<div class="form-container">
<div class="title"> Daftar Akun </div>
    <div class="left-column">
      <form action="a_signup.php" method="post">
        <label for="nama">Nama Lengkap</label>
        <input type="text" id="nama" name="nama" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="telepon">No. Telepon</label>
        <input type="tel" id="telepon" name="telepon" required>
        <div class="checkbox-container">
          <input type="checkbox" id="syarat" name="syarat">
          <label for="syarat">Saya menyetujui <a href="#" class="link-active">Syarat &amp; Ketentuan</a> yang berlaku</label>
        </div>

        <button type="submit" name="daftar" class="daftar-button"> Daftar </button>
      <p class="sdh"> Sudah memiliki akun ?<a href="a_signin.php" class="sdh"> Masuk disini </a></p>
    </div>
    <div class="right-column">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>

        <label for="repeat_password">Ulangi Password</label>
        <input type="password" id="ulangi_password" name="ulangi_password" required>

        <label for="alamat">Alamat</label>
        <input type="text" id="alamat" name="alamat" required>
        <button type="reset" value="Reset"  name="hapus" class="hapus-button">Hapus Data</button>
    </form>
    </div>
</div>
</body>
</html>