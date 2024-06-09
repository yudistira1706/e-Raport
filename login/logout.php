<?php
session_start(); // Mulai sesi untuk mengakses variabel sesi

// Menghancurkan semua data sesi
session_destroy();

// Mengarahkan pengguna kembali ke halaman login
header('Location: login.php');
exit(); // Menghentikan eksekusi skrip setelah redirect
?>
