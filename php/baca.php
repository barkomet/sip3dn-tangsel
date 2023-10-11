<?php
include('koneksi.php');

$sql = "SELECT * FROM tabel-data";
$result = $koneksi->query($sql);

if ($result->num_rows > 0) {
    echo '<table>
            <tr>
                <th>Kode Sirup</th>
                <th>Nama Paket</th>
                <th>Metode Pengadaan</th>
                <th>Pagu Paket</th>
                <th>Realisasi PDN</th>
                <th>Status PDN</th>
                <th>Tanggal Selesai Pelaksanaan Pekerjaan</th>
                <th>Aksi</th>
            </tr>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>
                <td>' . $row['kode'] . '</td>
                <td>' . $row['nama'] . '</td>
                <td>' . $row['metode'] . '</td>
                <td>' . $row['pagu'] . '</td>
                <td>' . $row['realisasi'] . '</td>
                <td>' . $row['status'] . '</td>
                <td>' . $row['tanggal'] . '</td>
                <td>
                    <a href="edit.php?id=' . $row['id'] . '">Edit</a>
                    <a href="hapus.php?id=' . $row['id'] . '">Hapus</a>
                </td>
            </tr>';
    }
    echo '</table>';
} else {
    echo "Tidak ada data yang ditemukan.";
}

$koneksi->close();
