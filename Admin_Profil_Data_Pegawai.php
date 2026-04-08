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
    <script>
document.getElementById("jumlahData").addEventListener("change", () => {
    page = 1;
    loadData();
});

document.getElementById("pencarian").addEventListener("keypress", function(e) {
    if (e.key === "Enter") {
        let search = this.value;
        let limit = document.getElementById("jumlahData").value;

        window.location.href = "?limit=" + limit + "&search=" + search;
    }
});

let page = 1;

function loadData() {
    let limit = document.getElementById("jumlahData").value;
    let search = document.getElementById("pencarian").value;

    fetch(`get_data_pegawai.php?limit=${limit}&page=${page}&search=${search}`)
    .then(res => res.json())
    .then(res => {

        let html = "";
        let no = 1;

        res.data.forEach(item => {
            html += `
            <tr>
                <td>${no++}</td>
                <td>${item.nama_pegawai}</td>
                <td>${item.nama_jabatan ?? '-'}</td>
                <td>${item.nama_pangkat ?? '-'}</td>
                <td>${item.nip}</td>
                <td>${item.tipe_karyawan}</td>
                <td>${item.unit_kerja ?? '-'}</td>
                <td>👁 <a href="identitas-pegawai.php?nip=${item.nip}">✏️</a></td>
            </tr>
            `;
        });

        document.getElementById("dataTabel").innerHTML = html;

        // BUAT PAGINATION
        buatPagination(res.totalPage);

        updateInfo(res.totalData)
    });
}
// EVENT
document.getElementById("jumlahData").addEventListener("change", () => {
    page = 1;
    loadData();
});

document.getElementById("pencarian").addEventListener("keyup", () => {
    page = 1;
    loadData();
});

// LOAD AWAL
loadData();


function buatPagination(totalPage) {
    let html = "";

    let maxPage = 5; // maksimal tombol angka tampil
    let start = Math.max(1, page - 2);
    let end = Math.min(totalPage, start + maxPage - 1);

    // PREV
    html += `<button ${page == 1 ? 'disabled' : ''} onclick="prevPage()">Previous</button>`;

    // ANGKA
    for (let i = start; i <= end; i++) {
        html += `
        <button 
            onclick="goPage(${i})" 
            class="${page == i ? 'active-page' : ''}">
            ${i}
        </button>`;
    }

    // NEXT
    html += `<button ${page == totalPage ? 'disabled' : ''} onclick="nextPage(${totalPage})">Next</button>`;

    document.getElementById("pagination").innerHTML = html;
}

function goPage(p) {
    page = p;
    loadData();
}

function prevPage() {
    if (page > 1) {
        page--;
        loadData();
    }
}

function nextPage(totalPage) {
    if (page < totalPage) {
        page++;
        loadData();
    }
}

function updateInfo(totalData) {
    let limit = document.getElementById("jumlahData").value;
    let start = (page - 1) * limit + 1;
    let end = Math.min(page * limit, totalData);

    document.getElementById("infoData").innerHTML =
        `Showing ${start}–${end} of ${totalData} entries`;
}
</script>    
  </body>
</html>
