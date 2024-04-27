<?php
require 'koneksi.php';
$id=$_POST['id'];
$id_spk=$_POST['id_spk'];
$id_unit_kerja=$_POST['id_unit_kerja'];
$shift_kerja=$_POST['shift_kerja'];
$tanggal=$_POST['tanggal'];
$gabung=$_POST['jumlah_gabung'];

$sql = $conn->query("UPDATE `unit_finishing` SET `id_spk`='$id_spk', `id_unit_kerja`='$id_unit_kerja', `shift_kerja`='$shift_kerja', `tanggal`='$tanggal', 
`jumlah_gabung`='$gabung'WHERE id='$id'");
if ($sql)
{
	header('location:s_admin.php?url=unit_finishing');
}
?>