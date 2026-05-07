<?php

echo "<h3>1. Hitung Mundur (While Loop)</h3>";
$x = 10;
while ($x >= 5) {
    echo "Nomor : " . $x . "<br>";
    $x--;
}

echo "<h3>2. Hitung Maju (Do While)</h3>";
$x = 1;
do {
    echo "Nomor : $x <br>";
    $x++;
} while ($x <= 5);


echo "<h3>3. Daftar Warna (Foreach)</h3>";
$colors = array("red", "green", "blue", "yellow");
foreach ($colors as $value) {
    echo "$value <br>";
}

echo "<h3>4. Hitung Maju 0-10 (For Loop)</h3>";
for ($x = 0; $x <= 10; $x++) {
    echo "Nomor : " . $x . "<br>";
}

echo "<h3>5. Perulangan dengan Break di Angka 4 (For Loop)</h3>";
for ($x = 0; $x < 10; $x++) {
    if ($x == 4) {
        break;
    }
    echo "Nomor : $x <br>";
}
?>