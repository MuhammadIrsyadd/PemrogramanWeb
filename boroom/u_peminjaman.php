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
            include ('./sidebar/sidebar.php')
        ?>
        
    </section>

    <section class="main">
<div class="form-container">
<div class="title"> Ajuan Peminjaman Ruangan </div>
    <div class="left-column">
      <form>
        <label for="nama">Nama</label>
        <input type="text" id="nama" name="nama" required>

        <label for="asal_instansi">Asal Instansi</label>
        <input type="text" id="asal_instansi" name="asal_instansi" required>

        <label for="ruangan">Ruangan</label>
        <select class="custom-select" name="ruangan" required>
                <option value="">Pilih Salah Satu</option>
                <option value="R301">R301</option>
                <option value="R302">R302</option>
                <option value="R303">R303</option>
              </select>
      </form>
    </div>
    <div class="right-column">
      <form>
        <label for="telepon">No. Telepon</label>
        <input type="tel" id="telepon" name="telepon" required>

        <label for="keperluan">Keperluan</label>
        <input type="text" id="keperluan" name="keperluan" required>

        <label for="konfirmasi_password">Tanggal</label>
        <input type="date" id="date" name="date" required>
    </form>
    <div class="upload">
        <label for="file">Upload Berkas</label>
        <input type="file" id="file" name="file">
        <p> *Max 10Mb</p>
    </div>
    </div>
        <input type="submit" value="Submit">
    </div>

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