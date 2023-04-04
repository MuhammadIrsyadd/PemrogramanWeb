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
          <h2 style="margin: 30px 0 30px 0;">Pendapatan Kondektur</h2>
          <form action=<?php echo "gajikondektur.php"?> method="get">
              <label for="bulan">Filter berdasarkan bulan:</label>
              <select name="bulan" required="required">
                <option value="">Pilih Salah Satu</option>
                <?php 
                 $getKondektur = "select kondektur.id_kondektur,nama,sum(jumlah_km) as jumlah_km,tanggal,month(tanggal) as bulan from trans_upn
                 join kondektur on trans_upn.id_driver = kondektur.id_kondektur group by month(tanggal) order by month(tanggal)"; 
                 $kondekturList = mysqli_query(connection(),$getKondektur);
              
                while($getKondektur = mysqli_fetch_array($kondekturList)): ?>
               <option value="<?php echo $getKondektur["bulan"]?>"><?php echo $getKondektur["bulan"]?></option>
                 <?php endwhile ?>
              </select>
              <button type="submit">Filter</button>
            </form>
            <form action="gajikondektur.php" method="get">
                <button type="submit">Reset</button>
            </form>
          <div>
            <table>
              <thead>
                <tr>
                  <th>ID Kondektur</th>
                  <th>Nama</th>
                  <th>Jumlah KM</th>
                  <th>Tanggal</th>
                  <th>Gaji</th>
                
              </thead>
              <tbody>
                <?php 
                  //proses menampilkan data dari database:
                  //siapkan query SQL
                    $query="";
                  if (isset($_GET['bulan'])) {
                    $query = "select kondektur.id_kondektur,nama,sum(jumlah_km) as jumlah_km,tanggal,month(tanggal) as bulan from trans_upn
                    join kondektur on trans_upn.id_driver = kondektur.id_kondektur where month(tanggal) = ".$_GET['bulan'] ." group by trans_upn.id_kondektur, month(tanggal);" ;               
                  } else {
                    $query = "select kondektur.id_kondektur,nama,sum(jumlah_km) as jumlah_km,tanggal,month(tanggal) as bulan from trans_upn
                    join kondektur on trans_upn.id_driver = kondektur.id_kondektur group by trans_upn.id_kondektur, month(tanggal);";             
                }

                 
                  $result = mysqli_query(connection(),$query);
                 ?>

                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr>
                    <td><?php echo $data['id_kondektur'];  ?></td>
                    <td><?php echo $data['nama'];  ?></td>
                    <td><?php echo $data['jumlah_km'];  ?></td>
                    <td><?php echo $data['tanggal'];  ?></td>
                    <td><?php echo $data['jumlah_km'] * 1500;  ?></td>                  
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