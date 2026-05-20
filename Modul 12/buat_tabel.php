<?php

require_once "database.php";
$db = new Database();

$hasil = [];

$hasil[] = [
    'nama' => 't_login',
    'status' => $db->createTableLogin()
];

$hasil[] = [
    'nama' => 't_dosen',
    'status' => $db->createTable("t_dosen", "
        idDosen INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        namaDosen VARCHAR(100) NOT NULL,
        noHP VARCHAR(15) NOT NULL
    ")
];

$hasil[] = [
    'nama' => 't_mahasiswa',
    'status' => $db->createTable("t_mahasiswa", "
        npm VARCHAR(20) PRIMARY KEY,
        namaMhs VARCHAR(100) NOT NULL,
        prodi VARCHAR(100) NOT NULL,
        alamat TEXT NOT NULL,
        noHP VARCHAR(15) NOT NULL
    ")
];

$hasil[] = [
    'nama' => 't_matakuliah',
    'status' => $db->createTable("t_matakuliah", "
        kodeMK VARCHAR(20) PRIMARY KEY,
        namaMK VARCHAR(100) NOT NULL,
        sks INT(2) NOT NULL,
        jam INT(2) NOT NULL
    ")
];

$db->closeConnection();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Tabel - SIAKAD Modul 12</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="theme-dosen text-slate-700 antialiased flex items-center justify-center min-h-screen p-4">

    <div class="w-full max-w-lg">
        <div class="glass rounded-2xl shadow-xl shadow-slate-200/50 overflow-hidden">
            <div class="px-6 py-5 border-b border-slate-100 bg-gradient-to-r from-blue-50/80 to-white/80 flex items-center gap-3">
                <a href="index.php" class="w-8 h-8 rounded-lg bg-white border border-slate-200 flex items-center justify-center text-slate-500 hover:text-blue-600 transition btn-press">
                    <i class="fas fa-arrow-left text-sm"></i>
                </a>
                <div>
                    <h2 class="text-lg font-bold text-slate-800">Pembuatan Tabel</h2>
                    <p class="text-xs text-slate-500">Otomatis membuat tabel database</p>
                </div>
            </div>

            <div class="p-6 space-y-4">
                <div class="bg-blue-50 border border-blue-200 rounded-xl p-4">
                    <div class="flex items-start gap-3">
                        <i class="fas fa-circle-info text-blue-500 mt-0.5"></i>
                        <div class="text-sm text-blue-700">
                            <p class="font-semibold mb-1">Informasi</p>
                            <p class="text-xs leading-relaxed">File ini akan membuat semua tabel yang dibutuhkan sistem. Jika tabel sudah ada, sistem akan melewati pembuatan.</p>
                        </div>
                    </div>
                </div>

                <div class="space-y-3">
                    <?php foreach ($hasil as $item): ?>
                    <div class="flex items-center gap-3 p-4 bg-white border border-slate-200 rounded-xl">
                        <div class="w-10 h-10 rounded-lg bg-emerald-50 flex items-center justify-center text-emerald-600">
                            <i class="fas fa-table"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-sm font-semibold text-slate-800"><?php echo htmlspecialchars($item['nama']); ?></h3>
                            <p class="text-xs text-slate-500"><?php echo htmlspecialchars($item['status']); ?></p>
                        </div>
                        <i class="fas fa-check-circle text-emerald-500"></i>
                    </div>
                    <?php endforeach; ?>
                </div>

                <div class="pt-2">
                    <a href="index.php" class="block w-full text-center bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold py-3 rounded-xl transition-all shadow-lg shadow-blue-500/25 btn-press">
                        <i class="fas fa-home mr-2"></i> Kembali ke Dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>