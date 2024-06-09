<?php
// HAPUS
include_once "../inc_/conn.php";
$id = $_GET['id'];

// Menggunakan prepared statement untuk mencegah SQL Injection
$stmt = $link->prepare("DELETE FROM guru WHERE id = ?");
$stmt->bind_param("i", $id); // 'i' berarti tipe data integer
$result = $stmt->execute();

if ($result) {
?>
    <script language="javascript">
        alert('Berhasil Dihapus');
        document.location.href="index.php";
    </script>
<?php
} else {
    // Menampilkan error dari koneksi database
    trigger_error('Perintah SQL Salah: Error: ' . $link->error, E_USER_ERROR);
}
?>