<?php
$angka = 7; 

echo "<h2>Konversi Angka ke Terbilang</h2>";
echo "Angka : " . $angka . "<br>";
echo "Terbilang : ";

switch ($angka) {
    case 1:
        echo "satu";
        break;
    case 2:
        echo "dua";
        break;
    case 3:
        echo "tiga";
        break;
    case 4:
        echo "empat";
        break;
    case 5:
        echo "lima";
        break;
    case 6:
        echo "enam";
        break;
    case 7:
        echo "tujuh";
        break;
    case 8:
        echo "delapan";
        break;
    case 9:
        echo "sembilan";
        break;
    default:
        echo "angka tidak valid! (hanya 1-9)";
}

echo "<br>";
echo "Jenis angka : ";

if ($angka >= 1 && $angka <= 9) {
    if ($angka % 2 == 0) {
        echo "Genap";
    } else {
        echo "Ganjil";
    }
} else {
    echo "-";
}

echo "<br><br>";
echo "<h3>Tabel Referensi Angka</h3>";
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>Angka</th><th>Terbilang</th></tr>";

for ($i = 1; $i <= 9; $i++) {
    echo "<tr>";
    echo "<td>$i</td>";
    
    switch ($i) {
        case 1: echo "<td>satu</td>"; break;
        case 2: echo "<td>dua</td>"; break;
        case 3: echo "<td>tiga</td>"; break;
        case 4: echo "<td>empat</td>"; break;
        case 5: echo "<td>lima</td>"; break;
        case 6: echo "<td>enam</td>"; break;
        case 7: echo "<td>tujuh</td>"; break;
        case 8: echo "<td>delapan</td>"; break;
        case 9: echo "<td>sembilan</td>"; break;
    }

    echo "</tr>";
}

echo "</table>";
?>