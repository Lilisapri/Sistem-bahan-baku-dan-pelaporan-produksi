<?php
require 'koneksi.php';

$id = $_POST['id_spk'];
$no_spk = $_POST['no_spk'];
$judul_buku = $_POST['judul_buku'];
$no_isbn = $_POST['no_isbn'];
$tanggal = $_POST['tanggal'];
$tanggal_permintaan_selesai = $_POST['tanggal_permintaan_selesai'];
$oplah_cetak = $_POST['oplah_cetak'];
$oplah_insheet = $_POST['oplah_insheet'];
$ukuran_buku = $_POST['ukuran_buku'];
$jumlah_halaman = $_POST['jumlah_halaman'];
$jumlah_catern = $_POST['jumlah_catern'];
$jumlah_plat = $_POST['jumlah_plat'];
$ukuran_kertas = $_POST['ukuran_kertas'];
$kebutuhan_kertas = $_POST['kebutuhan_kertas'];
$mesin_cetak = $_POST['mesin_cetak'];

$sql = $conn->query("UPDATE spk SET no_spk='$no_spk', judul_buku='$judul_buku', no_isbn='$no_isbn', tanggal='$tanggal', tanggal_permintaan_selesai='$tanggal_permintaan_selesai',
oplah_cetak='$oplah_cetak', oplah_insheet='$oplah_insheet', ukuran_buku='$ukuran_buku', jumlah_halaman='$jumlah_halaman', jumlah_catern='$jumlah_catern', jumlah_plat='$jumlah_plat',
ukuran_kertas='$ukuran_kertas', kebutuhan_kertas='$kebutuhan_kertas', mesin_cetak='$mesin_cetak' WHERE id_spk='$id'");
if ($sql) {
    header('location:pracetak.php?url=data');
}
?>