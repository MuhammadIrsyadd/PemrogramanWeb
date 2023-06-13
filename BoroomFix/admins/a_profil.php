<?php
session_start();
include('conn.php');

if (!isset($_SESSION['login'])) {
    header('location: a_signin.php');
    exit();
}

$email = $_SESSION['email'];

$query = mysqli_query(connection(), "SELECT * FROM admin WHERE email='$email'");
$data = mysqli_fetch_array($query);
?>



<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="icon" type="image/png" href="../assets/logo.png" />
    <link rel="stylesheet" href="../css/style.css">
    <title>BOROOM</title>
</head>


<body>
    <section>
        <?php
            include ('../sidebar/sidebaradmin.php')
        ?>
        
    </section>

<section class="main">
    <div class="prof">
        <div>
            <p> NAMA </p>
            <b> <?php echo $data['nama']; ?> </b>
        </div>
        <div>
            <p> EMAIL </p>
            <b> <?php echo $data['email']; ?> </b>
        </div>
        <div>
            <p> ALAMAT </p>
            <b> <?php echo $data['alamat']; ?> </b>
        </div>
        <div>
            <p> NOMOR TELEPON </p>
            <b> <?php echo $data['no_telp']; ?> </b>
        </div>
    </div>

    <div class="uprof">
        <p> 
        <a href="<?php echo "a_ubahprofil.php"; ?>" class="edit-link">UBAH PROFIL</a>    
        </p>
    </div>

    <div class="footerCont">
        <div class="footer">
            <p class="p1">Copyright 2023 Kelompok 5 </p>
            <p class="p2">@BOROOM</p>
        </div>
    </div>
</section>
</body>
</html>