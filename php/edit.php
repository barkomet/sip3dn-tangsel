<?php
include('koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $metode = $_POST['metode'];
    $pagu = $_POST['pagu'];
    $realisasi = $_POST['realisasi'];
    $status = $_POST['status'];
    $tanggal = $_POST['tanggal'];

    $sql = "UPDATE tabel-data SET kode='$kode', nama='$nama', metode='$metode', pagu='$pagu', realisasi='$realisasi', status='$status', tanggal='$tanggal' WHERE id=$id";

    if ($koneksi->query($sql) === TRUE) {
        header("Location: baca.php");
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

$id = $_GET['id'];
$sql = "SELECT * FROM tabel-data WHERE id=$id";
$result = $koneksi->query($sql);
$row = $result->fetch_assoc();
?>

<!-- Form untuk mengedit data -->
<form method="POST" action="edit.php">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    Kode Sirup: <input type="text" name="kode" value="<?php echo $row['kode']; ?>"><br>
    Nama Paket: <input type="text" name="nama" value="<?php echo $row['nama']; ?>"><br>
    Metode Pengadaan: <input type="text" name="metode" value="<?php echo $row['metode']; ?>"><br>
    Pagu Paket: <input type="text" name="pagu" value="<?php echo $row['pagu']; ?>"><br>
    Realisasi PDN: <input type="text" name="realisasi" value="<?php echo $row['realisasi']; ?>"><br>
    Status PDN: <input type="text" name="status" value="<?php echo $row['status']; ?>"><br>
    Tanggal Selesai Pelaksanaan Pekerjaan: <input type="text" name="tanggal" value="<?php echo $row['tanggal']; ?>"><br>
    <input type="submit" value="Simpan">
</form>