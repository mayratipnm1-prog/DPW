<?php
require_once "database.php";
$db = new Database();
session_start();

if (isset($_POST['ubah'])) {
    $idDosen = $_POST['idDosen'];
    $namaDosen = $_POST['namaDosen'];
    $noHP = $_POST['noHP'];

    $stmt = $db->con->prepare("UPDATE t_dosen SET namaDosen = ?, noHP = ? WHERE idDosen = ?");
    $stmt->bind_param("ssi", $namaDosen, $noHP, $idDosen);

    if ($stmt->execute()) {
        $_SESSION['flash'] = ['type' => 'success', 'message' => 'Data dosen berhasil diperbarui!'];
    } else {
        $_SESSION['flash'] = ['type' => 'error', 'message' => 'Gagal memperbarui data: ' . $stmt->error];
    }
    $stmt->close();
}

header("Location: viewdosen.php");
exit();
?>