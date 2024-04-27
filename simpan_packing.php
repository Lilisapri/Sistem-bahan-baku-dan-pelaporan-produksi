<?php
require 'koneksi.php';
$id_spk=$_POST['id_spk'];
$id_unit_kerja=$_POST['id_unit_kerja'];
$shift_kerja=$_POST['shift_kerja'];
$tanggal=$_POST['tanggal'];
$buku=$_POST['total_buku'];

echo $id_spk;
echo $id_unit_kerja;
echo $shift_kerja;
echo $tanggal;
echo $buku;


$sql = $conn->query("INSERT INTO `unit_packing` (`id_spk`, `id_unit_kerja`, `shift_kerja`, `tanggal`, `total_buku`) 
VALUES ($id_spk,$id_unit_kerja,'$shift_kerja','$tanggal','$buku')");

print_r($sql);

if ($sql)
{
	header('location:s_admin.php?url=unit_packing');
}

?> 