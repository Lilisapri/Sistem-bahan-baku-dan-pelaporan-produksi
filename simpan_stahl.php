<?php
require 'koneksi.php';
$id_spk=$_POST['id_spk'];
$id_unit_kerja=$_POST['id_unit_kerja'];
$shift_kerja=$_POST['shift_kerja'];
$tanggal=$_POST['tanggal'];
$lipat=$_POST['hasil_lipat'];

echo $id_spk;
echo $id_unit_kerja;
echo $shift_kerja;
echo $tanggal;
echo $lipat;


$sql = $conn->query("INSERT INTO `unit_stahl` (`id_spk`, `id_unit_kerja`, `shift_kerja`, `tanggal`, `hasil_lipat`) 
VALUES ($id_spk,$id_unit_kerja,'$shift_kerja','$tanggal','$lipat')");

print_r($sql);

if ($sql)
{
	header('location:s_admin.php?url=unit_stahl');
}

?> 