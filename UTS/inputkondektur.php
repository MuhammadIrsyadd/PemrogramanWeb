<?php 
//memanggil file conn.php yang berisi koneski ke database
//dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
include ('conn.php'); 

$status = '';
//melakukan pengecekan apakah ada form yang dipost
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id_kondektur = $_POST['id_kondektur'];
      $nama = $_POST['nama'];

      //query SQL
      $query = "INSERT INTO kondektur (id_kondektur, nama) 
      VALUES('$id_kondektur', '$nama')"; 

      //eksekusi query
      $result = mysqli_query(connection(),$query);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }
       //redirect ke halaman lain
    header('Location: kondektur.php?status='.$status);
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
          <form action="inputkondektur.php" method="POST">
            
          <div>
              <label>ID Kondektur</label>
              <input type="text" placeholder="ID Kondektur" name="id_kondektur" required="required">
            </div>
            <div>
              <label>Nama</label>
              <input type="text" placeholder="Nama" name="nama" required="required">
            </div>

            <button type="submit" >Simpan</button>
          </form>
        </main>
      </div>
    </div>

  </body>
</html>