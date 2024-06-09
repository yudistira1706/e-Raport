<!DOCTYPE html>
<html lang="en">
<head>
    <title>E-raport | Raport Siswa</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Menyertakan stylesheet untuk tampilan halaman -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="../css/uniform.css" />
    <link rel="stylesheet" href="../css/select2.css" />
    <link rel="stylesheet" href="../css/matrix-style.css" />
    <link rel="stylesheet" href="../css/matrix-media.css" />
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<?php
// Menyertakan file header dan sidebar
include_once "../inc_/header.php";
include_once "../inc_/sidebar.php";
?>

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> 
            <a href="../" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
            <a href="#" class="current">Raport Siswa</a> 
        </div>
        <h1>Raport Siswa</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">

                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <h5>Raport Siswa</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <?php 
                        // Mengambil data siswa
                        $log = mysqli_query($link, "SELECT * FROM siswa");
                        $num = mysqli_num_rows($log);
                        if ($num >= 1) { ?>
                            <!-- Tabel untuk menampilkan data siswa -->
                            <table class="table table-bordered data-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NISN</th>
                                        <th>Nama</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Mengambil data siswa dari database
                                    $no = 1;
                                    $sql = mysqli_query($link, "SELECT * FROM siswa");
                                    while($tampil = mysqli_fetch_row($sql)) { ?>
                                        <tr>
                                            <td ><?php echo $no++; ?></td>
                                            <td><?php echo $tampil[1]; ?></td>
                                            <td><?php echo $tampil[2]; ?></td>
                                            <td>
                                                <!-- Tombol untuk menuju ke halaman setting raport -->
                                                <a href="setting_raport.php?id=<?php echo $tampil[0]; ?>" class="btn btn-mini btn-success btn-condensed" title="Setting Raport <?php echo $tampil[2]; ?>" ><i class="icon icon-arrow-right"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// Menyertakan file footer
include_once "../inc_/footer.php";
?>

<!-- Menyertakan skrip JavaScript yang dibutuhkan -->
<script src="../js/jquery.min.js"></script>
<script src="../js/jquery.ui.custom.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.uniform.js"></script>
<script src="../js/select2.min.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/matrix.js"></script>
<script src="../js/matrix.tables.js"></script>
</body>
<script type="text/javascript">
// Script untuk menangani konfirmasi penghapusan
$(document).ready(function(){

$('#modal-konfirmasi').on('show.bs.modal', function (event) {
var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan

// Untuk mengambil nilai dari data-id="" yang telah kita tempatkan pada link hapus
var id = div.data('id')

var modal = $(this)

// Mengisi atribut href pada tombol ya yang kita berikan id hapus-true pada modal .
modal.find('#hapus-true-data').attr("href","hapus.php?id="+id);
})

});

</script>
</html>
