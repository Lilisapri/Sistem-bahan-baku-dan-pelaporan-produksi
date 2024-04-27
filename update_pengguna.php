<?php
require 'koneksi.php';
$id=$_POST['id_pengguna'];
$nama=$_POST['nama_user'];
$user=$_POST['username'];
$pass=$_POST['password'];
$level=$_POST['level'];
$sql=$conn->query("update pengguna set nama_user='$nama',username='$user',password='$pass',level='$level' where id_pengguna='$id'");
if ($sql)
{
	header('location:s_admin.php?url=pengguna');
}
?>