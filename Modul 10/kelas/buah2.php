<?php

class buah2
{
    public $nama;
    public $warna;
    public $berat;

    public function set_name($n)   { $this->nama  = $n; }

    public function set_color($n)  { $this->warna = $n; }

    public function set_weight($n) { $this->berat = $n; }
}

$mango = new buah2();
$mango->set_name('Mango');
$mango->set_color('Yellow');
$mango->set_weight('300');

$methods = [
    ['method' => 'set_name()',   'asli' => 'public (tidak berubah)',  'badge' => 'badge-green', 'status' => 'Tidak perlu diubah'],
    ['method' => 'set_color()',  'asli' => 'protected → public',      'badge' => 'badge-amber', 'status' => 'Diperbaiki'],
    ['method' => 'set_weight()', 'asli' => 'private → public',        'badge' => 'badge-red',   'status' => 'Diperbaiki'],
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Praktikum 10 — buah2.php</title>
  <?php include '../style.php'; ?>
</head>
<body>

<div class="page-header">
  <p class="breadcrumb">Praktikum 10 / <span>OOP PHP — Access Modifier (Method)</span></p>
  <h1>buah2.php — Analisis Error</h1>
  <p>Mengamati dan memperbaiki error yang disebabkan oleh access modifier pada method.</p>
</div>

<div class="container">

  <div class="card" style="margin-bottom:1rem">
    <div class="card-header">
      <h3>Status Method Setelah Diperbaiki</h3>
      <span class="tag">Object: $mango</span>
    </div>
    <div class="card-body" style="padding:0">
      <table class="data-table">
        <thead>
          <tr><th>Method</th><th>Modifier (Perubahan)</th><th>Status</th></tr>
        </thead>
        <tbody>
          <?php foreach ($methods as $m): ?>
          <tr>
            <td><code><?= $m['method'] ?></code></td>
            <td><span class="badge <?= $m['badge'] ?>"><?= $m['asli'] ?></span></td>
            <td style="font-size:13px"><?= $m['status'] ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

  <div class="card" style="margin-bottom:1rem">
    <div class="card-header">
      <h3>Nilai Properti $mango</h3>
    </div>
    <div class="card-body" style="padding:0">
      <table class="data-table">
        <tr><td>$nama</td><td><strong><?= htmlspecialchars($mango->nama) ?></strong></td></tr>
        <tr><td>$warna</td><td><?= htmlspecialchars($mango->warna) ?></td></tr>
        <tr><td>$berat</td><td><?= htmlspecialchars($mango->berat) ?> gram</td></tr>
      </table>
    </div>
  </div>

  <div class="note-box error">
    <h4>Penyebab Error (Kode Asli)</h4>
    <p>
      <code>$mango->set_color()</code> — Error: method bersifat <strong>protected</strong>,
      tidak dapat dipanggil dari luar class.<br><br>
      <code>$mango->set_weight()</code> — Error: method bersifat <strong>private</strong>,
      hanya bisa diakses dari dalam class itu sendiri.
    </p>
  </div>

  <div class="note-box ok" style="margin-top:.75rem">
    <h4>Kesimpulan</h4>
    <p>
      Access modifier (<code>public</code>, <code>protected</code>, <code>private</code>)
      berlaku pada <strong>method</strong> sama persis seperti pada properti. Method yang
      ingin dipanggil dari luar class wajib bersifat <code>public</code>.
    </p>
  </div>

</div>
</body>
</html>