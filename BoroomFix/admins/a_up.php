<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 
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

    <div class="bod">
      <div class="box">
        <p> Update Ruangan </p>
      </div>
      <div class="table-container">
      <table>
        <thead>
          <tr>
            <th>Id Ruang</th>
            <th>Id Kategori</th>
            <th>Nama</th>
            <th>Kapasitas</th>
            <th>Foto</th>
            <th>Deskripsi</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>          
          <?php 
          //proses menampilkan data dari database:
          //siapkan query SQL
          $query = "SELECT * FROM ruang";
          $result = mysqli_query(connection(),$query);      
          ?>
            <?php while($data = mysqli_fetch_array($result)): ?>
              <tr>
                <td><?php echo $data['id_ruang'];  ?></td>
                <td><?php echo $data['id_kategori'];  ?></td>
                <td><?php echo $data['nama'];  ?></td>
                <td><?php echo $data['kapasitas'];  ?></td>
                <td><?php echo "<img src='../ruangan/" . $data['foto'] . "'alt='Foto Ruangan' width='100px'>"; ?></td>";
                <td><?php echo $data['deskripsi'];  ?></td>
                <td><a href="<?php echo "a_update.php?id_ruang=".$data['id_ruang']; ?>"> <button class="upbut"> Update</button></a></td>
              </tr>
            <?php endwhile ?>
            </tbody>
          </table>
        </div>
      </div>
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