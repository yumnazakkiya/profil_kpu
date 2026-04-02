<?php
include 'koneksi.php';

$query = mysqli_query($conn,"
SELECT 
p.nip,
p.nama_pegawai,
p.tipe_karyawan,
mj.nama_jabatan,
mg.nama_pangkat,
md.unit_kerja

FROM pegawai p

LEFT JOIN riwayat_jabatan rj 
ON rj.id_riwayat_jabatan = (
    SELECT id_riwayat_jabatan 
    FROM riwayat_jabatan 
    WHERE nip = p.nip 
    ORDER BY id_riwayat_jabatan DESC 
    LIMIT 1
)

LEFT JOIN master_jabatan mj 
ON rj.id_jabatan = mj.id_jabatan

LEFT JOIN riwayat_golongan rg 
ON rg.id_riwayat_gol = (
    SELECT id_riwayat_gol 
    FROM riwayat_golongan 
    WHERE nip = p.nip 
    ORDER BY id_riwayat_gol DESC 
    LIMIT 1
)

LEFT JOIN master_golongan mg 
ON rg.id_gol = mg.id_gol

LEFT JOIN master_divisi md
ON p.id_unit_kerja = md.id_unit_kerja
");
?>
<!doctype html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <title>Data Pegawai</title>
    <link rel="stylesheet" href="style.css" />
    <style>
      .kontrol {
        display: flex;
        justify-content: space-between;
        margin: 20px 0;
        margin-top: 70px;
      }

      .kontrol select,
      .kontrol input {
        padding: 6px;
        margin-left: 6px;
      }

      /* TABEL */
      .tabel {
        width: 100%;
        border-collapse: collapse;
      }

      .tabel th,
      .tabel td {
        border: 1px solid #000;
        padding: 10px;
        text-align: center;
      }

      .tabel th {
        font-weight: bold;
      }

      .aksi {
        font-size: 18px;
        cursor: pointer;
      }

      /* NEW PROFIL */
      /* USER PROFILE */
      .user-profile {
        position: absolute;
        top: 20px;
        right: 40px;
        cursor: pointer;
      }

      .user-info {
        display: flex;
        align-items: center;
        gap: 10px;
        background: #f2f2f2;
        padding: 10px 15px;
        border-radius: 15px;
      }

      .user-icon {
        font-size: 24px;
      }

      .user-name {
        font-weight: bold;
        font-size: 14px;
      }

      
      /* DROPDOWN */
      .dropdown-menu {
        display: none;
        position: absolute;
        top: 60px;
        right: 0;
        background: #f2f2f2;
        border-radius: 15px;
        padding: 15px 20px;
        width: 200px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
      }

      .dropdown-menu a {
        display: block;
        text-decoration: none;
        color: #2c3e50;
        font-weight: 600;
        margin-bottom: 15px;
      }

      .dropdown-menu a:last-child {
        margin-bottom: 0;
      }

      /* TAMPIL SAAT AKTIF */
      .user-profile.active .dropdown-menu {
        display: block;
      }
    </style>
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
            <option>10</option>
            <option>25</option>
            <option>50</option>
          </select>
          Entri
        </div>

        <div>
          Cari
          <input type="text" id="pencarian" placeholder="Cari data..." />
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
        
        <tbody>
<?php
$no = 1;

while($data = mysqli_fetch_assoc($query)) {
?>
<tr>

<td><?= $no++; ?></td>

<td><?= $data['nama_pegawai']; ?></td>

<td><?= $data['nama_jabatan'] ?? '-'; ?></td>

<td><?= $data['nama_pangkat'] ?? '-'; ?></td>

<td><?= $data['nip']; ?></td>

<td><?= $data['tipe_karyawan']; ?></td>
<td><?= $data['unit_kerja'] ?? '-'; ?></td>

<td class="aksi">
👁
<a href="identitas-pegawai.php?nip=<?= $data['nip']; ?>">✏️</a>
</td>

</tr>
<?php } ?>
</tbody>
      </table>
    </main>

    <!-- <script src="script.js"></script> -->
    <script src="core-ui.js"></script>
    <script src="datamaster.js"></script>
    <script src="admin-ui.js"></script>

    
  </body>
</html>
