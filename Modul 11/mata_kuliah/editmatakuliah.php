<?php
session_start();
include 'koneksi.php';

if (isset($_GET['kodeMK'])) {
    $kodeMK_get = mysqli_real_escape_string($link, $_GET["kodeMK"]);
    $query = "SELECT * FROM t_matakuliah WHERE kodeMK = '$kodeMK_get'";
    $result = mysqli_query($link, $query);
    if (!$result) die("Query Error: " . mysqli_error($link));
    $data = mysqli_fetch_assoc($result);
    if (!$data) { header("location:viewmatakuliah.php"); exit(); }
    $kodeMK = $data["kodeMK"]; $namaMK = $data["namaMK"]; $sks = $data["sks"]; $jam = $data["jam"];
} else { header("location:viewmatakuliah.php"); exit(); }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mata Kuliah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link rel="stylesheet" href="style.css">
</head>
<body class="theme-matakuliah text-slate-700 antialiased flex items-center justify-center min-h-screen p-4">

    <div class="w-full max-w-md animate-fade-page">
        <div class="glass rounded-2xl shadow-xl shadow-slate-200/50 overflow-hidden">
            <div class="px-6 py-5 border-b border-slate-100 bg-gradient-to-r from-amber-50/80 to-white/80 flex items-center gap-3">
                <a href="viewmatakuliah.php" class="w-8 h-8 rounded-lg bg-white border border-slate-200 flex items-center justify-center text-slate-500 hover:text-amber-600 transition btn-press"><i class="fas fa-arrow-left text-sm"></i></a>
                <div>
                    <h2 class="text-lg font-bold text-slate-800">Edit Mata Kuliah</h2>
                    <p class="text-xs text-slate-500">Perbarui informasi mata kuliah</p>
                </div>
            </div>
            <form action="proses_editmatakuliah.php" method="post" class="p-6 space-y-4">
                <input type="hidden" name="kodeMK" value="<?php echo htmlspecialchars($kodeMK); ?>">
                <div>
                    <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-2"><i class="fas fa-barcode text-slate-400 mr-1.5 text-[10px]"></i>Kode MK</label>
                    <input type="text" value="<?php echo htmlspecialchars($kodeMK); ?>" disabled class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-500 cursor-not-allowed text-sm font-mono">
                    <p class="text-[10px] text-slate-400 mt-1"><i class="fas fa-lock text-[9px] mr-1"></i>Kode MK tidak dapat diubah</p>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-2"><i class="fas fa-book text-slate-400 mr-1.5 text-[10px]"></i>Nama Mata Kuliah</label>
                    <input type="text" name="namaMK" value="<?php echo htmlspecialchars($namaMK); ?>" required class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:border-amber-500 focus:ring-4 focus:ring-amber-500/10 input-focus transition-all text-sm">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-2"><i class="fas fa-layer-group text-slate-400 mr-1.5 text-[10px]"></i>SKS</label>
                        <input type="number" name="sks" min="1" max="6" value="<?php echo $sks; ?>" required class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:border-amber-500 focus:ring-4 focus:ring-amber-500/10 input-focus transition-all text-sm">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-2"><i class="fas fa-clock text-slate-400 mr-1.5 text-[10px]"></i>Jam</label>
                        <input type="number" name="jam" min="1" max="10" value="<?php echo $jam; ?>" required class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:border-amber-500 focus:ring-4 focus:ring-amber-500/10 input-focus transition-all text-sm">
                    </div>
                </div>
                <div class="pt-2 flex gap-3">
                    <a href="viewmatakuliah.php" class="flex-1 text-center px-4 py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl font-medium transition btn-press text-sm">Batal</a>
                    <button type="submit" name="edit" class="flex-1 bg-gradient-to-r from-amber-500 to-orange-600 hover:from-amber-600 hover:to-orange-700 text-white font-semibold py-3 rounded-xl transition-all shadow-lg shadow-amber-500/25 btn-press flex items-center justify-center gap-2">
                        <i class="fas fa-save text-sm"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>