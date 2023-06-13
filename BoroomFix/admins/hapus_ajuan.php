<?php
    include('conn.php');
    $status = '';
    $result = '';

    if($_SERVER['REQUEST_METHOD'] === 'GET')
    {
        if(isset($_GET['id_reservasi']))
        {
            $id_reservasi  = $_GET['id_reservasi'];

            $query  = "DELETE FROM reservasi WHERE id_reservasi = '$id_reservasi' ";
            $result = mysqli_query(connection(), $query);
            if ($result){
                $status='ok';
                header("Location: a_ajuan.php?status=ok");
            }
            else{
                $status='err';
            }
            // header('Location : a_ajuan.php?status='.$status);
        }            
    }

?>