<?php
session_start(); 
include("koneksi.php");

if (isset($_POST['edit'])) {
    $id = mysqli_real_escape_string($link, $_POST['idDosen']);
    $namaDosen = mysqli_real_escape_string($link, $_POST['namaDosen']);
    $noHP = mysqli_real_escape_string($link, $_POST['noHP']);
    
    $query = "UPDATE t_dosen SET namaDosen = '$namaDosen', noHP = '$noHP' WHERE idDosen = '$id'";
    $result = mysqli_query($link, $query);
    
    if (!$result) {
        $_SESSION['flash'] = ['type' => 'error', 'message' => 'Gagal mengupdate: ' . mysqli_error($link)];
    } else {
        $_SESSION['flash'] = ['type' => 'success', 'message' => "Data dosen ID $id berhasil diperbarui!"];
    }
    
    header("location:viewdosen.php");
    exit();
}
?>