<?php
include ("../inc/conn.php");
if (isset($_POST['simpan_nilai'])) {

  $id_siswa = $_POST['id_siswa'];
  $id_mapel = $_POST['id_mapel'];
  $id_mapel1 = $_POST['id_mapel1'];
  $nilai =  $_POST['nilai'];
  $id=time();
  $count=count($id_siswa);
  echo "$count <br>";

$simpan = "insert into nilai(id, id_siswa, id_mapel, nilai) value";
for ($i=0; $i < $count ; $i++) {
  $simpan .= "('{$id[$i]}','{$id_siswa[$i]}','{$id_mapel[$i]}','{$nilai[$i]}')";
      $simpan .= ",";

}
$simpan = rtrim($simpan,",");

$insert = $link->query($simpan);


if( !$insert )
{
    echo "gagal insert : ".$link->error;
}else{
  header('location:../penilaian/index.php?id='.$id_mapel1.'');

}
}
?>
