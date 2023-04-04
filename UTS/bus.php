<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 
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
        <?php 
            //mengecek apakah proses update dan delete sukses/gagal
            if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='ok') {
                echo '<br><br><div>Data berhasil di-update</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div>Data gagal di-update</div>';
              }

            }
           ?>
          <h2 style="margin: 30px 0 30px 0;">Data Bus</h2>
          <form action=<?php echo "bus.php"?> method="get">
          <label for="status">Filter berdasarkan status:</label>
              <select name="status" required>
                <option value="">Pilih salah satu</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="0">0</option>
              </select>
            <button type="submit">Filter</button>
            </form>
            <form action="bus.php" method="get">
                <button type="submit">Reset</button>
            </form>
          <div>
            <table>
              <thead>
                <tr>
                  <th>ID Bus</th>
                  <th>Plat</th>
                  <th>Status</th>
                  <th>Total Perjalanan</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  //proses menampilkan data dari database:
                  //siapkan query SQL
                  if(isset($_GET['status'])){
                    $query = "SELECT * FROM bus WHERE status = $status";
                  }else{
                    $query = "SELECT * FROM bus";
                  }
                  $result = mysqli_query(connection(),$query);
                 ?>

                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr>
                    <td><?php echo $data['id_bus'];  ?></td>
                    <td><?php echo $data['plat'];  ?></td>
                    <td style="background-color: <?php echo $data['status'] == 1 ? 'green' : ($data['status'] == 2 ? 'yellow' : 'red'); ?>"><?php echo $data['status']; ?></td>
                    <?php
                      $queryKmBus = "SELECT SUM(jumlah_km) AS total_km FROM trans_upn WHERE id_bus = $data[id_bus] GROUP BY id_bus";
                      $result_km = mysqli_query(connection(),$queryKmBus);
                      $data_km_bus = mysqli_fetch_assoc($result_km);
                      if($data_km_bus === null){
                        $total_km = 0;
                      }else{
                        $total_km = $data_km_bus['total_km'];
                      }
                      ?>
                    <td><?php echo $total_km;  ?></td>
                    <td>
                      <a href="<?php echo "upbus.php?id_bus=".$data['id_bus']; ?>"> Update</a>
                      &nbsp;
                      <a href="<?php echo "delete.php?id_bus=".$data['id_bus']; ?>"> Delete</a>
                    </td>
                    <td>
                      <a href="<?php echo "inputbus.php?id_bus=".$data['id_bus']; ?>"> Tambah Data</a>
                    </td>
                  </tr>
                 <?php endwhile ?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>

  </body>
</html>
