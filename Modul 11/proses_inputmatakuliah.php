<?php
session_start();
include 'koneksi.php';

if (isset($_POST['input'])) {
    $kodeMK = mysqli_real_escape_string($link, $_POST['kodeMK']);
    $namaMK = mysqli_real_escape_string($link, $_POST['namaMK']);
    $sks = (int)$_POST['sks'];
    $jam = (int)$_POST['jam'];
    
    $query = "INSERT INTO t_matakuliah (kodeMK, namaMK, sks, jam) VALUES ('$kodeMK', '$namaMK', $sks, $jam)";
    $result = mysqli_query($link, $query);
    
    if (!$result) {
        $_SESSION['flash'] = ['type' => 'error', 'message' => 'Gagal menambah data: ' . mysqli_error($link)];
    } else {
        $_SESSION['flash'] = ['type' => 'success', 'message' => 'Mata kuliah berhasil ditambahkan!'];
    }
    
    header("Location: ./viewmatakuliah.php");
    exit();
}
?>