<?php
if (isset($_GET['url'])) {
	$url = $_GET['url'];

	switch ($url) {
		case 'beranda_produksi':
			include 'beranda_produksi.php';
			break;
			
		case 'produksi':
			include 'produksi.php';
			break;
			
		case 'bahan_baku':
			include 'bahan_baku_produksi.php';
			break;

		case 'data_spk_produksi':
			include 'data_spk_produksi.php';
			break;


		default:
			echo "selamat datang di halaman produksi";
			break;
	}
}
