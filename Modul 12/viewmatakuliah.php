<?php
require_once "database.php";
$db = new Database();
session_start();

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

$keyword = (isset($_GET['cari']) && isset($_GET['keyword'])) ? trim($_GET['keyword']) : '';
if ($keyword != "") {
    $like = "%$keyword%";
    $stmt = $db->con->prepare("SELECT * FROM t_matakuliah WHERE namaMK LIKE ? ORDER BY kodeMK ASC");
    $stmt->bind_param("s", $like);
    $stmt->execute();
    $semuaMK = $stmt->get_result();
    $stmt->close();
} else {
    $semuaMK = $db->con->query("SELECT * FROM t_matakuliah ORDER BY kodeMK ASC");
}
$totalMK = $semuaMK ? $semuaMK->num_rows : 0;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mata Kuliah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="theme-matakuliah text-slate-700 antialiased">

    <nav class="sticky top-0 z-40 glass border-b border-rose-200/60 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 bg-gradient-to-br from-rose-400 to-pink-600 rounded-xl flex items-center justify-center shadow-lg shadow-rose-500/30">
                        <i class="fas fa-graduation-cap text-white text-sm"></i>
                    </div>
                    <span class="font-bold text-slate-800 text-lg tracking-tight">SIAKAD</span>
                </div>
                <div class="flex gap-1 bg-rose-100/80 p-1 rounded-xl">
                    <a href="viewdosen.php" class="px-4 py-2 rounded-lg text-sm font-medium text-slate-500 hover:text-rose-700 transition-all"><i class="fas fa-chalkboard-user mr-1.5 text-xs"></i>Dosen</a>
                    <a href="viewmahasiswa.php" class="px-4 py-2 rounded-lg text-sm font-medium text-slate-500 hover:text-rose-700 transition-all"><i class="fas fa-user-graduate mr-1.5 text-xs"></i>Mahasiswa</a>
                    <a href="viewmatakuliah.php" class="px-4 py-2 rounded-lg text-sm font-medium bg-white text-rose-600 shadow-sm transition-all"><i class="fas fa-book mr-1.5 text-xs"></i>Mata Kuliah</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-8">

        <div class="mb-8 flex flex-col sm:flex-row sm:items-end justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold text-slate-900 tracking-tight">Data Mata Kuliah</h1>
                <p class="text-sm text-slate-500 mt-1">Manajemen informasi mata kuliah terintegrasi</p>
            </div>
            <div class="flex items-center gap-3">
                <div class="flex items-center gap-2 bg-white/60 backdrop-blur-sm px-4 py-2 rounded-full border border-rose-200/60 shadow-sm">
                    <div class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></div>
                    <span class="text-xs font-medium text-slate-600">Database Connected</span>
                </div>
                <a href="inputmatakuliah.php" class="inline-flex items-center gap-2 bg-gradient-to-r from-rose-400 to-pink-600 hover:from-rose-500 hover:to-pink-700 text-white px-5 py-2.5 rounded-xl font-medium shadow-lg shadow-rose-500/25 transition-all btn-press">
                    <i class="fas fa-plus text-sm"></i> Tambah MK
                </a>
            </div>
        </div>

        <?php if ($flash): ?>
        <div class="mb-6" id="toast">
            <div class="flex items-start gap-3 p-4 rounded-xl border bg-white shadow-lg <?php echo $flash['type'] == 'success' ? 'border-emerald-200' : 'border-rose-200'; ?>">
                <div class="w-8 h-8 rounded-full flex items-center justify-center <?php echo $flash['type'] == 'success' ? 'bg-emerald-100 text-emerald-600' : 'bg-rose-100 text-rose-600'; ?>">
                    <i class="fas <?php echo $flash['type'] == 'success' ? 'fa-check' : 'fa-exclamation'; ?> text-xs"></i>
                </div>
                <div class="flex-1">
                    <h4 class="text-sm font-semibold <?php echo $flash['type'] == 'success' ? 'text-emerald-900' : 'text-rose-900'; ?>"><?php echo $flash['type'] == 'success' ? 'Berhasil!' : 'Gagal!'; ?></h4>
                    <p class="text-sm <?php echo $flash['type'] == 'success' ? 'text-emerald-700' : 'text-rose-700'; ?>"><?php echo htmlspecialchars($flash['message']); ?></p>
                </div>
                <button onclick="document.getElementById('toast').remove()" class="text-slate-400 hover:text-slate-600"><i class="fas fa-times"></i></button>
            </div>
        </div>
        <?php endif; ?>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
            <div class="glass rounded-xl p-5 shadow-sm flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Total MK</p>
                    <p class="text-2xl font-bold text-slate-900 mt-1"><?php echo $totalMK; ?></p>
                </div>
                <div class="w-11 h-11 bg-rose-50 rounded-xl flex items-center justify-center text-rose-600"><i class="fas fa-book-open"></i></div>
            </div>
            <div class="glass rounded-xl p-5 shadow-sm flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Pencarian</p>
                    <p class="text-sm font-semibold text-slate-700 mt-1"><?php echo $keyword ? htmlspecialchars($keyword) : 'Semua Data'; ?></p>
                </div>
                <div class="w-11 h-11 bg-pink-50 rounded-xl flex items-center justify-center text-pink-600"><i class="fas fa-search"></i></div>
            </div>
            <div class="glass rounded-xl p-5 shadow-sm flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Database</p>
                    <p class="text-sm font-semibold text-slate-700 mt-1">t_matakuliah</p>
                </div>
                <div class="w-11 h-11 bg-slate-100 rounded-xl flex items-center justify-center text-slate-600"><i class="fas fa-database"></i></div>
            </div>
        </div>

        <div class="glass rounded-2xl shadow-lg shadow-rose-200/50 border border-white/50 overflow-hidden">
            <div class="px-6 py-4 border-b border-rose-100 bg-gradient-to-r from-rose-50/80 to-white/80 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-pink-100 text-pink-600 rounded-lg flex items-center justify-center"><i class="fas fa-list text-sm"></i></div>
                    <div>
                        <h2 class="text-lg font-bold text-slate-800">Daftar Mata Kuliah</h2>
                        <p class="text-xs text-slate-500"><?php echo $totalMK; ?> data ditemukan</p>
                    </div>
                </div>
                <form action="viewmatakuliah.php" method="get" class="flex gap-2">
                    <div class="relative">
                        <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                        <input type="text" name="keyword" value="<?php echo htmlspecialchars($keyword); ?>" placeholder="Cari nama mata kuliah..." class="pl-9 pr-4 py-2 bg-white border border-slate-200 rounded-xl text-sm focus:border-rose-500 focus:ring-4 focus:ring-rose-500/10 transition-all w-48">
                    </div>
                    <button type="submit" name="cari" class="px-4 py-2 bg-rose-800 hover:bg-rose-900 text-white rounded-xl text-sm font-medium transition btn-press">Cari</button>
                    <?php if ($keyword): ?>
                    <a href="viewmatakuliah.php" class="px-3 py-2 bg-rose-100 hover:bg-rose-200 text-rose-600 rounded-xl text-sm transition btn-press flex items-center"><i class="fas fa-rotate-left text-xs"></i></a>
                    <?php endif; ?>
                </form>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-rose-50/80 border-b border-rose-200 text-xs uppercase font-bold text-slate-500">
                            <th class="px-6 py-4 w-28">Kode MK</th>
                            <th class="px-6 py-4">Nama Mata Kuliah</th>
                            <th class="px-6 py-4 w-24 text-center">SKS</th>
                            <th class="px-6 py-4 w-24 text-center">Jam</th>
                            <th class="px-6 py-4 text-center w-40">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-rose-100 text-sm">
                        <?php if ($totalMK > 0): while ($row = $semuaMK->fetch_assoc()): ?>
                        <tr class="bg-white hover:bg-rose-50/40 transition-colors group">
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center justify-center px-3 py-1 bg-rose-50 text-rose-700 rounded-lg text-xs font-bold border border-rose-100 font-mono"><?php echo htmlspecialchars($row['kodeMK']); ?></span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-rose-100 to-pink-200 flex items-center justify-center text-rose-700 text-xs font-bold"><i class="fas fa-book text-[10px]"></i></div>
                                    <span class="font-semibold text-slate-800"><?php echo htmlspecialchars($row['namaMK']); ?></span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-center"><span class="px-2.5 py-1 bg-pink-50 text-pink-700 rounded-md text-xs font-bold border border-pink-100"><?php echo $row['sks']; ?> SKS</span></td>
                            <td class="px-6 py-4 text-center"><span class="px-2.5 py-1 bg-rose-50 text-rose-700 rounded-md text-xs font-bold border border-rose-100"><i class="fas fa-clock mr-1 text-[9px]"></i><?php echo $row['jam']; ?> Jam</span></td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex items-center justify-center gap-2 opacity-80 group-hover:opacity-100 transition-opacity">
                                    <a href="editmatakuliah.php?kode=<?php echo urlencode($row['kodeMK']); ?>" class="flex items-center gap-1.5 px-3 py-2 bg-amber-50 hover:bg-amber-100 text-amber-700 border border-amber-200 rounded-lg text-xs font-semibold transition btn-press"><i class="fas fa-pen text-[10px]"></i>Edit</a>
                                    <button onclick="confirmDelete('hapusmatakuliah.php?kode=<?php echo urlencode($row['kodeMK']); ?>', '<?php echo htmlspecialchars(addslashes($row['namaMK'])); ?>')" class="flex items-center gap-1.5 px-3 py-2 bg-rose-50 hover:bg-rose-100 text-rose-700 border border-rose-200 rounded-lg text-xs font-semibold transition btn-press cursor-pointer"><i class="fas fa-trash text-[10px]"></i>Hapus</button>
                                </div>
                            </td>
                        </tr>
                        <?php endwhile; else: ?>
                        <tr><td colspan="5" class="px-6 py-16 text-center">
                            <div class="flex flex-col items-center text-slate-400">
                                <div class="w-16 h-16 bg-rose-100 rounded-full flex items-center justify-center mb-3"><i class="fas fa-inbox text-2xl text-rose-300"></i></div>
                                <p class="text-sm font-medium text-slate-500">Belum ada data mata kuliah</p>
                            </div>
                        </td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <?php if ($totalMK > 0): ?>
            <div class="px-6 py-3 bg-rose-50/50 border-t border-rose-100 flex justify-between items-center">
                <p class="text-xs text-slate-500">Menampilkan <?php echo $totalMK; ?> data</p>
                <div class="flex gap-1 items-center"><span class="w-2 h-2 rounded-full bg-emerald-400"></span><span class="text-[10px] text-slate-400">Real-time</span></div>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <div id="deleteModal" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm" onclick="closeDeleteModal()"></div>
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-2xl shadow-2xl max-w-sm w-full p-6 transform transition-all scale-95 opacity-0" id="deleteModalContent">
                <div class="w-12 h-12 bg-rose-100 rounded-full flex items-center justify-center mx-auto mb-4"><i class="fas fa-trash-can text-rose-600 text-xl"></i></div>
                <h3 class="text-lg font-bold text-center text-slate-900 mb-1">Konfirmasi Hapus</h3>
                <p class="text-sm text-center text-slate-500 mb-6">Hapus mata kuliah <span id="deleteName" class="font-semibold text-slate-700"></span>?</p>
                <div class="flex gap-3">
                    <button onclick="closeDeleteModal()" class="flex-1 px-4 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-xl text-sm font-semibold transition btn-press">Batal</button>
                    <a id="deleteLink" href="#" class="flex-1 px-4 py-2.5 bg-rose-600 hover:bg-rose-700 text-white rounded-xl text-sm font-semibold text-center transition btn-press flex items-center justify-center gap-2"><i class="fas fa-trash text-xs"></i>Hapus</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(url, name) {
            const modal = document.getElementById('deleteModal');
            const content = document.getElementById('deleteModalContent');
            document.getElementById('deleteName').textContent = name;
            document.getElementById('deleteLink').href = url;
            modal.classList.remove('hidden');
            setTimeout(() => { content.classList.remove('scale-95','opacity-0'); content.classList.add('scale-100','opacity-100'); }, 10);
        }
        function closeDeleteModal() {
            const modal = document.getElementById('deleteModal');
            const content = document.getElementById('deleteModalContent');
            content.classList.remove('scale-100','opacity-100'); content.classList.add('scale-95','opacity-0');
            setTimeout(() => modal.classList.add('hidden'), 200);
        }
        setTimeout(() => { const t = document.getElementById('toast'); if(t){ t.style.opacity='0'; t.style.transform='translateX(20px)'; t.style.transition='all 0.4s'; setTimeout(()=>t.remove(),400); } }, 5000);
    </script>
</body>
</html>