<?php include 'koneksi.php'; ?>

<?php
$query = mysqli_query($conn, "SELECT * FROM pegawai");

while($data = mysqli_fetch_assoc($query)) {
    echo "<p>" . $data['nama'] . "</p>";
}
?>