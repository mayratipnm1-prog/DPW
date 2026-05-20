<?php
require_once "database.php";
$db = new Database();
session_start();

if (isset($_GET["npm"])) {
    $npm = $_GET["npm"];

    $stmt = $db->con->prepare("DELETE FROM t_mahasiswa WHERE npm = ?");
    $stmt->bind_param("s", $npm);

    if ($stmt->execute()) {
        $_SESSION['flash'] = ['type' => 'success', 'message' => 'Data mahasiswa berhasil dihapus!'];
    } else {
        $_SESSION['flash'] = ['type' => 'error', 'message' => 'Gagal menghapus data: ' . $stmt->error];
    }
    $stmt->close();
}

header("location:viewmahasiswa.php");
exit();
?>