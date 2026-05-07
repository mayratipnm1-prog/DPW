<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $nim    = $_POST['nim'];
    $nama   = $_POST['nama'];
    $email  = $_POST['email'];
    $tempat = $_POST['tempat'];
    $ttl    = $_POST['ttl'];
    $alamat = $_POST['alamat'];
    
    $gender = isset($_POST['gender']) ? $_POST['gender'] : "Belum dipilih";

    echo "<h2>Data Pendaftaran Berhasil Diterima</h2>";
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr><td>NIM</td><td>: $nim</td></tr>";
    echo "<tr><td>Nama</td><td>: $nama</td></tr>";
    echo "<tr><td>Email</td><td>: $email</td></tr>";
    echo "<tr><td>Tempat Lahir</td><td>: $tempat</td></tr>";
    echo "<tr><td>Tanggal Lahir</td><td>: $ttl</td></tr>";
    echo "<tr><td>Alamat</td><td>: $alamat</td></tr>";
    echo "<tr><td>Jenis Kelamin</td><td>: $gender</td></tr>";
    echo "</table>";

    echo "<br><a href='form_pendaftaran.html'>Kembali ke Form</a>";

} else {
    echo "Akses tidak ditampilkan dilarang. Silakan isi form terlebih dahulu.";
}
?>