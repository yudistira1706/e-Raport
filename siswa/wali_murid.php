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
<?php
error_reporting(0);
include ("../inc/conn.php");
if (isset($_POST['simpan'])) {


  $id_siswa = mysqli_real_escape_string($link, $_POST['id_siswa']);
  $nama = mysqli_real_escape_string($link, $_POST['nama']);
  $username = mysqli_real_escape_string($link, $_POST['username']);
$password = mysqli_real_escape_string($link, $_POST['password']);
$pass = md5($password);
$kode= time();

$log = mysqli_query($link,"select * from wali_murid where nama='$nama' && id_siswa='$id_siswa'");
$num=mysqli_num_rows($log);
if ($num == 1){
  echo '<div class="alert alert-error alert-block"> <a class="close" data-dismiss="alert" href="#">×</a>
    <h4 class="alert-heading">Error!</h4>
    Data <b> Wali Murid </b> yang anda inputkan Sudah Ada! </div>';
} else {

$simpan = mysqli_query($link,"insert into wali_murid(id, nama, id_siswa) value('$kode','$nama','$id_siswa')");
if($simpan){
  $simpan1 = mysqli_query($link,"insert into user(id, username, password, role, id_walimurid) value(UUID(),'$username','$pass','wali_murid','$kode')");
  $edit=mysqli_query($link,"update siswa set id_walimurid='$kode' where id='$_POST[id_siswa]'");

  header("location:../siswa/");
} else {
 echo'gagal Simpan';
}
}
}
?>

<?php
$sql = mysqli_query($link,"SELECT * from siswa where id ='$_GET[id]'");
while($tampil=mysqli_fetch_row($sql)){ ?>
  <?php if ($tampil[7]=="") { ?>

<div class="container-fluid">
  <?php
  $sql = mysqli_query($link,"SELECT * from siswa where id ='$_GET[id]'");
while($tampil=mysqli_fetch_row($sql)){ ?>
  Nama : <?php echo $tampil[2] ?> <br>
  NISN &nbsp; : <?php echo $tampil[1] ?>
<?php } ?>
  <hr>
  <div class="row-fluid">
    <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Data Wali Murid</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="wali_murid.php" method="post" class="form-horizontal">
            <input type="hidden" class="span11" name="id_siswa" value=<?php echo $_GET['id']; ?> placeholder="Prapta Agung Imanuel Pakekong " />
            <div class="control-group">
              <label class="control-label">Nama :</label>
              <div class="controls">
                <input type="text" class="span11" name="nama" placeholder="Prapta Agung Imanuel Pakekong " />
              </div>
            </div>
            <hr>
            <div class="control-group">
              <label class="control-label">Username :</label>
              <div class="controls">
                <input type="text" class="span11" name="username"/>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Password :</label>
              <div class="controls">
                <input type="password" class="span11" name="password"/>
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
</div>
<?php } else {  ?>

<div class="container-fluid">
  <?php
  $no = 1;
  $sql = mysqli_query($link,"SELECT * from siswa where id ='$_GET[id]'");
while($tampil=mysqli_fetch_row($sql)){ ?>
  Nama : <?php echo $tampil[2] ?> <br>
  NISN &nbsp; : <?php echo $tampil[1] ?>
<?php } ?>
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
              LEFT JOIN siswa ON wali_murid.id_siswa=siswa.id
              WHERE id_siswa ='$_GET[id]'");
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
          <br>
          &nbsp; <a href="../siswa/" class="btn btn-default">Kembali</a>
        </div>
      </div>
    </div>
  </div>
</div>

<?php } ?>
<?php } ?>

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
