<?php
session_start();
include "koneksi.php";

$nip = $_GET['nip'] ?? '';

$query = mysqli_query($conn,"SELECT * FROM pegawai WHERE nip='$nip'");
$data = mysqli_fetch_assoc($query);

/* TAMBAH RIWAYAT KEHORMATAN */
if(isset($_POST['tambah'])){

$nama_penghargaan = $_POST['nama_penghargaan'];
$tahun = $_POST['tahun'];

if(!empty($nama_penghargaan) && !empty($tahun)){

$cek = mysqli_query($conn,"
SELECT * FROM riwayat_kehormatan
WHERE nip='$nip'
AND nama_penghargaan='$nama_penghargaan'
AND tahun='$tahun'
");

if(mysqli_num_rows($cek)==0){

mysqli_query($conn,"
INSERT INTO riwayat_kehormatan
(
nip,
nama_penghargaan,
tahun
)
VALUES
(
'$nip',
'$nama_penghargaan',
'$tahun'
)
");

header("Location: Admin_Edit_Riwayat_Kehormatan.php?nip=$nip");
exit;
}
}
}


/* UBAH RIWAYAT KEHORMATAN */
if(isset($_POST['ubah'])){

$id = $_POST['id_riwayat_kehormatan'];
$nama_penghargaan = $_POST['nama_penghargaan'];
$tahun = $_POST['tahun'];

if(!empty($id) && !empty($nama_penghargaan) && !empty($tahun)){

mysqli_query($conn,"
UPDATE riwayat_kehormatan
SET
nama_penghargaan='$nama_penghargaan',
tahun='$tahun'
WHERE id_riwayat_kehormatan='$id'
");

header("Location: Admin_Edit_Riwayat_Kehormatan.php?nip=$nip");
exit;
}
}


/* HAPUS */
if(isset($_POST['hapus'])){

$id = $_POST['id_riwayat_kehormatan'];

mysqli_query($conn,"
DELETE FROM riwayat_kehormatan
WHERE id_riwayat_kehormatan='$id'
");

header("Location: Admin_Edit_Riwayat_Kehormatan.php?nip=$nip");
exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Data – Riwayat Kehormatan</title>
<link rel="stylesheet" href="style.css" />
<style>
.sidebar-edit {
width: 179px;
background: linear-gradient(to bottom, #8b0000, #3b0000);
color: #fff;
padding: 20px 15px;
min-height: 100vh;
}

.form-edit {
max-width: 800px;
margin-top: 30px;
flex: 1;
}

.sidebar-edit {
color: white;
}

.sidebar-edit .item-menu {
display: block;
padding: 8px 5px;
font-weight: bold;
text-align: center;
cursor: pointer;
color: #fff !important;
text-decoration: none;
}

.bagian-identitas {
display: flex;
align-items: flex-start;
gap: 60px;
margin-top: 60px;
}

.sidebar-edit .item-menu:visited {
color: #fff !important;
text-decoration: none;
}

.sidebar-edit .item-menu.aktif {
text-decoration: underline;
}

.tabel-riwayat tr{
cursor:pointer;
}

.tabel-riwayat tr:hover{
background:#f1f1f1;
}

.tabel-riwayat{
width:780px;
margin-top:30px;
}

.bagian-identitas{
display:flex;
justify-content:center;
margin-top: 60px;
}
</style>
</head>

<body class="role-admin">

<!-- SIDEBAR -->
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

<div class="submenu" id="submenuDataMaster">
<a href="Admin_DM_Gender.php" class="item-submenu">Jenis Kelamin</a>
<a href="Admin_DM_Agama.php" class="item-submenu">Agama</a>
<a href="Admin_DM_StatusPerkawinan.php" class="item-submenu">Status Perkawinan</a>
<a href="Admin_DM_JenjangPendidikan.php" class="item-submenu">Jenjang Pendidikan</a>
<a href="Admin_DM_HubunganKeluarga.php" class="item-submenu">Hubungan Keluarga</a>
<a href="Admin_DM_Golongan.php" class="item-submenu">Golongan</a>
<a href="Admin_DM_Jabatan.php" class="item-submenu">Jabatan</a>
<a href="Admin_DM_UnitKerja.php" class="item-submenu">Unit Kerja / Divisi</a>
<a href="Admin_DM_JenisDiklat.php" class="item-submenu">Jenis Diklat</a>
<a href="Admin_DM_PredikatSKP.php" class="item-submenu">Predikat SKP</a>
</div>

<hr class="garis-menu" />

<a href="Admin_Manajemen_Akun.php" class="item-menu">
Manajemen Akun
</a>

<hr class="garis-menu">

</aside>


<!-- KONTEN -->
<main class="konten">

<h2>Riwayat Kehormatan</h2>

<div class="user-profile" id="userProfile">

<div class="user-info">
<div class="user-icon">👤</div>
<div class="user-text">
<div class="user-name"><?= $data['nama_pegawai'] ?></div>
</div>
</div>

<div class="dropdown-menu" id="dropdownMenu">
<a href="#">Beranda</a>
<a href="#">Keluar</a>
</div>

</div>


<div class="tab-menu">

<a href="identitas-pegawai.php" class="tab">Identitas</a>
<a href="Admin_Edit_Riwayat_Golongan.php" class="tab">Riwayat Golongan</a>
<a href="Admin_Edit_Riwayat_Jabatan.php" class="tab">Riwayat Jabatan</a>
<a href="Admin_Edit_Riwayat_Pendidikan.php" class="tab">Riwayat Pendidikan</a>
<a href="Admin_Edit_Riwayat_Diklat.php" class="tab">Riwayat Diklat</a>
<a href="Admin_Edit_Riwayat_Keluarga.php" class="tab">Riwayat Keluarga</a>
<a href="Admin_Edit_Riwayat_Kehormatan.php" class="tab aktif">Riwayat Kehormatan</a>
<a href="Admin_Edit_Riwayat_SKP.php" class="tab">Riwayat SKP</a>

</div>


<div class="bagian-identitas">

<form method="POST">

<input type="hidden" name="id_riwayat_kehormatan" id="id_riwayat_kehormatan">

<div class="baris-form" style="grid-template-columns:150px 500px 120px;">
<label>Nama Penghargaan</label>
<input type="text" name="nama_penghargaan">

<button type="submit" name="tambah" class="tombol-tambah btn-kecil">
TAMBAH
</button>
</div>


<div class="baris-form" style="grid-template-columns:150px 500px 120px;">
<label>Tahun</label>

<input type="number" name="tahun" placeholder="YYYY">

<div class="aksi-vertikal">
<button type="submit" name="ubah" class="tombol-ubah btn-kecil">
UBAH
</button>

<button type="submit" name="hapus" class="tombol-hapus btn-kecil">
HAPUS
</button>
</div>
</div>


<table class="tabel-riwayat">

<thead>
<tr>
<th>Jenis Penghargaan</th>
<th>Tahun</th>
</tr>
</thead>

<tbody>

<?php
$data = mysqli_query($conn,"
SELECT * FROM riwayat_kehormatan
WHERE nip='$nip'
ORDER BY tahun DESC
");

while($row = mysqli_fetch_assoc($data)){

echo "<tr onclick=\"pilihData('".$row['id_riwayat_kehormatan']."','".$row['nama_penghargaan']."','".$row['tahun']."')\">

<td>".$row['nama_penghargaan']."</td>
<td>".$row['tahun']."</td>

</tr>";

}
?>

</tbody>
</table>

</form>

</div>

</main>

<script src="script.js"></script>

<script>
function pilihData(id,nama,tahun){

document.getElementById("id_riwayat_kehormatan").value = id;
document.querySelector("input[name='nama_penghargaan']").value = nama;
document.querySelector("input[name='tahun']").value = tahun;

}
</script>

</body>
</html>