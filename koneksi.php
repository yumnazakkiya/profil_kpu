<?php
$conn = mysqli_connect("localhost", "root", "root", "profil_kepegawaian");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>