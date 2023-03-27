<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Web Profile</title>
</head>
<body>
<?php 
    $data1 = array (
        "nama" => "Muh. Irsyad Dwi Kurniawan",
        "alamat" => "Mojokerto",
        "telp" => "081331002068",
        "email" => "muhirsyad498@gmail.com",
        "univ" => "UPN \"Veteran\" Jawa Timur",
        "certif" => "Certificate 2nd Web Development Company Profile"
    );

    $data2 = array (
        array('about' => "Halo, perkenalkan nama saya adalah Muh Irsyad Dwi Kurniawan, lahir di Mojokerto, 02 Juni 2002. Saya merupakan anak kedua dari dua bersaudara.
        Teman-teman biasanya memanggilku Irsyad. Umurku Sekarang 20 Tahun, dan di bulan Juni nanti aku akan memasuki usia yang ke-21 Tahun.
        Saat SD saya bersekolah di SDN Kranggan 3. "),
        array('about' => "Pada waktu SD saya pernah mengikuti lomba dokter kecil dan menjadi anggota tim pemberantas
        jentik-jentik, dimana tiap minggu kita selalu mengunjungi rumah warga sekitar sekolah saya untuk mengecek apakah ada jentik-jentik atau engga
        di kamar mandinya. Dan sekolahku pernah menjuarai juara 1 lomba pemberantasan jentik-jentik. Saat SMP saya bersekolah di SMP Negeri 1 Kota Mojokerto.
        Pada saat SMP saya mengikuti kegiatan ekstrakurikuler PASKIBRAKA. Sering mengikuti lomba lomba paskib, dan pernah menjuarai juara 1 dan best costume.
        Pada saat SMA saya bersekolah di SMA Negeri 1 Puri atau yang biasa dikenal dengan Castle."),
        array('about' => "Pada saat SMA saya berada di jurusan IPA karena tujuan saya adalah informatika, maka saya memilih jurusan IPA diawal 
        agar tidak lintas jurusan ketika SBMPTN. Dan saat ini saya sudah berkuliah di Universitas Pembangunan \"Veteran\" Jawa Timur jurusan Informatika. ")
    );

    $data3 = array (
        array('education' => 'SD Negeri Kranggan 3'),
        array('education' => 'SMP Negeri 1 Mojokerto'),
        array('education' => 'SMA Negeri 1 Puri'),
        array('education' => 'UPN "Veteran" Jawa Timur')
    );

    $data4 = array (
        '2009 - 2015',
        '2015 - 2018',
        '2018 - 2021',
        '2018 - Now'
    );
    $TTL = '02-06-2002';
    $dob = new DateTime($TTL);
    $now = new DateTime();
    $difference = $now->diff($dob);
    ?>
    <div class="flex-container">
        <div class="kiri">
            <b>
                <center>
                <h1 style="font-family: Roboto; font-size: 32px;"> <?php echo "Hi, Welcome !!!" ?></h1>
                    <img src="img\senyum.jpeg" style="border-radius: 50%; width: 289px;">
                    <h1 style="font-family: Roboto; font-size: 24px;"> <?php echo $data1 ['nama'] ?> </h1>
                <hr size="5px" color="#FDD36A">
            </b>
                </center>
            <div style="text-align: left;">
                <img src="img\suitcase.png" class="png"> 
                <h4> <?php echo $data1 ['univ'] ?> </h4>
                <img src="img\home (1).png" class="png"> 
                <h4> <?php echo $data1 ['alamat'] ?> </h4>
                <img src="img\email.png" class="png"> 
                <h4> <?php echo $data1 ['email'] ?> </h4>
                <img src="img\telephone-handle-silhouette.png" class="png"> 
                <h4> <?php echo $data1 ['telp'] ?> </h4>
                <img src="img\calendar.png" class="png"> 
                <h4> <?php echo "$difference->y Years" ?> </h4>
            </div>

        </div>
        <div class="dalam">
            <div class="konten1">
                <div style="text-align: left;">
                    <img src="img\user (1).png" class="png2"> 
                    <h1 class="h1"> <?php echo "About Me" ?> </h1>
                    <hr color="black">
                    <p class="kalimat">
                        <?php
                        foreach ($data2 as $arr) : ?>
                            <?php echo $arr['about'] ?>
                        <?php endforeach; ?> 
                    </p>
                </div>
            </div>
            <div class="konten2">
                <div style="text-align: left;">
                    <img src="img\school.png" class="png2"> 
                    <h1 class="h1"> <?php echo "Education" ?> </h1>
                    <hr color="black">
                    <?php
                        $i=0;
                        foreach ($data3 as $arr) : ?>
                            <h3> <?php echo $arr['education'] ?> </h3>
                            <?php 
                                echo "<p>$data4[$i]</p>";
                                $i++;
                            ?>
                        <?php endforeach; ?> 
                </div>
            </div>
            <div class="konten3">
                <div style="text-align: left;">
                    <img src="img\medal (1).png" class="png2"> 
                    <h1 class="h1"> <?php echo "Certificate" ?> </h1>
                    <hr color="black">
                    <p class="kalimat">
                        <a href="https://drive.google.com/file/d/1eLRaLijlWSFiZT5VotcP2-iUk9yfsOEO/view?usp=share_link" target='_blank'>
                            <h2> <?php echo $data1 ['certif'] ?> </h2>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>