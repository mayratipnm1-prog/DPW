<?php

$uang    = 1387500;
$pecahan = array(100000, 50000, 20000, 10000, 5000, 2000, 500);

echo "<h2>Rincian Pecahan Uang Ani</h2>";
echo "Total uang : Rp. " . number_format($uang, 0, ',', '.') . "<br><br>";
echo "Rincian pecahan yang diterima:<br>";
echo "-------------------------------------------<br>";

$sisa = $uang;
foreach ($pecahan as $p) {
    $jumlah = (int)($sisa / $p);
    $sisa   = $sisa % $p;
    echo "Rp. " . number_format($p, 0, ',', '.') . "\t: " . $jumlah . " lembar/keping<br>";
}

echo "-------------------------------------------<br>";
echo "Sisa uang  : Rp. " . number_format($sisa, 0, ',', '.') . "<br>";
?>
