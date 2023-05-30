<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="icon" type="image/png" href="./assets/logo.png" />
    <link rel="stylesheet" href="css/style.css">
    <title>BOROOM</title>
</head>


<body>
    <section>
        <?php
            include ('./sidebar/sidebaradmin.php')
        ?>
        
    </section>

    <section class="main">
    <div class="box">
        <p> Status Ajuan </p>
    </div>
    <table class="table">
  <tr>
    <th>No</th>
    <th>Nama</th>
    <th>No. Telp</th>
    <th>Ruang</th>
    <th>Keperluan</th>
    <th>Tanggal</th>
    <th>Form</th>
    <th>Action</th>
  </tr>
  <tr>
    <td>1</td>
    <td>abcd</td>
    <td>1234</td>
    <td>R301</td>
    <td>Rapat</td>
    <td>2023-01-02</td>
    <td><a href="#" class="active-link">Form</a></td>
    <td>
        <a href="<?php echo "edit_ruangan.php?id_ruangan=" . $d['id_ruangan']; ?>"><img class="edit" src="./assets/acc.png" width="25" height="25" alt="Edit"></a>
        <a href="<?php echo "hapus_ruangan.php?id_ruangan=" . $d['id_ruangan']; ?>"><img class="decline" src="./assets/dec.png" width="25" height="25" alt="Delete" onclick="return confirm('Apakah anda menolak ajuan ini ?')"></a>
    </td>
  </tr>
  <tr>
    <td>2</td>
    <td>abcd</td>
    <td>1234</td>
    <td>R302</td>
    <td>Rapat</td>
    <td>2023-01-03</td>
    <td><a href="#" class="active-link">Form</a></td>
    <td>
        <a href="<?php echo "edit_ruangan.php?id_ruangan=" . $d['id_ruangan']; ?>"><img class="edit" src="./assets/acc.png" width="25" height="25" alt="Edit"></a>
        <a href="<?php echo "hapus_ruangan.php?id_ruangan=" . $d['id_ruangan']; ?>"><img class="decline" src="./assets/dec.png" width="25" height="25" alt="Delete" onclick="return confirm('Apakah anda menolak ajuan ini ?')"></a>
    </td>
  </tr>
  <tr>
    <td>3</td>
    <td>abcd</td>
    <td>1234</td>
    <td>R303</td>
    <td>Rapat</td>
    <td>2023-01-04</td>
    <td><a href="#" class="active-link">Form</a></td>
    <td>
        <a href="<?php echo "edit_ruangan.php?id_ruangan=" . $d['id_ruangan']; ?>"><img class="edit" src="./assets/acc.png" width="25" height="25" alt="Edit"></a>
        <a href="<?php echo "hapus_ruangan.php?id_ruangan=" . $d['id_ruangan']; ?>"><img class="decline" src="./assets/dec.png" width="25" height="25" alt="Delete" onclick="return confirm('Apakah anda menolak ajuan ini ?')"></a>
    </td>


  </tr>
</table>


        <div class="footerCont">
            <div class="footer">
                <p class="p1">Copyright 2023 Kelompok 5 </p>
                <p class="p2">@BOROOM</p>
            </div>
        </div>
    </section>
</body>

<!-- AUTO REFRESH SELAMA 6 HARI-->
<script type="text/javascript">
    function autoRefreshPage()
    {
        window.location = window.location.href;
    }
    setInterval('autoRefreshPage()', 518400000);   //interval berdasarkan millisecond
</script>
</html>