<?php
require_once "database.php";
$db = new Database();
session_start();

if (isset($_POST['ubah'])) {
    $npm = $_POST['npm'];
    $namaMhs = $_POST['namaMhs'];
    $prodi = $_POST['prodi'];
    $alamat = $_POST['alamat'];
    $noHP = $_POST['noHP'];

    $stmt = $db->con->prepare("UPDATE t_mahasiswa SET namaMhs = ?, prodi = ?, alamat = ?, noHP = ? WHERE npm = ?");
    $stmt->bind_param("sssss", $namaMhs, $prodi, $alamat, $noHP, $npm);

    if ($stmt->execute()) {
        $_SESSION['flash'] = ['type' => 'success', 'message' => 'Data mahasiswa berhasil diperbarui!'];
    } else {
        $_SESSION['flash'] = ['type' => 'error', 'message' => 'Gagal memperbarui data: ' . $stmt->error];
    }
    $stmt->close();
}

header("Location: viewmahasiswa.php");
exit();
?>