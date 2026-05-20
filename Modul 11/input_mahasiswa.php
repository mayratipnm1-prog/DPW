<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 50%, #ecfdf5 100%); min-height: 100vh; font-family: 'Inter', sans-serif; }
        .glass { background: rgba(255,255,255,0.9); backdrop-filter: blur(12px); border: 1px solid rgba(255,255,255,0.6); }
        .btn-press:active { transform: scale(0.96); }
        .input-focus:focus { box-shadow: 0 0 0 3px rgba(16,185,129,0.15); }
    </style>
</head>
<body class="text-slate-700 antialiased flex items-center justify-center min-h-screen p-4">

    <div class="w-full max-w-lg animate-[fadeIn_0.5s_ease-out]">
        <div class="glass rounded-2xl shadow-xl shadow-slate-200/50 overflow-hidden">
            <div class="px-6 py-5 border-b border-slate-100 bg-gradient-to-r from-emerald-50/80 to-white/80 flex items-center gap-3">
                <a href="viewmahasiswa.php" class="w-8 h-8 rounded-lg bg-white border border-slate-200 flex items-center justify-center text-slate-500 hover:text-emerald-600 transition btn-press"><i class="fas fa-arrow-left text-sm"></i></a>
                <div>
                    <h2 class="text-lg font-bold text-slate-800">Tambah Mahasiswa Baru</h2>
                    <p class="text-xs text-slate-500">Isi biodata mahasiswa dengan lengkap</p>
                </div>
            </div>
            <form action="proses_inputmahasiswa.php" method="post" class="p-6 space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-2">
                        <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-2"><i class="fas fa-id-card text-slate-400 mr-1.5 text-[10px]"></i>NPM</label>
                        <input type="text" name="npm" required placeholder="Contoh: 253307003" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 input-focus transition-all text-sm">
                    </div>
                    <div class="col-span-2">
                        <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-2"><i class="fas fa-user text-slate-400 mr-1.5 text-[10px]"></i>Nama Lengkap</label>
                        <input type="text" name="namaMhs" required class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 input-focus transition-all text-sm">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-2"><i class="fas fa-building-columns text-slate-400 mr-1.5 text-[10px]"></i>Prodi</label>
                        <input type="text" name="prodi" required placeholder="Contoh: D3 Teknologi Informasi" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 input-focus transition-all text-sm">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-2"><i class="fas fa-phone text-slate-400 mr-1.5 text-[10px]"></i>No HP</label>
                        <input type="text" name="noHP" required class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 input-focus transition-all text-sm">
                    </div>
                    <div class="col-span-2">
                        <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-2"><i class="fas fa-location-dot text-slate-400 mr-1.5 text-[10px]"></i>Alamat</label>
                        <textarea name="alamat" required rows="3" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 input-focus transition-all text-sm resize-none"></textarea>
                    </div>
                </div>
                <div class="pt-2">
                    <button type="submit" name="input" class="w-full bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white font-semibold py-3 rounded-xl transition-all shadow-lg shadow-emerald-500/25 btn-press flex items-center justify-center gap-2">
                        <i class="fas fa-save text-sm"></i> Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>