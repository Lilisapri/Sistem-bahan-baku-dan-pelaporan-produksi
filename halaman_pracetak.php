<?php
if (isset($_GET['url'])) {
	$url = $_GET['url'];

	switch ($url) {
		case 'beranda_pracetak':
			include 'beranda_pracetak.php';
			break;

		case 'data':
			include 'data.php';
			break;

		case 'pracetak':
			include 'pracetak.php';
			break;

		case 'tambah_spk':
			include 'tambah_spk.php';
			break;

		case 'edit_spk':
			include 'edit_spk.php';
			break;

		case 'hapus_spk':
			include 'hapus_spk.php';
			break;

		case 'bahan_baku':
			include 'bahan_baku_pracetak.php';
			break;

		default:
			echo "selamat datang di Admin pra cetak";
			break;
	}
}
