<?php

$siswa = array(
    array("no" => 1, "poin" => 75, "nama" => "Adi"),
    array("no" => 2, "poin" => 80, "nama" => "Joni"),
    array("no" => 3, "poin" => 65, "nama" => "Jihan"),
    array("no" => 4, "poin" => 70, "nama" => "Aya"),
    array("no" => 5, "poin" => 85, "nama" => "Ita"),
    array("no" => 6, "poin" => 90, "nama" => "Budi"),
    array("no" => 7, "poin" => 95, "nama" => "Tini"),
    array("no" => 8, "poin" => 65, "nama" => "Sari"),
);

echo "<h2>Data Nilai Kelas</h2>";

echo "<b>a) Poin siswa nomor urut 5:</b><br>";
echo "Nama : " . $siswa[4]['nama'] . "<br>";
echo "Poin : " . $siswa[4]['poin'] . "<br><br>";

echo "<b>b) Siswa dengan poin 90:</b><br>";
$ada_b = false;
foreach ($siswa as $s) {
    if ($s['poin'] == 90) {
        echo "- " . $s['nama'] . "<br>";
        $ada_b = true;
    }
}
if (!$ada_b) {
    echo "Tidak ada<br>";
}
echo "<br>";

echo "<b>c) Siswa dengan poin 100:</b><br>";
$ada_c = false;
foreach ($siswa as $s) {
    if ($s['poin'] == 100) {
        echo "- " . $s['nama'] . "<br>";
        $ada_c = true;
    }
}
if (!$ada_c) {
    echo "Tidak ada<br>";
}
?>
