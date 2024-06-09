<!DOCTYPE html>
<html lang="en">
<head>
<title>E-raport | Siswa</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="../css/bootstrap.min.css" />
<link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="../css/colorpicker.css" />
<link rel="stylesheet" href="../css/datepicker.css" />
<link rel="stylesheet" href="../css/uniform.css" />
<link rel="stylesheet" href="../css/select2.css" />
<link rel="stylesheet" href="../css/matrix-style.css" />
<link rel="stylesheet" href="../css/matrix-media.css" />
<link rel="stylesheet" href="../css/bootstrap-wysihtml5.css" />
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
  <div id="breadcrumb"> <a href="../" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="../siswa/" class="tip-bottom">Siswa</a> <a href="#" class="current">Tambah Data Siswa</a> </div>
  <h1>Tambah Data Siswa</h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Data Siswa</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="index.php" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Nisn :</label>
              <div class="controls">
                <input type="text" class="span11" name="nisn" placeholder="99963777243" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Nama :</label>
              <div class="controls">
                <input type="text" class="span11" name="nama" placeholder="Prapta Agung Imanuel Pakekong " />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Jenis Kelamin :</label>
              <div class="controls">
                Laki - Laki<input type="radio"  class="span11" name="jk" value="laki-laki"  />
                Perempuan <input type="radio"  class="span11" name="jk" value="perempuan"  />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Tempat Lahir:</label>
              <div class="controls">
                <input type="text" class="span11" name="tmpt_lhr" placeholder="Palu " />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Tanggal Lahir</label>
              <div class="controls">
                <input type="text" data-date="2018-02-17" placeholder="2018-02-17" data-date-format="yyyy-mm-dd" name="tgl_lahir" class="datepicker span11">
                <span class="help-block">Format Tanggal  (Tahun-bulan-tanggal)</span> </div>
            </div>
            <div class="control-group">
              <label class="control-label">~ Pilih Kelas ~</label>
              <div class="controls">
                <select name="id_kelas">
                  <option>~ Pilih Kelas ~</option>
                  <optgroup label="Kelas X">
                    <?php
                      include_once ('../inc/conn.php');
                      $sql = mysqli_query($link,"SELECT * FROM `kelas` where kode='X'");
                      while ($tampil = mysqli_fetch_array($sql)) {
                        echo '<option value="'.$tampil['id'].'">'.$tampil['kode'].' '.$tampil['kelas'].'</option>';
                      }
                    ?>
                  </optgroup>
                  <optgroup label="Kelas XI">
                    <?php
                      include_once ('../inc/conn.php');
                      $sql = mysqli_query($link,"SELECT * FROM `kelas` where kode='XI'");
                      while ($tampil = mysqli_fetch_array($sql)) {
                        echo '<option value="'.$tampil['id'].'">'.$tampil['kode'].' '.$tampil['kelas'].'</option>';
                      }
                    ?>
                  </optgroup>
                  <optgroup label="Kelas XII">
                    <?php
                      include_once ('../inc/conn.php');
                      $sql = mysqli_query($link,"SELECT * FROM `kelas` where kode='XII'");
                      while ($tampil = mysqli_fetch_array($sql)) {
                        echo '<option value="'.$tampil['id'].'">'.$tampil['kode'].' '.$tampil['kelas'].'</option>';
                      }
                    ?>
                  </optgroup>

                </select>
              </div>
            </div>
            <div class="form-actions">
              <input type="submit" class="btn btn-success" value="Simpan" name="simpan">
            </div>
          </form>
        </div>
      </div>
    </div>

  </div>
</div></div>

<?php include_once "../inc_/footer.php"; ?>

<script src="../js/jquery.min.js"></script>
<script src="../js/jquery.ui.custom.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/bootstrap-colorpicker.js"></script>
<script src="../js/bootstrap-datepicker.js"></script>
<script src="../js/jquery.toggle.buttons.js"></script>
<script src="../js/masked.js"></script>
<script src="../js/jquery.uniform.js"></script>
<script src="../js/select2.min.js"></script>
<script src="../js/matrix.js"></script>
<script src="../js/matrix.form_common.js"></script>
<script src="../js/wysihtml5-0.3.0.js"></script>
<script src="../js/jquery.peity.min.js"></script>
<script src="../js/bootstrap-wysihtml5.js"></script>
<script>
	$('.textarea_editor').wysihtml5();
</script>
</body>
</html>
