<?php
require 'koneksi.php';

$id_spk = $_POST['id_spk'];
$id_unit_kerja = $_POST['id_unit_kerja'];
$id_bahan_baku = $_POST['id_bahan_baku'];
$shift_kerja = $_POST['shift_kerja'];
$tanggal = $_POST['tanggal'];
$plat = $_POST['jumlah_plat'];
$catern = $_POST['jumlah_catern'];
$roll = $_POST['jumlah_roll'];
$hasil = $_POST['hasil_cetak'];

// Mendapatkan jumlah persediaan bahan baku saat ini
$sql_bahan_baku = $conn->query("SELECT jumlah_persediaan FROM bahan_baku WHERE id = $id_bahan_baku");
$bahan_baku = $sql_bahan_baku->fetch_assoc();
$jumlah_persediaan = $bahan_baku['jumlah_persediaan'];

// Mengurangi jumlah persediaan bahan baku
$jumlah_persediaan_baru = $jumlah_persediaan - $roll;

// Menyimpan data unit mesin web
$sql_unit_mesin_web = $conn->query("INSERT INTO `unit_mesin_web` (`id_spk`, `id_unit_kerja`, `id_bahan_baku`, `shift_kerja`, `tanggal`, `jumlah_plat`, `jumlah_catern`, `jumlah_roll`, `hasil_cetak`) VALUES ($id_spk, $id_unit_kerja, $id_bahan_baku, '$shift_kerja', '$tanggal', '$plat', '$catern', '$roll', '$hasil')");

if ($sql_unit_mesin_web) {
	// Update jumlah persediaan bahan baku
	$sql_update_bahan_baku = $conn->query("UPDATE bahan_baku SET jumlah_persediaan = $jumlah_persediaan_baru WHERE id = $id_bahan_baku");

	if ($sql_update_bahan_baku) {
		header('location:s_admin.php?url=unit_mesin_web');
	} else {
		echo "Gagal mengupdate jumlah persediaan bahan baku.";
	}
} else {
	echo "Gagal menyimpan data unit mesin web.";
}
