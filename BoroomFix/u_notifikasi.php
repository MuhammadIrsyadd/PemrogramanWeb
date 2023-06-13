<?php
// Koneksi ke database MySQL
$host = "localhost:3307";
$username = "root";
$password = "";
$database = "boroom";

$koneksi = mysqli_connect($host, $username, $password, $database);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Membuat kelas untuk ajuan sewa ruangan
class AjuanSewaRuangan {
    public $id_reservasi;
    public $nama;
    public $instansi;
    public $ruangan;
    public $no_telp;
    public $tgl_pinjam;
    public $status;

    public function __construct($id_reservasi, $nama, $instansi, $ruangan, $no_telp, $tgl_pinjam, $status) {
        $this->id_reservasi = $id_reservasi;
        $this->nama = $nama;
        $this->instansi = $instansi;
        $this->ruangan = $ruangan;
        $this->no_telp = $no_telp;
        $this->tgl_pinjam = $tgl_pinjam;
        $this->status = "Pending";
    }

    public function simpanKeDatabase() {
        global $koneksi;
        $id_reservasi = mysqli_real_escape_string($koneksi, $this->id_reservasi);
        $nama = mysqli_real_escape_string($koneksi, $this->nama);
        $instansi = mysqli_real_escape_string($koneksi, $this->instansi);
        $ruangan = mysqli_real_escape_string($koneksi, $this->ruangan);
        $no_telp = mysqli_real_escape_string($koneksi, $this->no_telp);
        $tgl_pinjam = mysqli_real_escape_string($koneksi, $this->tgl_pinjam);
        $status = mysqli_real_escape_string($koneksi, $this->status);

        $query = "INSERT INTO reservasi (id_reservasi, nama, instansi, ruangan, no_telp, tgl_pinjam, status)
                  VALUES ('$id_reservasi', '$nama', '$instansi', '$ruangan', '$no_telp', '$tgl_pinjam', '$status')";

        if (mysqli_query($koneksi, $query)) {
            echo "Ajuan sewa ruangan berhasil disimpan ke database.\n";
        } else {
            echo "Error: " . $query . "\n" . mysqli_error($koneksi);
        }
    }

    public function terima() {
        global $koneksi;
        $this->status = "Diterima";

        $query = "UPDATE reservasi
                  SET status = 'Diterima'
                  WHERE ruangan = '$this->ruangan'";

        if (mysqli_query($koneksi, $query)) {
            echo "Ajuan sewa ruangan dari $this->ruangan diterima!\n";
        } else {
            echo "Error: " . $query . "\n" . mysqli_error($koneksi);
        }
    }

    public function tolak() {
        global $koneksi;
        $this->status = "Ditolak";

        $query = "UPDATE reservasi
                  SET status = 'Ditolak'
                  WHERE ruangan = '$this->ruangan'";

        if (mysqli_query($koneksi, $query)) {
            echo "Ajuan sewa ruangan dari $this->ruangan ditolak!\n";
        } else {
            echo "Error: " . $query . "\n" . mysqli_error($koneksi);
        }
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="./assets/logo.png" />
    <link rel="stylesheet" href="css/style.css">
    <title>BOROOM</title>
</head>

<body>
    <section>
        <?php include ('./sidebar/sidebar.php'); ?>
    </section>

    <section class="main">
        <div class="bod">
            <div class="box">
                <p>Notifikasi</p>
            </div>
            <div class="container">
                <?php
                // Menampilkan notifikasi ajuan sewa ruangan dari database
                $query = "SELECT * FROM reservasi";
                $result = mysqli_query($koneksi, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $status = $row['status'];
                        $ruangan = $row['ruangan'];
                        echo "<div class='text-cont'>";
                        echo "<b>$ruangan</b>";
                        echo "<p>Pengajuan ruangan anda $status oleh pihak fakultas</p>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>Tidak ada notifikasi ajuan sewa ruangan.</p>";
                }
                ?>
            </div>

            <div class="footerCont">
                <div class="footer">
                    <p class="p1">Copyright 2023 Kelompok 5</p>
                    <p class="p2">@BOROOM</p>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
