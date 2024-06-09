<!DOCTYPE html>
<html lang="en">
<head>
<title>E-raport | Mata Pelajaran</title>
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
  <div id="breadcrumb"> <a href="../" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="../mata_pelajaran/" class="tip-bottom">Mata Pelajaran</a> <a href="#" class="current">Tambah Data Mata Pelajaran</a> </div>
  <h1>Tambah Data Mata Pelajaran</h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Data Mata Pelajaran</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="index.php" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Mata Pelajaran :</label>
              <div class="controls">
                <input type="text" name="mata_pelajaran" class="span11" placeholder="Contoh : Matematika" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Nilai Standart Kelulusan :</label>
              <div class="controls">
                <input type="text" name="kkm" class="span11" placeholder="Contoh : 75" />
              </div>
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
