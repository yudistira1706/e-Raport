<!DOCTYPE html>
<html lang="en">
<head>
<title>E - Raport | Beranda</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<!-- Link ke CSS Bootstrap untuk styling -->
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<!-- Link ke CSS FullCalendar untuk kalender -->
<link rel="stylesheet" href="css/fullcalendar.css" />
<!-- Link ke CSS utama aplikasi -->
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<!-- Link ke Font Awesome untuk ikon -->
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<!-- Link ke CSS untuk notifikasi -->
<link rel="stylesheet" href="css/jquery.gritter.css" />
<!-- Link ke Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!-- Include file header dan sidebar -->
<?php
include_once "inc/header.php";
include_once "inc/sidebar.php";
?>

<!-- Bagian utama kontainer -->
<div id="content">
  <!-- Breadcrumbs -->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
  <!-- Akhir dari Breadcrumbs -->

  <!-- Kotak Aksi -->
  <div class="container-fluid">
    <div class="quick-actions_homepage">
      <ul class="quick-actions">
        <!-- Kondisi jika pengguna adalah guru -->
        <?php
         if ($_SESSION['role']=="guru") { ?>
           <!-- Menampilkan mata pelajaran yang diajar oleh guru -->
           <?php
               $sql = mysqli_query($link,"SELECT guru_mapel.id_mapel, mata_pelajaran.mata_pelajaran from guru_mapel
               LEFT JOIN mata_pelajaran ON guru_mapel.id_mapel=mata_pelajaran.id
               where id_guru = '$_SESSION[id_guru]'");
       while($tmpl_mapel=mysqli_fetch_row($sql)){ ?>
        <!-- Tautan menuju halaman penilaian untuk setiap mata pelajaran -->
        <li class="bg_lb"> <a href="penilaian/index.php?id=<?php echo $tmpl_mapel[0];  ?>"> <i class="icon-dashboard"></i> <span class="label label-important">20</span> <?php echo $tmpl_mapel[1]; ?> </a> </li>
      <?php } ?>

      <?php } ?>
      <!-- Kondisi jika pengguna adalah admin -->
      <?php
       if ($_SESSION['role']=="admin") { ?>
         <!-- Tautan menuju dashboard dan fitur lainnya untuk admin -->
         <li class="bg_lb"> <a href="index.html"> <i class="icon-dashboard"></i> <span class="label label-important"></span> My Dashboard </a> </li>
        <li class="bg_lg span3"> <a href="charts.html"> <i class="icon-signal"></i> Charts</a> </li>
        <li class="bg_ly"> <a href="widgets.html"> <i class="icon-inbox"></i><span class="label label-success"></span> Widgets </a> </li>
        <li class="bg_lo"> <a href="tables.html"> <i class="icon-th"></i> Tables</a> </li>
        <li class="bg_ls"> <a href="grid.html"> <i class="icon-fullscreen"></i> Full width</a> </li>
        <li class="bg_lo span3"> <a href="form-common.html"> <i class="icon-th-list"></i> Forms</a> </li>
        <li class="bg_ls"> <a href="buttons.html"> <i class="icon-tint"></i> Buttons</a> </li>
        <li class="bg_lb"> <a href="interface.html"> <i class="icon-pencil"></i>Elements</a> </li>
        <li class="bg_lg"> <a href="calendar.html"> <i class="icon-calendar"></i> Calendar</a> </li>
        <li class="bg_lr"> <a href="error404.html"> <i class="icon-info-sign"></i> Error</a> </li>
<?php } ?>
      </ul>
    </div>
  

  <!-- Lanjutan dari kode... -->
  <?php if ($_SESSION['role']=="wali_murid") { ?>
  <?php
      $sql_id = mysqli_query($link,"SELECT id_siswa FROM wali_murid where id = '$_SESSION[id_walimurid]'");
while($tmpl_id=mysqli_fetch_row($sql_id)){ ?>
    <div class="widget-box">
      <div class="widget-title">
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#nilai_siswa">Nilai Siswa</a></li>
          <li><a data-toggle="tab" href="#guru">Guru</a></li>
        </ul>
      </div>
      <div class="widget-content tab-content">
        <div id="nilai_siswa" class="tab-pane active">
          <p>Nilai Pelajaran Siswa
        <?php
            $sql_siswa = mysqli_query($link,"SELECT nama FROM siswa where id = '$tmpl_id[0]'");
    while($tmpl_siswa=mysqli_fetch_row($sql_siswa)){ ?>
      <b><?php echo $tmpl_siswa[0]; ?></b>
    <?php } ?>

      </p>

      <table class="table table-bordered data-table">
    <thead>
      <tr>
        <th>No</th>
        <th>Mata Pelajaran</th>
        <th>KKM</th>
        <th>UAS</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no=1;
      $sql1 = mysqli_query($link,"SELECT m.mata_pelajaran, m.kkm, n.nilai from nilai n
        LEFT JOIN mata_pelajaran m ON n.id_mapel = m.id
        where id_siswa='$tmpl_id[0]'");
    while($tampil=mysqli_fetch_row($sql1)){ ?>
      <tr>
        <td ><?php echo $no++; ?></td>
        <td><?php echo $tampil[0]; ?></td>
        <td><?php echo $tampil[1]; ?></td>
        <td><?php echo $tampil[2]; ?></td>
      </tr>
    <?php } ?>
    </tbody>
  </table>

        </div>
        <div id="guru" class="tab-pane"> <img src="img/demo/demo-image2.jpg" alt="demo-image"/>
          <p>And is full of waffle to It has multiple paragraphs and is full of waffle to pad out the comment. Usually, you just wish these sorts of comments would come to an end.multiple paragraphs and is full of waffle to pad out the comment.</p>
        </div>
      </div>
    </div>
  <?php } ?>
  <?php } ?>
</div>
<!-- Akhir dari Bagian utama kontainer -->

<!-- Include file footer -->
<?php
include_once "inc/footer.php";
?>

<!-- Script JavaScript -->
<script src="js/excanvas.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.ui.custom.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.flot.min.js"></script>
<script src="js/jquery.flot.resize.min.js"></script>
<script src="js/jquery.peity.min.js"></script>
<script src="js/fullcalendar.min.js"></script>
<script src="js/matrix.js"></script>
<script src="js/matrix.dashboard.js"></script>
<script src="js/jquery.gritter.min.js"></script>
<script src="js/matrix.interface.js"></script>
<script src="js/matrix.chat.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="js/matrix.form_validation.js"></script>
<script src="js/jquery.wizard.js"></script>
<script src="js/jquery.uniform.js"></script>
<script src="js/select2.min.js"></script>
<script src="js/matrix.popover.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/matrix.tables.js"></script>

<!-- Lanjutan dari script... -->
</body>
</html>
