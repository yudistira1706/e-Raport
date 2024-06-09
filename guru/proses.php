<?php
error_reporting(0);
include ("../inc/conn.php");
if (isset($_POST['simpan'])) {


  $nip = mysqli_real_escape_string($link, $_POST['nip']);
  $nama = mysqli_real_escape_string($link, $_POST['nama']);
  $alamat = mysqli_real_escape_string($link, $_POST['alamat']);
  $tgl_lahir = mysqli_real_escape_string($link, $_POST['tgl_lahir']);
  $username = mysqli_real_escape_string($link, $_POST['username']);
$password = mysqli_real_escape_string($link, $_POST['password']);
$pass = md5($password);
$kode = time();

$log = mysqli_query($link,"select * from guru where nama='$nama' && nip='$nip'");
$num=mysqli_num_rows($log);
if ($num == 1){
  echo '
    Data Nama <b> $nama </b> dan NIP <b> $nip </b> yang anda inputkan Sudah Ada!';
} else {

$simpan = mysqli_query($link,"insert into guru(id, nip, nama, alamat, tgl_lahir) value('$kode','$nip','$nama','$alamat','$tgl_lahir')");
if($simpan){
  $simpan1 = mysqli_query($link,"insert into user(id, username, password, role, id_guru) value(UUID(),'$username','$pass','guru','$kode')");
  if ($simpan1) {
  header('location:../guru');
    }
} else {
 echo'gagal Simpan';
}
}
}
?>
