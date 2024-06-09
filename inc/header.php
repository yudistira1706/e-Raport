<?php
// Memulai sesi
session_start();

// Menyertakan file koneksi database
include_once "conn.php"; 
?>

<?php
// Mengecek apakah sesi 'username' belum diset atau 'password' kosong
if (!isset($_SESSION['username']) || !isset($_SESSION['password']) || $_SESSION['password'] == "") {
  // Jika kondisi terpenuhi, mengarahkan pengguna ke halaman login
  header('location:../login/login.php'); 
  exit(); // Menambahkan exit untuk menghentikan eksekusi script setelah redirect
}
?>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">E-raport</a></h1>
</div>
<!--close-Header-part-->

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li class="dropdown" id="profile-messages">
      <a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle">
        <i class="icon icon-user"></i>
        <span class="text">Welcome <?php echo $_SESSION['username']; ?></span>
        <b class="caret"></b>
      </a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
        <li class="divider"></li>
        <li><a href="#"><i class="icon-check"></i> My Tasks</a></li>
        <li class="divider"></li>
        <li><a href="../login/logout.php"><i class="icon-key"></i> Log Out</a></li>
      </ul>
    </li>
    <li><a title="" href="../login/logout.php"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>
<!--close-top-Header-menu-->

<!--start-top-search-->
<div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-search-->
