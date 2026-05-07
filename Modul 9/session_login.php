<?php
session_start();

$akun_valid = [
    "admin"     => ["password" => "admin123", "nama" => "Administrator"],
    "mahasiswa" => ["password" => "mhs2025",  "nama" => "Mahasiswa Aktif"],
    "dosen"     => ["password" => "dosen999", "nama" => "Dosen Pengampu"],
];

function bersihkan_input($d) { return htmlspecialchars(stripslashes(trim($d))); }

if (isset($_GET["logout"])) { session_unset(); session_destroy(); header("Location: session_login.php"); exit; }

$username = $nameErr = $passErr = $exception_msg = $exception_type = "";
$sudahLogin = isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true;

if (!$sudahLogin && $_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        if (empty($_POST["username"])) { $nameErr = "Username wajib diisi."; }
        if (empty($_POST["password"])) { $passErr = "Password wajib diisi."; }
        if ($nameErr || $passErr) throw new InvalidArgumentException("Harap lengkapi semua field login.");

        $username = bersihkan_input($_POST["username"]);
        $password = bersihkan_input($_POST["password"]);

        if (!preg_match("/^[a-zA-Z0-9_]{3,20}$/", $username)) throw new InvalidArgumentException("Format username tidak valid.");
        if (strlen($password) < 6) throw new LengthException("Password minimal 6 karakter.");
        if (!array_key_exists($username, $akun_valid)) throw new RuntimeException("Username tidak ditemukan.");
        if ($akun_valid[$username]["password"] !== $password) throw new RuntimeException("Password salah.");

        $_SESSION["logged_in"]  = true;
        $_SESSION["username"]   = $username;
        $_SESSION["nama"]       = $akun_valid[$username]["nama"];
        $_SESSION["login_time"] = date("d-m-Y H:i:s");

        header("Location: session_login.php"); exit;

    } catch (InvalidArgumentException $e) {  $exception_msg = $e->getMessage();
    } catch (LengthException $e)          {  $exception_msg = $e->getMessage();
    } catch (RuntimeException $e)         {  $exception_msg = $e->getMessage();
    } catch (Exception $e)                {  $exception_msg = $e->getMessage(); }
}
$sudahLogin = isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] === true;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login dengan Session</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f0f2f5; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .card { background: #fff; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); width: 100%; max-width: 350px; }
        h2 { text-align: center; color: #1c1e21; margin-bottom: 1.5rem; }
        label { display: block; margin-bottom: 5px; font-size: 14px; color: #606770; }
        input { width: 100%; padding: 10px; margin-bottom: 5px; border: 1px solid #dddfe2; border-radius: 6px; box-sizing: border-box; }
        .btn { width: 100%; padding: 10px; border: none; border-radius: 6px; font-weight: bold; cursor: pointer; font-size: 16px; background: #007bff; color: white; margin-top: 10px; }
        .btn-red { background: #dc3545; }
        .error { color: #fa3e3e; font-size: 12px; display: block; margin-bottom: 8px; }
        .alert { background: #ffebe8; border: 1px solid #dd3c10; color: #dd3c10; padding: 10px; border-radius: 4px; font-size: 13px; margin-bottom: 15px; }
        .info  { background: #f0f2f5; border-radius: 6px; padding: 10px; font-size: 13px; color: #444; margin-top: 15px; line-height: 1.8; }
        .success-msg { color: #28a745; font-weight: bold; margin-bottom: 10px; }
        code { background: #e4e6eb; padding: 1px 6px; border-radius: 4px; font-size: 12px; }
    </style>
</head>
<body>
<div class="card">
<?php if ($sudahLogin): ?>
    <h2>Dashboard</h2>
    <p class="success-msg">Selamat datang, <?= htmlspecialchars($_SESSION["nama"]) ?>!</p>
    <p style="font-size:13px;color:#606770;line-height:2">
        👤 Username   : <strong><?= htmlspecialchars($_SESSION["username"]) ?></strong><br>
        🕐 Login pada : <?= $_SESSION["login_time"] ?><br></code>
    </p>
    <a href="?logout=1"><button class="btn btn-red" style="margin-top:15px">Logout</button></a>

<?php else: ?>
    <h2>Login dengan Session</h2>
    <?php if ($exception_msg): ?>
    <div class="alert"><strong><?= htmlspecialchars($exception_type) ?>:</strong> <?= htmlspecialchars($exception_msg) ?></div>
    <?php endif; ?>
    <form method="POST">
        <label>Username</label>
        <input type="text" name="username" value="<?= htmlspecialchars($username) ?>" placeholder="Masukkan username">
        <span class="error"><?= $nameErr ?></span>
        <label>Password</label>
        <input type="password" name="password" placeholder="Masukkan password">
        <span class="error"><?= $passErr ?></span>
        <button type="submit" class="btn">Login</button>
    </form>
    <div class="info">
        <strong>Akun uji coba:</strong><br>
        👤 <code>admin</code> / <code>admin123</code><br>
        👤 <code>mahasiswa</code> / <code>mhs2025</code><br>
        👤 <code>dosen</code> / <code>dosen999</code>
    </div>
<?php endif; ?>
</div>
</body>
</html>