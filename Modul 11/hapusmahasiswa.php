<?php
session_start();
include "koneksi.php";

if (isset($_GET["npm"])) {
    $npm = mysqli_real_escape_string($link, $_GET["npm"]);
    $query = "DELETE FROM t_mahasiswa WHERE npm = '$npm'";
    $hasil_query = mysqli_query($link, $query);
    
    if (!$hasil_query) {
        $_SESSION['flash'] = ['type' => 'error', 'message' => 'Gagal menghapus: ' . mysqli_error($link)];
    } else {
        $_SESSION['flash'] = ['type' => 'success', 'message' => "Data mahasiswa $npm berhasil dihapus!"];
    }
}

header("location:viewmahasiswa.php");
exit();
?>