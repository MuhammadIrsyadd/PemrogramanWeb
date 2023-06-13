<?php
// Memanggil file conn.php yang berisi koneksi ke database
// Dengan include, semua kode dalam file conn.php dapat digunakan pada file ini
include('conn.php');

$status = '';
$result = '';

// Melakukan pengecekan apakah ada variable GET yang dikirim
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  if (isset($_GET['id_ruang'])) {
    // Query SQL
    $id_ruang_upd = $_GET['id_ruang'];
    $query = "SELECT * FROM ruang WHERE id_ruang = '$id_ruang_upd'";

    // Eksekusi query
    $result = mysqli_query(connection(), $query);
  }
}

// Melakukan pengecekan apakah ada form yang dipost
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id_ruang = $_POST['id_ruang'];
  $id_kategori = $_POST['id_kategori'];
  $nama = $_POST['nama'];
  $kapasitas = $_POST['kapasitas'];
  $deskripsi = $_POST['deskripsi'];

  // Mengecek apakah file foto diupload
  if (isset($_FILES['file'])) {
    $file = $_FILES['file'];

    // Mendapatkan informasi file
    $fileName = $file['name'];
    $fileTmp = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];

    // Mengecek apakah tidak ada error saat upload
    if ($fileError === 0) {
      // Menentukan lokasi penyimpanan file foto dengan nama file asli
      $uploadPath = '../ruangan/' . $fileName;

      // Memindahkan file foto ke lokasi penyimpanan
      move_uploaded_file($fileTmp, $uploadPath);

      // Query SQL dengan pembaruan foto
      $query = "UPDATE ruang 
                SET id_kategori = '$id_kategori', 
                    nama = '$nama', 
                    kapasitas = '$kapasitas', 
                    deskripsi = '$deskripsi', 
                    foto = '$fileName' 
                WHERE id_ruang = '$id_ruang'";

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
  } else {
    // Query SQL tanpa pembaruan foto
    $query = "UPDATE ruang 
              SET id_kategori = '$id_kategori', 
                  nama = '$nama', 
                  kapasitas = '$kapasitas', 
                  deskripsi = '$deskripsi' 
              WHERE id_ruang = '$id_ruang'";

    // Eksekusi query
    $result = mysqli_query(connection(), $query);
    if ($result) {
      $status = 'ok';
    } else {
      $status = 'err';
    }
  }

  // Redirect ke halaman lain
  header('Location: a_up.php?status=' . $status);
}
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="../assets/logo.png" />
  <link rel="stylesheet" href="../css/style.css">
  <title>BOROOM</title>
</head>

<body>
  <section>
    <?php include('../sidebar/sidebaradmin.php') ?>
  </section>
  <section class="main">
    <div class="boxx">
      <div class="btext"> Update Ruangan </div>
      <div class="boxleft">
        <form method="post" action="a_update.php" enctype="multipart/form-data">
          <?php while ($data = mysqli_fetch_array($result)) : ?>
            <input type="hidden" id="id_ruang" name="id_ruang" value="<?php echo $data['id_ruang']; ?>">

            <label for="id_kategori">ID KATEGORI</label>
            <input type="text" id="id_kategori" name="id_kategori" value="<?php echo $data['id_kategori']; ?>" readonly>

            <label for="ruang">Nama Ruangan</label>
            <input type="text" id="nama" name="nama" value="<?php echo $data['nama']; ?>" required>

            <label for="kapasitas">KAPASITAS RUANGAN</label>
            <input type="number" id="kapasitas" name="kapasitas" value="<?php echo $data['kapasitas']; ?>" required>
        </div>
        <div class="boxright">
          <label for="deskripsi">DESKRIPSI RUANGAN</label>
          <input type="deskripsi" id="deskripsi" name="deskripsi" value="<?php echo $data['deskripsi']; ?>" required></input>

          <label for="file">FOTO RUANGAN</label>
          <input type="file" id="file" name="file">
        </div>
      <?php endwhile; ?>
      <button class="simpan-btn" type="submit"> SIMPAN </button>
      </form>

      <div class="footerCont">
        <div class="footer">
          <p class="p1">Copyright 2023 Kelompok 5 </p>
          <p class="p2">@BOROOM</p>
        </div>
      </div>
    </div>
  </section>
</body>

<!-- AUTO REFRESH SELAMA 6 HARI-->
<script type="text/javascript">
  function autoRefreshPage() {
    window.location = window.location.href;
  }
  setInterval('autoRefreshPage()', 518400000); //interval berdasarkan millisecond
</script>

</html>