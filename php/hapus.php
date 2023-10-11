<?php
include('koneksi.php');

$id = $_GET['id'];

$sql = "DELETE FROM tabel-data WHERE id=$id";

if ($koneksi->query($sql) === TRUE) {
    header("Location: baca.php");
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}

$koneksi->close();
