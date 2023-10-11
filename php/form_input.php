<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

include('includes/db.php'); // Pastikan ini merujuk ke file koneksi database yang sesuai.

// Fungsi untuk menambahkan data ke database
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $metode = $_POST['metode'];
    $pagu = $_POST['pagu'];
    $realisasi = $_POST['realisasi'];
    $status = $_POST['status'];
    $tanggal = $_POST['tanggal'];

    $sql = "INSERT INTO tabel_data (kode_sirup, nama_paket, metode_pengadaan, pagu_paket, realisasi_pdn, status_pdn, tanggal_selesai) VALUES ('$kode', '$nama', '$metode', '$pagu', '$realisasi', '$status', '$tanggal')";
    $result = $koneksi->query($sql);

    if ($result) {
        // Redirect ke halaman ini sendiri setelah berhasil menambahkan data
        header('Location: form-input.php');
        exit();
    } else {
        echo "Gagal menambahkan data: " . $koneksi->error;
    }
}

// Fungsi untuk menampilkan data dari database
$sql = "SELECT * FROM tabel_data";
$result = $koneksi->query($sql);
$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form Input Data</title>
    <link rel="stylesheet" href="/pages/form input data/style.css" />
</head>

<body>
    <div class="container">
        <h1>Form Input Data</h1>
        <form id="data-form" method="POST">
            <!-- Tambahkan atribut "name" pada setiap input -->
            <div class="form-group">
                <label for="kode">Kode Sirup:</label>
                <input type="text" id="kode" name="kode" maxlength="15" required />
            </div>
            <div class="form-group">
                <label for="nama">Nama Paket:</label>
                <input type="text" id="nama" name="nama" maxlength="50" required />
            </div>
            <div class="form-group">
                <label for="metode">Metode Pengadaan:</label>
                <select id="metode" name="metode" required>
                    <option value="e-purchasing">E-Purchasing</option>
                    <option value="pengadaan-langsung">Pengadaan Langsung</option>
                    <option value="penunjukan-langsung">Penunjukan Langsung</option>
                    <option value="tender">Tender</option>
                    <option value="tender-cepat">Tender Cepat</option>
                </select>
            </div>
            <div class="form-group">
                <label for="pagu">Pagu Paket:</label>
                <input type="number" id="pagu" name="pagu" maxlength="25" required />
            </div>
            <div class="form-group">
                <label for="realisasi">Realisasi PDN:</label>
                <input type="number" id="realisasi" name="realisasi" maxlength="25" required />
            </div>
            <div class="form-group">
                <label for="status">Status PDN:</label>
                <select id="status" name="status" required>
                    <option value="sertifikasi-TKDN">Sertifikasi TKDN</option>
                    <option value="pernyataan-penyedia">Pernyataan Penyedia</option>
                    <option value="perkiraan-PPKo">Perkiraan PPKo</option>
                    <option value="perhitungan-tim-P3DN">Perhitungan Tim P3DN</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal Selesai Pelaksanaan Pekerjaan:</label>
                <input type="date" id="tanggal" name="tanggal" required />
            </div>
            <button type="submit">Tambah Data</button>
        </form>

        <table id="tabel-data">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Kode Sirup</th>
                    <th>Nama Paket</th>
                    <th>Metode Pengadaan</th>
                    <th>Pagu Paket</th>
                    <th>Realisasi PDN</th>
                    <th>Status PDN</th>
                    <th>Tanggal Selesai Pelaksanaan Pekerjaan</th>
                </tr>
            </thead>
            <tbody>
                <!-- Menampilkan data dari database -->
                <?php foreach ($data as $row) { ?>
                    <tr>
                        <td><?php echo $row['nomor']; ?></td>
                        <td><?php echo $row['kode_sirup']; ?></td>
                        <td><?php echo $row['nama_paket']; ?></td>
                        <td><?php echo $row['metode_pengadaan']; ?></td>
                        <td><?php echo $row['pagu_paket']; ?></td>
                        <td><?php echo $row['realisasi_pdn']; ?></td>
                        <td><?php echo $row['status_pdn']; ?></td>
                        <td><?php echo $row['tanggal_selesai']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script src="script.js"></script>
</body>

</html>