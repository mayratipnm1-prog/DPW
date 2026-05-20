<?php
require_once "database.php";
$db = new Database();
session_start();

if (isset($_POST['tambah'])) {
    $kodeMK = isset($_POST['kodeMK']) ? trim($_POST['kodeMK']) : '';
    $namaMK = isset($_POST['namaMK']) ? trim($_POST['namaMK']) : '';
    $sks = isset($_POST['sks']) ? (int)$_POST['sks'] : 0;
    $jam = isset($_POST['jam']) ? (int)$_POST['jam'] : 0;

    if (empty($kodeMK)) {
        $_SESSION['flash'] = ['type' => 'error', 'message' => 'Kode MK tidak boleh kosong!'];
    } else {
        $check = $db->con->prepare("SELECT kodeMK FROM t_matakuliah WHERE kodeMK = ?");
        $check->bind_param("s", $kodeMK);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            $_SESSION['flash'] = ['type' => 'error', 'message' => 'Kode MK sudah terdaftar!'];
            $check->close();
        } else {
            $check->close();
            $stmt = $db->con->prepare("INSERT INTO t_matakuliah (kodeMK, namaMK, sks, jam) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssii", $kodeMK, $namaMK, $sks, $jam);

            try {
                if ($stmt->execute()) {
                    $_SESSION['flash'] = ['type' => 'success', 'message' => 'Data mata kuliah berhasil ditambahkan!'];
                }
            } catch (mysqli_sql_exception $e) {
                $_SESSION['flash'] = ['type' => 'error', 'message' => 'Gagal menambah data: ' . $e->getMessage()];
            }
            $stmt->close();
        }
    }
}

header("Location: viewmatakuliah.php");
exit();
?>