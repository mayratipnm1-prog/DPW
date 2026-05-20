<?php
session_start();
include("koneksi.php");

if (isset($_POST['edit'])) {
    $kodeMK = mysqli_real_escape_string($link, $_POST['kodeMK']);
    $namaMK = mysqli_real_escape_string($link, $_POST['namaMK']);
    $sks = (int)$_POST['sks'];
    $jam = (int)$_POST['jam'];
    
    $query = "UPDATE t_matakuliah SET namaMK = '$namaMK', sks = $sks, jam = $jam WHERE kodeMK = '$kodeMK'";
    $result = mysqli_query($link, $query);
    
    if (!$result) {
        $_SESSION['flash'] = ['type' => 'error', 'message' => 'Gagal mengupdate: ' . mysqli_error($link)];
    } else {
        $_SESSION['flash'] = ['type' => 'success', 'message' => "Mata kuliah $kodeMK berhasil diperbarui!"];
    }
    
    header("location:viewmatakuliah.php");
    exit();
}
?>