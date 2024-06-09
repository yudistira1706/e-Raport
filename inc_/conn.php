<?php

$link = mysqli_connect
     ("localhost", "root", "", "e-raport");

	// Check connection
if($link === false){
    die("Masalah: Tidak bisa Koneksi ke Database. " . mysqli_connect_error());
}

?>
