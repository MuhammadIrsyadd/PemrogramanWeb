<?php
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php');

  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id_bus'])) {
          //query SQL
          $id_bus_upd = $_GET['id_bus'];
          $query = "SELECT * FROM bus WHERE id_bus = '$id_bus_upd'";

          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_bus = $_POST['id_bus'];
    $plat = $_POST['plat'];
    $status = $_POST['status'];
    //query SQL
    $sql = "UPDATE bus
    SET id_bus='$id_bus', plat='$plat', status='$status'
    WHERE id_bus='$id_bus'";

    //eksekusi query
    $result = mysqli_query(connection(),$sql);

    //redirect ke halaman lain
    header('Location: bus.php?');
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
          <form action="upbus.php" method="POST">
            <?php while($data = mysqli_fetch_array($result)): ?>
            <div>
              <label>ID Bus</label>
              <input type="text" placeholder="ID Bus" name="id_bus" value="<?php echo $data['id_bus'];  ?>" required="required" readonly>
            </div>
            <div>
              <label>Plat</label>
              <input type="text" placeholder="Plat" name="plat" value="<?php echo $data['plat'];  ?>" required="required">
            </div>
            <div>
              <label>Status</label>
              <select name="status" value="<?php echo $data['status']; ?> required="required">
                <option value="">Pilih Salah Satu</option>
                <option value="1" <?php echo $data['status'] == 1 ? "selected" : ""; ?>>1</option>
                <option value="2" <?php echo $data['status'] == 2 ? "selected" : ""; ?>>2</option>
                <option value="0" <?php echo $data['status'] == 0 ? "selected" : ""; ?>>0</option>
              </select>
            </div>
            <?php endwhile; ?>
            <button type="submit" >Simpan</button>
        </form>
        </main>
      </div>
    </div>
  </body>
</html>
