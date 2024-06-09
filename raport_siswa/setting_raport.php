<!DOCTYPE html>
<html lang="en">
<head>
<title>E-raport | Raport Siswa</title>
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
    <div id="breadcrumb"> <a href="../" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Raport Siswa</a> </div>
    <h1>Setting Raport Siswa</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">

        <div class="widget-box">
          <form class="" action="index.html" method="post">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <?php
            $sql = mysqli_query($link,"Select * from siswa where id='$_GET[id]'");
          while($tampil=mysqli_fetch_row($sql)){ ?>
            <h5>Setting Raport Nama : <?php echo $tampil[2]; ?> / Nisn : <?php echo $tampil[1]; ?></h5>
          <?php } ?>
          </div>
          <div class="widget-content nopadding">
            Ekstrakurikuler yang diikuti <br><br>
            <?php
            $sql = mysqli_query($link,"Select * from ekstrakurikuler");
          while($tampil=mysqli_fetch_row($sql)){ ?>
            <input type="checkbox" name="ekstrakurikuler[]" value="<?php echo $tampil[0]; ?>"><?php echo $tampil[1]; ?>
          <?php } ?>
          <hr>
          Ketidakhadiran <br><br>

          <div class="control-group">
            <div class="controls control-row">
              <input type="text" placeholder="Sakit (S) " name="sakit" class="span4 m-wrap">
              <input type="text" placeholder="Izin (I)" name="izin" class="span4 m-wrap">
              <input type="text" placeholder="Alpa (A)" name="alpa" class="span4 m-wrap">
            </div>
          </div>
          <hr>
          *Kosongi Bila Tidak ada <br>
          Catatan Untuk Perhatian Orang tua/Wali <br><br>
          <textarea name="name" rows="3" cols="180"></textarea>
          <hr>
          Kepribadian <br><br>

          <div class="control-group">
            <div class="controls control-row">
              <select class="span4" name="kelakuan">
                <option>~ Pilih Kelakuan ~</option>
                <option value="baik">Baik</option>
                <option value="cukup">Cukup</option>
                <option value="kurang">Kurang</option>
              </select>
              <select class="span4" name="kerajinan">
                <option>~ Pilih Kerajinan ~</option>
                <option value="baik">Baik</option>
                <option value="cukup">Cukup</option>
                <option value="kurang">Kurang</option>
              </select>
              <select class="span4" name="kerapian">
                <option>~ Pilih Kerapian ~</option>
                <option value="baik">Baik</option>
                <option value="cukup">Cukup</option>
                <option value="kurang">Kurang</option>
              </select>
            </div>
          </div>
        </div><br>
        <input type="submit" name="simpan_raport" class="btn btn-primary" value="Simpan Raport">
        </form>
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
