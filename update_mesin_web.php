<?php
require 'koneksi.php';

$id = $_POST['id'];
$id_spk = $_POST['id_spk'];
$id_unit_kerja = $_POST['id_unit_kerja'];
$id_bahan_baku = $_POST['id_bahan_baku'];
$shift_kerja = $_POST['shift_kerja'];
$tanggal = $_POST['tanggal'];
$plat = $_POST['jumlah_plat'];
$catern = $_POST['jumlah_catern'];
$roll = $_POST['jumlah_roll'];
$hasil = $_POST['hasil_cetak'];

// Mendapatkan data unit mesin web sebelum diupdate
$sql_unit_mesin_web_old = $conn->query("SELECT id_bahan_baku, jumlah_roll FROM unit_mesin_web WHERE id = $id");
$unit_mesin_web_old = $sql_unit_mesin_web_old->fetch_assoc();
$id_bahan_baku_old = $unit_mesin_web_old['id_bahan_baku'];
$jumlah_roll_old = $unit_mesin_web_old['jumlah_roll'];

// Mendapatkan jumlah persediaan bahan baku saat ini
$sql_bahan_baku = $conn->query("SELECT jumlah_persediaan FROM bahan_baku WHERE id = $id_bahan_baku_old");
$bahan_baku = $sql_bahan_baku->fetch_assoc();
$jumlah_persediaan = $bahan_baku['jumlah_persediaan'];

// Menghitung jumlah persediaan baru
$jumlah_persediaan_baru = $jumlah_persediaan + $jumlah_roll_old - $roll;

// Update data unit mesin web
$sql_update_unit_mesin_web = $conn->query("UPDATE unit_mesin_web SET id_spk = '$id_spk', id_unit_kerja = '$id_unit_kerja', id_bahan_baku = '$id_bahan_baku', shift_kerja = '$shift_kerja', tanggal = '$tanggal', jumlah_plat = '$plat', jumlah_catern = '$catern', jumlah_roll = '$roll', hasil_cetak = '$hasil' WHERE id = $id");

if ($sql_update_unit_mesin_web) {
	// Update jumlah persediaan bahan baku
	$sql_update_bahan_baku = $conn->query("UPDATE bahan_baku SET jumlah_persediaan = $jumlah_persediaan_baru WHERE id = $id_bahan_baku_old");

	if ($sql_update_bahan_baku) {
		header('location:s_admin.php?url=unit_mesin_web');
	} else {
		echo "Gagal mengupdate jumlah persediaan bahan baku.";
	}
} else {
	echo "Gagal mengupdate data unit mesin web.";
}
