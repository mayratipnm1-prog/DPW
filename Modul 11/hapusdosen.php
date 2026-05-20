<?php
session_start(); 
include "koneksi.php";

if (isset($_GET["idDosen"])) {
    $idDosen = $_GET["idDosen"];
    $query = "DELETE FROM t_dosen WHERE idDosen = '$idDosen'";
    $hasil_query = mysqli_query($link, $query);
    
    if (!$hasil_query) {
        $_SESSION['flash'] = ['type' => 'error', 'message' => 'Gagal menghapus: ' . mysqli_error($link)];
    } else {
        $_SESSION['flash'] = ['type' => 'success', 'message' => "Data dosen ID $idDosen berhasil dihapus!"];
    }
}

header("location:viewdosen.php");
exit();
?>