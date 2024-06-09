<!DOCTYPE html>
<html lang="en">
<head>
<title>E-raport | Guru Mapel</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
  include_once "../inc_/header.php";
  include_once "../inc_/sidebar.php";
  ?>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="../" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Guru Mapel</a> </div>
    <h1>Guru Mapel</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <?php
        include ("../inc/conn.php");

        if (isset($_POST['simpan'])) {


          $id_guru = mysqli_real_escape_string($link, $_POST['id_guru']);
          $id_mapel = mysqli_real_escape_string($link, $_POST['id_mapel']);

        $log = mysqli_query($link,"select * from guru_mapel where id_guru='$id_guru' && id_mapel='$id_mapel'");
        $num=mysqli_num_rows($log);
        if ($num == 1){
          echo '<div class="alert alert-error alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
            <h4 class="alert-heading">Error!</h4>
            Data <b> Guru Mata Pelajaran </b> yang anda inputkan Sudah Ada! </div>';
        } else {

        $simpan = mysqli_query($link,"insert into guru_mapel(id, id_guru, id_mapel) value(UUID(),'$id_guru','$id_mapel')");
        if($simpan){
            echo '<div class="alert alert-success alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
              <h4 class="alert-heading">Berhasil !</h4>
              Data yang anda inputkan telah tersimpan! </div>';
        } else {
         echo'gagal Simpan';
        }
        }
        }
        ?>

        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Guru Mapel</h5>
          </div>
          <div class="widget-content nopadding">
            <?php $log = mysqli_query($link,"select * from guru_mapel");
            $num=mysqli_num_rows($log);
            if ($num >= 1){ ?>

            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Guru</th>
                  <th>Kelas</th>
                  <th>Mata Pelajaran</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $sql = mysqli_query($link,"SELECT guru_mapel.id, guru.nama, mata_pelajaran.mata_pelajaran, mata_pelajaran.id_kelas
                  from guru_mapel
                  LEFT JOIN guru ON guru_mapel.id_guru=guru.id
                  LEFT JOIN mata_pelajaran ON guru_mapel.id_mapel=mata_pelajaran.id
                  ");
              while($tampil=mysqli_fetch_row($sql)){ ?>

                <tr>
                  <td ><?php echo $no++; ?></td>
                  <td><?php echo $tampil[1]; ?></td>
                  <td>
                    <?php
                    $sql_kelas = mysqli_query($link,"select * from kelas where id='$tampil[3]'");
                    while($kelas=mysqli_fetch_row($sql_kelas)){ ?>
                    <?php echo $kelas[1]; ?> <?php echo $kelas[2]; ?>
                  <?php } ?>

                  </td>
                  <td><?php echo $tampil[2]; ?></td>
  <td>
  <a href=edit.php?id=<?php echo $tampil[0]; ?> class="btn btn-mini btn-default btn-condensed" ><i class="icon icon-pencil"></i></a>
  <a href="javascript:;" data-id="<?php echo $tampil[0] ?>" data-toggle="modal" data-target="#modal-konfirmasi" class="btn btn-mini btn-danger btn-condensed"><i class="icon icon-trash"></i></a>
  <!-- danger with sound -->

  <div id="modal-konfirmasi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <div class="mb-title"> PERINGATAN !</div>
      </div>
      <div class="modal-body btn-danger">
        Apakah Anda yakin ingin menghapus data ini ?
      </div>
      <div class="modal-footer">
        <a href="javascript:;" class="btn btn-danger" id="hapus-true-data">Hapus</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
      </div>

      </div>
    </div>
  </div>
  <!-- end danger with sound -->
  </td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
            <br>
            &nbsp; <a href="input.php" class="btn btn-primary">Tambah</a>

          <?php } else { ?>
            <h1><center>Data Guru Mapel Masih Kosong <br> <a href="input.php" class="btn btn-primary">Tambah</a> </center></h1>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
include_once "../inc_/footer.php";
?>

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
//Hapus
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
