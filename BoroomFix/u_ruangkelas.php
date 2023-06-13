<?php 
  //Memanggiil file conn.php untuk koneksi ke database
  include ('conn.php'); 
  
  // Query SQL untuk mendapatkan data ruang laboratorium
  $queryRuangan = "SELECT * FROM ruang WHERE id_kategori = '2'";
  $resultRuangan = mysqli_query(connection(), $queryRuangan);
  
  // Mendapatkan hasil query dalam bentuk array
  $ruanganOptions = '';
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
  <!-- <link rel="stylesheet" href="css/style.css"> -->
  <link rel="stylesheet" href="./css/new.css">
  <title>BOROOM</title>
</head>


<body>
  <section class="main_new">
    <div class="container_new">
      <div class="header_new">
        <a href="index.php" class="back-btn"><img src="./assets/back.png" alt="Back"></a>
        <div class="search-container">
          <select id="search-select">
            <option value=""><img src="./assets/search.png" alt="Search"> Cari Ruangan</option>
            <?php echo $ruanganOptions; ?>
          </select>
        </div>
      </div>
      <div class="table-container">
        <table>
          <thead>
            <tr>
              <th>Ruang</th>
              <th>Kapasitas</th>
              <th>Deskripsi</th>
              <th>Foto</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              //proses menampilkan data dari database:
              //siapkan query SQL
              $query = "SELECT * FROM ruang WHERE id_kategori = '2'";
              $result = mysqli_query(connection(),$query);
              while ($data = mysqli_fetch_assoc($result)) { 
                echo "<tr>";
                echo "<td>" . $data['nama'] . "</td>";
                echo "<td>" . $data['kapasitas'] . "</td>";
                echo "<td>" . $data['deskripsi'] . "</td>";
                echo "<td><img src='../bromA/ruangan/" . $data['foto'] . "'alt='Foto Ruangan' width='100px'></td>";
                echo "<td>" . $data['status'] . "</td>";
                echo "</tr>";
              }
            ?>
          <tbody>
        </table>
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