<?php
require_once "Database.php";
$db = new Database();

$message = "";
$messageType = "";

// --- CREATE ---
if (isset($_POST['tambah'])) {
    $npm = $_POST['npm'];
    $namaMhs = $_POST['namaMhs'];
    $prodi = $_POST['prodi'];
    $alamat = $_POST['alamat'];
    $noHP = $_POST['noHP'];
    
    $stmt = $db->con->prepare("INSERT INTO t_mahasiswa (npm, namaMhs, prodi, alamat, noHP) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $npm, $namaMhs, $prodi, $alamat, $noHP);
    
    if ($stmt->execute()) {
        $message = "Data mahasiswa berhasil ditambahkan!";
        $messageType = "success";
    } else {
        $message = "Gagal menambah data: " . $stmt->error;
        $messageType = "error";
    }
    $stmt->close();
}

// --- UPDATE ---
if (isset($_POST['ubah'])) {
    $npm = $_POST['npm'];
    $namaMhs = $_POST['namaMhs'];
    $prodi = $_POST['prodi'];
    $alamat = $_POST['alamat'];
    $noHP = $_POST['noHP'];
    
    $stmt = $db->con->prepare("UPDATE t_mahasiswa SET namaMhs = ?, prodi = ?, alamat = ?, noHP = ? WHERE npm = ?");
    $stmt->bind_param("sssss", $namaMhs, $prodi, $alamat, $noHP, $npm);
    
    if ($stmt->execute()) {
        $message = "Data mahasiswa berhasil diperbarui!";
        $messageType = "success";
    } else {
        $message = "Gagal memperbarui data: " . $stmt->error;
        $messageType = "error";
    }
    $stmt->close();
}

// --- DELETE ---
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['npm'])) {
    $npm = $_GET['npm'];
    
    $stmt = $db->con->prepare("DELETE FROM t_mahasiswa WHERE npm = ?");
    $stmt->bind_param("s", $npm);
    
    if ($stmt->execute()) {
        $message = "Data mahasiswa berhasil dihapus!";
        $messageType = "success";
    } else {
        $message = "Gagal menghapus data: " . $stmt->error;
        $messageType = "error";
    }
    $stmt->close();
}

// --- EDIT MODE ---
$editMode = false;
$editData = ['npm' => '', 'namaMhs' => '', 'prodi' => '', 'alamat' => '', 'noHP' => ''];
if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['npm'])) {
    $npm = $_GET['npm'];
    $editMode = true;
    
    $stmt = $db->con->prepare("SELECT * FROM t_mahasiswa WHERE npm = ?");
    $stmt->bind_param("s", $npm);
    $stmt->execute();
    $res = $stmt->get_result();
    if ($row = $res->fetch_assoc()) {
        $editData = $row;
    }
    $stmt->close();
}

// --- READ + SEARCH ---
$keyword = isset($_GET['cari']) ? $_GET['keyword'] : '';
if ($keyword != "") {
    $like = "%$keyword%";
    $stmt = $db->con->prepare("SELECT * FROM t_mahasiswa WHERE namaMhs LIKE ? ORDER BY npm ASC");
    $stmt->bind_param("s", $like);
    $stmt->execute();
    $semuaMhs = $stmt->get_result();
    $stmt->close();
} else {
    $semuaMhs = $db->con->query("SELECT * FROM t_mahasiswa ORDER BY npm ASC");
}
$totalMhs = $semuaMhs->num_rows;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 50%, #ecfdf5 100%); min-height: 100vh; font-family: 'Inter', sans-serif; }
        .glass { background: rgba(255,255,255,0.88); backdrop-filter: blur(12px); border: 1px solid rgba(255,255,255,0.6); }
        .btn-press:active { transform: scale(0.96); }
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 3px; }
    </style>
