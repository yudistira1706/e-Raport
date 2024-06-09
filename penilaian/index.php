<!DOCTYPE html>
<html lang="en">
<head>
    <title>E-raport | Nilai Mata Pelajaran</title>
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
            <a href="#" class="current">Nilai Mata Pelajaran</a> 
        </div>
        <h1>Nilai Mata Pelajaran</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">

                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                        <?php
                        // Mengambil detail mata pelajaran berdasarkan ID yang diberikan di URL
                        $no = 1;
                        $sql = mysqli_query($link, "SELECT * FROM mata_pelajaran WHERE id='$_GET[id]'");
                        while($tampil = mysqli_fetch_row($sql)) { ?>
                            <h5>Nilai Mata Pelajaran <?php echo $tampil[1]; ?></h5>
                        <?php } ?>
                    </div>
                    <div class="widget-content nopadding">
                        <?php 
                        // Mengambil data siswa
                        $log = mysqli_query($link, "SELECT * FROM siswa");
                        $num = mysqli_num_rows($log);
                        if ($num >= 1) { ?>
                            <!-- Form untuk menyimpan nilai siswa -->
                            <form class="" action="proses.php" method="post">
                                <table class="table table-bordered data-table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NISN</th>
                                            <th>Nama</th>
                                            <th>Uas</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Mengambil id_kelas dari mata_pelajaran berdasarkan ID yang diberikan di URL
                                        $sql1 = mysqli_query($link, "SELECT id_kelas FROM mata_pelajaran WHERE id='$_GET[id]'");
                                        while($tampil1 = mysqli_fetch_row($sql1)) {
                                            $no = 1;
                                            // Mengambil data siswa berdasarkan id_kelas
                                            $sql = mysqli_query($link, "SELECT * FROM siswa WHERE id_kelas='$tampil1[0]'");
                                            while($tampil = mysqli_fetch_row($sql)) { ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $tampil[1]; ?>
                                                        <input type="hidden" name="id_siswa[]" value="<?php echo $tampil[0]; ?>" class="span2">
                                                    </td>
                                                    <td><?php echo $tampil[2]; ?>
                                                        <input type="hidden" name="id_mapel[]" value="<?php echo $_GET['id']; ?>" class="span7">
                                                        <input type="hidden" name="id_mapel1" value="<?php echo $_GET['id']; ?>" class="span7">
                                                    </td>
                                                    <td>
                                                        <?php
                                                        // Mengecek apakah nilai sudah ada untuk siswa dan mata pelajaran tersebut
                                                        $log = mysqli_query($link, "SELECT * FROM nilai WHERE id_siswa='$tampil[0]' AND id_mapel='$_GET[id]'");
                                                        $num = mysqli_num_rows($log);
                                                        if ($num == 1) {
                                                            // Menampilkan nilai jika sudah ada
                                                            $sqla = mysqli_query($link, "SELECT nilai FROM nilai WHERE id_siswa='$tampil[0]' AND id_mapel='$_GET[id]'");
                                                            while($tampil_nilai = mysqli_fetch_row($sqla)) { ?>
                                                                <center><?php echo $tampil_nilai[0]; ?></center>
                                                            <?php } ?>
                                                        <?php } else { ?>
                                                            <!-- Input untuk memasukkan nilai jika belum ada -->
                                                            <center><input type="text" name="nilai[]" class="span2" required> </center>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                            <?php } 
                                        } ?>
                                    </tbody>
                                </table>
                                <input type="submit" name="simpan_nilai" value="Simpan" class="btn btn-primary">
                            </form>
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
<script src="js/jquery.validate.js"></script>
<script src="../js/matrix.js"></script>
<script src="../js/matrix.tables.js"></script>
<script src="js/matrix.form_validation.js"></script>

<script type="text/javascript">
// Script untuk menangani konfirmasi penghapusan
$(document).ready(function(){
    $('#modal-konfirmasi').on('show.bs.modal', function (event) {
        var div = $(event.relatedTarget); // Tombol dimana modal ditampilkan
        var id = div.data('id'); // Mengambil nilai dari data-id

        var modal = $(this);
        // Mengisi atribut href pada tombol ya yang diberikan id hapus-true pada modal
        modal.find('#hapus-true-data').attr("href", "hapus.php?id=" + id);
    });
});
</script>

</body>
</html>
