<?php
include 'koneksi.php';

if(isset($_POST['tambah'])) {

    $nama = $_POST['nama'];
    $nip = $_POST['nip'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $tmt_cpns = $_POST['tmt_cpns'];
    $tmt_pns = $_POST['tmt_pns'];
    $id_agama = $_POST['id_agama'];
    $id_unit_kerja = $_POST['id_unit_kerja'];
    $id_gol = $_POST['id_gol'];
    $id_jenis_kelamin = $_POST['id_jenis_kelamin'];
    $id_status_perkawinan = $_POST['id_status_perkawinan'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $tipe_karyawan = $_POST['tipe_karyawan'];
    $instansi = $_POST['instansi'];

    $tahun_skp = $_POST['tahun_skp'];
    $rerata_nilai = $_POST['rerata_nilai'];
    $id_predikat_skp = $_POST['id_predikat_skp'];

    $tahun_diklat = $_POST['tahun_diklat']; 
    $id_jenis_diklat = $_POST['id_jenis_diklat'];
    $nama_diklat = $_POST['nama_diklat'];

    $nama_penghargaan = $_POST['nama_penghargaan'];
    $tahun_penghargaan = $_POST['tahun_penghargaan'];

    $id_jenjang_pend = $_POST['id_jenjang_pend'];
    $institusi = $_POST['institusi'];
    $tahun_lulus = $_POST['tahun_lulus'];

    $nama_keluarga = $_POST['nama_keluarga'];
    $id_hub_kel = $_POST['id_hub_kel'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];

    $id_jabatan = $_POST['id_jabatan'];
    $tmt_jabatan = $_POST['tmt_jabatan'];

    $tmt_golongan = $_POST['tmt_golongan'];
      
   /* INSERT PEGAWAI */

mysqli_query($conn,"INSERT INTO pegawai
(nip,nama_pegawai,tempat_lahir,tanggal_lahir,alamat,no_telp,tmt_cpns,tmt_pns,tipe_karyawan,instansi,id_agama,id_unit_kerja,id_gol,id_jenis_kelamin,id_status_perkawinan)
VALUES
('$nip','$nama','$tempat_lahir','$tanggal_lahir','$alamat','$no_telp','$tmt_cpns','$tmt_pns','$tipe_karyawan','$institusi','$id_agama','$id_unit_kerja','$id_gol','$id_jenis_kelamin','$id_status_perkawinan')");

/* INSERT RIWAYAT SKP */

mysqli_query($conn,"INSERT INTO riwayat_skp
(nip,id_predikat_skp,rerata_nilai,tahun)
VALUES
('$nip','$id_predikat_skp','$rerata_nilai','$tahun_skp')");

/* INSERT RIWAYAT PENDIDIKAN */

mysqli_query($conn,"INSERT INTO riwayat_pendidikan
(nip,id_jenjang_pend,institusi,tahun_lulus)
VALUES
('$nip','$id_jenjang_pend','$institusi','$tahun_lulus')");

/* INSERT RIWAYAT DIKLAT */

mysqli_query($conn,"INSERT INTO riwayat_diklat
(nip,id_jenis_diklat,nama_diklat,tahun)
VALUES
('$nip','$id_jenis_diklat','$nama_diklat','$tahun_diklat')");

/* INSERT RIWAYAT KEHORMATAN */

mysqli_query($conn,"INSERT INTO riwayat_kehormatan
(nip,nama_penghargaan,tahun)
VALUES
('$nip','$nama_penghargaan','$tahun_penghargaan')");

/* INSERT RIWAYAT KELUARGA */
if(!empty($nama_keluarga)){
mysqli_query($conn,"INSERT INTO riwayat_keluarga
(nip,nama_keluarga,id_hub_kel,no_telp,alamat)
VALUES
('$nip','$nama_keluarga','$id_hub_kel', '$no_telp','$alamat')");
}

/* INSERT RIWAYAT JABATAN */

mysqli_query($conn,"INSERT INTO riwayat_jabatan
(nip,id_jabatan,id_unit_kerja,tmt_jabatan)
VALUES
('$nip','$id_jabatan','$id_unit_kerja','$tmt_jabatan')");

/* INSERT RIWAYAT GOLONGAN */

mysqli_query($conn,"INSERT INTO riwayat_golongan
(nip,id_gol,tmt_golongan)
VALUES
('$nip','$id_gol','$tmt_golongan')");

    echo "<script>
alert('Data berhasil ditambahkan');
window.location='Admin_Profil_Data_Pegawai.php';
</script>";
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manage Jenis Kelamin</title>
    <link rel="stylesheet" href="style.css">
    <style>
       

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

<!-- SIDEBAR -->
<aside class="sidebar" id="sidebar">
      <div class="logo">
        <span>LOGO</span>
        <button class="tombol-menu" id="tombolMenu">✕</button>
      </div>

      <hr class="garis-menu" />

      <a href="Admin_Profil_Data_Pegawai.php" class="item-menu">
        Profil Data Pegawai
      </a>

      <hr class="garis-menu" />

      <a href="Admin_Tambah_Data.php" class="item-menu aktif">
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
      <a href="Admin_Manajemen_Akun.html" class="item-menu">
        Manajemen Akun
    </a>

    <hr class="garis-menu">
    </aside>


<!-- KONTEN -->
<main class="konten">

    <h2>Tambah Data Pegawai</h2>
    <p style="margin-top:-10px; margin-bottom:30px;">Identitas</p>

    <!-- PROFIL USER -->
    <div class="user-profile" id="userProfile">
        <div class="user-info">
            <div class="user-icon">👤</div>
            <div class="user-text">
                <div class="user-name">TU SEKRETARIS KPU</div>
            </div>
        </div>

        <div class="dropdown-menu">
            <a href="Admin_Profil_Data_Pegawai.html">Beranda</a>
            <a href="#">Keluar</a>
        </div>
    </div>

    <!-- FORM TAMBAH DATA -->
     <form method="POST">
<div class="pembungkus-form">

        <!-- FOTO -->
        <div class="kotak-foto">
            <div class="pratinjau-foto"></div>
            <button class="tombol-unggah">UNGGAH FOTO</button>
        </div>

        <!-- FORM UTAMA -->
        <div class="form">

            <div class="baris-form">
                <label>Nama</label>
                <input type="text" name="nama">
            </div>

            <div class="baris-form">
                <label>NIP</label>
                <input type="text" name="nip">
            </div>

            

            <div class="baris-form">
                <label>TMT CPNS</label>
                <input type="date" name="tmt_cpns">
            </div>

            <div class="baris-form">
                <label>TMT PNS</label>
                <input type="date" name="tmt_pns">
            </div>

            <div class="baris-form">
                <label>Tempat & Tanggal Lahir</label>
                <input type="text" name="tempat_lahir">
                <input type="date" name="tanggal_lahir">
            </div>

            <div class="baris-form">
                <label>Jenis Kelamin</label>
                <!-- <select>
                    <option>-- Pilih --</option>
                </select> -->
                <select name="id_jenis_kelamin">

<option value="">-- Pilih Jenis Kelamin --</option>

<?php
$jk = mysqli_query($conn,"SELECT * FROM master_jenis_kelamin");
while($j = mysqli_fetch_assoc($jk)){
?>

<option value="<?= $j['id_jenis_kelamin']; ?>">
<?= $j['jenis_kelamin']; ?>
</option>

<?php } ?>

</select>
            </div>

            <div class="baris-form">
                <label>Agama</label>
                <!-- <select>
                    <option>-- Pilih --</option>
                </select> -->
                <select name="id_agama">
  <option value="">-- Pilih Agama --</option>

  <?php
  $agama = mysqli_query($conn, "SELECT * FROM master_agama");
  while($a = mysqli_fetch_assoc($agama)) {
  ?>
    <option value="<?= $a['id_agama']; ?>">
      <?= $a['agama']; ?>
    </option>
  <?php } ?>
</select>
            </div>

            <div class="baris-form">
                <label>Status Perkawinan</label>
                <!-- <select>
                    <option>-- Pilih --</option>
                </select> -->
                <select name="id_status_perkawinan">

<option value="">-- Pilih Status --</option>

<?php
$status = mysqli_query($conn,"SELECT * FROM master_status_perkawinan");
while($s = mysqli_fetch_assoc($status)){
?>

<option value="<?= $s['id_status_perkawinan']; ?>">
<?= $s['status_perkawinan']; ?>
</option>

<?php } ?>

</select>
            </div>

            <div class="baris-form">
                <label>Unit Kerja</label>
                
                <select name="id_unit_kerja">
  <option value="">-- Pilih Unit --</option>

  <?php
  $unit = mysqli_query($conn, "SELECT * FROM master_divisi");
  while($u = mysqli_fetch_assoc($unit)) {
  ?>
    <option value="<?= $u['id_unit_kerja']; ?>">
      <?= $u['unit_kerja']; ?>
    </option>
  <?php } ?>
</select>
            </div>

            <div class="baris-form">
                <label>Instansi</label>
                <input type="text" name="instansi">
            </div>

            <div class="baris-form">
                <label>Tipe Karyawan</label>
                <input type="text" name="tipe_karyawan" placeholder="Contoh: PNS, CPNS, PPP3, dll">
            </div>

            <div class="baris-form">
                <label>No Telepon</label>
                <input type="text" name="no_telp">
            </div>

            <div class="baris-form">
                <label>Alamat Rumah</label>
                <input type="text" name="alamat">
            </div>

        </div>
    </div>

    <!-- ============================= -->
    <!-- RIWAYAT GOLONGAN -->
    <!-- ============================= -->

    <h3 style="margin-top:60px;">Riwayat Golongan</h3>

    <div class="form">
        <div class="baris-form">
            <label>Golongan Pangkat</label>
            <!-- <select>
                <option>-- Pilih --</option>
            </select> -->
            <select name="id_gol">
             <option value="">-- Pilih Golongan --</option>

            <?php
            $gol = mysqli_query($conn, "SELECT * FROM master_golongan");
            while($g = mysqli_fetch_assoc($gol)) {
            ?>
            <option value="<?= $g['id_gol']; ?>">
            <?= $g['nama_pangkat']; ?> (<?= $g['kode_gol']; ?>)
            </option>
            <?php } ?>

            </select>
        </div>

        <div class="baris-form">
            <label>TMT</label>
            <input type="date" name="tmt_golongan">
        </div>
    </div>

    <!-- RIWAYAT JABATAN -->

    <h3 style="margin-top:40px;">Riwayat Jabatan</h3>

<div class="form">

<div class="baris-form">

<label>Jabatan</label>

<select name="id_jabatan">

<option value="">-- Pilih Jabatan --</option>

<?php
$jabatan = mysqli_query($conn,"SELECT * FROM master_jabatan");
while($j = mysqli_fetch_assoc($jabatan)){
?>

<option value="<?= $j['id_jabatan']; ?>">
<?= $j['nama_jabatan']; ?>
</option>

<?php } ?>

</select>

</div>

<div class="baris-form">

<label>TMT</label>

<input type="date" name="tmt_jabatan">

</div>

</div>

    <!-- RIWAYAT PENDIDIKAN -->
    <h3 style="margin-top:40px;">Riwayat Pendidikan</h3>

    <div class="form">

<div class="baris-form">

<label>Jenjang Pendidikan</label>

<select name="id_jenjang_pend">

<option value="">-- Pilih Jenjang --</option>

<?php
$pend = mysqli_query($conn,"SELECT * FROM master_jenjang_pend");
while($p = mysqli_fetch_assoc($pend)){
?>

<option value="<?= $p['id_jenjang_pend']; ?>">
<?= $p['jenjang_pend']; ?>
</option>

<?php } ?>

</select>

</div>

<div class="baris-form">
<label>Institusi</label>
<input type="text" name="institusi">
</div>

<div class="baris-form">

<label>TMT</label>

<input type="number" name="tahun_lulus">

</div>

</div>

    <!-- RIWAYAT DIKLAT -->
    <h3 style="margin-top:40px;">Riwayat Diklat</h3>

    <div class="form">

<div class="baris-form">
<label>Nama Diklat</label>

<select name="id_jenis_diklat">

<option value="">-- Pilih Diklat --</option>

<?php
$diklat = mysqli_query($conn,"SELECT * FROM master_diklat");
while($d = mysqli_fetch_assoc($diklat)){
?>

<option value="<?= $d['id_jenis_diklat']; ?>">
<?= $d['jenis_diklat']; ?>
</option>

<?php } ?>

</select>

</div>

<div class="baris-form">
<label>Nama Diklat</label>
<input type="text" name="nama_diklat">
</div>

<div class="baris-form">
<label>Tahun</label>
<input type="number" name="tahun_diklat">
</div>

</div>

    <!-- RIWAYAT KELUARGA -->
   <h3 style="margin-top:40px;">Riwayat Keterangan Keluarga</h3>

<div class="form">

<div class="baris-form">
<label>Nama</label>
<input type="text" name="nama_keluarga">
</div>

<div class="baris-form">
<label>Hubungan Keluarga</label>

<select name="id_hub_kel">

<option value="">-- Pilih Hubungan --</option>

<?php
$hub = mysqli_query($conn,"SELECT * FROM master_hub_kel");
while($h = mysqli_fetch_assoc($hub)){
?>

<option value="<?= $h['id_hub_kel']; ?>">
<?= $h['hub_kel']; ?>
</option>

<?php } ?>

</select>

</div>

<div class="baris-form">
<label>No. Telepon</label>
<input type="number" name="no_telp">
</div>

<div class="baris-form">
<label>Alamat</label>
<input type="text" name="alamat">
</div>

</div>

    <!-- RIWAYAT TANDA JASA -->
    <h3 style="margin-top:40px;">Riwayat Tanda Jasa/Kehormatan</h3>

   <div class="form">

<div class="baris-form">
<label>Nama Penghargaan</label>
<input type="text" name="nama_penghargaan" placeholder="Masukkan nama penghargaan">
</div>

<div class="baris-form">
<label>Tahun</label>
<input type="number" name="tahun_penghargaan" placeholder="Contoh: 2022">
</div>

</div>

    <!-- RIWAYAT SKP -->
    <h3 style="margin-top:40px;">Riwayat SKP</h3>

    <div class="form">

<div class="baris-form">
<label>Tahun</label>
<input type="number" name="tahun_skp">
</div>

<div class="baris-form">
<label>Rata-Rata</label>
<input type="number" step="0.01" name="rerata_nilai">
</div>

<div class="baris-form">
<label>Predikat</label>

<select name="id_predikat_skp">

<option value="">-- Pilih Predikat --</option>

<?php
$predikat = mysqli_query($conn,"SELECT * FROM master_predikat_skp");
while($p = mysqli_fetch_assoc($predikat)){
?>

<option value="<?= $p['id_predikat_skp']; ?>">
<?= $p['predikat_skp']; ?>
</option>

<?php } ?>

</select>

</div>

</div>

    <!-- TOMBOL TAMBAH -->
    <div class="aksi-form" style="margin-top:50px;"> 
        <button type="submit" name="tambah" class="tombol-tambah">TAMBAH</button>   </div>
</form>
</main>

<!-- <script src="script.js"></script> -->
 <script src="core-ui.js"></script>
  <script src="datamaster.js"></script>
  <script src="admin-ui.js"></script>

  <!-- <script>
      // Dropdown User Profile
      const userProfile = document.getElementById("userProfile");

      if (userProfile) {
        userProfile.addEventListener("click", function () {
          userProfile.classList.toggle("active");
        });

        // Tutup jika klik luar
        document.addEventListener("click", function (e) {
          if (!userProfile.contains(e.target)) {
            userProfile.classList.remove("active");
          }
        });
      }
    </script> -->


 
</body>
</html>
