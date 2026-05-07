<?php

echo "<h2>Bilangan: Ganjil atau Genap</h2>";
echo "<p>Mengecek status setiap angka dalam daftar:</p>";

$angka = array(7, 24, 55, 88, 121, 500, 777, 1024, 9999, 123456);

foreach ($angka as $nilai) {
    if ($nilai % 2 == 0) {
        echo "Angka <b>" . $nilai . "</b> termasuk golongan: <span style='color: green;'>GENAP</span><br>";
    } else {
        echo "Angka <b>" . $nilai . "</b> termasuk golongan: <span style='color: blue;'>GANJIL</span><br>";
    }

    echo "<div style='border-bottom: 1px dashed #ccc; width: 250px; margin: 5px 0;'></div>";
}
?>