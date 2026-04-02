<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Manajemen Akun</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="datamaster.css" />

<style>




/* ==============================
   TABLE MANAJEMEN AKUN
============================== */

.table-top {
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:15px;
}

.table-header {
    background:#8b0000;
    color:white;
    padding:12px 15px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.table-master {
    width:100%;
    border-collapse:collapse;
}

.table-master th,
.table-master td {
    border:1px solid #ccc;
    padding:8px;
    text-align:center;
}

.status-aktif {
    color:green;
    font-weight:bold;
}

.status-nonaktif {
    color:red;
    font-weight:bold;
}

.aksi-btn {
    display:flex;
    justify-content:center;
    gap:8px;
}

.btn-edit {
    background:#f1c40f;
    border:none;
    padding:6px 10px;
    border-radius:5px;
    cursor:pointer;
}

.btn-reset {
    background:#2ecc71;
    border:none;
    padding:6px 10px;
    border-radius:5px;
    cursor:pointer;
}

.btn-nonaktif {
    background:#e74c3c;
    border:none;
    padding:6px 10px;
    border-radius:5px;
    cursor:pointer;
    color:white;
}

.btn-aktifkan {
    background:#3498db;
    border:none;
    padding:6px 10px;
    border-radius:5px;
    cursor:pointer;
    color:white;
}

.item-menu {
    display: block;
    padding: 8px 5px;
    font-weight: bold;
    text-align: center;
    text-decoration: none;
    color: white;
    cursor: pointer;
}

</style>
</head>

<body class="role-admin">

<!-- SIDEBAR -->
<!-- <aside class="sidebar" id="sidebar">
    <div class="logo">
        <span>LOGO</span>
        <button class="tombol-menu" id="tombolMenu">✕</button>
    </div>

    <hr class="garis-menu">

    <a href="Admin_Profil_Data_Pegawai.html" class="item-menu">
        Profil Data Pegawai
    </a>

    <hr class="garis-menu">

    <a href="Admin_Tambah_Data.html" class="item-menu">
        Tambah Data Pegawai Baru
    </a>

    <hr class="garis-menu">

    <a href="Admin_Pengaturan_Akun.html" class="item-menu">
        Pengaturan Akun
    </a>

    <hr class="garis-menu">

    <a href="Admin_Manajemen_Akun.html" class="item-menu aktif">
        Manajemen Akun
    </a>

    <hr class="garis-menu">
</aside> -->

<aside class="sidebar" id="sidebar">
      <div class="logo">
        <span>LOGO</span>
        <button class="tombol-menu" id="tombolMenu">✕</button>
      </div>

      <hr class="garis-menu" />

      <a href="Admin_Profil_Data_Pegawai.html" class="item-menu">
        Profil Data Pegawai
      </a>

      <hr class="garis-menu" />

      <a href="Admin_Tambah_Data.html" class="item-menu">
        Tambah Data Pegawai Baru
      </a>

      <hr class="garis-menu" />

      <a href="Admin_Pengaturan_Akun.html" class="item-menu">
        Pengaturan Akun
      </a>

      <hr class="garis-menu" />

      <div class="item-menu" id="menuDataMaster">
        Data Master
        <span class="panah-menu" id="panahDataMaster">▼</span>
      </div>

      <div class="submenu aktif" id="submenuDataMaster">
        <a href="Admin_DM_Gender.html" class="item-submenu">Jenis Kelamin</a>
        <a href="Admin_DM_Agama.html" class="item-submenu">Agama</a>
        <a href="Admin_DM_StatusPerkawinan.html" class="item-submenu"
          >Status Perkawinan</a
        >
        <a href="Admin_DM_JenjangPendidikan.html" class="item-submenu"
          >Jenjang Pendidikan</a
        >
        <a href="Admin_DM_HubunganKeluarga.html" class="item-submenu"
          >Hubungan Keluarga</a
        >
        <a href="Admin_DM_Golongan.html" class="item-submenu">Golongan</a>
        <a href="Admin_DM_Jabatan.html" class="item-submenu">Jabatan</a>
        <a href="Admin_DM_UnitKerja.html" class="item-submenu"
          >Unit Kerja / Divisi</a
        >
        <a href="Admin_DM_JenisDiklat.html" class="item-submenu"
          >Jenis Diklat</a
        >
        <a href="Admin_DM_PredikatSKP.html" class="item-submenu"
          >Predikat SKP</a
        >
      </div>

      <hr class="garis-menu" />
      <a href="Admin_Manajemen_Akun.html" class="item-menu aktif">
        Manajemen Akun
    </a>

    <hr class="garis-menu">
    </aside>

<!-- KONTEN -->
<main class="konten">
    <div class="user-profile" id="userProfile">
        <div class="user-info">
          <div class="user-icon">👤</div>
          <div class="user-text">
            <div class="user-name">TU SEKRETARIS KPU</div>
            <!-- <div class="user-role">Tata Usaha</div> -->
          </div>
        </div>

        <div class="dropdown-menu" id="dropdownMenu">
          <a href="Admin_Profil_Data_Pegawai.html">Beranda</a>
          <a href="#">Keluar</a>
        </div>
      </div>

<h2>Manajemen Akun</h2>

<div class="table-top">
    <div>
        Show
        <select>
            <option>10</option>
            <option>25</option>
        </select>
        Entries
    </div>

    <button class="tombol-tambah">+ Add New</button>
</div>

<div class="table-header">
    <span>Manajemen Akun</span>
</div>

<table class="table-master">
<thead>
<tr>
    <th><input type="checkbox"></th>
    <th>Username</th>
    <th>Nama Pegawai</th>
    <th>Email</th>
    <th>Role</th>
    <th>Status</th>
    <th>Terakhir Login</th>
    <th>Aksi</th>
</tr>
</thead>

<tbody>

<tr>
    <td><input type="checkbox"></td>
    <td>admin01</td>
    <td>Hawa Andini</td>
    <td>admin@email.com</td>
    <td>Admin</td>
    <td class="status-aktif">Aktif</td>
    <td>20-02-2026</td>
    <td>
        <div class="aksi-btn">
            <button class="btn-edit">✏</button>
            <button class="btn-reset">⟳</button>
            <button class="btn-nonaktif">⛔</button>
        </div>
    </td>
</tr>

<tr>
    <td><input type="checkbox"></td>
    <td>user01</td>
    <td>Budi Santoso</td>
    <td>user@email.com</td>
    <td>User</td>
    <td class="status-nonaktif">Nonaktif</td>
    <td>15-02-2026</td>
    <td>
        <div class="aksi-btn">
            <button class="btn-edit">✏</button>
            <button class="btn-reset">⟳</button>
            <button class="btn-aktifkan">▶</button>
        </div>
    </td>
</tr>

</tbody>
</table>

</main>

<script src="core-ui.js"></script>
<script src="datamaster.js"></script>
<script src="admin-ui.js"></script>
</body>
</html>
