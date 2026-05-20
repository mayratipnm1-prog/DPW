<?php
session_start();
include("koneksi.php");

if (isset($_POST['edit'])) {
    $npm = mysqli_real_escape_string($link, $_POST['npm']);
    $namaMhs = mysqli_real_escape_string($link, $_POST['namaMhs']);
    $prodi = mysqli_real_escape_string($link, $_POST['prodi']);
    $alamat = mysqli_real_escape_string($link, $_POST['alamat']);
    $noHP = mysqli_real_escape_string($link, $_POST['noHP']);
    
    $query = "UPDATE t_mahasiswa SET namaMhs = '$namaMhs', prodi = '$prodi', alamat = '$alamat', noHP = '$noHP' WHERE npm = '$npm'";
    $result = mysqli_query($link, $query);
    
    if (!$result) {
        $_SESSION['flash'] = ['type' => 'error', 'message' => 'Gagal mengupdate: ' . mysqli_error($link)];
    } else {
        $_SESSION['flash'] = ['type' => 'success', 'message' => "Data mahasiswa $npm berhasil diperbarui!"];
    }
    
    header("location:viewmahasiswa.php");
    exit();
}
?>