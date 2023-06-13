<?php 
  //Memanggiil file conn.php untuk koneksi ke database
  include ('conn.php'); 
  
  // Query SQL untuk mendapatkan data ruang laboratorium
  $queryRuangan = "SELECT * FROM ruang WHERE id_kategori = '1'";
  $resultRuangan = mysqli_query(connection(), $queryRuangan);
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
    <div class="bod">
      <div class="box">
        <p> Riwayat Peminjaman </p>
      </div>
      <table class="table">
        <thead>
          <tr>
        </thead>
        <tr>
          <th>Nama</th>
          <th>Instansi</th>
          <th>No. Telp</th>
          <th>Ruang</th>
          <th>Keperluan</th>
          <th>Tanggal</th>
          <th>Status</th>
        </tr>
        <tbody>
          <?php 
              //proses menampilkan data dari database:
              //siapkan query SQL
              $query = "SELECT * FROM reservasi";
              $result = mysqli_query(connection(),$query);
              while ($data = mysqli_fetch_assoc($result)) { 
                echo "<tr>";
                echo "<td>" . $data['nama'] . "</td>";
                echo "<td>" . $data['instansi'] . "</td>";
                echo "<td>" . $data['no_telp'] . "</td>";
                echo "<td>" . $data['ruangan'] . "</td>";
                echo "<td>" . $data['keperluan'] . "</td>";
                echo "<td>" . $data['tgl_pinjam'] . "</td>";
                echo "<td>" . $data['status'] . "</td>";
                echo "</tr>";
              }
            ?>
        </tbody>
</table>
</div>


<div class="footerCont">
            <div class="footer">
                <p class="p1">Copyright 2023 Kelompok 5 </p>
                <p class="p2">@BOROOM</p>
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