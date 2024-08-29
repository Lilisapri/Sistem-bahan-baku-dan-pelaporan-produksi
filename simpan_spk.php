<?php
session_start();
require 'koneksi.php';

$idp = $_SESSION['id'];
$no_spk = $_POST['no_spk'];
$judul_buku = $_POST['judul_buku'];
$no_isbn = $_POST['no_isbn'];
$tanggal = $_POST['tanggal'];
$tanggal_permintaan_selesai = $_POST['tanggal_permintaan_selesai'];
$oplah_cetak = $_POST['oplah_cetak'];
$oplah_insheet = $_POST['oplah_insheet'];
$ukuran_buku = $_POST['ukuran_buku'];
$jumlah_halaman = $_POST['jumlah_halaman'];
$model_catern = $_POST['model_catern'];
$jumlah_catern = $_POST['jumlah_catern'];
$jumlah_plat = $_POST['jumlah_plat'];
$ukuran_kertas = $_POST['ukuran_kertas'];
$kebutuhan_kertas = $_POST['kebutuhan_kertas'];
$mesin_cetak = $_POST['mesin_cetak'];

$sql = $conn->query("INSERT INTO spk(id_pengguna, no_spk, judul_buku, no_isbn, tanggal, tanggal_permintaan_selesai, oplah_cetak, oplah_insheet, ukuran_buku, jumlah_halaman, model_catern, jumlah_catern,
    jumlah_plat, ukuran_kertas, kebutuhan_kertas, mesin_cetak) 
    VALUES ('$idp', '$no_spk', '$judul_buku', '$no_isbn', '$tanggal', '$tanggal_permintaan_selesai', '$oplah_cetak', '$oplah_insheet', '$ukuran_buku', '$jumlah_halaman', '$model_catern', '$jumlah_catern',
    '$jumlah_plat', '$ukuran_kertas', '$kebutuhan_kertas', '$mesin_cetak')");

if ($sql) {
    header('location:pracetak.php?url=data');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
