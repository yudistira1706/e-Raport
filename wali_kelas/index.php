<!DOCTYPE html>
<html lang="en">
<head>
<title>E-raport | Wali Kelas</title>
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
    <div id="breadcrumb"> <a href="../" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Wali Kelas</a> </div>
    <h1>Wali Kelas</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">

        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Wali Kelas</h5>
          </div>
          <div class="widget-content nopadding">
            <?php $log = mysqli_query($link,"select * from wali_kelas");
            $num=mysqli_num_rows($log);
            if ($num >= 1){ ?>

            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Guru</th>
                  <th>Kelas</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $sql = mysqli_query($link,"SELECT wali_kelas.id, guru.nama, kelas.kelas, user.username, user.password, kelas.kode
                  from wali_kelas
                  LEFT JOIN guru ON wali_kelas.id_guru=guru.id
                  LEFT JOIN kelas ON wali_kelas.id_kelas=kelas.id
                  LEFT JOIN user ON wali_kelas.id=user.id_walikelas
                  ");
              while($tampil=mysqli_fetch_row($sql)){ ?>
                <tr>
                  <td ><?php echo $no++; ?></td>
                  <td><?php echo $tampil[1]; ?></td>
                  <td><?php echo $tampil[5]; ?> <?php echo $tampil[2]; ?></td>
                  <td><?php echo $tampil[3]; ?></td>
                  <td><?php echo $tampil[4]; ?></td>
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
      <a href="hapus.php?id=<?php echo $tampil[0]; ?>" class="btn btn-danger">Hapus</a>
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
            <h1><center>Data Wali Kelas Masih Kosong <br> <a href="input.php" class="btn btn-primary">Tambah</a> </center></h1>
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
