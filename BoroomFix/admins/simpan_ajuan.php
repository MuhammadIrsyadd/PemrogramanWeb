<?php
require_once('conn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_reservasi']) && isset($_POST['status'])) {
    $id_reservasi = $_POST['id_reservasi'];
    $statuses = $_POST['status'];

    // Menghindari serangan SQL Injection dengan melakukan sanitasi pada data
    $conn = connection();
    $id_reservasi = mysqli_real_escape_string($conn, $id_reservasi);

    // Update status ke database
    foreach ($statuses as $status) {
        $escaped_status = mysqli_real_escape_string($conn, $status);
        $query = "UPDATE reservasi SET status = '$escaped_status' WHERE id_reservasi = '$id_reservasi';";
        $result = mysqli_query($conn, $query);

        // Tampilkan pesan sukses atau error
        if ($result) {
            if (mysqli_affected_rows($conn) > 0) {
                echo "Status reservasi berhasil diupdate.";
            } else {
                echo "Gagal mengupdate status reservasi. ID Reservasi tidak ditemukan.";
            }
        } else {
            echo "Terjadi kesalahan dalam menjalankan query. Silakan coba lagi.";
        }
    }
} else {
    echo "Permintaan tidak valid.";
}

?>