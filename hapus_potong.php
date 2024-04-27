<?php
require 'koneksi.php';

$id = $_GET['id'];

// Mendapatkan data unit potong yang akan dihapus
$sql_data = $conn->query("SELECT * FROM unit_potong WHERE id = $id");
$data = $sql_data->fetch_assoc();
$total_potong = $data['total_potong'];
$id_bahan_baku = $data['id_bahan_baku'];

// Mengembalikan jumlah persediaan bahan baku
$sql_bahan_baku = $conn->query("UPDATE bahan_baku SET jumlah_persediaan = jumlah_persediaan + $total_potong WHERE id = $id_bahan_baku");

$sql = $conn->query("DELETE FROM unit_potong WHERE id = $id");

if ($sql && $sql_bahan_baku) {
	header('location:s_admin.php?url=unit_potong');
} else {
	echo "Terjadi kesalahan saat menghapus data.";
}
