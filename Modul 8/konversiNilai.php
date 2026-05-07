<?php
function konversiNilai(int $nilai): string {
    if ($nilai < 0 || $nilai > 100) {
        return "Tidak valid";
    }

    if ($nilai >= 90) {
        return "A";
    } elseif ($nilai >= 80) {
        return "AB";
    } elseif ($nilai >= 70) {
        return "B";
    } elseif ($nilai >= 60) {
        return "BC";
    } else {
        return "C";
    }
}

$nilai = 85;
$hasil = konversiNilai($nilai);

echo "<h2>Konversi Nilai Angka ke Huruf</h2>";
echo "Nilai angka : " . $nilai . "<br>";
echo "Nilai huruf : " . $hasil . "<br><br>";

echo "<h3>Keterangan Golongan Nilai</h3>";
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr>";
echo "<th>Rentang Nilai</th>";
echo "<th>Nilai Huruf</th>";
echo "<th>Keterangan</th>";
echo "</tr>";

echo "<tr><td>90 - 100</td><td>A</td><td>Sangat Baik</td></tr>";
echo "<tr><td>80 - 89</td><td>AB</td><td>Baik</td></tr>";
echo "<tr><td>70 - 79</td><td>B</td><td>Cukup</td></tr>";
echo "<tr><td>60 - 69</td><td>BC</td><td>Kurang</td></tr>";
echo "<tr><td>0 - 59</td><td>C</td><td>Sangat Kurang</td></tr>";

echo "</table>";
?>