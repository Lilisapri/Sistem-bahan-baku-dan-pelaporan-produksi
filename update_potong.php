<?php
require 'koneksi.php';

$id = $_POST['id'];
$id_spk = $_POST['id_spk'];
$id_unit_kerja = $_POST['id_unit_kerja'];
$shift_kerja = $_POST['shift_kerja'];
$tanggal = $_POST['tanggal'];
$total_potong = $_POST['total_potong'];
$total_sisir = $_POST['total_sisir'];
$id_bahan_baku = $_POST['id_bahan_baku'];

// Mendapatkan data unit potong sebelum diupdate
$sql_old_data = $conn->query("SELECT * FROM unit_potong WHERE id = $id");
$old_data = $sql_old_data->fetch_assoc();
$old_total_potong = $old_data['total_potong'];

// Menyesuaikan jumlah persediaan bahan baku
$sql_bahan_baku = $conn->query("UPDATE bahan_baku SET jumlah_persediaan = jumlah_persediaan + $old_total_potong - $total_potong WHERE id = $id_bahan_baku");

$sql = $conn->query("UPDATE `unit_potong` SET `id_spk` = '$id_spk', `id_unit_kerja` = '$id_unit_kerja', `shift_kerja` = '$shift_kerja', `tanggal` = '$tanggal', `total_potong` = '$total_potong', `total_sisir` = '$total_sisir', `id_bahan_baku` = $id_bahan_baku WHERE id = $id");

if ($sql && $sql_bahan_baku) {
	header('location:s_admin.php?url=unit_potong');
} else {
	echo "Terjadi kesalahan saat mengupdate data.";
}
