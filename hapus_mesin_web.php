<?php
require 'koneksi.php';

$id = $_GET['id'];

// Mendapatkan data unit mesin web sebelum dihapus
$sql_unit_mesin_web = $conn->query("SELECT id_bahan_baku, jumlah_roll FROM unit_mesin_web WHERE id = $id");
$unit_mesin_web = $sql_unit_mesin_web->fetch_assoc();
$id_bahan_baku = $unit_mesin_web['id_bahan_baku'];
$jumlah_roll = $unit_mesin_web['jumlah_roll'];

// Mendapatkan jumlah persediaan bahan baku saat ini
$sql_bahan_baku = $conn->query("SELECT jumlah_persediaan FROM bahan_baku WHERE id = $id_bahan_baku");
$bahan_baku = $sql_bahan_baku->fetch_assoc();
$jumlah_persediaan = $bahan_baku['jumlah_persediaan'];

// Menghitung jumlah persediaan baru
$jumlah_persediaan_baru = $jumlah_persediaan + $jumlah_roll;

// Hapus data unit mesin web
$sql_delete_unit_mesin_web = $conn->query("DELETE FROM unit_mesin_web WHERE id = $id");

if ($sql_delete_unit_mesin_web) {
	// Update jumlah persediaan bahan baku
	$sql_update_bahan_baku = $conn->query("UPDATE bahan_baku SET jumlah_persediaan = $jumlah_persediaan_baru WHERE id = $id_bahan_baku");

	if ($sql_update_bahan_baku) {
		header('location:s_admin.php?url=unit_mesin_web');
	} else {
		echo "Gagal mengupdate jumlah persediaan bahan baku.";
	}
} else {
	echo "Gagal menghapus data unit mesin web.";
}
