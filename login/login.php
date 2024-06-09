<?php
session_start(); // Mulai sesi

include("../inc/conn.php"); // Sertakan file koneksi database

if (isset($_POST['login'])) {
    // Sanitasi inputan
    $username = mysqli_real_escape_string($link, $_POST['username']);
    $password = mysqli_real_escape_string($link, $_POST['password']);

    // Query untuk cek user di database berdasarkan username
    $log = mysqli_query($link, "SELECT * FROM user WHERE username='$username'");
    $num = mysqli_num_rows($log);

    // Jika user ditemukan
    if ($num == 1) {
        $data = mysqli_fetch_assoc($log);
        
        // Verifikasi password
        if (password_verify($password, $data['password'])) {
            // Set session data
            $_SESSION['id'] = $data['id'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['password'] = $data['password'];
            $_SESSION['role'] = $data['role'];
            $_SESSION['id_guru'] = $data['id_guru'];
            $_SESSION['id_walikelas'] = $data['id_walikelas'];
            $_SESSION['id_walimurid'] = $data['id_walimurid'];

            // Cek role dan arahkan ke halaman yang sesuai
            switch ($_SESSION['role']) {
                case 'admin':
                case 'guru':
                case 'siswa':
                case 'wali_kelas':
                case 'wali_murid':   
                    header('Location: ../');
                    exit;
                default:
                    // Role tidak dikenali, arahkan ke halaman login atau tampilkan pesan error
                    session_destroy(); // Hapus semua session
                    echo '<div class="alert alert-error">Role tidak dikenali!</div>';
                    break;
            }
        } else {
            // Jika password salah, tampilkan pesan error
            echo '<div class="alert alert-error">Username atau Password salah!</div>';
        }
    } else {
        // Jika username tidak ditemukan, tampilkan pesan error
        echo '<div class="alert alert-error">Username atau Password salah!</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css"> <!-- Menghubungkan dengan file CSS terpisah -->
</head>
<body>
    <div class="login-container">
        <center>  <img src="../img/logosmk.png" alt="smk dwiguna" width="80"> </center> <br>
    
        <form method="post" action="login.php">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <input type="submit" value="login" name="login">
            </div>
        </form>
    </div>
</body>
</html>
