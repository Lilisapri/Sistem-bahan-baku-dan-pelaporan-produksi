<?php
require 'koneksi.php';
$id_spk = $_POST['id_spk'];
$id_unit_kerja = $_POST['id_unit_kerja'];
$shift_kerja = $_POST['shift_kerja'];
$tanggal = $_POST['tanggal'];
$gabung = $_POST['jumlah_gabung'];

echo $id_spk;
echo $id_unit_kerja;
echo $shift_kerja;
echo $tanggal;
echo $gabung;


$sql = $conn->query("INSERT INTO `unit_finishing` (`id_spk`, `id_unit_kerja`, `shift_kerja`, `tanggal`, `jumlah_gabung`) 
VALUES ($id_spk,$id_unit_kerja,'$shift_kerja','$tanggal','$gabung')");

print_r($sql);

if ($sql) {
	header('location:s_admin.php?url=unit_finishing');
}
