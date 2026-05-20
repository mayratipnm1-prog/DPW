<?php
require_once "database.php";
$db = new Database();
session_start();

if (isset($_GET["id"])) {
    $idDosen = (int)$_GET["id"];

    $stmt = $db->con->prepare("DELETE FROM t_dosen WHERE idDosen = ?");
    $stmt->bind_param("i", $idDosen);

    if ($stmt->execute()) {
        $_SESSION['flash'] = ['type' => 'success', 'message' => 'Data dosen berhasil dihapus!'];
    } else {
        $_SESSION['flash'] = ['type' => 'error', 'message' => 'Gagal menghapus data: ' . $stmt->error];
    }
    $stmt->close();
}

header("location:viewdosen.php");
exit();
?>