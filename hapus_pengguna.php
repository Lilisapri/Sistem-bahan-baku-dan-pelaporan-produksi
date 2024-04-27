<?php
require 'koneksi.php';
$sql=$conn->query("delete from pengguna where id_pengguna='$_GET[id_pengguna]' ");
if($sql)
{
	header('location:s_admin.php?url=pengguna');
}
?>