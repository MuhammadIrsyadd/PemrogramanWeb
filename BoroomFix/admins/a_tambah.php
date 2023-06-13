<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 

  $status = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id_kategori = $_POST['id_kategori'];
      $nama = $_POST['nama'];
      $kapasitas = $_POST['kapasitas'];
      $deskripsi = $_POST['deskripsi'];
      
      // Mengunggah file foto
      $targetDir = "../ruangan/"; // Direktori tujuan penyimpanan file
      $foto = basename($_FILES["file"]["name"]);
      $targetFilePath = $targetDir . $foto;
      $uploadOk = 1;
      $imageFileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    
      // Cek apakah file gambar yang diunggah adalah gambar
      $check = getimagesize($_FILES["file"]["tmp_name"]);
      if ($check !== false) {
        $uploadOk = 1;
      } else {
        $status = 'err';
        $uploadOk = 0;
      }
    
      // Cek apakah file sudah ada sebelumnya
      if (file_exists($targetFilePath)) {
        $status = 'err';
        $uploadOk = 0;
      }
    
      // Batasi tipe file yang diizinkan
      if (
        $imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif"
      ) {
        $status = 'err';
        $uploadOk = 0;
      }
    
      // Jika semua validasi berhasil, lakukan pengunggahan file
      if ($uploadOk) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
          // Query SQL dengan memasukkan nama file foto ke dalam database
          $query = "INSERT INTO ruang (id_kategori, nama, kapasitas, deskripsi, foto, status) VALUES ('$id_kategori', '$nama', '$kapasitas', '$deskripsi', '$foto', 'available')";
    
          // Eksekusi query
          $result = mysqli_query(connection(), $query);
          if ($result) {
            $status = 'ok';
          } else {
            $status = 'err';
          }
        } else {
          $status = 'err';
        }
        header('Location: indexadmin.php?status='.$status);
      }
    }
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="icon" type="image/png" href="../assets/logo.png" />
    <link rel="stylesheet" href="../css/style.css">
    <title>BOROOM</title>
</head>


<body>
    <section>
        <?php
            include ('../sidebar/sidebaradmin.php')
        ?>
        
    </section>

<section class="main">
<div class="boxx">
<div class="btext"> Tambah Ruangan </div>
    <div class="boxleft">
      <form action="a_tambah.php" method="POST" enctype="multipart/form-data">
        <label for="nama">ID KATEGORI</label>
        <select class="custom-select" name="id_kategori" required>
          <option value="">Pilih Salah Satu</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
        </select>
        <!-- <label for="id_kategori">ID KATEGORI</label>
        <input type="text" id="id_kategori" name="id_kategori" required> -->

        <label for="nama">NAMA RUANGAN</label>
        <input type="text" id="nama" name="nama" required>

        <label for="kapasitas">KAPASITAS RUANGAN</label>
        <input type="number" id="kapasitas" name="kapasitas" required>
    </div>
    <div class="boxright">
        <label for="deskripsi">DESKRIPSI RUANGAN</label>
        <textarea type="deskripsi" id="deskripsi" name="deskripsi" required></textarea>

        <label for="file">FOTO RUANGAN</label>
        <input type="file" id="file" name="file">

        </div>
        <button type="submit" class="simpan-btn"> SIMPAN </button>
        </div>

    </form>

    <div class="footerCont">
        <div class="footer">
            <p class="p1">Copyright 2023 Kelompok 5 </p>
            <p class="p2">@BOROOM</p>
        </div>
    </div>
</section>
</body>
</html>