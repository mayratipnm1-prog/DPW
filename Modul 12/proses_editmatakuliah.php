<?php
require_once "database.php";
$db = new Database();
session_start();

if (isset($_POST['ubah'])) {
    $kodeMK = isset($_POST['kodeMK']) ? trim($_POST['kodeMK']) : '';
    $namaMK = isset($_POST['namaMK']) ? trim($_POST['namaMK']) : '';
    $sks = isset($_POST['sks']) ? (int)$_POST['sks'] : 0;
    $jam = isset($_POST['jam']) ? (int)$_POST['jam'] : 0;

    if (empty($kodeMK)) {
        $_SESSION['flash'] = ['type' => 'error', 'message' => 'Kode MK tidak valid untuk update!'];
    } else {
        $stmt = $db->con->prepare("UPDATE t_matakuliah SET namaMK = ?, sks = ?, jam = ? WHERE kodeMK = ?");
        $stmt->bind_param("siis", $namaMK, $sks, $jam, $kodeMK);

        try {
            if ($stmt->execute()) {
                $_SESSION['flash'] = ['type' => 'success', 'message' => 'Data mata kuliah berhasil diperbarui!'];
            }
        } catch (mysqli_sql_exception $e) {
            $_SESSION['flash'] = ['type' => 'error', 'message' => 'Gagal memperbarui data: ' . $e->getMessage()];
        }
        $stmt->close();
    }
}

header("Location: viewmatakuliah.php");
exit();
?>