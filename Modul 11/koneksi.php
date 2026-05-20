<?php
// Deklarasi variabel koneksi
$host = "localhost";
$user = "root";
$paswd = ""; // Kosongkan jika password XAMPP default tidak ada
$name = "db_praktik"; // Menggunakan database yang sudah dibuat sebelumnya

// Proses koneksi ke database
$link = mysqli_connect($host, $user, $paswd, $name);

// Periksa koneksi, hentikan program jika gagal
if (!$link) {
    die("Koneksi dengan database gagal: " . mysqli_connect_errno() . " - " . mysqli_connect_error());
}
?>