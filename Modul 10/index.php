<?php
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Praktikum 10 - Dashboard OOP PHP</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <div class="page-header">
    <div class="badge-top">
      <i class="fas fa-graduation-cap text-blue-500"></i>
      <span>Praktikum 10</span>
      <span style="color:var(--border)">|</span>
      <span>OOP PHP</span>
    </div>
    <h1>Dashboard Praktikum</h1>
    </div>

  <div class="container">

    <div class="section-title animate-in"> File Utama</div>
    <div class="grid-3">

      <a href="index.php" class="card menu-card card-hover animate-in animate-delay-1">
        <div class="card-body">
          <div class="icon-wrap" style="background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%); color: #2563eb;">
            <i class="fas fa-user"></i>
          </div>
          <h3>Kelas Manusia</h3>
          <p>Demonstrasi class, properties, access modifier, getter dan setter pada objek Manusia.</p>
          <span class="link-text" style="color: #2563eb;">
            Buka Halaman <i class="fas fa-arrow-right text-xs"></i>
          </span>
        </div>
      </a>

      <a href="dataKelas.php" class="card menu-card card-hover animate-in animate-delay-2">
        <div class="card-body">
          <div class="icon-wrap" style="background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%); color: #059669;">
            <i class="fas fa-user-graduate"></i>
          </div>
          <h3>Data Kelas Mahasiswa</h3>
          <p>Inheritance: class mahasiswa extends Manusia dengan properti NIM, jurusan, dan kelas.</p>
          <span class="link-text" style="color: #059669;">
            Buka Halaman <i class="fas fa-arrow-right text-xs"></i>
          </span>
        </div>
      </a>

      <a href="databank.php" class="card menu-card card-hover animate-in animate-delay-3">
        <div class="card-body">
          <div class="icon-wrap" style="background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%); color: #b45309;">
            <i class="fas fa-building-columns"></i>
          </div>
          <h3>Akun Bank</h3>
          <p>Constructor, getter/setter, method operasi saldo, penarikan, dan perhitungan pajak 11%.</p>
          <span class="link-text" style="color: #b45309;">
            Buka Halaman <i class="fas fa-arrow-right text-xs"></i>
          </span>
        </div>
      </a>

    </div>

    <div class="section-title animate-in" style="margin-top: 2.5rem;"> Analisis Error</div>
    <div class="grid-2">

      <a href="buah.php" class="card menu-card card-hover animate-in animate-delay-1">
        <div class="card-body">
          <div class="icon-wrap" style="background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%); color: #dc2626;">
            <i class="fas fa-bug"></i>
          </div>
          <h3>buah.php — Properti</h3>
          <p>Menganalisis error pada properti protected & private, serta perbaikan dengan setter/getter.</p>
          <div style="display:flex; gap:0.5rem; flex-wrap: wrap; margin-top: 0.75rem;">
            <span class="badge badge-amber">protected</span>
            <span class="badge badge-red">private</span>
            <span class="badge badge-green">public</span>
          </div>
        </div>
      </a>

      <a href="buah2.php" class="card menu-card card-hover animate-in animate-delay-2">
        <div class="card-body">
          <div class="icon-wrap" style="background: linear-gradient(135deg, #fce7f3 0%, #fbcfe8 100%); color: #db2777;">
            <i class="fas fa-bug-slash"></i>
          </div>
          <h3>buah2.php — Method</h3>
          <p>Menganalisis error pada method protected & private, serta perbaikan modifier menjadi public.</p>
          <div style="display:flex; gap:0.5rem; flex-wrap: wrap; margin-top: 0.75rem;">
            <span class="badge badge-amber">protected</span>
            <span class="badge badge-red">private</span>
            <span class="badge badge-green">public</span>
          </div>
        </div>
      </a>

    </div>

    <div class="section-title animate-in" style="margin-top: 2.5rem;"> File Class</div>
    <div class="grid-4">

      <div class="card animate-in animate-delay-1" style="opacity: 0.7;">
        <div class="card-body" style="padding: 1rem;">
          <div style="display:flex; align-items:center; gap:0.75rem; margin-bottom:0.5rem;">
            <div style="width:36px; height:36px; background:#f3f4f6; border-radius:10px; display:flex; align-items:center; justify-content:center; color:var(--muted);">
              <i class="fas fa-file-code text-sm"></i>
            </div>
            <div>
              <div style="font-size:13px; font-weight:600;">Manusia.php</div>
              <div style="font-size:11px; color:var(--muted);">Class Induk</div>
            </div>
          </div>
          <p style="font-size:12px; color:var(--muted);">Dipanggil via <code>require_once</code> oleh index.php dan Mahasiswa.php</p>
        </div>
      </div>

      <div class="card animate-in animate-delay-2" style="opacity: 0.7;">
        <div class="card-body" style="padding: 1rem;">
          <div style="display:flex; align-items:center; gap:0.75rem; margin-bottom:0.5rem;">
            <div style="width:36px; height:36px; background:#f3f4f6; border-radius:10px; display:flex; align-items:center; justify-content:center; color:var(--muted);">
              <i class="fas fa-file-code text-sm"></i>
            </div>
            <div>
              <div style="font-size:13px; font-weight:600;">Mahasiswa.php</div>
              <div style="font-size:11px; color:var(--muted);">Class Turunan</div>
            </div>
          </div>
          <p style="font-size:12px; color:var(--muted);">Dipanggil via <code>require_once</code> oleh dataKelas.php</p>
        </div>
      </div>

      <div class="card animate-in animate-delay-3" style="opacity: 0.7;">
        <div class="card-body" style="padding: 1rem;">
          <div style="display:flex; align-items:center; gap:0.75rem; margin-bottom:0.5rem;">
            <div style="width:36px; height:36px; background:#f3f4f6; border-radius:10px; display:flex; align-items:center; justify-content:center; color:var(--muted);">
              <i class="fas fa-file-code text-sm"></i>
            </div>
            <div>
              <div style="font-size:13px; font-weight:600;">akunBank.php</div>
              <div style="font-size:11px; color:var(--muted);">Class Akun</div>
            </div>
          </div>
          <p style="font-size:12px; color:var(--muted);">Dipanggil via <code>require_once</code> oleh databank.php</p>
        </div>
      </div>

      <div class="card animate-in animate-delay-3" style="opacity: 0.7;">
        <div class="card-body" style="padding: 1rem;">
          <div style="display:flex; align-items:center; gap:0.75rem; margin-bottom:0.5rem;">
            <div style="width:36px; height:36px; background:#f3f4f6; border-radius:10px; display:flex; align-items:center; justify-content:center; color:var(--muted);">
              <i class="fas fa-database text-sm"></i>
            </div>
            <div>
              <div style="font-size:13px; font-weight:600;">Koneksi_db.php</div>
              <div style="font-size:11px; color:var(--muted);">Class Koneksi</div>
            </div>
          </div>
          <p style="font-size:12px; color:var(--muted);">Class koneksi database untuk Modul 11</p>
        </div>
      </div>

    </div>

    <div class="note-box animate-in" style="margin-top: 2rem;">
      <h4> Petunjuk Penggunaan</h4>
      <p>
        <strong>File Utama</strong> (Kelas Manusia, Data Kelas, Akun Bank, buah.php, buah2.php) dapat diakses langsung melalui card di atas.
        <strong>File Class</strong> (Manusia.php, Mahasiswa.php, akunBank.php, Koneksi_db.php) adalah file class yang dipanggil via <code>require_once</code>
        dan tidak bisa diakses langsung via browser karena tidak memiliki output HTML.
        Folder <code>kelas/</code> berisi file-file class yang direquire oleh file utama.
      </p>
    </div>

  </div>

  <div class="footer">
    <div class="footer-inner">
      <i class="fas fa-code text-slate-400"></i>
      <span>Praktikum 10 - OOP dengan PHP</span>
      <span style="color:var(--border)">|</span>
      <span>Mayra Ruhandini</span>
    </div>
  </div>

</body>
</html>