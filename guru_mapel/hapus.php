<?php
//HAPUS
include_once"../inc/conn.php";
$id	 	= $_GET['id'];
$result = mysqli_query($link, "DELETE FROM tahun_akademik WHERE id = '$id'");
if ($result){ ?>
	<script language="javascript">
			alert('Berhasil Dihapus');
		document.location.href="index.php";
	</script>
<?php
}else {
		trigger_error('Perintah SQL Salah: ' . $sql . ' Error: ' . $koneksi->error, E_USER_ERROR);
}
?>
