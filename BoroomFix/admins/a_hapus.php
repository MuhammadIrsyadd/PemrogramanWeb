<?php 

  include ('conn.php'); 

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['hapus'])) {
          //query SQL
          $idRuang_upd = $_GET['id_ruangan'];
          $query = "DELETE FROM ruang WHERE id_ruang = '$idRuang_upd'"; 

          //eksekusi query
          $result = mysqli_query(connection(),$query);

          if ($result) {
            $status = 'ok';
          }
          else{
            $status = 'err';
          }

          //redirect ke halaman lain
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
<div class="smallbox">
    <div> HAPUS RUANGAN</div>
    <form action="" method="get">
        <label for="id_ruangan">ID RUANGAN</label>
        <input type="text" id="id_ruangan" name="id_ruangan" required>
        <button type="submit" name="hapus" class="hapusbox">HAPUS</button>
        <?php
        if ($status === 'ok') {
            echo '<p>Data ruangan berhasil dihapus</p>';
        } elseif ($status === 'err') {
            echo '<p>Terjadi kesalahan saat menghapus data ruangan.</p>';
        }
        ?>
    </form>
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