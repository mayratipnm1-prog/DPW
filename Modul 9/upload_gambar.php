<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload File</title>
    <meta name="description" content="Belajar PHP">
    <meta name="keywords"   content="253307003">
    <meta name="author"     content="Mayra Ruhandini">
    <style>
        body { font-family: Arial, sans-serif; max-width: 500px; margin: 40px auto; padding: 20px; }
        .pesan-sukses { color: green; font-weight: bold; }
        .pesan-error  { color: red; }
        input[type="submit"] { padding: 8px 20px; cursor: pointer; background:#007bff; color:#fff; border:none; border-radius:4px; }
    </style>
</head>
<body>

<?php
if (isset($_POST["submit"])) {

    if ($_FILES["gambar"]["error"] === UPLOAD_ERR_NO_FILE) {
        echo '<p class="pesan-error">Maaf, Anda belum memilih file.</p>';
    } else {

        $target_dir  = "gambar/";
        $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
        $uploadOk    = 1;
        $tipeGambar  = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["gambar"]["tmp_name"]);
        if ($check !== false) {
            echo "File berupa gambar - " . $check["mime"] . ".<br>";
            $uploadOk = 1;
        } else {
            echo '<p class="pesan-error">File bukan gambar.</p>';
            $uploadOk = 0;
        }

        if (file_exists($target_file)) {
            echo '<p class="pesan-error">Maaf, file anda sudah tersedia di galeri.</p>';
            $uploadOk = 0;
        }

        if ($_FILES["gambar"]["size"] > 50000000) {
            echo '<p class="pesan-error">Maaf, ukuran file anda terlalu besar.</p>';
            $uploadOk = 0;
        }

        if ($tipeGambar != "jpg" && $tipeGambar != "png" && $tipeGambar != "gif" && $tipeGambar != "jpeg") {
            echo '<p class="pesan-error">Maaf, hanya file JPG, JPEG, PNG & GIF.</p>';
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo '<p class="pesan-error">File anda gagal upload.</p>';
        } else {
            if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                echo '<p class="pesan-sukses">File ' . htmlspecialchars(basename($_FILES["gambar"]["name"])) . ' berhasil Upload.</p>';
            } else {
                echo '<p class="pesan-error">Ada kesalahan saat upload.</p>';
            }
        }
    }
}
?>

<h2>Upload Gambar</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
      method="post" enctype="multipart/form-data">
    <p><label>Pilih Gambar yang akan di upload:</label><br>
        <input type="file" name="gambar" id="gambar1"></p>
    <input type="submit" value="Upload Image" name="submit">
</form>

<br>
<a href="galery.php">🖼️ Lihat Galeri</a>

</body>
</html>
