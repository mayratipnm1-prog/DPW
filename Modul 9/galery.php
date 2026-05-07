<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Galeri Gambar</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background: #f0f0f0; }
        h2   { text-align: center; margin-bottom: 20px; }
        .galeri {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
            justify-content: center;
        }
        .item {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 8px;
            text-align: center;
            width: 160px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .item img {
            width: 100%;
            height: 120px;
            object-fit: cover;
            border-radius: 4px;
        }
        .item p {
            font-size: 11px;
            margin-top: 6px;
            color: #555;
            word-break: break-all;
        }
        .kosong { text-align: center; color: #888; margin-top: 40px; }
        .back   { display: block; text-align: center; margin-bottom: 20px; }
    </style>
</head>
<body>
    <h2>🖼️ Galeri Gambar</h2>
    <a class="back" href="upload_gambar.php">← Upload Gambar Baru</a>

    <div class="galeri">
    <?php

    $fileList = glob(pattern: 'gambar/*');

    $ada_gambar = false;

    foreach ($fileList as $filename) {
        if (is_file($filename)) {
            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                $ada_gambar = true;
                $namaFile   = htmlspecialchars(basename($filename));
                echo '<div class="item">';
                echo '  <img src="' . htmlspecialchars($filename) . '" alt="' . $namaFile . '">';
                echo '  <p>' . $namaFile . '</p>';
                echo '</div>';
            }
        }
    }

    if (!$ada_gambar) {
        echo '<p class="kosong">Belum ada gambar di folder. Silakan upload terlebih dahulu.</p>';
    }
    ?>
    </div>
</body>
</html>