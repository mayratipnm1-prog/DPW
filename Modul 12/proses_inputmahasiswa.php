<?php
require_once "database.php";
$db = new Database();
session_start();

if (isset($_POST['tambah'])) {
    $npm = $_POST['npm'];
    $namaMhs = $_POST['namaMhs'];
    $prodi = $_POST['prodi'];
    $alamat = $_POST['alamat'];
    $noHP = $_POST['noHP'];

    $stmt = $db->con->prepare("INSERT INTO t_mahasiswa (npm, namaMhs, prodi, alamat, noHP) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $npm, $namaMhs, $prodi, $alamat, $noHP);

    if ($stmt->execute()) {
        $_SESSION['flash'] = ['type' => 'success', 'message' => 'Data mahasiswa berhasil ditambahkan!'];
    } else {
        $_SESSION['flash'] = ['type' => 'error', 'message' => 'Gagal menambah data: ' . $stmt->error];
    }
    $stmt->close();
}

header("Location: viewmahasiswa.php");
exit();
?>