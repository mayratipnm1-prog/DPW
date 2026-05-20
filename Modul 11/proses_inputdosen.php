<?php
session_start(); // TAMBAHAN: untuk flash message
include 'koneksi.php';

if (isset($_POST['input'])) {
    $namaDosen = mysqli_real_escape_string($link, $_POST['namaDosen']);
    $noHP = mysqli_real_escape_string($link, $_POST['noHP']);
    
    $query = "INSERT INTO t_dosen (idDosen, namaDosen, noHP) VALUES (NULL, '$namaDosen', '$noHP')";
    $result = mysqli_query($link, $query);
    
    if (!$result) {
        $_SESSION['flash'] = ['type' => 'error', 'message' => 'Gagal menambah data: ' . mysqli_error($link)];
    } else {
        $_SESSION['flash'] = ['type' => 'success', 'message' => 'Data dosen berhasil ditambahkan!'];
    }
    
    header("Location: viewdosen.php");
    exit();
}
?>