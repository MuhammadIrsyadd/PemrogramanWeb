<?php 
//memanggil file conn.php yang berisi koneski ke database
//dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
include ('conn.php'); 

$status = '';
//melakukan pengecekan apakah ada form yang dipost
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id_bus = $_POST['id_bus'];
      $plat = $_POST['plat'];
      $status = $_POST['status'];

      //query SQL
      $query = "INSERT INTO bus (id_bus, plat, status) 
      VALUES('$id_bus','$plat','$status')"; 

      //eksekusi query
      $result = mysqli_query(connection(),$query);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }
      header('Location: bus.php?');
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
          <form action="inputbus.php" method="POST">
            
          <div>
              <label>ID Bus</label>
              <input type="text" placeholder="ID Bus" name="id_bus" required="required">
            </div>
            <div>
              <label>Plat</label>
              <input type="text" placeholder="Plat" name="plat" required="required">
            </div>
            <div>
              <label>Status</label>
              <select name="status" required="required">
                <option value="">Pilih Salah Satu</option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
              </select>
            </div>

            <button type="submit">Simpan</button>
          </form>
        </main>
      </div>
    </div>
  </body>
</html>