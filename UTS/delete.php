<?php 

  include ('conn.php'); 

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id_bus'])) {
          //query SQL
          $id_bus_upd = $_GET['id_bus'];
          $query = "DELETE FROM bus WHERE id_bus = '$id_bus_upd'"; 

          //eksekusi query
          $result = mysqli_query(connection(),$query);

            //redirect ke halaman lain
            header('Location: bus.php?');
        }  
    }
    
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id_driver'])) {
        //query SQL
        $id_driver_upd = $_GET['id_driver'];
        $query = "DELETE FROM driver WHERE id_driver = '$id_driver_upd'"; 

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
}
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['id_kondektur'])) {
        //query SQL
        $id_kondektur_upd = $_GET['id_kondektur'];
        $query = "DELETE FROM kondektur WHERE id_kondektur = '$id_kondektur_upd'"; 

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
}

  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id_trans_upn'])) {
        //query SQL
        $id_trans_upn_upd = $_GET['id_trans_upn'];
        $query = "DELETE FROM trans_upn WHERE id_trans_upn = '$id_trans_upn_upd'"; 

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
}