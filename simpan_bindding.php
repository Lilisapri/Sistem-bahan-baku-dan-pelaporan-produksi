<?php
require 'koneksi.php';
$id_spk=$_POST['id_spk'];
$id_unit_kerja=$_POST['id_unit_kerja'];
$shift_kerja=$_POST['shift_kerja'];
$tanggal=$_POST['tanggal'];
$bindding=$_POST['jumlah_bindding'];

echo $id_spk;
echo $id_unit_kerja;
echo $shift_kerja;
echo $tanggal;
echo $bindding;


$sql = $conn->query("INSERT INTO `unit_bindding` (`id_spk`, `id_unit_kerja`, `shift_kerja`, `tanggal`, `jumlah_bindding`) 
VALUES ($id_spk,$id_unit_kerja,'$shift_kerja','$tanggal','$bindding')");

print_r($sql);

if ($sql)
{
	header('location:s_admin.php?url=unit_bindding');
}

?> 