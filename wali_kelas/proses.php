<?php
include ("../inc/conn.php");

if (isset($_POST['simpan'])) {

  $id_guru = mysqli_real_escape_string($link, $_POST['id_guru']);
  $id_kelas = mysqli_real_escape_string($link, $_POST['id_kelas']);
  $username = mysqli_real_escape_string($link, $_POST['username']);
  $password = mysqli_real_escape_string($link, $_POST['password']);
  $pass = password_hash($password, PASSWORD_DEFAULT); // Menggunakan password_hash
  $kode = time();

  $log = mysqli_query($link,"select * from wali_kelas where id_guru='$id_guru' && id_kelas='$id_kelas'");
  $num = mysqli_num_rows($log);
  if ($num == 1){
    echo 'Data Nama <b> $nama </b> dan NIP <b> $nip </b> yang anda inputkan Sudah Ada!';
  } else {
    $simpan = mysqli_query($link,"insert into wali_kelas(id, id_guru, id_kelas) value($kode,'$id_guru','$id_kelas')");
    if($simpan){
      $simpan1 = mysqli_query($link,"insert into user(id, username, password, role, id_walikelas) value(UUID(),'$username','$pass','wali_kelas','$kode')");
      if ($simpan1) {
        header('location:../wali_kelas');
      }
    } else {
      echo 'gagal Simpan';
    }
  }
}
?>