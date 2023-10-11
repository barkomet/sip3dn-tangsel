<?php
include('koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $metode = $_POST['metode'];
    $pagu = $_POST['pagu'];
    $realisasi = $_POST['realisasi'];
    $status = $_POST['status'];
    $tanggal = $_POST['tanggal'];

    $sql = "INSERT INTO tabel-data (kode, nama, metode, pagu, realisasi, status, tanggal) VALUES ('$kode', '$nama', '$metode', '$pagu', '$realisasi', '$status', '$tanggal')";

    if ($koneksi->query($sql) === TRUE) {
        echo "Data berhasil ditambahkan.";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }

    $koneksi->close();
}
?>
