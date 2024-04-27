<?php
require 'koneksi.php';
$sql=$conn->query("delete from spk where id_spk='$_GET[id_spk]' ");
if($sql)
{
	header('location:pracetak.php?url=data');
}
?>