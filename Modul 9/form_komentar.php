<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Komentar</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 500px; margin: 40px auto; padding: 20px; }
        label { display: block; margin-top: 10px; }
        input[type="text"], input[type="email"], textarea { width: 100%; padding: 6px; box-sizing: border-box; }
        input[type="submit"], input[type="reset"] { margin-top: 10px; padding: 6px 16px; cursor: pointer; }
        .hasil { background: #f0f8ff; border: 1px solid #ccc; padding: 12px; margin-top: 20px; border-radius: 4px; }
    </style>
</head>
<body>

<?php

$name    = "";
$email   = "";
$comment = "";

function bersihkan_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = bersihkan_input($_POST["name"]);
    $email   = bersihkan_input($_POST["email"]);
    $comment = bersihkan_input($_POST["comment"]);

    echo '<div class="hasil">';
    echo "Nama :" . $name . "<br>";
    echo "Email :" . $email . "<br>";
    echo "Komentar :" . $comment . "<br>";
    echo "<hr>";
    echo '</div>';
}
?>

<h2>Form Komentar</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label>Nama:</label>
    <input type="text" name="name"><br>

    <label>E-mail:</label>
    <input type="email" name="email"><br>

    <label>Komentar:</label>
    <textarea name="comment" rows="5" cols="40"></textarea><br>

    <input type="submit" value="simpan">
    <input type="reset" value="bersihkan">
</form>
</body>
</html>