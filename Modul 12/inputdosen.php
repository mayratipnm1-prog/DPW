<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Dosen</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="theme-dosen text-slate-700 antialiased flex items-center justify-center min-h-screen p-4">

    <div class="w-full max-w-md">
        <div class="glass rounded-2xl shadow-xl shadow-slate-200/50 overflow-hidden">
            <div class="px-6 py-5 border-b border-slate-100 bg-gradient-to-r from-blue-50/80 to-white/80 flex items-center gap-3">
                <a href="viewdosen.php" class="w-8 h-8 rounded-lg bg-white border border-slate-200 flex items-center justify-center text-slate-500 hover:text-blue-600 transition btn-press"><i class="fas fa-arrow-left text-sm"></i></a>
                <div>
                    <h2 class="text-lg font-bold text-slate-800">Tambah Dosen Baru</h2>
                    <p class="text-xs text-slate-500">Isi form berikut untuk menambahkan data</p>
                </div>
            </div>
            <form action="proses_inputdosen.php" method="post" class="p-6 space-y-5">
                <div>
                    <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-2"><i class="fas fa-user text-slate-400 mr-1.5 text-[10px]"></i>Nama Lengkap</label>
                    <input type="text" name="namaDosen" required placeholder="Masukkan nama dosen..." class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all text-sm">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-2"><i class="fas fa-phone text-slate-400 mr-1.5 text-[10px]"></i>Nomor HP</label>
                    <input type="text" name="noHP" required placeholder="Contoh: 08123456789" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all text-sm">
                </div>
                <div class="pt-2 flex gap-3">
                    <a href="viewdosen.php" class="flex-1 text-center px-4 py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl font-medium transition btn-press text-sm">Batal</a>
                    <button type="submit" name="tambah" class="flex-1 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold py-3 rounded-xl transition-all shadow-lg shadow-blue-500/25 btn-press flex items-center justify-center gap-2">
                        <i class="fas fa-save text-sm"></i> Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>