<?php
session_start();
include "koneksi.php";

$nip = $_GET['nip'] ?? '';

$query = mysqli_query($conn,"SELECT * FROM pegawai WHERE nip='$nip'");
$data = mysqli_fetch_assoc($query);

/* TAMBAH RIWAYAT KELUARGA */
if(isset($_POST['tambah'])){

$nama       = $_POST['nama'];
$no_telp    = $_POST['no_telp'];
$alamat     = $_POST['alamat'];
$id_hub_kel = $_POST['id_hub_kel'];

if(!empty($nama) && !empty($id_hub_kel)){

$cek = mysqli_query($conn,"
SELECT * FROM riwayat_keluarga
WHERE nip='$nip'
AND nama='$nama'
AND id_hub_kel='$id_hub_kel'
");

if(mysqli_num_rows($cek)==0){

mysqli_query($conn,"
INSERT INTO riwayat_keluarga
(
nama,
no_telp,
alamat,
nip,
id_hub_kel
)
VALUES
(
'$nama',
'$no_telp',
'$alamat',
'$nip',
'$id_hub_kel'
)
");

header("Location: Admin_Edit_Riwayat_Keluarga.php?nip=$nip");
exit;
}
}
}


/* UBAH RIWAYAT KELUARGA */
if(isset($_POST['ubah'])){

$id         = $_POST['id_riwayat_kel'];
$nama       = $_POST['nama'];
$no_telp    = $_POST['no_telp'];
$alamat     = $_POST['alamat'];
$id_hub_kel = $_POST['id_hub_kel'];

if(!empty($id) && !empty($nama)){

mysqli_query($conn,"
UPDATE riwayat_keluarga
SET
nama='$nama',
no_telp='$no_telp',
alamat='$alamat',
id_hub_kel='$id_hub_kel'
WHERE id_riwayat_kel='$id'
");

header("Location: Admin_Edit_Riwayat_Keluarga.php?nip=$nip");
exit;
}
}


/* HAPUS */
if(isset($_POST['hapus'])){

$id = $_POST['id_riwayat_kel'];

mysqli_query($conn,"
DELETE FROM riwayat_keluarga
WHERE id_riwayat_kel='$id'
");

header("Location: Admin_Edit_Riwayat_Keluarga.php?nip=$nip");
exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Data – Riwayat Keluarga</title>
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
width:750px;
margin-top:30px;
}

.bagian-identitas{
display:flex;
justify-content:center;
margin-top: 20px;
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


<main class="konten">

<h2>Riwayat Keluarga</h2>

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
<a href="Admin_Edit_Riwayat_Keluarga.php" class="tab aktif">Riwayat Keluarga</a>
<a href="Admin_Edit_Riwayat_Kehormatan.php" class="tab">Riwayat Kehormatan</a>
<a href="Admin_Edit_Riwayat_SKP.php" class="tab">Riwayat SKP</a>

</div>

<div class="bagian-identitas">

<div class="form-edit">

<form method="POST">

<input type="hidden" name="id_riwayat_kel" id="id_riwayat_kel">

<div class="baris-form" style="grid-template-columns:120px 500px 120px;">
<label>Nama</label>
<input type="text" name="nama">
<button type="submit" name="tambah" class="tombol-tambah btn-kecil">TAMBAH</button>
</div>

<div class="baris-form" style="grid-template-columns:120px 500px 120px;">
<label>No Telepon</label>
<input type="text" name="no_telp">
<button type="submit" name="ubah" class="tombol-ubah btn-kecil">UBAH</button>
</div>

<div class="baris-form" style="grid-template-columns:120px 500px 120px;">
<label>Alamat</label>
<input type="text" name="alamat">
<button type="submit" name="hapus" class="tombol-hapus btn-kecil">HAPUS</button>
</div>

<div class="baris-form" style="grid-template-columns:120px 500px 120px;">
<label>Keterangan</label>

<select name="id_hub_kel" style="height:30px; border:1px solid #888;">

<option value="">Pilih Keterangan</option>

<?php
$qHub = mysqli_query($conn,"SELECT * FROM master_hub_kel");

while($h = mysqli_fetch_assoc($qHub)){
echo "<option value='".$h['id_hub_kel']."'>".$h['hub_kel']."</option>";
}
?>

</select>

</div>

<table class="tabel-riwayat">

<thead>
<tr>
<th>Nama</th>
<th>No Telepon</th>
<th>Alamat</th>
<th>Keterangan</th>
</tr>
</thead>

<tbody>

<?php
$data = mysqli_query($conn,"
SELECT rk.*, mh.hub_kel
FROM riwayat_keluarga rk
JOIN master_hub_kel mh ON rk.id_hub_kel = mh.id_hub_kel
WHERE rk.nip='$nip'
");

while($row = mysqli_fetch_assoc($data)){
echo "<tr onclick=\"pilihData('".$row['id_riwayat_kel']."','".$row['nama']."','".$row['no_telp']."','".$row['alamat']."','".$row['id_hub_kel']."')\">

<td>".$row['nama']."</td>
<td>".$row['no_telp']."</td>
<td>".$row['alamat']."</td>
<td>".$row['hub_kel']."</td>

</tr>";
}

$qJumlah = mysqli_query($conn,"
SELECT COUNT(*) as total
FROM riwayat_keluarga
WHERE nip='$nip'
");

$j = mysqli_fetch_assoc($qJumlah);
?>

<tr>
<td colspan="2"><b>Jumlah Anggota Keluarga : <?php echo $j['total']; ?></b></td>
</tr>

</tbody>
</table>

</form>

</div>

</div>

</main>

<script src="script.js"></script>

<script>
function pilihData(id,nama,no_telp,alamat,id_hub_kel){

document.getElementById("id_riwayat_kel").value = id;
document.querySelector("input[name='nama']").value = nama;
document.querySelector("input[name='no_telp']").value = no_telp;
document.querySelector("input[name='alamat']").value = alamat;
document.querySelector("select[name='id_hub_kel']").value = id_hub_kel;

}
</script>

</body>
</html>