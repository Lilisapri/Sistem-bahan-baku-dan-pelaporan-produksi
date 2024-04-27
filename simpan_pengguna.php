<?php
require 'koneksi.php';
$nama_user = $_POST['nama_user'];
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

echo $nama;
echo $user;
echo $pass;
echo $level;

$sql = $conn->query("insert into pengguna(nama_user,username,password,level) 
values('$nama_user','$username','$password','$level')");
if ($sql) {
	header('location:s_admin.php?url=pengguna');
}
