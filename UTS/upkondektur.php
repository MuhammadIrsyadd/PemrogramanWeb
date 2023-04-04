<?php
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php');

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id_kondektur'])) {
          //query SQL
          $id_kondektur_upd = $_GET['id_kondektur'];
          $query = "SELECT * FROM kondektur WHERE id_kondektur = '$id_kondektur_upd'";

          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_kondektur = $_POST['id_kondektur'];
    $nama = $_POST['nama'];

    //query SQL
    $sql = "UPDATE kondektur
    SET id_kondektur='$id_kondektur', nama='$nama'
    WHERE id_kondektur='$id_kondektur'";

    //eksekusi query
    $result = mysqli_query(connection(),$sql);
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
          <form action="upkondektur.php" method="POST">
            <?php while($data = mysqli_fetch_array($result)): ?>
            <div>
              <label>ID kondektur</label>
              <input type="text" placeholder="ID kondektur" name="id_kondektur" value="<?php echo $data['id_kondektur'];  ?>" required="required" readonly>
            </div>
            <div>
              <label>Nama</label>
              <input type="text" placeholder="Nama" name="nama" value="<?php echo $data['nama'];  ?>" required="required">
            </div>

            <?php endwhile; ?>
            <button type="submit" >Simpan</button>
        </form>
        </main>
      </div>
    </div>
  </body>
</html>
