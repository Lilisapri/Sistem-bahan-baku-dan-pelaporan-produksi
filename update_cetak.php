<?php
require 'koneksi.php';
$id=$_POST['id'];
$id_spk=$_POST['id_spk'];
$id_unit_kerja=$_POST['id_unit_kerja'];
$shift_kerja=$_POST['shift_kerja'];
$tanggal=$_POST['tanggal'];
$catern=$_POST['total_catern'];
$plat=$_POST['total_plat'];
$total=$_POST['total_lembar'];

$sql = $conn->query("UPDATE unit_cetak SET id_spk='$id_spk', id_unit_kerja='$id_unit_kerja', shift_kerja='$shift_kerja', tanggal='$tanggal', total_catern='$catern', total_plat='$plat',total_lembar='$total' WHERE id='$id'");
if ($sql)
{
	header('location:s_admin.php?url=unit_cetak');
}
?>