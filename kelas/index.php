<!DOCTYPE html>
<html lang="en">
<head>
<title>E-raport | Kelas</title>
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
    <div id="breadcrumb"> <a href="../" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Kelas</a> </div>
    <h1>Kelas</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">

        <?php
        error_reporting(0);
        include ("../inc/conn.php");
        if (isset($_POST['simpan'])) {
          $kode = mysqli_real_escape_string($link, $_POST['kode']);
          $kelas = mysqli_real_escape_string($link, $_POST['kelas']);

        $log = mysqli_query($link,"select * from kelas where kode='$kode' && kelas='$kelas'");
        $num=mysqli_num_rows($log);
        if ($num == 1){
          echo '<div class="alert alert-error alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
            <h4 class="alert-heading">Error!</h4>
            Data <b> Kelas </b> yang anda inputkan Sudah Ada! </div>';
        } else {

        $simpan = mysqli_query($link,"insert into kelas(id, kode, kelas) value(UUID(),'$kode','$kelas')");
        if($simpan){
          echo '<div class="alert alert-success alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
            <h4 class="alert-heading">Berhasil !</h4>
            Data yang anda inputkan telah tersimpan! </div>';
        } else {
         echo'gagal';
        }
        }
        }
        ?>

        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Kelas</h5>
          </div>
          <div class="widget-content nopadding">
            <?php $log = mysqli_query($link,"select * from kelas");
            $num=mysqli_num_rows($log);
            if ($num >= 1){ ?>

            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kelas</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $sql = mysqli_query($link,"Select * from kelas");
              while($tampil=mysqli_fetch_row($sql)){ ?>
                <tr>
                  <td ><?php echo $no++; ?></td>
                  <td><?php echo $tampil[1]; ?> <?php echo $tampil[2]; ?></td>
  <td>
  <a href=edit.php?id=<?php echo $tampil[0]; ?> class="btn btn-mini btn-default btn-condensed" ><i class="icon icon-pencil"></i></a>
  <a href="javascript:;" data-id="<?php echo $tampil[0] ?>" data-toggle="modal" data-target="#modal-konfirmasi-<?php echo $tampil[0]; ?>" class="btn btn-mini btn-danger btn-condensed"><i class="icon icon-trash"></i></a>

<div id="modal-konfirmasi-<?php echo $tampil[0]; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
            &nbsp; <a href="#kelas" data-toggle="modal" class="btn btn-primary">Tambah</a>

          <?php } else { ?>
            <h1><center>Data Kelas Masih Kosong <br> <a href="#kelas" data-toggle="modal" class="btn btn-primary">Tambah</a> </center></h1>
            <?php } ?>
<!--Modal-->
            <div class="widget-content">
              <div id="kelas" class="modal hide">
                <form class="" action="index.php" method="post">
                <div class="modal-header">
                  <button data-dismiss="modal" class="close" type="button">×</button>
                  <h3>Tambah Kelas</h3>
                </div>
                <div class="modal-body">
                  <div class="control-group">
                    <label class="control-label">Kelas :</label>
                    <div class="controls">
                      Sepuluh (10) <input type="radio" value="X" name="kode" class="span11" placeholder="" />
                      Sebelas (11) <input type="radio" value="XI" name="kode" class="span11" placeholder="" />
                      Dua belas (12) <input type="radio" value="XII" name="kode" class="span11" placeholder="" />
                    <input type="text" name="kelas" class="span11" placeholder="Contoh : TKJ 2" />
                    </div>
                  </div>
                </div>
                <div class="modal-footer"> <input type="submit" name="simpan" class="btn-primary" value="Simpan"> <a data-dismiss="modal" class="btn" href="#">Cancel</a> </div>
                </form>
              </div>
            </div>
            <!-- Tutup Modal-->
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
