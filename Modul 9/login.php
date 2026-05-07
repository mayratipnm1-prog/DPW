<?php
function bersihkan_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$nameErr = $passErr = "";
$name = $pass = "";
$loginSuccess = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["u"])) {
        $nameErr = "masukkan username";
    } else {
        $name = bersihkan_input($_POST["u"]);
    }
    if (empty($_POST["p"])) {
        $passErr = "masukkan password";
    } else {
        $pass = bersihkan_input($_POST["p"]);
    }

    if (empty($nameErr) && empty($passErr)) {
        $loginSuccess = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f0f2f5; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .card { background: #fff; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); width: 100%; max-width: 350px; }
        h2 { text-align: center; color: #1c1e21; margin-bottom: 1.5rem; }
        label { display: block; margin-bottom: 5px; font-size: 14px; color: #606770; }
        input[type="text"], input[type="password"] { width: 100%; padding: 10px; margin-bottom: 5px; border: 1px solid #dddfe2; border-radius: 6px; box-sizing: border-box; }
        .btn { width: 100%; padding: 10px; border: none; border-radius: 6px; font-weight: bold; cursor: pointer; font-size: 16px; background: #007bff; color: white; margin-top: 10px; }
        .error { color: #fa3e3e; font-size: 12px; display: block; margin-bottom: 8px; }
        .success { color: #28a745; font-weight: bold; text-align: center; margin-bottom: 15px; }
    </style>
</head>
<body>
<div class="card">
    <h2>Login</h2>

    <?php if ($loginSuccess): ?>
        <p class="success">Login berhasil! Selamat datang, <?= $name ?></p>
    <?php endif; ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label>Username</label>
        <input type="text" name="u" value="<?= htmlspecialchars($name) ?>">
        <span class="error">* <?php echo $nameErr; ?></span>

        <label>Password</label>
        <input type="password" name="p">
        <span class="error">* <?php echo $passErr; ?></span>

        <button type="submit" class="btn">Login</button>
    </form>
</div>
</body>
</html>