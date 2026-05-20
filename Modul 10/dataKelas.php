<?php
require_once ('kelas/Mahasiswa.php');

$mhs1 = new mahasiswa(nama: "Mayra Ruhandini");   
$mhs1->setNIM("253307003");                 
$mhs1->setJurusan("Teknologi Informasi");
$mhs1->setKelas("TI - 2A");
$mhs1->setUmur(20);

$mhs2 = new mahasiswa(nama: "Mendysia Anggita Putri");
$mhs2->setNIM("253307004");
$mhs2->setJurusan("Teknologgi Informasi");
$mhs2->setKelas("TI - 2A");
$mhs2->setUmur(19);

$mhs3 = new mahasiswa(nama: "Reva Adinta Nasyiah");
$mhs3->setNIM("253307010");
$mhs3->setJurusan("Teknologi Informasi");
$mhs3->setKelas("TI - 2A");
$mhs3->setUmur(19);

$daftar = [$mhs1, $mhs2, $mhs3];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Praktikum 10 — Data Kelas</title>
  <?php include 'style.php'; ?>
</head>
<body>

<div class="page-header">
  <p class="breadcrumb">Praktikum 10 / <span>OOP PHP — Inheritance</span></p>
  <h1>Data Kelas Mahasiswa</h1>
  <p>Class <code>mahasiswa</code> merupakan turunan (extends) dari class <code>Manusia</code>.</p>
</div>

<div class="container">

  <div class="card" style="margin-bottom:1rem">
    <div class="card-header">
      <h3>Daftar Mahasiswa</h3>
      <span class="tag">class mahasiswa extends Manusia</span>
    </div>
    <div class="card-body" style="padding:0">
      <table class="data-table">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>NIK (warisan)</th>
            <th>Jurusan</th>
            <th>Kelas</th>
            <th>Umur</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($daftar as $i => $m): ?>
          <tr>
            <td style="color:var(--muted)"><?= $i + 1 ?></td>
            <td><strong><?= htmlspecialchars($m->getNama()) ?></strong></td>
            <td><span class="badge badge-blue"><?= htmlspecialchars($m->getNIM()) ?></span></td>
            <td style="font-size:12px;color:var(--muted)"><?= $m->getNIK() ?></td>
            <td><?= htmlspecialchars($m->getJurusan()) ?></td>
            <td><?= htmlspecialchars($m->getKelas()) ?></td>
            <td><?= htmlspecialchars($m->getUmur()) ?> th</td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

  <div class="note-box">
    <h4>Konsep Inheritance</h4>
    <p>
      Class <code>mahasiswa</code> mewarisi semua properti dan method dari class <code>Manusia</code>
      (<code>$name</code>, <code>$nik</code>, <code>$umur</code>, beserta getter/setter-nya).
      Constructor <code>mahasiswa</code> memanggil <code>$this->setNama($nama)</code> — fungsi
      yang sudah didefinisikan di kelas induk — sehingga tidak perlu mendefinisikannya ulang.
      Kolom NIK berasal dari method <code>getNIK()</code> yang diwarisi dari <code>Manusia</code>.
    </p>
  </div>

</div>
</body>
</html>
