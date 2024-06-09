<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="active"><a href="#"><i class="icon icon-home"></i> <span>Dashboard</span></a></li>

    <!-- Awal Sidebar Admin -->
    <?php if ($_SESSION['role'] == "admin") { ?>
      <li class="submenu">
        <a href="#"><i class="icon icon-th-list"></i> <span>Pengguna Aplikasi</span></a>
        <ul>
        <li><a href="../guru_mapel/">Guru Mapel</a></li>
        <li><a href="../wali_kelas/">Wali Kelas</a></li>
        <li><a href="../wali_murid/">Wali Murid</a></li>
        </ul>
      </li>
      <li><a href="../kelas/"><i class="icon icon-signal"></i> <span>Kelas</span></a></li>
      <li><a href="../guru/"><i class="icon icon-inbox"></i> <span>Guru</span></a></li>
      <li><a href="../siswa/"><i class="icon icon-th"></i> <span>Siswa</span></a></li>
      <li><a href="../mata_pelajaran/"><i class="icon icon-fullscreen"></i> <span>Mata Pelajaran</span></a></li>
    <?php } ?>
    <!-- Akhir Sidebar Admin -->

    <!-- Awal Sidebar Wali Kelas -->
    <?php if ($_SESSION['role'] == "wali_kelas") { ?>
      <li><a href="../raport_siswa/"><i class="icon icon-signal"></i> <span>Raport Siswa</span></a></li>
      <li><a href="../hasil_total_nilai/"><i class="icon icon-signal"></i> <span>Hasil Total Nilai</span></a></li>
      <li><a href="../wali_murid/"><i class="icon icon-signal"></i> <span>Wali Murid</span></a></li>
      <li class="submenu">
        <a href="#"><i class="icon icon-th-list"></i> <span>Mata Pelajaran</span> <span class="label label-important">
          <?php
          $sql = mysqli_query($link, "SELECT id_kelas FROM wali_kelas WHERE id = '$_SESSION[id_walikelas]'");
          if ($sql) {
            while ($tmpl = mysqli_fetch_row($sql)) {
              $sql2 = mysqli_query($link, "SELECT COUNT(id) FROM mata_pelajaran WHERE id_kelas = '$tmpl[0]'");
              if ($sql2) {
                while ($hitung_mapel = mysqli_fetch_row($sql2)) {
                  echo $hitung_mapel[0];
                }
              }
            }
          }
          ?>
        </span></a>
        <ul>
          <?php
          $sql = mysqli_query($link, "SELECT id_kelas FROM wali_kelas WHERE id = '$_SESSION[id_walikelas]'");
          if ($sql) {
            while ($tmpl = mysqli_fetch_row($sql)) {
              $sql2 = mysqli_query($link, "SELECT mata_pelajaran.id, mata_pelajaran.mata_pelajaran FROM mata_pelajaran LEFT JOIN kelas ON mata_pelajaran.id_kelas = kelas.id WHERE id_kelas = '$tmpl[0]'");
              if ($sql2) {
                while ($tmpl_mapel = mysqli_fetch_row($sql2)) {
                  echo '<li><a href="../nilai_pelajaran/index.php?id=' . $tmpl_mapel[0] . '">' . $tmpl_mapel[1] . '</a></li>';
                }
              }
            }
          }
          ?>
        </ul>
      </li>
    <?php } ?>
    <!-- Akhir Sidebar Wali Kelas -->

    <!-- Awal Sidebar Guru -->
    <?php if ($_SESSION['role'] == "guru") { ?>
      <li class="submenu">
        <a href="#"><i class="icon icon-th-list"></i> <span>Mata Pelajaran</span> <span class="label label-important">
          <?php
          $sql = mysqli_query($link, "SELECT COUNT(id) FROM guru_mapel WHERE id_guru = '$_SESSION[id_guru]'");
          if ($sql) {
            while ($hitung_mapel = mysqli_fetch_row($sql)) {
              echo $hitung_mapel[0];
            }
          }
          ?>
        </span></a>
        <ul>
          <?php
          $sql = mysqli_query($link, "SELECT guru_mapel.id_mapel, mata_pelajaran.mata_pelajaran FROM guru_mapel LEFT JOIN mata_pelajaran ON guru_mapel.id_mapel = mata_pelajaran.id WHERE id_guru = '$_SESSION[id_guru]'");
          if ($sql) {
            while ($tmpl_mapel = mysqli_fetch_row($sql)) {
              echo '<li><a href="../penilaian/index.php?id=' . $tmpl_mapel[0] . '">' . $tmpl_mapel[1] . '</a></li>';
            }
          }
          ?>
        </ul>
      </li>
    <?php } ?>
    <!-- Akhir Sidebar Guru -->
  </ul>
</div>
<!--sidebar-menu-->
