<?php
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php');

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id_driver'])) {
          //query SQL
          $id_driver_upd = $_GET['id_driver'];
          $query = "SELECT * FROM driver WHERE id_driver = '$id_driver_upd'";

          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_driver = $_POST['id_driver'];
    $nama = $_POST['nama'];
    $no_sim = $_POST['no_sim'];
    $alamat = $_POST['alamat'];
    //query SQL
    $sql = "UPDATE driver
    SET id_driver='$id_driver', nama='$nama', no_sim='$no_sim', alamat='$alamat'
    WHERE id_driver='$id_driver'";

    //eksekusi query
    $result = mysqli_query(connection(),$sql);
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
  <style>
    table, th, td {
    border: 1px solid black;} </style>
    <title>UTS</title>
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


          <h2 style="margin: 30px 0 30px 0;">Update Data</h2>
          <form action="updriver.php" method="POST">
            <?php while($data = mysqli_fetch_array($result)): ?>
            <div>
              <label>ID Driver</label>
              <input type="text" placeholder="ID Driver" name="id_driver" value="<?php echo $data['id_driver'];  ?>" required="required" readonly>
            </div>
            <div>
              <label>Nama</label>
              <input type="text" placeholder="Nama" name="nama" value="<?php echo $data['nama'];  ?>" required="required">
            </div>
            <div>
              <label>No. SIM</label>
              <input type="text" placeholder="No. SIM" name="no_sim" value="<?php echo $data['no_sim'];  ?>" required="required">
            </div>
            <div>
              <label>Alamat</label>
              <input type="text" placeholder="Alamat" name="alamat" value="<?php echo $data['alamat'];  ?>" required="required">
            </div>
            <?php endwhile; ?>
            <button type="submit" >Simpan</button>
        </form>
        </main>
      </div>
    </div>
  </body>
</html>
