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
<div class="boxx">
<div class="btext"> Tambah Ruangan </div>
    <div class="boxleft">
      <form>
        <label for="id_ruangan">ID RUANGAN</label>
        <input type="text" id="id_ruangan" name="id_ruangan" required>

        <label for="id_kategori">ID KATEGORI</label>
        <input type="text" id="id_kategori" name="id_kategori" required>

        <label for="ruangan">NAMA RUANGAN</label>
        <select class="custom-select" name="ruangan" required>
                <option value="">Pilih Salah Satu</option>
                <option value="R301">R301</option>
                <option value="R302">R302</option>
                <option value="R303">R303</option>
              </select>

        <label for="kapasitas">KAPASITAS RUANGAN</label>
        <input type="number" id="kapasitas" name="kapasitas" required>
      </form>
    </div>
    <div class="boxright">
      <form>
        <label for="deskripsi">DESKRIPSI RUANGAN</label>
        <textarea type="deskripsi" id="deskripsi" name="deskripsi" required></textarea>

        <label for="file">FOTO RUANGAN</label>
        <input type="file" id="file" name="file">
    </form>

    </div>
        <button class="simpan-btn"> SIMPAN </button>
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