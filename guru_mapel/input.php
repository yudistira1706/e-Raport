<!DOCTYPE html>
<html lang="en">
<head>
<title>E-raport | Guru Mapel</title>
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
  <div id="breadcrumb"> <a href="../" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="../guru_mapel/" class="tip-bottom">Guru Mapel</a> <a href="#" class="current">Tambah Data Guru Mapel</a> </div>
  <h1>Tambah Data Guru Mapel</h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Data Guru Mapel</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="index.php" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Pilih Guru</label>
              <div class="controls">
                <select name="id_guru">
                  <option>Pilih Guru</option>
                  <?php
                    include_once ('../inc/conn.php');
                    $sql = mysqli_query($link,"SELECT * FROM `guru`");
                    while ($tampil = mysqli_fetch_array($sql)) {
                      echo '<option value="'.$tampil['id'].'">'.$tampil['nama'].'</option>';
                    }
                  ?>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Pilih Mata Pelajaran</label>
              <div class="controls">
                <select name="id_mapel">
                  <option>~ Pilih Mata Pelajaran</option>
                    <?php
                      include_once ('../inc/conn.php');
                      $sql = mysqli_query($link,"SELECT mata_pelajaran.id, mata_pelajaran.mata_pelajaran, kelas.kode, kelas.kelas
                         FROM `mata_pelajaran`
                         LEFT JOIN kelas ON mata_pelajaran.id_kelas=kelas.id");
                      while ($tampil = mysqli_fetch_array($sql)) {
                        echo '<option value="'.$tampil['id'].'">'.$tampil['kode'].' '.$tampil['kelas'].' '.$tampil['mata_pelajaran'].'</option>';
                      }
                    ?>
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
