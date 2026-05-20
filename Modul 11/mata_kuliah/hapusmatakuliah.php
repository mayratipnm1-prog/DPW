<?php
session_start();
include "koneksi.php";

if (isset($_GET["kodeMK"])) {
    $kodeMK = mysqli_real_escape_string($link, $_GET["kodeMK"]);
    $query = "DELETE FROM t_matakuliah WHERE kodeMK = '$kodeMK'";
    $hasil_query = mysqli_query($link, $query);
    
    if (!$hasil_query) {
        $_SESSION['flash'] = ['type' => 'error', 'message' => 'Gagal menghapus: ' . mysqli_error($link)];
    } else {
        $_SESSION['flash'] = ['type' => 'success', 'message' => "Mata kuliah $kodeMK berhasil dihapus!"];
    }
}

header("location:viewmatakuliah.php");
exit();
?>