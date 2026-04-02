<?php
session_start();
include "koneksi.php";

$nip = $_POST['nip'] ?? $_GET['nip'] ?? '';

$query = mysqli_query($conn,"SELECT * FROM pegawai WHERE nip='$nip'");
$data = mysqli_fetch_assoc($query);

if(empty($nip)){
    die("NIP tidak ditemukan");
}


/* =========================
   TAMBAH RIWAYAT GOLONGAN
   ========================= */

   if(isset($_POST['tambah'])){

    $id_gol = $_POST['id_gol'];
    $tmt_golongan    = $_POST['tmt_golongan'];

    if(!empty($id_gol) && !empty($tmt_golongan)){

        $cek = mysqli_query($conn,"
        SELECT * FROM riwayat_golongan 
        WHERE nip='$nip'
        AND id_gol='$id_gol'
        AND tmt_golongan='$tmt_golongan'
        ");

        if(mysqli_num_rows($cek)==0){

            mysqli_query($conn,"
            INSERT INTO riwayat_golongan
            (
            nip,
            id_gol,
            tmt_golongan
            )
            VALUES
            (
            '$nip',
            '$id_gol',
            '$tmt_golongan'
            )
            ");

            header("Location: Admin_Edit_Riwayat_Golongan.php?nip=$nip");
            exit;
        }
    }
}
/* =========================
   UBAH RIWAYAT GOLONGAN
   ========================= */

   if(isset($_POST['ubah'])){

    $id     = $_POST['id_riwayat_gol'];
    $id_gol = $_POST['id_gol'];
    $tmt_golongan    = $_POST['tmt_golongan'];

    if(empty($id)){
        die("Pilih data dulu dari tabel");
    }

    if(!empty($id) && !empty($id_gol) && !empty($tmt_golongan)){

        mysqli_query($conn,"
        UPDATE riwayat_golongan
        SET
        id_gol='$id_gol',
        tmt_golongan='$tmt_golongan'
        WHERE id_riwayat_gol='$id'
        ");

        header("Location: Admin_Edit_Riwayat_Golongan.php?nip=$nip");
        exit;
    }
}
if(isset($_POST['hapus'])){

  $id = $_POST['id_riwayat_gol'];

  if(empty($id)){
    die("Pilih data dulu");
}
  
  mysqli_query($conn,"
  DELETE FROM riwayat_golongan
  WHERE id_riwayat_gol='$id'
  ");

  header("Location: Admin_Edit_Riwayat_Golongan.php?nip=$nip");
exit;
  
  }
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Data – Riwayat Golongan</title>
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

/* Sidebar default putih */
.sidebar-edit {
    color: white;
}

/* Paksa menu jadi biru */
.sidebar-edit .item-menu {
    display: block;
    padding: 8px 5px;
    font-weight: bold;
    text-align: center;
    cursor: pointer;

    color: #fff !important;   /* pakai ini kalau masih ketimpa */
    text-decoration: none;
}
/* Wrapper foto + form */
.bagian-identitas {
    display: flex;
    align-items: flex-start;
    gap: 60px;
    margin-top: 60px; /* supaya turun dari judul */
}

/* Hilangkan efek visited */
.sidebar-edit .item-menu:visited {
    color: #fff !important;
    text-decoration: none;
}

/* Aktif pakai underline */
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


<!-- KONTEN -->
<main class="konten">
    <h2>Riwayat Golongan</h2>
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
          <a href="#">Beranda</a>
          <a href="#">Keluar</a>
        </div>
      </div>
      <div class="tab-menu">
    <a href="identitas-pegawai.php" class="tab">Identitas</a>
    <a href="Admin_Edit_Riwayat_Golongan.php" class="tab aktif">Riwayat Golongan</a>
    <a href="Admin_Edit_Riwayat_Jabatan.php" class="tab">Riwayat Jabatan</a>
    <a href="Admin_Edit_Riwayat_Pendidikan.php" class="tab">Riwayat Pendidikan</a>
    <a href="Admin_Edit_Riwayat_Diklat.php" class="tab">Riwayat Diklat</a>
    <a href="Admin_Edit_Riwayat_Keluarga.php" class="tab">Riwayat Keluarga</a>
    <a href="Admin_Edit_Riwayat_Kehormatan.php" class="tab">Riwayat Kehormatan</a>
    <a href="Admin_Edit_Riwayat_SKP.php" class="tab">Riwayat SKP</a>
</div>
      <div class="bagian-identitas">
      <div class="form-edit">
        <form method="POST">
        <input type="hidden" name="nip" value="<?= $nip ?>">
        <input type="hidden" name="id_riwayat_gol" id="id_riwayat_gol">
        <div class="baris-form" style="grid-template-columns:120px 500px 120px">
        <label>Golongan Pangkat</label>

        <select name="id_gol" style="height:30px; border:1px solid #888;">

        <option value="">Pilih Golongan</option>

        <?php

        $qGol = mysqli_query($conn,"SELECT * FROM master_golongan ORDER BY kode_gol");

        while($g = mysqli_fetch_assoc($qGol)){

        echo "<option value='$g[id_gol]'>$g[kode_gol] - $g[nama_pangkat]</option>";

        }

        ?>

        </select>

        <button type="submit" name="tambah" class="tombol-tambah btn-kecil">
        TAMBAH
        </button>
        </div>


        <div class="baris-form" style="grid-template-columns:120px 500px 120px">

        <label>TMT</label>

        <input type="date" name="tmt_golongan">

        <div class="aksi-vertikal">
        <button type="submit" name="ubah" class="tombol-ubah btn-kecil">
        UBAH
        </button>
        <button type="submit" name="hapus" class="tombol-hapus btn-kecil">
          HAPUS
          </button>
        </div>

        </div>

        </form>


        <table class="tabel-riwayat" border="1" cellpadding="5">

        <thead>
        <tr>
        <th>Golongan Pangkat</th>
        <th>TMT</th>
        </tr>
        </thead>

        <tbody>
        <?php
          $data = mysqli_query($conn,"
          SELECT rg.*, mg.kode_gol, mg.nama_pangkat
          FROM riwayat_golongan rg
          JOIN master_golongan mg ON rg.id_gol = mg.id_gol
          WHERE rg.nip='$nip'
          ORDER BY rg.tmt_golongan DESC
          ");

          while($row = mysqli_fetch_assoc($data)){

            echo "<tr onclick=\"pilihData('".$row['id_riwayat_gol']."','".$row['id_gol']."','".$row['tmt_golongan']."')\">
            <td>".$row['kode_gol']." - ".$row['nama_pangkat']."</td>
            <td>".date('d-m-Y', strtotime($row['tmt_golongan']))."</td>
            </tr>";
            
            }

        ?>
        </tbody>
        </table>

        </div>

</main>
<script src="script.js"></script>

<script>
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

function pilihData(id,id_gol,tmt_golongan){

document.getElementById("id_riwayat_gol").value = id;
document.querySelector("select[name='id_gol']").value = id_gol;
document.querySelector("input[name='tmt_golongan']").value = tmt_golongan;

}
</script>

</body>
</html>