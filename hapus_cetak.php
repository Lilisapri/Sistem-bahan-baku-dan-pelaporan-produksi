<?php
require 'koneksi.php';
$sql = $conn->query("delete from unit_cetak where id = '$_GET[id]' ");
if ($sql) {
	header('location:s_admin.php?url=unit_cetak');
}
