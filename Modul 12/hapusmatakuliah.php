<?php
require_once "database.php";
$db = new Database();
session_start();

if (isset($_GET["kode"])) {
    $kodeMK = trim($_GET["kode"]);

    if (!empty($kodeMK)) {
        $stmt = $db->con->prepare("DELETE FROM t_matakuliah WHERE kodeMK = ?");
        $stmt->bind_param("s", $kodeMK);

        try {
            if ($stmt->execute()) {
                $_SESSION['flash'] = ['type' => 'success', 'message' => 'Data mata kuliah berhasil dihapus!'];
            }
        } catch (mysqli_sql_exception $e) {
            $_SESSION['flash'] = ['type' => 'error', 'message' => 'Gagal menghapus data: ' . $e->getMessage()];
        }
        $stmt->close();
    } else {
        $_SESSION['flash'] = ['type' => 'error', 'message' => 'Kode MK tidak valid untuk dihapus!'];
    }
}

header("location:viewmatakuliah.php");
exit();
?>