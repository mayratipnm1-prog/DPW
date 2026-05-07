<?php

$namaBuah = array("Nanas", "Mangga", "Jeruk", "Apel", "Melon", "Manggis");
echo "saya suka " . $namaBuah[0] . ", " . $namaBuah[4] . " dan " . $namaBuah[2] . ".<br>";

echo "saya suka " . $namaBuah[1] . "<br>";
echo "saya suka " . $namaBuah[2] . "<br>";
echo "saya suka " . $namaBuah[3] . "<br>";
echo "saya suka " . $namaBuah[4] . "<br>";

echo "<br>";

$umur = array("mayra" => "25 Tahun", "arin" => "23 Tahun", "ayu" => "19 Tahun");
$umur['arin'] = "23 Tahun";
echo "Umur ayu adalah " . $umur['ayu'] . "<br>";

foreach ($umur as $nama => $usia) {
    echo "Umur " . $nama . " adalah " . $usia . "<br>";
}

?>
