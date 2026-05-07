<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cookies - Identitas</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 500px; margin: 40px auto; padding: 20px; }
        input[type="text"], input[type="email"] { width: 100%; padding: 6px; margin-top: 4px; box-sizing: border-box; }
        input[type="submit"] { padding: 8px 20px; margin-top: 12px; cursor: pointer;
                               background:#28a745; color:#fff; border:none; border-radius:4px; }
        .info { background:#e8f5e9; border:1px solid #a5d6a7; padding:12px; border-radius:4px; margin-bottom:16px; }
        label { font-weight: bold; display: block; margin-top: 10px; }
        .hapus { color: red; font-size:13px; }
    </style>
</head>
<body>
<h2>Cookies - Simpan Identitas</h2>

<?php

$nama  = "";
$email = "";
$nim   = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["hapus"])) {
        setcookie("user_nama",  "", time() - 3600, "/");
        setcookie("user_email", "", time() - 3600, "/");
        setcookie("user_nim",   "", time() - 3600, "/");
        echo '<p style="color:red">Cookie berhasil dihapus. <a href="">Refresh</a></p>';
    } else {
        $nama  = htmlspecialchars(trim($_POST["nama"]));
        $email = htmlspecialchars(trim($_POST["email"]));
        $nim   = htmlspecialchars(trim($_POST["nim"]));

        setcookie("user_nama",  $nama,  time() + (86400 * 7), "/");
        setcookie("user_email", $email, time() + (86400 * 7), "/");
        setcookie("user_nim",   $nim,   time() + (86400 * 7), "/");

        echo '<p style="color:green"> Identitas berhasil disimpan ke Cookie (7 hari).</p>';
    }
}

if (isset($_COOKIE["user_nama"])) {
    $nama  = $_COOKIE["user_nama"];
    $email = $_COOKIE["user_email"] ?? "";
    $nim   = $_COOKIE["user_nim"]   ?? "";

    echo '<div class="info">';
    echo '<strong>Data dari Cookie:</strong><br>';
    echo 'NIM   : ' . htmlspecialchars($nim)   . '<br>';
    echo 'Nama  : ' . htmlspecialchars($nama)  . '<br>';
    echo 'Email : ' . htmlspecialchars($email) . '<br>';
    echo 'Cookie kadaluarsa dalam 7 hari sejak disimpan.';
    echo '</div>';
}
?>

<form method="POST">
    <label>NIM:</label>
    <input type="text" name="nim" value="<?= htmlspecialchars($nim) ?>">

    <label>Nama:</label>
    <input type="text" name="nama" value="<?= htmlspecialchars($nama) ?>">

    <label>Email:</label>
    <input type="email" name="email" value="<?= htmlspecialchars($email) ?>">

    <input type="submit" value="Simpan ke Cookie">
</form>

<br>
<form method="POST">
    <input type="hidden" name="hapus" value="1">
    <input type="submit" value="Hapus Cookie" style="background:#dc3545;color:#fff;border:none;padding:8px 16px;border-radius:4px;cursor:pointer;">
</form>
</body>
</html>
