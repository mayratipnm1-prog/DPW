<?php
require_once "database.php";
$db = new Database();
session_start();

if (isset($_POST['tambah'])) {
    $namaDosen = $_POST['namaDosen'];
    $noHP = $_POST['noHP'];

    $stmt = $db->con->prepare("INSERT INTO t_dosen (namaDosen, noHP) VALUES (?, ?)");
    $stmt->bind_param("ss", $namaDosen, $noHP);

    if ($stmt->execute()) {
        $_SESSION['flash'] = ['type' => 'success', 'message' => 'Data dosen berhasil ditambahkan!'];
    } else {
        $_SESSION['flash'] = ['type' => 'error', 'message' => 'Gagal menambah data: ' . $stmt->error];
    }
    $stmt->close();
}

header("Location: viewdosen.php");
exit();
?>