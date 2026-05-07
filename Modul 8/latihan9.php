<?php

echo "<h3>Contoh Funtion pada PHP</h3>";

function tampilkanPesan($nama) {
    echo "Haii $nama! Selamat datang di halaman ini ;) <br>";
}

tampilkanPesan("Mayraa");

echo "<br>";

function hitungPenjumlahan(int $angka1, int $angka2) {
    return $angka1 + $angka2;
}

$hasil = hitungPenjumlahan(77,90);

echo "Hasil penjumlahan: $hasil";

?>