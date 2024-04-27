<?php
require 'koneksi.php';

$id_spk = $_POST['id_spk'];
$id_unit_kerja = $_POST['id_unit_kerja'];
$shift_kerja = $_POST['shift_kerja'];
$tanggal = $_POST['tanggal'];
$total_potong = $_POST['total_potong'];
$total_sisir = $_POST['total_sisir'];
$id_bahan_baku = $_POST['id_bahan_baku'];

// Mengurangi jumlah persediaan bahan baku
$sql_bahan_baku = $conn->query("UPDATE bahan_baku SET jumlah_persediaan = jumlah_persediaan - $total_potong WHERE id = $id_bahan_baku");

$sql = $conn->query("INSERT INTO `unit_potong` (`id_spk`, `id_unit_kerja`, `shift_kerja`, `tanggal`, `total_potong`, `total_sisir`, `id_bahan_baku`) VALUES ($id_spk, $id_unit_kerja, '$shift_kerja', '$tanggal', '$total_potong', '$total_sisir', $id_bahan_baku)");

if ($sql && $sql_bahan_baku) {
	header('location:s_admin.php?url=unit_potong');
} else {
	echo "Terjadi kesalahan saat menyimpan data.";
}
