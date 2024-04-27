<?php
require 'koneksi.php';

$id = $_POST['id'];
$kode_bahan_baku = $_POST['kode_bahan_baku'];
$nama = $_POST['nama'];
$jenis = $_POST['jenis'];
$satuan = $_POST['satuan'];
$harga = $_POST['harga'];
$jumlah_persediaan = $_POST['jumlah_persediaan'];

$sql = "UPDATE bahan_baku SET kode_bahan_baku='$kode_bahan_baku', nama='$nama', jenis='$jenis', satuan='$satuan', harga='$harga', jumlah_persediaan='$jumlah_persediaan' WHERE id='$id'";
$result = mysqli_query($conn, $sql);

if ($result) {
    header('location: s_admin.php?url=bahan_baku');
} else {
    echo "Gagal mengupdate data bahan baku.";
}

