<?php
session_start();
include('conn.php');

if (!isset($_SESSION['login'])) {
    header('location: signin.php');
    exit();
}

$email = $_SESSION['email'];

$query = mysqli_query(connection(), "SELECT * FROM user WHERE email='$email'");
$data = mysqli_fetch_array($query);

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $telepon = $_POST['telepon'];
    $alamat = $_POST['alamat'];

    // Update informasi profil dalam database
    $updateQuery = "UPDATE user SET nama='$nama', no_telp='$telepon', alamat='$alamat' WHERE email='$email'";
    mysqli_query(connection(), $updateQuery);

    // Redirect ke halaman profil setelah berhasil mengupdate informasi
    header('location: u_profil.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/sign.css">
  <title> Ubah Profile </title>
</head>

<body>
<div class="form-container">
<div class="title"> Ubah Profile </div>
  <form action="" method="post">
    <div class="left-column">
        <label for="nama">Nama Lengkap</label>
        <input type="text" id="nama" name="nama" required>
    </div>
    <div class="right-column">
        <label for="telepon">No. Telepon</label>
        <input type="tel" id="telepon" name="telepon" required>

        <label for="alamat">Alamat</label>
        <input type="text" id="alamat" name="alamat" required>
    </div>
    <div class="tengah">
      <button type="submit" name="simpan" class="daftar-button"> Simpan </button>
    </div>
  </form>
    
</div>
</body>
</html>