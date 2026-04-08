<?php
include 'koneksi.php';

$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';

$offset = ($page - 1) * $limit;

?>
<!doctype html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <title>Data Pegawai</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="profil_data.css" />   
    
  </head>
  <body class="role-admin">
    <aside class="sidebar" id="sidebar">
      <div class="logo">
        <span>LOGO</span>
        <button class="tombol-menu" id="tombolMenu">✕</button>
      </div>

      <hr class="garis-menu" />

      <a href="Admin_Profil_Data_Pegawai.php" class="item-menu aktif">
        Profil Data Pegawai
      </a>

      <hr class="garis-menu" />

      <a href="Admin_Tambah_Data.php" class="item-menu">
        Tambah Data Pegawai Baru
      </a>

      <hr class="garis-menu" />

      <a href="Admin_Pengaturan_Akun.php" class="item-menu">
        Pengaturan Akun
      </a>

      <hr class="garis-menu" />

      <div class="item-menu" id="menuDataMaster">
        Data Master
        <span class="panah-menu" id="panahDataMaster">▼</span>
      </div>

      <div class="submenu aktif" id="submenuDataMaster">
        <a href="Admin_DM_Gender.php" class="item-submenu">Jenis Kelamin</a>
        <a href="Admin_DM_Agama.php" class="item-submenu">Agama</a>
        <a href="Admin_DM_StatusPerkawinan.php" class="item-submenu"
          >Status Perkawinan</a
        >
        <a href="Admin_DM_JenjangPendidikan.php" class="item-submenu"
          >Jenjang Pendidikan</a
        >
        <a href="Admin_DM_HubunganKeluarga.php" class="item-submenu"
          >Hubungan Keluarga</a
        >
        <a href="Admin_DM_Golongan.php" class="item-submenu">Golongan</a>
        <a href="Admin_DM_Jabatan.php" class="item-submenu">Jabatan</a>
        <a href="Admin_DM_UnitKerja.php" class="item-submenu"
          >Unit Kerja / Divisi</a
        >
        <a href="Admin_DM_JenisDiklat.php" class="item-submenu"
          >Jenis Diklat</a
        >
        <a href="Admin_DM_PredikatSKP.php" class="item-submenu"
          >Predikat SKP</a
        >
        <a href="Admin_DM_KabupatenKota.php" class="item-submenu">Kabupaten/Kota</a>

      </div>

      <hr class="garis-menu" />
      <a href="Admin_Manajemen_Akun.php" class="item-menu">
        Manajemen Akun
    </a>

    <hr class="garis-menu">
    </aside>
    <!-- KONTEN UTAMA -->
    <main class="konten">
      <h2>Data Pegawai</h2>
      <!-- <button class="tombol-keluar">Log Out</button> -->
      <div class="user-profile" id="userProfile">
        <div class="user-info">
          <div class="user-icon">👤</div>
          <div class="user-text">
            <div class="user-name">TU SEKRETARIS KPU</div>
            <!-- <div class="user-role">Tata Usaha</div> -->
          </div>
        </div>

        <div class="dropdown-menu" id="dropdownMenu">
          <!-- <a href="#">Beranda</a> -->
          <a href="#">Keluar</a>
        </div>
      </div>

      <!-- KONTROL TABEL -->
      <section class="kontrol">
        <div>
          Tampilkan
<select id="jumlahData">
  <option value="10" <?= ($limit==10?'selected':'') ?>>10</option>
  <option value="25" <?= ($limit==25?'selected':'') ?>>25</option>
  <option value="50" <?= ($limit==50?'selected':'') ?>>50</option>
</select>
          Entri
        </div>

        <div>
          Cari
          <input type="text" id="pencarian" placeholder="Cari data..." value="<?= $search ?>" />
        </div>
      </section>

      <!-- TABEL -->
      <table class="tabel">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Golongan</th>
            <th>NIP</th>
            <th>Tipe Karyawan</th>
            <th>Divisi/Unit</th>
            <th>Aksi</th>
          </tr>
        </thead>
        
        <tbody id="dataTabel"></tbody>
      </table>
<div class="table-footer">
    <div id="infoData"></div>
    <div id="pagination"></div>
</div>
    </main>

    <!-- <script src="script.js"></script> -->
    <script src="core-ui.js"></script>
    <script src="datamaster.js"></script>
    <script src="admin-ui.js"></script>
    <script src="profildata.js"></script>

  </body>
</html>
