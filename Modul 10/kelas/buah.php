<?php

class buah
{
    public    $nama;
    protected $warna;
    private   $berat;

    public function setWarna($warna) { $this->warna = $warna; }
    public function getWarna()       { return $this->warna; }

    public function setBerat($berat) { $this->berat = $berat; }
    public function getBerat()       { return $this->berat; }
}

$mango = new buah();
$mango->nama = 'Mango';
$mango->setWarna('Yellow'); 
$mango->setBerat('300');    

$properti = [
    ['nama' => '$nama',  'modifier' => 'public',    'nilai' => $mango->nama,         'akses' => 'Langsung', 'badge' => 'badge-green'],
    ['nama' => '$warna', 'modifier' => 'protected', 'nilai' => $mango->getWarna(),   'akses' => 'Setter/Getter', 'badge' => 'badge-amber'],
    ['nama' => '$berat', 'modifier' => 'private',   'nilai' => $mango->getBerat().' gram', 'akses' => 'Setter/Getter', 'badge' => 'badge-red'],
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Praktikum 10 — buah.php</title>
  <?php include '../style.php'; ?>
</head>
<body>

<div class="page-header">
  <p class="breadcrumb">Praktikum 10 / <span>OOP PHP — Access Modifier (Properti)</span></p>
  <h1>buah.php — Analisis Error</h1>
  <p>Mengamati dan memperbaiki error yang disebabkan oleh access modifier pada properti.</p>
</div>

<div class="container">

  <div class="card" style="margin-bottom:1rem">
    <div class="card-header">
      <h3>Hasil Setelah Diperbaiki</h3>
      <span class="tag">Object: $mango</span>
    </div>
    <div class="card-body" style="padding:0">
      <table class="data-table">
        <thead>
          <tr><th>Properti</th><th>Modifier</th><th>Nilai</th><th>Cara Akses</th></tr>
        </thead>
        <tbody>
          <?php foreach ($properti as $p): ?>
          <tr>
            <td><code><?= $p['nama'] ?></code></td>
            <td><span class="badge <?= $p['badge'] ?>"><?= $p['modifier'] ?></span></td>
            <td><?= htmlspecialchars($p['nilai']) ?></td>
            <td style="font-size:12px;color:var(--muted)"><?= $p['akses'] ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

  <div class="note-box error">
    <h4>Penyebab Error (Kode Asli)</h4>
    <p>
      <code>$mango->warna = 'Yellow'</code> — Error: <code>$warna</code> bersifat
      <strong>protected</strong>, tidak dapat diakses langsung dari luar class.<br><br>
      <code>$mango->buah = '300'</code> — Error: nama properti salah (<code>$buah</code>
      tidak ada, yang benar <code>$berat</code>), dan <code>$berat</code> bersifat
      <strong>private</strong> sehingga tetap tidak bisa diakses langsung dari luar.
    </p>
  </div>

  <div class="note-box ok" style="margin-top:.75rem">
    <h4>Perbaikan</h4>
    <p>
      Tambahkan method <code>public</code> setter dan getter untuk setiap properti yang
      bukan <code>public</code>. Akses properti dari luar class harus melalui method tersebut,
      bukan secara langsung. Ini merupakan penerapan prinsip <strong>enkapsulasi</strong> dalam OOP.
    </p>
  </div>

</div>
</body>
</html>