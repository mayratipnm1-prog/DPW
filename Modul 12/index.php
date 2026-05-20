<?php

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD - Modul 12 (OOP)</title>
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
                    <div class="w-9 h-9 bg-gradient-to-br from-amber-500 to-orange-600 rounded-xl flex items-center justify-center shadow-lg shadow-amber-500/30">
                        <i class="fas fa-graduation-cap text-white text-sm"></i>
                    </div>
                    <div>
                        <span class="font-bold text-slate-800 text-lg tracking-tight">SIAKAD</span>
                        <span class="text-[10px] text-slate-400 ml-2 px-2 py-0.5 bg-amber-100 rounded-full">Modul 12</span>
                    </div>
                </div>
                <div class="flex items-center gap-2 text-xs text-slate-500">
                    <span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></span>
                    <span>OOP + Prepared Statements</span>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-12">

        <!-- Header -->
        <div class="text-center mb-12">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/60 border border-slate-200/60 text-xs text-slate-600 mb-6">
                <i class="fas fa-layer-group text-amber-500"></i>
                <span>Dashboard Modul 12</span>
                <span class="w-px h-3 bg-slate-300"></span>
                <span class="text-slate-400">OOP Modern</span>
            </div>
            <h1 class="text-4xl font-extrabold text-slate-900 tracking-tight mb-3">
                Selamat Datang di <span class="text-amber-600">SIAKAD</span>
            </h1>
            <p class="text-slate-500 max-w-xl mx-auto">
                Sistem Informasi Akademik dengan arsitektur OOP dan Prepared Statements. 
                Pilih menu di bawah untuk mengelola data.
            </p>
        </div>

        <div class="mb-2 px-1">
            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Setup Database</span>
        </div>
        <div class="glass rounded-2xl p-6 shadow-lg shadow-slate-200/40 border border-white/60 mb-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                <a href="buat_tabel.php" class="group block">
                    <div class="bg-white rounded-xl border border-slate-200 p-5 hover:border-amber-300 hover:shadow-md transition-all h-full">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 rounded-lg bg-amber-50 flex items-center justify-center text-amber-600 group-hover:bg-amber-100 transition-colors">
                                <i class="fas fa-database"></i>
                            </div>
                            <div>
                                <h3 class="text-sm font-bold text-slate-800">Buat Tabel</h3>
                                <span class="text-[10px] text-slate-400">Setup Database</span>
                            </div>
                        </div>
                        <p class="text-xs text-slate-500 leading-relaxed mb-3">
                            Membuat tabel t_login, t_dosen, t_mahasiswa, dan t_matakuliah secara otomatis.
                        </p>
                        <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-amber-600">
                            Jalankan <i class="fas fa-arrow-right text-[10px] group-hover:translate-x-1 transition-transform"></i>
                        </span>
                    </div>
                </a>

                <div class="bg-white rounded-xl border border-slate-200 p-5 h-full">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 rounded-lg bg-slate-50 flex items-center justify-center text-slate-500">
                            <i class="fas fa-file-code"></i>
                        </div>
                        <div>
                            <h3 class="text-sm font-bold text-slate-800">database.php</h3>
                            <span class="text-[10px] text-slate-400">Class OOP</span>
                        </div>
                    </div>
                    <p class="text-xs text-slate-500 leading-relaxed mb-3">
                        Class Database dengan method <code class="bg-slate-100 px-1 rounded text-[10px]">createTable()</code> dan <code class="bg-slate-100 px-1 rounded text-[10px]">createTableLogin()</code>.
                    </p>
                    <span class="badge badge-gray">Class OOP</span>
                </div>

                <div class="bg-white rounded-xl border border-slate-200 p-5 h-full">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 rounded-lg bg-emerald-50 flex items-center justify-center text-emerald-600">
                            <i class="fas fa-shield-halved"></i>
                        </div>
                        <div>
                            <h3 class="text-sm font-bold text-slate-800">Prepared Statements</h3>
                            <span class="text-[10px] text-slate-400">Keamanan</span>
                        </div>
                    </div>
                    <p class="text-xs text-slate-500 leading-relaxed mb-3">
                        Keamanan SQL Injection melalui <code class="bg-slate-100 px-1 rounded text-[10px]">$stmt->prepare()</code> dan <code class="bg-slate-100 px-1 rounded text-[10px]">$stmt->bind_param()</code>.
                    </p>
                    <span class="badge badge-green">Aman</span>
                </div>
            </div>
        </div>

        <div class="mb-2 px-1">
            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Menu Data</span>
        </div>
        <div class="glass rounded-2xl p-6 shadow-lg shadow-slate-200/40 border border-white/60">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                <!-- DOSEN -->
                <a href="viewdosen.php" class="group block">
                    <div class="bg-white rounded-xl border border-slate-200 p-5 hover:border-blue-300 hover:shadow-md transition-all h-full">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 rounded-lg bg-blue-50 flex items-center justify-center text-blue-600 group-hover:bg-blue-100 transition-colors">
                                <i class="fas fa-chalkboard-user"></i>
                            </div>
                            <div>
                                <h3 class="text-sm font-bold text-slate-800">Data Dosen</h3>
                                <span class="text-[10px] text-slate-400">CRUD + Search</span>
                            </div>
                        </div>
                        <p class="text-xs text-slate-500 leading-relaxed mb-3">
                            Kelola informasi dosen dengan keamanan SQL Injection melalui Prepared Statements.
                        </p>
                        <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-blue-600">
                            Akses Menu <i class="fas fa-arrow-right text-[10px] group-hover:translate-x-1 transition-transform"></i>
                        </span>
                    </div>
                </a>

                <a href="viewmahasiswa.php" class="group block">
                    <div class="bg-white rounded-xl border border-slate-200 p-5 hover:border-emerald-300 hover:shadow-md transition-all h-full">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 rounded-lg bg-emerald-50 flex items-center justify-center text-emerald-600 group-hover:bg-emerald-100 transition-colors">
                                <i class="fas fa-user-graduate"></i>
                            </div>
                            <div>
                                <h3 class="text-sm font-bold text-slate-800">Data Mahasiswa</h3>
                                <span class="text-[10px] text-slate-400">CRUD + Search</span>
                            </div>
                        </div>
                        <p class="text-xs text-slate-500 leading-relaxed mb-3">
                            Kelola biodata mahasiswa dengan class Database OOP yang terstruktur.
                        </p>
                        <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-emerald-600">
                            Akses Menu <i class="fas fa-arrow-right text-[10px] group-hover:translate-x-1 transition-transform"></i>
                        </span>
                    </div>
                </a>

                <a href="viewmatakuliah.php" class="group block">
                    <div class="bg-white rounded-xl border border-slate-200 p-5 hover:border-rose-300 hover:shadow-md transition-all h-full">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 rounded-lg bg-rose-50 flex items-center justify-center text-rose-600 group-hover:bg-rose-100 transition-colors">
                                <i class="fas fa-book"></i>
                            </div>
                            <div>
                                <h3 class="text-sm font-bold text-slate-800">Data Mata Kuliah</h3>
                                <span class="text-[10px] text-slate-400">CRUD + Search</span>
                            </div>
                        </div>
                        <p class="text-xs text-slate-500 leading-relaxed mb-3">
                            Kelola mata kuliah dengan validasi duplikat kode MK dan error handling.
                        </p>
                        <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-rose-600">
                            Akses Menu <i class="fas fa-arrow-right text-[10px] group-hover:translate-x-1 transition-transform"></i>
                        </span>
                    </div>
                </a>
            </div>
        </div>

        <div class="glass rounded-2xl p-6 shadow-lg border border-white/60 mt-8">
            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
                <div class="w-12 h-12 bg-amber-100 rounded-xl flex items-center justify-center text-amber-600 shrink-0">
                    <i class="fas fa-circle-info text-lg"></i>
                </div>
                <div class="flex-1">
                    <h3 class="text-sm font-bold text-slate-800 mb-1">Informasi Modul 12</h3>
                    <p class="text-xs text-slate-500 leading-relaxed">
                        Modul ini menggunakan arsitektur <strong>OOP</strong> dengan class <code class="bg-slate-100 px-1.5 py-0.5 rounded text-[10px] font-mono">Database.php</code> 
                        dan <strong>Prepared Statements</strong> untuk mencegah SQL Injection. Terdiri dari 21 file terpisah dengan fitur flash message dan error handling.
                        Method <code class="bg-slate-100 px-1.5 py-0.5 rounded text-[10px] font-mono">createTable()</code> ditambahkan sesuai referensi materi dosen untuk membuat tabel otomatis.
                    </p>
                </div>
                <div class="flex flex-wrap gap-2 shrink-0">
                    <span class="px-2.5 py-1 bg-amber-50 text-amber-600 rounded-lg text-[10px] font-semibold">PHP OOP</span>
                    <span class="px-2.5 py-1 bg-amber-50 text-amber-600 rounded-lg text-[10px] font-semibold">Prepared</span>
                    <span class="px-2.5 py-1 bg-amber-50 text-amber-600 rounded-lg text-[10px] font-semibold">Tailwind</span>
                </div>
            </div>
        </div>

        <div class="text-center mt-12">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/40 border border-slate-200/40 text-xs text-slate-400">
                <i class="fas fa-code"></i>
                <span>SIAKAD Modul 12 - OOP + Prepared Statements</span>
            </div>
        </div>
    </div>

</body>
</html>