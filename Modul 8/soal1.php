<?php

$gaji_pokok   = 3250000;
$tunjangan    = 1200000;
$gaji_kotor   = $gaji_pokok + $tunjangan;
$persen_pajak = 10 / 100;
$pajak        = $persen_pajak * $gaji_kotor;
$gaji_bersih  = $gaji_kotor - $pajak;

echo "<h2>Perhitungan Gaji Bersih Obi</h2>";
echo "Gaji Pokok      : Rp. " . number_format($gaji_pokok,  0, ',', '.') . "<br>";
echo "Tunjangan       : Rp. " . number_format($tunjangan,   0, ',', '.') . "<br>";
echo "Gaji Kotor      : Rp. " . number_format($gaji_kotor,  0, ',', '.') . "<br>";
echo "Pajak (10%)     : Rp. " . number_format($pajak,       0, ',', '.') . "<br>";
echo "-------------------------------------------<br>";
echo "<strong>Gaji Bersih : Rp. " . number_format($gaji_bersih, 0, ',', '.') . "</strong><br>";
?>
