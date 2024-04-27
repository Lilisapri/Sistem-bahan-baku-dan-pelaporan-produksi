<?php
require 'koneksi.php';
$id_spk=$_POST['id_spk'];
$id_unit_kerja=$_POST['id_unit_kerja'];
$shift_kerja=$_POST['shift_kerja'];
$tanggal=$_POST['tanggal'];
$total_catern=$_POST['total_catern'];
$total_plat=$_POST['total_plat'];
$total_lembar=$_POST['total_lembar'];

echo $id_spk;
echo $id_unit_kerja;
echo $shift_kerja;
echo $tanggal;
echo $total_catern;
echo $total_plat;
echo $total_lembar;


$sql = $conn->query("INSERT INTO `unit_cetak` (`id_spk`, `id_unit_kerja`, `shift_kerja`, `tanggal`, `total_catern`,`total_plat`,`total_lembar`) 
VALUES ($id_spk,$id_unit_kerja,'$shift_kerja','$tanggal','$total_catern','$total_plat','$total_lembar')");

print_r($sql);

if ($sql)
{
	header('location:s_admin.php?url=unit_cetak');
}

?> 