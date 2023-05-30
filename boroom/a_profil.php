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
    <div class="prof">
        <div>
            <p> USERNAME </p>
            <b> LOREM IPSUM </b>
        </div>
        <div>
            <p> ID ADMIN </p> 
            <b> 001 </b>
        </div>
        <div>
            <p> NAMA </p>
            <b> LOREM IPSUM DOLOR SIT AMET </b>
        </div>
        <div>
            <p> EMAIL </p>
            <b> LOREN@UPNMAIL.COM </b>
        </div>
        <div>
            <p> ALAMAT </p>
            <b> JL. LOREM IPSUM DOLOR SIT AMET </b>
        </div>
        <div>
            <p> NOMOR TELEPON </p>
            <b> 081331002068 </b>
        </div>
    </div>

    <div class="uprof">
        <p> UBAH PROFIL </p>
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