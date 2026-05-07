<?php

$data = array(
    array("nama" => "Muhammad Faizal Mirsya Al Gibran", "umur" => 21),
    array("nama" => "Ayu Dhia Khansa", "umur" => 20),
    array("nama" => "Fadhiel Fauzi Firoos", "umur" => 24),
    array("nama" => "Krismalia Chelin Cesyanti", "umur" => 22),
    array("nama" => "Bintang Nur Aini", "umur" => 19),
    array("nama" => "Izaz Putra Aguel Oktandio", "umur" => 23),
    array("nama" => "Ummi Fatikhkhurrokhmah", "umur" => 18),
    array("nama" => "Abelgis", "umur" => 25),
    array("nama" => "Arinda Mardianti", "umur" => 20),
    array("nama" => "Tanzilal Azizi Rahim", "umur" => 22),
    array("nama" => "Dinda Aulia", "umur" => 19),
    array("nama" => "Mendysia Anggita Putri", "umur" => 21),
    array("nama" => "Mayra Ruhandini", "umur" => 24),
    array("nama" => "Haki Eko Saputra", "umur" => 20),
    array("nama" => "Angga Dwi Saputro", "umur" => 21),
    array("nama" => "Ayla Nur Ramadhani", "umur" => 23),
    array("nama" => "Adrian Yuanto", "umur" => 19),
    array("nama" => "Hanifa Khoirunnisa'", "umur" => 22),
    array("nama" => "Elga Nur Rizki", "umur" => 20),
    array("nama" => "Reva Adinta Nasyiah", "umur" => 21)
);

$json = json_encode($data, JSON_PRETTY_PRINT);

$jumlah    = count($data);
$totalUmur = array_sum(array_column($data, "umur"));
$rataUmur  = round($totalUmur / $jumlah, 1);
$minUmur   = min(array_column($data, "umur"));
$maxUmur   = max(array_column($data, "umur"));
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>JSON Data - Modul 9</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f0f2f5; min-height: 100vh; display: flex; justify-content: center; align-items: flex-start; padding: 40px 20px; }
        .card { background: #fff; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); width: 100%; max-width: 680px; }
        h2 { text-align: center; color: #1c1e21; margin-bottom: 1.5rem; font-size: 20px; }
        h3 { font-size: 14px; color: #606770; margin: 18px 0 8px; text-transform: uppercase; letter-spacing: 0.5px; }
        pre { background: #f0f2f5; border-radius: 6px; padding: 14px; font-size: 12.5px; overflow-x: auto; line-height: 1.7; color: #1c1e21; border: 1px solid #dddfe2; }
        table { width: 100%; border-collapse: collapse; font-size: 14px; }
        thead th { background: #007bff; color: #fff; padding: 9px 12px; text-align: left; }
        thead th:first-child { border-radius: 6px 0 0 0; }
        thead th:last-child  { border-radius: 0 6px 0 0; }
        tbody td { padding: 8px 12px; border-bottom: 1px solid #f0f2f5; color: #1c1e21; }
        tbody tr:last-child td { border-bottom: none; }
        tbody tr:hover { background: #f7f8fa; }
        .stats { display: flex; gap: 10px; margin-bottom: 6px; }
        .stat  { flex: 1; background: #f0f2f5; border-radius: 8px; padding: 12px; text-align: center; }
        .stat .val { font-size: 22px; font-weight: bold; color: #007bff; }
        .stat .lbl { font-size: 11px; color: #606770; margin-top: 2px; }
        .divider { border: none; border-top: 1px solid #dddfe2; margin: 18px 0; }
    </style>
</head>
<body>
<div class="card">
    <h2>Data Array Nama &amp; Umur</h2>

    <hr class="divider">

    <h3>Data dalam Format Array</h3>
    <table>
        <thead><tr><th>No</th><th>Nama</th><th>Umur</th></tr></thead>
        <tbody>
        <?php foreach ($data as $i => $row): ?>
            <tr>
                <td><?= $i + 1 ?></td>
                <td><?= htmlspecialchars($row["nama"]) ?></td>
                <td><?= $row["umur"] ?> tahun</td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <hr class="divider">

    <h3>Output print_r()</h3>
    <pre><?php print_r($data); ?></pre>

    <hr class="divider">

    <h3>Data dalam Format JSON</h3>
    <pre><?= htmlspecialchars($json) ?></pre>

</div>
</body>
</html>