</head>
<body class="text-slate-700 antialiased">

    <nav class="sticky top-0 z-40 glass border-b border-slate-200/60 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center shadow-lg shadow-emerald-500/30">
                        <i class="fas fa-graduation-cap text-white text-sm"></i>
                    </div>
                    <span class="font-bold text-slate-800 text-lg tracking-tight">SIAKAD</span>
                </div>
                <div class="flex gap-1 bg-slate-100/80 p-1 rounded-xl">
                    <a href="dosen.php" class="px-4 py-2 rounded-lg text-sm font-medium text-slate-500 hover:text-slate-700 transition-all"><i class="fas fa-chalkboard-user mr-1.5 text-xs"></i>Dosen</a>
                    <a href="mahasiswa.php" class="px-4 py-2 rounded-lg text-sm font-medium bg-white text-emerald-600 shadow-sm transition-all"><i class="fas fa-user-graduate mr-1.5 text-xs"></i>Mahasiswa</a>
                    <a href="matakuliah.php" class="px-4 py-2 rounded-lg text-sm font-medium text-slate-500 hover:text-slate-700 transition-all"><i class="fas fa-book mr-1.5 text-xs"></i>Mata Kuliah</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-8">

        <div class="mb-8 flex flex-col sm:flex-row sm:items-end justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold text-slate-900 tracking-tight">Data Mahasiswa</h1>
                <p class="text-sm text-slate-500 mt-1">Manajemen informasi mahasiswa terintegrasi</p>
            </div>
            <div class="flex items-center gap-2 bg-white/60 backdrop-blur-sm px-4 py-2 rounded-full border border-slate-200/60 shadow-sm">
                <div class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></div>
                <span class="text-xs font-medium text-slate-600">Database Connected</span>
            </div>
        </div>

        <?php if ($message != ""): ?>
        <div class="mb-6" id="toast">
            <div class="flex items-start gap-3 p-4 rounded-xl border bg-white shadow-lg <?php echo $messageType == 'success' ? 'border-emerald-200' : 'border-rose-200'; ?>">
                <div class="w-8 h-8 rounded-full flex items-center justify-center <?php echo $messageType == 'success' ? 'bg-emerald-100 text-emerald-600' : 'bg-rose-100 text-rose-600'; ?>">
                    <i class="fas <?php echo $messageType == 'success' ? 'fa-check' : 'fa-exclamation'; ?> text-xs"></i>
                </div>
                <div class="flex-1">
                    <h4 class="text-sm font-semibold <?php echo $messageType == 'success' ? 'text-emerald-900' : 'text-rose-900'; ?>"><?php echo $messageType == 'success' ? 'Berhasil!' : 'Gagal!'; ?></h4>
                    <p class="text-sm <?php echo $messageType == 'success' ? 'text-emerald-700' : 'text-rose-700'; ?>"><?php echo htmlspecialchars($message); ?></p>
                </div>
                <button onclick="document.getElementById('toast').remove()" class="text-slate-400 hover:text-slate-600"><i class="fas fa-times"></i></button>
            </div>
        </div>
        <?php endif; ?>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
            <div class="glass rounded-xl p-5 shadow-sm flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Total Mahasiswa</p>
                    <p class="text-2xl font-bold text-slate-900 mt-1"><?php echo $totalMhs; ?></p>
                </div>
                <div class="w-11 h-11 bg-emerald-50 rounded-xl flex items-center justify-center text-emerald-600"><i class="fas fa-users"></i></div>
            </div>
            <div class="glass rounded-xl p-5 shadow-sm flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Pencarian</p>
                    <p class="text-sm font-semibold text-slate-700 mt-1"><?php echo $keyword ? htmlspecialchars($keyword) : 'Semua Data'; ?></p>
                </div>
                <div class="w-11 h-11 bg-teal-50 rounded-xl flex items-center justify-center text-teal-600"><i class="fas fa-search"></i></div>
            </div>
            <div class="glass rounded-xl p-5 shadow-sm flex items-center justify-between">
                <div>
                    <p class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Mode</p>
                    <p class="text-sm font-semibold text-indigo-600 mt-1"><?php echo $editMode ? 'Edit Data' : 'Input Baru'; ?></p>
                </div>
                <div class="w-11 h-11 bg-indigo-50 rounded-xl flex items-center justify-center text-indigo-600"><i class="fas <?php echo $editMode ? 'fa-pen-to-square' : 'fa-plus'; ?>"></i></div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

            <!-- FORM -->
            <div class="lg:col-span-4">
                <div class="glass rounded-2xl shadow-lg shadow-slate-200/50 border border-white/50 overflow-hidden sticky top-24">
                    <div class="px-6 py-5 border-b border-slate-100 bg-gradient-to-r from-slate-50/80 to-white/80">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-lg <?php echo $editMode ? 'bg-amber-100 text-amber-600' : 'bg-emerald-100 text-emerald-600'; ?> flex items-center justify-center">
                                <i class="fas <?php echo $editMode ? 'fa-pen' : 'fa-user-plus'; ?> text-sm"></i>
                            </div>
                            <h2 class="text-lg font-bold text-slate-800"><?php echo $editMode ? "Ubah Data Mahasiswa" : "Tambah Mahasiswa Baru"; ?></h2>
                        </div>
                        <p class="text-xs text-slate-500 mt-1"><?php echo $editMode ? "Perbarui informasi mahasiswa." : "Isi form berikut untuk menambahkan mahasiswa baru."; ?></p>
                    </div>
                    
                    <form action="mahasiswa.php" method="POST" class="p-6 space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-2"><i class="fas fa-id-card text-slate-400 mr-1.5 text-[10px]"></i>NPM</label>
                            <input type="text" name="npm" required value="<?php echo htmlspecialchars($editData['npm']); ?>" <?php echo $editMode ? 'readonly class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-500 cursor-not-allowed text-sm"' : 'class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition-all text-sm" placeholder="Contoh: 253307003"'; ?>>
                            <?php if ($editMode): ?><p class="text-[10px] text-slate-400 mt-1"><i class="fas fa-lock text-[9px] mr-1"></i>NPM tidak dapat diubah</p><?php endif; ?>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-2"><i class="fas fa-user text-slate-400 mr-1.5 text-[10px]"></i>Nama Lengkap</label>
                            <input type="text" name="namaMhs" required value="<?php echo htmlspecialchars($editData['namaMhs']); ?>" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition-all text-sm">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-2"><i class="fas fa-building-columns text-slate-400 mr-1.5 text-[10px]"></i>Prodi</label>
                            <input type="text" name="prodi" required value="<?php echo htmlspecialchars($editData['prodi']); ?>" placeholder="Contoh: D3 Teknologi Informasi" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition-all text-sm">
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-2"><i class="fas fa-location-dot text-slate-400 mr-1.5 text-[10px]"></i>Alamat</label>
                            <textarea name="alamat" required rows="3" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition-all text-sm resize-none"><?php echo htmlspecialchars($editData['alamat']); ?></textarea>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-2"><i class="fas fa-phone text-slate-400 mr-1.5 text-[10px]"></i>No HP</label>
                            <input type="text" name="noHP" required value="<?php echo htmlspecialchars($editData['noHP']); ?>" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition-all text-sm">
                        </div>

                        <div class="pt-2">
                            <?php if ($editMode): ?>
                            <button type="submit" name="ubah" class="w-full bg-gradient-to-r from-amber-500 to-orange-600 hover:from-amber-600 hover:to-orange-700 text-white font-semibold py-3 rounded-xl transition-all shadow-lg shadow-amber-500/25 btn-press flex items-center justify-center gap-2">
                                <i class="fas fa-save text-sm"></i> Simpan Perubahan
                            </button>
                            <a href="mahasiswa.php" class="block text-center mt-3 text-sm text-slate-500 hover:text-slate-800 transition">Batal Edit</a>
                            <?php else: ?>
                            <button type="submit" name="tambah" class="w-full bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700 text-white font-semibold py-3 rounded-xl transition-all shadow-lg shadow-emerald-500/25 btn-press flex items-center justify-center gap-2">
                                <i class="fas fa-plus text-sm"></i> Tambah Data
                            </button>
                            <?php endif; ?>
                        </div>
                    </form>
                </div>
            </div>

            <!-- TABLE -->
            <div class="lg:col-span-8">
                <div class="glass rounded-2xl shadow-lg shadow-slate-200/50 border border-white/50 overflow-hidden">
                    <div class="px-6 py-4 border-b border-slate-100 bg-gradient-to-r from-slate-50/80 to-white/80 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-teal-100 text-teal-600 rounded-lg flex items-center justify-center"><i class="fas fa-list text-sm"></i></div>
                            <div>
                                <h2 class="text-lg font-bold text-slate-800">Daftar Mahasiswa</h2>
                                <p class="text-xs text-slate-500"><?php echo $totalMhs; ?> data ditemukan</p>
                            </div>
                        </div>
                        <form action="mahasiswa.php" method="get" class="flex gap-2">
                            <div class="relative">
                                <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                                <input type="text" name="keyword" value="<?php echo htmlspecialchars($keyword); ?>" placeholder="Cari nama mahasiswa..." class="pl-9 pr-4 py-2 bg-white border border-slate-200 rounded-xl text-sm focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 transition-all w-48">
                            </div>
                            <button type="submit" name="cari" class="px-4 py-2 bg-slate-800 hover:bg-slate-900 text-white rounded-xl text-sm font-medium transition btn-press">Cari</button>
                            <?php if ($keyword): ?>
                            <a href="mahasiswa.php" class="px-3 py-2 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-xl text-sm transition btn-press flex items-center"><i class="fas fa-rotate-left text-xs"></i></a>
                            <?php endif; ?>
                        </form>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead>
                                <tr class="bg-slate-50/80 border-b border-slate-200 text-xs uppercase font-bold text-slate-500">
                                    <th class="px-6 py-4">NPM</th>
                                    <th class="px-6 py-4">Nama</th>
                                    <th class="px-6 py-4">Prodi</th>
                                    <th class="px-6 py-4">Alamat</th>
                                    <th class="px-6 py-4">No HP</th>
                                    <th class="px-6 py-4 text-center w-40">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 text-sm">
                                <?php if ($totalMhs > 0): while ($row = $semuaMhs->fetch_assoc()): ?>
                                <tr class="bg-white hover:bg-emerald-50/40 transition-colors group">
                                    <td class="px-6 py-4 font-mono text-slate-600 font-medium"><?php echo htmlspecialchars($row['npm']); ?></td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-emerald-100 to-teal-200 flex items-center justify-center text-emerald-700 text-xs font-bold"><?php echo strtoupper(substr($row['namaMhs'], 0, 1)); ?></div>
                                            <span class="font-semibold text-slate-800"><?php echo htmlspecialchars($row['namaMhs']); ?></span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4"><span class="px-2.5 py-1 bg-emerald-50 text-emerald-700 rounded-md text-xs font-medium border border-emerald-100"><?php echo htmlspecialchars($row['prodi']); ?></span></td>
                                    <td class="px-6 py-4 text-slate-600 max-w-[150px] truncate" title="<?php echo htmlspecialchars($row['alamat']); ?>"><?php echo htmlspecialchars($row['alamat']); ?></td>
                                    <td class="px-6 py-4 text-slate-600"><i class="fas fa-phone text-slate-300 mr-2 text-xs"></i><?php echo htmlspecialchars($row['noHP']); ?></td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="flex items-center justify-center gap-2 opacity-80 group-hover:opacity-100 transition-opacity">
                                            <a href="mahasiswa.php?action=edit&npm=<?php echo $row['npm']; ?>" class="flex items-center gap-1.5 px-3 py-2 bg-amber-50 hover:bg-amber-100 text-amber-700 border border-amber-200 rounded-lg text-xs font-semibold transition btn-press"><i class="fas fa-pen text-[10px]"></i>Edit</a>
                                            <button onclick="confirmDelete('mahasiswa.php?action=delete&npm=<?php echo $row['npm']; ?>', '<?php echo htmlspecialchars(addslashes($row['namaMhs'])); ?>')" class="flex items-center gap-1.5 px-3 py-2 bg-rose-50 hover:bg-rose-100 text-rose-700 border border-rose-200 rounded-lg text-xs font-semibold transition btn-press cursor-pointer"><i class="fas fa-trash text-[10px]"></i>Hapus</button>
                                        </div>
                                    </td>
                                </tr>
                                <?php endwhile; else: ?>
                                <tr><td colspan="6" class="px-6 py-16 text-center">
                                    <div class="flex flex-col items-center text-slate-400">
                                        <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center mb-3"><i class="fas fa-inbox text-2xl text-slate-300"></i></div>
                                        <p class="text-sm font-medium text-slate-500">Belum ada data mahasiswa</p>
                                    </div>
                                </td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php if ($totalMhs > 0): ?>
                    <div class="px-6 py-3 bg-slate-50/50 border-t border-slate-100 flex justify-between items-center">
                        <p class="text-xs text-slate-500">Menampilkan <?php echo $totalMhs; ?> data</p>
                        <div class="flex gap-1 items-center"><span class="w-2 h-2 rounded-full bg-emerald-400"></span><span class="text-[10px] text-slate-400">Real-time</span></div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>

    <div id="deleteModal" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm" onclick="closeDeleteModal()"></div>
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-2xl shadow-2xl max-w-sm w-full p-6 transform transition-all scale-95 opacity-0" id="deleteModalContent">
                <div class="w-12 h-12 bg-rose-100 rounded-full flex items-center justify-center mx-auto mb-4"><i class="fas fa-trash-can text-rose-600 text-xl"></i></div>
                <h3 class="text-lg font-bold text-center text-slate-900 mb-1">Konfirmasi Hapus</h3>
                <p class="text-sm text-center text-slate-500 mb-6">Hapus data mahasiswa <span id="deleteName" class="font-semibold text-slate-700"></span>?</p>
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