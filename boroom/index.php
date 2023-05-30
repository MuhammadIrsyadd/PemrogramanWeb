<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="icon" type="image/png" href="./assets/logo.png" />
    <link rel="stylesheet" href="css/style_index.css">
    <title>BOROOM</title>
</head>


<body>
    <section>
        <?php
            include ('./sidebar/sidebar.php')
        ?>
        
    </section>

    <section class="main">
        <div class="top">
            <img src="assets/home.png" alt="ruang seminar" style="filter: brightness(50%);">
            <div class="text"> SISTEM PEMINJAMAN RUANGAN </div>
        </div>
    
        <div class="container">
            <div class="kotak">
                <a href="u_search.php">
                    <img src="./assets/seminar.png" alt="">
                    Ruang Seminar
                </a>
            </div>
            <div class="kotak">
                <a href="u_search.php">
                    <img src="./assets/kelas.png" alt="">
                    Ruang Kelas
                </a>
            </div>
            <div class="kotak">
                <a href="u_search.php">
                    <img src="./assets/lab.png" alt="">
                    Laboratorium
                </a>
            </div>
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