<!DOCTYPE html>
<html lang="en">
<head>
<title>E-raport | Tahun Akademik</title>
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
    <div id="breadcrumb"> <a href="../" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Tahun Akademik</a> </div>
    <h1>Tahun Akademik</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">

        <?php
        error_reporting(0);
        include ("../inc/conn.php");
        if (isset($_POST['simpan'])) {


        $tahun_akademik = mysqli_real_escape_string($link, $_POST['tahun_akademik']);
        $semester = mysqli_real_escape_string($link, $_POST['semester']);

        $log = mysqli_query($link,"select * from tahun_akademik where tahun_akademik='$tahun_akademik' && semester='$semester'");
        $num=mysqli_num_rows($log);
        if ($num == 1){
          echo '<div class="alert alert-error alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
            <h4 class="alert-heading">Error!</h4>
            Data <b> Tahun Akademik </b> dan <b> Semester </b> yang anda inputkan Sudah Ada! </div>';
        } else {

        $simpan = mysqli_query($link,"insert into tahun_akademik(id, tahun_akademik, semester, status) value(UUID(),'$tahun_akademik','$semester','N')");
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
            <h5>Tahun Akademik</h5>
          </div>
          <div class="widget-content nopadding">
            <?php $log = mysqli_query($link,"select * from tahun_akademik");
            $num=mysqli_num_rows($log);
            if ($num >= 1){ ?>

            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Tahun</th>
                  <th>Semester</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $sql = mysqli_query($link,"Select * from tahun_akademik");
              while($tampil=mysqli_fetch_row($sql)){ ?>
                <tr>
                  <td class="center"><?php echo $tampil[1]; ?></td>
                  <td><?php echo $tampil[2]; ?></td>
                  <?php if ($tampil[3]=="N"){
   echo '<td><a href="blokir.php?id='.$tampil[0].'" class="btn btn-mini btn-success btn-condensed" title="Aktif">Aktif</a></td>' ;}
  elseif ($tampil[3]=="Y"){
  echo'<td><a href="blokir.php?id='.$tampil[0].'" class="btn btn-mini btn-default btn-condensed" title="Blokir">Tidak Aktif</a></td>' ;}
  ?>
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
            &nbsp; <a href="#tahun_akademik" data-toggle="modal" class="btn btn-primary">Tambah</a>

          <?php } else { ?>
            <h1><center>Data Tahun Akademik Masih Kosong <br> <a href="#tahun_akademik" data-toggle="modal" class="btn btn-primary">Tambah</a> </center></h1>
            <?php } ?>
<!--Modal-->
            <div class="widget-content">
              <div id="tahun_akademik" class="modal hide">
                <form class="" action="index.php" method="post">
                <div class="modal-header">
                  <button data-dismiss="modal" class="close" type="button">×</button>
                  <h3>Tambah Tahun Akademik</h3>
                </div>
                <div class="modal-body">
                  <div class="control-group">
                    <label class="control-label">Tahun Akademik :</label>
                    <div class="controls">
                      <input type="text" name="tahun_akademik" class="span11" placeholder="Contoh : 2017/2018" />
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Semester :</label>
                    <div class="controls">
                      Satu (1) <input type="radio" value="1" name="semester" class="span11" placeholder="" />
                      Dua (2) <input type="radio" value="2" name="semester" class="span11" placeholder="" />
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
