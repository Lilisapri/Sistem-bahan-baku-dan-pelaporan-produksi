<?php
require 'koneksi.php';
$id=$_POST['id'];
$id_spk=$_POST['id_spk'];
$id_unit_kerja=$_POST['id_unit_kerja'];
$shift_kerja=$_POST['shift_kerja'];
$tanggal=$_POST['tanggal'];
$lipat=$_POST['hasil_lipat'];

$sql = $conn->query("UPDATE `unit_stahl` SET `id_spk`='$id_spk', `id_unit_kerja`='$id_unit_kerja', `shift_kerja`='$shift_kerja', `tanggal`='$tanggal', 
`hasil_lipat`='$lipat' WHERE id='$id'");
if ($sql)
{
	header('location:s_admin.php?url=unit_stahl');
}
?>