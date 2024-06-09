<!DOCTYPE html>
<html lang="en">
<head>
<title>E-raport | Wali Murid</title>
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
  <div id="breadcrumb"> <a href="../" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="../siswa/" class="tip-bottom">Siswa</a> <a href="#" class="current">Wali Murid</a> </div>
  <h1>Data Wali Murid</h1>
</div>

<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span12">

      <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
          <h5>Wali Murid</h5>
        </div>
        <div class="widget-content nopadding">
          <table class="table table-bordered data-table">
            <thead>
              <tr>
                <th>No</th>
                <th>Wali Murid</th>
                <th>Siswa</th>
                <th>Username</th>
                <th>Password</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $sql = mysqli_query($link,"SELECT wali_murid.id, wali_murid.nama, siswa.nisn, siswa.nama
              from wali_murid
              LEFT JOIN siswa ON wali_murid.id_siswa=siswa.id");
            while($tampil=mysqli_fetch_row($sql)){ ?>
              <tr>
                <td ><?php echo $no++; ?></td>
                <td><?php echo $tampil[1]; ?></td>
                <td><?php echo $tampil[2]; ?> / <?php echo $tampil[3]; ?></td>
                <td>Sementara Kosong</td>
                <td>Sementara Kosong</td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
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
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/matrix.js"></script>
<script src="../js/matrix.tables.js"></script>
<script src="../js/matrix.form_common.js"></script>
<script src="../js/wysihtml5-0.3.0.js"></script>
<script src="../js/jquery.peity.min.js"></script>
<script src="../js/bootstrap-wysihtml5.js"></script>

<script>
	$('.textarea_editor').wysihtml5();
</script>
</body>
</html>
