<?php 
//memanggil file conn.php yang berisi koneski ke database
//dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
include ('conn.php'); 

$status = '';
//melakukan pengecekan apakah ada form yang dipost
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id_driver = $_POST['id_driver'];
      $nama = $_POST['nama'];
      $no_sim = $_POST['no_sim'];
      $alamat = $_POST['alamat'];

      //query SQL
      $query = "INSERT INTO driver (id_driver, nama, no_sim, alamat) 
      VALUES('$id_driver', '$nama', '$no_sim','$alamat')"; 

      //eksekusi query
      $result = mysqli_query(connection(),$query);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }
      //redirect ke halaman lain
    header('Location: driver.php?status='.$status);
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Input Data</title>
  </head>

  <body>
  <nav>
      <p>UTS PEMWEB A081</p>
      <p>Muh Irsyad Dwi Kurniawan</p>
      <p>21081010127</p>
    </nav>

    <div>
      <div>
        <nav>
        <h2 style="margin: 30px 0 30px 0;">Menu</h2>
          <div>
            <ul>
               <li>
                <a href="<?php echo "bus.php"; ?>">Bus</a>
              </li>
              <li>
                <a href="<?php echo "driver.php"; ?>">Driver</a>
              </li>
              <li>
                <a href="<?php echo "kondektur.php"; ?>">Kondektur</a>
              </li>
              <li>
                <a href="<?php echo "transupn.php"; ?>">Trans UPN</a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main">
          
        <?php 
              if ($status=='ok') {
                echo '<br><br><div>Data berhasil disimpan</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div>Data gagal disimpan</div>';
              }
           ?>

          <h2 style="margin: 30px 0 30px 0;">Input Data</h2>
          <form action="inputdriver.php" method="POST">
            
          <div>
              <label>ID Driver</label>
              <input type="text" placeholder="ID Driver" name="id_driver" required="required">
            </div>
            <div>
              <label>Nama</label>
              <input type="text" placeholder="Nama" name="nama" required="required">
            </div>
            <div>
              <label>No. SIM</label>
              <input type="text" placeholder="No. SIM" name="no_sim" required="required">
            </div>
            <div>
              <label>Alamat</label>
              <input type="text" placeholder="Alamat" name="alamat" required="required">
            </div>


            <button type="submit" >Simpan</button>
          </form>
        </main>
      </div>
    </div>

  </body>
</html>