<?php require_once('conn.php'); ?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../assets/logo.png" />
    <link rel="stylesheet" href="../css/style.css">
    <title>BOROOM</title>
</head>


<body>
    <section>
        <?php
            include ('../sidebar/sidebaradmin.php');
        ?>
        
</section>
<section class="main">
<div class="bod">
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
            <th>Tanggal Peminjaman</th>
            <th>Status</th>
            <th colspan="" style="text-align:center">Simpan</th>
            <th colspan="" style="text-align:center">Hapus</th>
        </tr>

        <?php
        $no = 1;
        $query = mysqli_query(connection(), 'SELECT * FROM reservasi;');
        while ($d = mysqli_fetch_array($query)) {
            $color = "";
            if ($d['status'] == "Pending"){
                $color = "style='background-color: #FFBCD1'";
            }
            else if ($d['status'] == "Diterima"){
                $color = "style='background-color: #00e00b'";
            }
            else if ($d['status'] == "Ditolak"){
                $color = "style='background-color: #ff0000'";
            }
        ?>
                <tr class="">
                    <td class="qe"><?php echo $no++; ?></td>
                    <td><?php echo $d['nama']; ?></td>
                    <td><?php echo $d['no_telp']; ?></td>
                    <td><?php echo $d['ruangan']; ?></td>
                    <td><?php echo $d['keperluan']; ?></td>
                    <td><?php echo $d['tgl_pinjam']; ?></td>
                    <td>
                        <form method="POST" action="simpan_ajuan.php">
                            <input type="hidden" name="id_reservasi" value="<?php echo $d['id_reservasi']; ?>">
                            <select name="status[]">
                                <option value="">Pilih Salah Satu</option>
                                <option value="Pending" <?php if ($d['status'] == "Pending") { echo "selected"; } ?>>Pending</option>
                                <option value="Diterima" <?php if ($d['status'] == "Diterima") { echo "selected"; } ?>>Diterima</option>
                                <option value="Ditolak" <?php if ($d['status'] == "Ditolak") { echo "selected"; } ?>>Ditolak</option>
                            </select>
                            <td>
                                <input type="image" src="../assets/acc.png" alt="simpan" value="Simpan" onclick="return confirm('Simpan Status ?')">
                            </td>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="hapus_ajuan.php">
                            <input type="hidden" name="id_reservasi" value="<?php echo $d['id_reservasi']; ?>">
                            <input type="image" src="../assets/dec.png" alt="decline" onclick="return confirm('Yakin akan menghapus data ?')">
                        </form>
                    </td>
                </tr>
        <?php
        }
        ?>

    </table>
</div>


<div class="footerCont">
    <div class="footer">
        <p class="p1">2023 Kelompok 5 </p>
        <p class="p2">@BOROOM</p>
    </div>
</div>
</section>
</body>
</html>
