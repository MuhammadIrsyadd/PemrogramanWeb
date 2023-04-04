<?php 
//memanggil file conn.php yang berisi koneski ke database
//dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
include ('conn.php'); 

$status = '';
//melakukan pengecekan apakah ada form yang dipost
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id_trans_upn = $_POST['id_trans_upn'];
      $id_kondektur = $_POST['id_kondektur'];
      $id_bus = $_POST['id_bus'];
      $id_driver = $_POST['id_driver'];
      $jumlah_km = $_POST['jumlah_km'];
      $tanggal = $_POST['tanggal'];

      //query SQL
      $query = "INSERT INTO trans_upn (id_trans_upn, id_kondektur, id_bus, id_driver, jumlah_km, tanggal) 
      VALUES('$id_trans_upn', '$id_kondektur', '$id_bus', '$id_driver', '$jumlah_km', '$tanggal')"; 

      //eksekusi query
      $result = mysqli_query(connection(),$query);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }
      //redirect ke halaman lain
    header('Location: transupn.php?status='.$status);
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
          <form action="inputtransupn.php" method="POST">
            
          <div>
          <label>ID Bus</label>
              <select name="id_bus" required="required">
                <option value="">Pilih Salah Satu</option>
                <?php 
                 $getBus = "SELECT id_bus FROM bus";
                 $busList = mysqli_query(connection(),$getBus);
              
                while($getBus = mysqli_fetch_array($busList)): ?>
               <option value="<?php echo $getBus["id_bus"]?>"><?php echo $getBus["id_bus"]?></option>
                 <?php endwhile ?>
                
              </select>
            </div>
            <div>
              <label>ID Driver</label>
              <select class="custom-select" name="id_driver" required="required">
                <option value="">Pilih Salah Satu</option>
                <?php 
                 $getDriver = "SELECT id_driver FROM driver";
                 $driverList = mysqli_query(connection(),$getDriver);
              
                while($getDriver = mysqli_fetch_array($driverList)): ?>
               <option value="<?php echo $getDriver["id_driver"]?>"><?php echo $getDriver["id_driver"]?></option>
                 <?php endwhile ?>
                
              </select>
            </div>
            <div>
              <label>ID Kondektur</label>
              <select class="custom-select" name="id_kondektur" required="required">
                <option value="">Pilih Salah Satu</option>
                <?php 
                 $getKondektur = "SELECT id_kondektur FROM kondektur";
                 $kondekturList = mysqli_query(connection(),$getKondektur);
              
                while($getKondektur = mysqli_fetch_array($kondekturList)): ?>
               <option value="<?php echo $getKondektur["id_kondektur"]?>"><?php echo $getKondektur["id_kondektur"]?></option>
                 <?php endwhile ?>
              </select>
            </div>
            <div>
              <label>Jumlah KM</label>
              <input type="text" class="" placeholder="Jumlah km" name="jumlah_km" required="required">
            </div>
            <label for="tanggal">Pilih Tanggal:</label>
            <input type="date" id="tanggal" name="tanggal" min="1900-01-01" max="2099-12-31" value="2023-04-04">

            <button type="submit" >Simpan</button>
          </form>
        </main>
      </div>
    </div>

  </body>
</html>