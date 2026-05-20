<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mata Kuliah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background: linear-gradient(135deg, #f5f3ff 0%, #e0e7ff 50%, #eef2ff 100%); min-height: 100vh; font-family: 'Inter', sans-serif; }
        .glass { background: rgba(255,255,255,0.9); backdrop-filter: blur(12px); border: 1px solid rgba(255,255,255,0.6); }
        .btn-press:active { transform: scale(0.96); }
        .input-focus:focus { box-shadow: 0 0 0 3px rgba(99,102,241,0.15); }
    </style>
</head>
<body class="text-slate-700 antialiased flex items-center justify-center min-h-screen p-4">

    <div class="w-full max-w-md animate-[fadeIn_0.5s_ease-out]">
        <div class="glass rounded-2xl shadow-xl shadow-slate-200/50 overflow-hidden">
            <div class="px-6 py-5 border-b border-slate-100 bg-gradient-to-r from-indigo-50/80 to-white/80 flex items-center gap-3">
                <a href="viewmatakuliah.php" class="w-8 h-8 rounded-lg bg-white border border-slate-200 flex items-center justify-center text-slate-500 hover:text-indigo-600 transition btn-press"><i class="fas fa-arrow-left text-sm"></i></a>
                <div>
                    <h2 class="text-lg font-bold text-slate-800">Tambah Mata Kuliah</h2>
                    <p class="text-xs text-slate-500">Isi informasi mata kuliah baru</p>
                </div>
            </div>
            <form action="proses_inputmatakuliah.php" method="post" class="p-6 space-y-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-2"><i class="fas fa-barcode text-slate-400 mr-1.5 text-[10px]"></i>Kode MK</label>
                    <input type="text" name="kodeMK" required placeholder="Contoh: MK001" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 input-focus transition-all text-sm font-mono">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-2"><i class="fas fa-book text-slate-400 mr-1.5 text-[10px]"></i>Nama Mata Kuliah</label>
                    <input type="text" name="namaMK" required class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 input-focus transition-all text-sm">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-2"><i class="fas fa-layer-group text-slate-400 mr-1.5 text-[10px]"></i>SKS</label>
                        <input type="number" name="sks" min="1" max="6" required class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 input-focus transition-all text-sm">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-2"><i class="fas fa-clock text-slate-400 mr-1.5 text-[10px]"></i>Jam</label>
                        <input type="number" name="jam" min="1" max="10" required class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 input-focus transition-all text-sm">
                    </div>
                </div>
                <div class="pt-2">
                    <button type="submit" name="input" class="w-full bg-gradient-to-r from-indigo-500 to-violet-600 hover:from-indigo-600 hover:to-violet-700 text-white font-semibold py-3 rounded-xl transition-all shadow-lg shadow-indigo-500/25 btn-press flex items-center justify-center gap-2">
                        <i class="fas fa-save text-sm"></i> Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>