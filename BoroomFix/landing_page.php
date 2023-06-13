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
<!-- <section class="main"> -->
    <div class="land">
        <div>
            <img src="./assets/land.png" alt="">
        </div>
        <div>
            <h1> Sistem Peminjaman Ruangan </h1>
            <p> Sistem peminjaman ruangan yang terdapat di Fakultas Ilmu Komputer UPN “Veteran” Jawa Timur </p>
            <button>
                <a href="signup.php"> Daftar </a>
            </button>
            <button>
                <a href="signin.php"> Masuk </a>
            </button>
        </div>
    </div>
<!-- </section> -->
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