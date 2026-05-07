<?php
date_default_timezone_set("Asia/Jakarta");

$nama = "Mayraruhand";
echo "Haii, $nama!<br>";

$jam = date("H");
echo "<p>Sekarang ini pukul : " . date("H:i:s") . "<br><br><p>";

echo "<h3>Waktu Sekarang</h3>";


if ($jam >= 5 && $jam < 10) {
    echo "Selamat pagi, semoga harimu menyenangkan";

} elseif ($jam >= 10 && $jam < 15) {
    echo "Selamat siang, jangan lupa ya untuk istirahat dan makan";

} elseif ($jam >= 15 && $jam < 18) {
    echo "Selamat sore, jagasenyummu";

} else {
    echo "Selamat malam, waktunya beristirahat";
}

echo "<br><br>";

echo "<b>Info lainnya :</b><br>";

if ($jam < 12) {
    echo "Sekarang masih pagi menuju siang.";
} else {
    echo "Sekarang sudah masuk waktu siang ke malam.";
}
?>