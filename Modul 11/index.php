<?php
// ==========================================
// INDEX.PHP - Dashboard Modul 11
// Arsitektur: Prosedural MySQLi
// ==========================================
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD - Modul 11 (Prosedural)</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="theme-dosen text-slate-700 antialiased">

    <nav class="sticky top-0 z-40 glass border-b border-slate-200/60 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 bg-gradient-to-br from-blue-600 to-indigo-700 rounded-xl flex items-center justify-center shadow-lg shadow-blue-500/30">
                        <i class="fas fa-graduation-cap text-white text-sm"></i>
                    </div>
                    <div>
                        <span class="font-bold text-slate-800 text-lg tracking-tight">SIAKAD</span>
                        <span class="text-[10px] text-slate-400 ml-2 px-2 py-0.5 bg-slate-100 rounded-full">Modul 11</span>
                    </div>
                </div>
                <div class="flex items-center gap-2 text-xs text-slate-500">
                    <span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></span>
                    <span>Prosedural MySQLi</span>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-12">

        <!-- Header -->
        <div class="text-center mb-12">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/60 border border-slate-200/60 text-xs text-slate-600 mb-6">
                <i class="fas fa-layer-group text-blue-500"></i>
                <span>Dashboard Modul 11</span>
                <span class="w-px h-3 bg-slate-300"></span>
                <span class="text-slate-400">Prosedural</span>
            </div>
            <h1 class="text-4xl font-extrabold text-slate-900 tracking-tight mb-3">
                Selamat Datang di <span class="text-blue-600">SIAKAD</span>
            </h1>
            <p class="text-slate-500 max-w-xl mx-auto">
                Sistem Informasi Akademik dengan arsitektur Prosedural MySQLi. 
                Pilih menu di bawah untuk mengelola data.
            </p>
        </div>

        <!-- Menu Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">

            <!-- DOSEN -->
            <a href="viewdosen.php" class="group">
                <div class="glass rounded-2xl p-8 shadow-lg shadow-blue-200/30 border border-white/60 card-hover h-full">
                    <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center shadow-lg shadow-blue-500/20 mb-6 group-hover:scale-110 transition-transform">
                        <i class="fas fa-chalkboard-user text-white text-xl"></i>
                    </div>
                    <h2 class="text-xl font-bold text-slate-800 mb-2">Data Dosen</h2>
                    <p class="text-sm text-slate-500 mb-4">Kelola informasi dosen secara terintegrasi dengan fitur CRUD lengkap.</p>
                    <div class="flex items-center gap-2 text-sm font-semibold text-blue-600">
                        <span>Akses Menu</span>
                        <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                    </div>
                </div>
            </a>

            <!-- MAHASISWA -->
            <a href="viewmahasiswa.php" class="group">
                <div class="glass rounded-2xl p-8 shadow-lg shadow-emerald-200/30 border border-white/60 card-hover h-full">
                    <div class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl flex items-center justify-center shadow-lg shadow-emerald-500/20 mb-6 group-hover:scale-110 transition-transform">
                        <i class="fas fa-user-graduate text-white text-xl"></i>
                    </div>
                    <h2 class="text-xl font-bold text-slate-800 mb-2">Data Mahasiswa</h2>
                    <p class="text-sm text-slate-500 mb-4">Kelola biodata mahasiswa termasuk NPM, prodi, alamat, dan kontak.</p>
                    <div class="flex items-center gap-2 text-sm font-semibold text-emerald-600">
                        <span>Akses Menu</span>
                        <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                    </div>
                </div>
            </a>

            <!-- MATA KULIAH -->
            <a href="viewmatakuliah.php" class="group">
                <div class="glass rounded-2xl p-8 shadow-lg shadow-indigo-200/30 border border-white/60 card-hover h-full">
                    <div class="w-14 h-14 bg-gradient-to-br from-indigo-500 to-violet-600 rounded-2xl flex items-center justify-center shadow-lg shadow-indigo-500/20 mb-6 group-hover:scale-110 transition-transform">
                        <i class="fas fa-book text-white text-xl"></i>
                    </div>
                    <h2 class="text-xl font-bold text-slate-800 mb-2">Data Mata Kuliah</h2>
                    <p class="text-sm text-slate-500 mb-4">Kelola mata kuliah dengan informasi SKS dan jam pelajaran.</p>
                    <div class="flex items-center gap-2 text-sm font-semibold text-indigo-600">
                        <span>Akses Menu</span>
                        <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                    </div>
                </div>
            </a>
        </div>

        <!-- Info Section -->
        <div class="glass rounded-2xl p-6 shadow-lg border border-white/60">
            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center text-blue-600 shrink-0">
                    <i class="fas fa-circle-info text-lg"></i>
                </div>
                <div class="flex-1">
                    <h3 class="text-sm font-bold text-slate-800 mb-1">Informasi Modul 11</h3>
                    <p class="text-xs text-slate-500 leading-relaxed">
                        Modul ini menggunakan koneksi <strong>Prosedural MySQLi</strong> melalui file <code class="bg-slate-100 px-1.5 py-0.5 rounded text-[10px] font-mono">koneksi.php</code>. 
                        Terdiri dari 19 file terpisah: view, input, edit, proses input, proses edit, dan hapus untuk masing-masing entitas (Dosen, Mahasiswa, Mata Kuliah).
                    </p>
                </div>
                <div class="flex flex-wrap gap-2 shrink-0">
                    <span class="px-2.5 py-1 bg-blue-50 text-blue-600 rounded-lg text-[10px] font-semibold">PHP</span>
                    <span class="px-2.5 py-1 bg-blue-50 text-blue-600 rounded-lg text-[10px] font-semibold">MySQLi</span>
                    <span class="px-2.5 py-1 bg-blue-50 text-blue-600 rounded-lg text-[10px] font-semibold">Tailwind</span>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center mt-12">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/40 border border-slate-200/40 text-xs text-slate-400">
                <i class="fas fa-code"></i>
                <span>SIAKAD Modul 11 - Prosedural MySQLi</span>
            </div>
        </div>
    </div>

</body>
</html>