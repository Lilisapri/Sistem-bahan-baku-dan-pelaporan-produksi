<?php
require 'koneksi.php';
$id=$_POST['id'];
$id_spk=$_POST['id_spk'];
$id_unit_kerja=$_POST['id_unit_kerja'];
$shift_kerja=$_POST['shift_kerja'];
$tanggal=$_POST['tanggal'];
$buku=$_POST['total_buku'];

$sql = $conn->query("UPDATE `unit_packing` SET `id_spk`='$id_spk', `id_unit_kerja`='$id_unit_kerja', `shift_kerja`='$shift_kerja', `tanggal`='$tanggal', 
`total_buku`='$buku'WHERE id='$id'");
if ($sql)
{
	header('location:s_admin.php?url=unit_packing');
}
?>