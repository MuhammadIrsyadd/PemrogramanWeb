<?php 
  //memanggil file conn.php yang berisi koneksi ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 

  $status = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $nama = $_POST['nama'];
      $asal_instansi = $_POST['asal_instansi'];
      $ruangan = $_POST['ruangan'];
      $telepon = $_POST['telepon'];
      $date = $_POST['date'];
      $keperluan = $_POST['keperluan'];
      
      // Upload file
      $file = $_FILES['file'];
      $file_name = $file['name'];
      $file_tmp = $file['tmp_name'];
      $file_size = $file['size'];
      $file_error = $file['error'];

      // Cek apakah file berhasil diupload
      if ($file_error === 0) {
        // Tentukan lokasi penyimpanan file
        $file_destination = 'uploads/' . $file_name;
        // Pindahkan file ke lokasi tujuan
        move_uploaded_file($file_tmp, $file_destination);
      }
      
      //query SQL
      $query = "INSERT INTO reservasi (nama, instansi, ruangan, no_telp, tgl_pinjam, bukti, keperluan, status) VALUES('$nama','$asal_instansi','$ruangan', '$telepon' ,'$date', '$file_name', '$keperluan', 'pending')"; 

      //eksekusi query
      $result = mysqli_query(connection(),$query);
      if ($result) {
        // Ubah status ruangan menjadi "reserved"
        $queryUpdateStatus = "UPDATE ruang SET status = 'reserved' WHERE nama = '$ruangan'";
        mysqli_query(connection(), $queryUpdateStatus);
        $status = 'ok';
      }
      else{
        $status = 'err';
      }
  }
  // Query untuk mendapatkan daftar nama ruangan dengan status 'available'
  $queryRuangan = "SELECT nama FROM ruang WHERE status = 'available'";
  $resultRuangan = mysqli_query(connection(), $queryRuangan);
  $ruanganOptions = '';
  // Tampilkan opsi ruangan dari hasil query
  while ($rowRuangan = mysqli_fetch_assoc($resultRuangan)) {
    $ruanganOptions .= '<option value="' . $rowRuangan['nama'] . '">' . $rowRuangan['nama'] . '</option>';
  }

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="icon" type="image/png" href="./assets/logo.png" />
    <link rel="stylesheet" href="css/style.css">
    <title>BOROOM</title>
</head>


<body>
    <section>
        <?php
            include ('./sidebar/sidebar.php')
        ?>
        
    </section>

    <section class="main">
        <div class="form-container">
            <div class="title"> Ajuan Peminjaman Ruangan </div>
            <div class="left-column">
                <form action="u_peminjaman.php" method="POST" enctype="multipart/form-data">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama" required>

                    <label for="asal_instansi">Asal Instansi</label>
                    <input type="text" id="asal_instansi" name="asal_instansi" required>

                    <label for="ruangan">Ruangan</label>
                    <select class="custom-select" name="ruangan" required>
                        <option value="">Pilih Salah Satu</option>
                        <?php echo $ruanganOptions; ?>
                    </select>
            </div>
            <div class="right-column">
                <label for="telepon">No. Telepon</label>
                <input type="tel" id="telepon" name="telepon" required>

                <label for="keperluan">Keperluan</label>
                <input type="text" id="keperluan" name="keperluan" required>

                <label for="konfirmasi_password">Tanggal</label>
                <input type="date" id="date" name="date" required>
            
                <div class="upload">
                    <label for="file">Upload Berkas</label>
                    <input type="file" id="file" name="file">
                    <p> *Max 10Mb</p>
                </div>
                <div>
                    <input type="submit" value="Submit">
                </div>
                <?php
                if ($status === 'ok') {
                    echo '<p>Peminjaman berhasil.</p>';
                } elseif ($status === 'err') {
                    echo '<p>Terjadi kesalahan saat menyimpan data.</p>';
                }
                ?>
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
    function autoRefreshPage()
    {
        window.location = window.location.href;
    }
    setInterval('autoRefreshPage()', 518400000);   //interval berdasarkan millisecond
</script>
</html>
