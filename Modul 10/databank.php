<?php
require_once ('kelas/akunBank.php');

$data1 = new akunBank(nomorAkun: "001", nominal: 10000);
$data1->setNama("Arinda Mardianti");

$data2 = new akunBank(nomorAkun: "002", nominal: 10000);
$data2->setNama("Mendysia Anggita Putri");

$log1 = [];
$log1[] = ['keterangan' => 'Saldo awal',       'nominal' => $data1->tampilUang(), 'type' => 'saldo'];
$data1->tambahUang(15000);
$log1[] = ['keterangan' => 'Setor tunai',       'nominal' => '+Rp 15.000',         'type' => 'plus'];
$log1[] = ['keterangan' => 'Saldo setelah setor','nominal' => $data1->tampilUang(),'type' => 'saldo'];
$data1->kurangUang(8000);
$log1[] = ['keterangan' => 'Penarikan',         'nominal' => '-Rp 8.000',          'type' => 'minus'];
$log1[] = ['keterangan' => 'Saldo akhir',        'nominal' => $data1->tampilUang(), 'type' => 'bold'];
$log1[] = ['keterangan' => 'Pajak (11%)',        'nominal' => $data1->hitungPajak(),'type' => 'tax'];

$log2 = [];
$log2[] = ['keterangan' => 'Saldo awal',        'nominal' => $data2->tampilUang(), 'type' => 'saldo'];
$data2->tambahUang(50000);
$log2[] = ['keterangan' => 'Setor tunai',        'nominal' => '+Rp 50.000',         'type' => 'plus'];
$log2[] = ['keterangan' => 'Saldo setelah setor','nominal' => $data2->tampilUang(), 'type' => 'saldo'];
$result = $data2->kurangUang(70000); // sengaja melebihi saldo
$log2[] = ['keterangan' => 'Penarikan (gagal)',  'nominal' => $result,              'type' => 'error'];
$log2[] = ['keterangan' => 'Saldo akhir',        'nominal' => $data2->tampilUang(), 'type' => 'bold'];
$log2[] = ['keterangan' => 'Pajak (11%)',        'nominal' => $data2->hitungPajak(),'type' => 'tax'];

$akuns = [
    ['obj' => $data1, 'log' => $log1],
    ['obj' => $data2, 'log' => $log2],
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Praktikum 10 — Akun Bank</title>
  <?php include 'style.php'; ?>
</head>
<body>

<div class="page-header">
  <p class="breadcrumb">Praktikum 10 / <span>OOP PHP — Classes &amp; Objects</span></p>
  <h1>Akun Bank</h1>
  <p>Demonstrasi constructor, getter/setter, serta method operasi saldo dan pajak.</p>
</div>

<div class="container">
  <div class="grid-2">
    <?php foreach ($akuns as $item):
      $o = $item['obj']; ?>
    <div class="card">
      <div class="card-header">
        <h3><?= htmlspecialchars($o->getNama()) ?></h3>
        <span class="tag">No. <?= htmlspecialchars($o->getNomorAkun()) ?></span>
      </div>
      <div class="card-body" style="padding:0">
        <table class="data-table">
          <thead>
            <tr><th>Keterangan</th><th>Nominal</th></tr>
          </thead>
          <tbody>
            <?php foreach ($item['log'] as $row):
              $cls = match($row['type']) {
                'plus'  => 'tx-plus',
                'minus' => 'tx-minus',
                'tax'   => 'tx-tax',
                'bold'  => 'tx-bold',
                'error' => '',
                default => '',
              };
            ?>
            <tr class="<?= $cls ?>">
              <td><?= htmlspecialchars($row['keterangan']) ?></td>
              <td>
                <?php if ($row['type'] === 'error'): ?>
                  <span class="badge badge-red"><?= htmlspecialchars($row['nominal']) ?></span>
                <?php else: ?>
                  <?= htmlspecialchars($row['nominal']) ?>
                <?php endif; ?>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
    <?php endforeach; ?>
  </div>

  <div class="note-box" style="margin-top:1rem">
    <h4>Catatan</h4>
    <p>
      Class <code>akunBank</code> menggunakan <strong>constructor</strong> untuk menginisialisasi
      <code>$accountNumber</code> dan <code>$jmlUang</code> saat objek dibuat.
      Method <code>kurangUang()</code> dilengkapi pengecekan agar saldo tidak sampai minus.
      Pajak dihitung dengan rumus: <code>$jmlUang &times; 0.11</code>.
    </p>
  </div>
</div>
</body>
</html>