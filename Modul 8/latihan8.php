<?php

$array = array(
    "1A" => array("misel", "gita", "dinda"),
    "1B" => array("putri", "alya", "novi")
);

echo "<h3>1. Struktur Seluruh Data</h3>";
echo "<b>Semua data array:</b><br><pre>";
print_r($array);
echo "</pre>";

echo "<h3>2. Data Spesifik Kelas</h3>";
echo "<b>Data kelas 1B:</b><br><pre>";
print_r($array['1B']);
echo "</pre>";

echo "<h3>3. Akses Data Individu (Indeks)</h3>";
echo "<b>Kelas 1A index 0:</b> " . $array['1A'][0] . "<br>";
echo "<b>Tampilkan gita (1A index 1):</b> " . $array['1A'][1] . "<br>";
echo "<b>Tampilkan novi (1B index 2):</b> " . $array['1B'][2] . "<br>";

echo "<h3>4. Penulisan Short Syntax []</h3>";
$array_simple = [
    "1A" => ["misel", "gita", "dinda"],
    "1B" => ["putri", "alya", "novi"]
];

echo "<b>Array simple (short syntax):</b><br><pre>";
print_r($array_simple);
echo "</pre>";

?>