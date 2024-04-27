<?php
require 'koneksi.php';

// Ambil data dari form
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
$frekuensiPemesanan = $jumlahPesananTahunan / $eoq;

// Hitung total biaya
$totalBiaya = ($biayaPesananPerOrder * $frekuensiPemesanan) + ($hargaPerBahanBaku * $eoq / 2);

// Simpan hasil perhitungan ke dalam tabel
$sql = "INSERT INTO tabel_eoq (id_bahan_baku, jumlah_pesanan, per_periode_kebutuhan, biaya_pesanan_per_order, harga_per_bahan_baku, eoq, frekuensi_pemesanan, total_biaya) 
        VALUES ('$idBahanBaku', '$jumlahPesanan', '$perPeriodeKebutuhan', '$biayaPesananPerOrder', '$hargaPerBahanBaku', '$eoq', '$frekuensiPemesanan', '$totalBiaya')";

if ($conn->query($sql) === TRUE) {
	echo "Hasil perhitungan EOQ berhasil disimpan.";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

// Redirect kembali ke halaman utama EOQ
header("Location: s_admin.php?url=eoq_produksi");
exit();
