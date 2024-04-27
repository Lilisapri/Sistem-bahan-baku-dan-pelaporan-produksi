<?php
require 'koneksi.php';

// Ambil data dari form
$id = $_POST['id'];
$idBahanBaku = $_POST['id_bahan_baku'];
$jumlahPesanan = $_POST['jumlah_pesanan'];
$perPeriodeKebutuhan = $_POST['per_periode_kebutuhan'];
$biayaPesananPerOrder = $_POST['biaya_pesanan_per_order'];
$hargaPerBahanBaku = $_POST['harga_per_bahan_baku'];

// Konversi jumlah pesanan ke jumlah pesanan tahunan berdasarkan per periode kebutuhan
switch ($perPeriodeKebutuhan) {
	case 'hari':
		$jumlahPesananTahunan = $jumlahPesanan * 365;
		break;
	case 'minggu':
		$jumlahPesananTahunan = $jumlahPesanan * 52;
		break;
	case 'bulan':
		$jumlahPesananTahunan = $jumlahPesanan * 12;
		break;
	case 'tahun':
		$jumlahPesananTahunan = $jumlahPesanan;
		break;
	default:
		$jumlahPesananTahunan = 0;
}

// Hitung EOQ
$eoq = sqrt((2 * $jumlahPesananTahunan * $biayaPesananPerOrder) / $hargaPerBahanBaku);

// Hitung frekuensi pemesanan
if ($eoq != 0) {
	$frekuensiPemesanan = $jumlahPesananTahunan / $eoq;
} else {
	$frekuensiPemesanan = 0;
}

// Hitung total biaya
$totalBiaya = ($biayaPesananPerOrder * $frekuensiPemesanan) + ($hargaPerBahanBaku * $eoq / 2);

// Update data EOQ di tabel
$sql = "UPDATE tabel_eoq SET
        id_bahan_baku = '$idBahanBaku',
        jumlah_pesanan = '$jumlahPesanan',
        per_periode_kebutuhan = '$perPeriodeKebutuhan',
        biaya_pesanan_per_order = '$biayaPesananPerOrder',
        harga_per_bahan_baku = '$hargaPerBahanBaku',
        eoq = '$eoq',
        frekuensi_pemesanan = '$frekuensiPemesanan',
        total_biaya = '$totalBiaya'
        WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
	echo "Data EOQ berhasil diperbarui.";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

// Redirect kembali ke halaman daftar EOQ
header("Location: s_admin.php?url=eoq_produksi");
exit();
