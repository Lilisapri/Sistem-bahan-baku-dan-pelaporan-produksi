<?php
if (isset($_GET['url'])) {
	$url = $_GET['url'];

	switch ($url) {
		case 'beranda_manager':
			include 'beranda_manager.php';
			break;
		case 'manager':
			include 'manager.php';
			break;
		case 'bahan_baku':
			include 'bahan_baku_manager.php';
			break;
		case 'eoq_produksi':
			include 'eoq_produksi_manager.php';
			break;
		case 'spk_manager':
			include 'spk_manager.php';
			break;

		case 'laporan_potong_manager':
			include 'laporan_potong_manager.php';
			break;

		case 'laporan_cetak_manager':
			include 'laporan_cetak_manager.php';
			break;

		case 'laporan_stahl_manager':
			include 'laporan_stahl_manager.php';
			break;

		case 'laporan_finishing_manager':
			include 'laporan_finishing_manager.php';
			break;

		case 'laporan_bindding_manager':
			include 'laporan_bindding_manager.php';
			break;

		case 'laporan_packing_manager':
			include 'laporan_packing_manager.php';
			break;

		case 'laporan_mesin_web_manager':
			include 'laporan_mesin_web_manager.php';
			break;


		default:
			echo "selamat datang di halaman manager";
			break;
	}
}
