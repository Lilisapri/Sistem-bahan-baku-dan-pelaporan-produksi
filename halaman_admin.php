<?php
if (isset($_GET['url'])) {
	$url = $_GET['url'];

	switch ($url) {

		case 'beranda_admin':
			include 'beranda_admin.php';
			break;

		case 'bahan_baku':
			include 'bahan_baku.php';
			break;

		case 'tambah_bahan_baku':
			include 'tambah_bahan_baku.php';
			break;

		case 'edit_bahan_baku':
			include 'edit_bahan_baku.php';
			break;

			break;
		case 'update_bahan_baku':
			include 'update_bahan_baku.php';
			break;

		case 'spk_s_admin':
			include 'spk_s_admin.php';
			break;

		case 'pengguna':
			include 'pengguna.php';
			break;

		case 'tambah_pengguna':
			include 'tambah_pengguna.php';
			break;


		case 'edit_pengguna':
			include 'edit_pengguna.php';
			break;

		case 'simpan_pengguna':
			include 'simpan_pengguna.php';
			break;

		case 'update_pengguna':
			include 'update_pengguna.php';
			break;

		case 'hapus_pengguna':
			include 'hapus_pengguna.php';
			break;

		case 'unit_potong':
			include 'unit_potong.php';
			break;

		case 'tambah_potong':
			include 'tambah_potong.php';
			break;

		case 'edit_potong':
			include 'edit_potong.php';
			break;

		case 'update_potong':
			include 'update_potong.php';
			break;

		case 'hapus_potong':
			include 'hapus_potong.php';
			break;

		case 'laporan_potong':
			include 'laporan_potong.php';
			break;
		case 'laporan_cetak':
			include 'laporan_cetak.php';
			break;
		case 'laporan_stahl':
			include 'laporan_stahl.php';
			break;
		case 'laporan_finishing':
			include 'laporan_finishing.php';
			break;
		case 'laporan_bindding':
			include 'laporan_bindding.php';
			break;
		case 'laporan_packing':
			include 'laporan_packing.php';
			break;
		case 'laporan_mesin_web':
			include 'laporan_mesin_web.php';
			break;
		case 'unit_cetak':
			include 'unit_cetak.php';
			break;

		case 'tambah_cetak':
			include 'tambah_cetak.php';
			break;

		case 'edit_cetak':
			include 'edit_cetak.php';
			break;

		case 'update_cetak':
			include 'update_cetak.php';
			break;

		case 'hapus_cetak':
			include 'hapus_cetak.php';
			break;

		case 'laporan_cetak':
			include 'laporan_cetak.php';
			break;

		case 'unit_stahl':
			include 'unit_stahl.php';
			break;

		case 'tambah_stahl':
			include 'tambah_stahl.php';
			break;

		case 'edit_stahl':
			include 'edit_stahl.php';
			break;

		case 'update_stahl':
			include 'update_stahl.php';
			break;

		case 'hapus_stahl':
			include 'hapus_stahl.php';
			break;

		case 'eoq_produksi':
			include 'eoq_produksi.php';
			break;
		case 'tambah_eoq':
			include 'tambah_eoq_produksi.php';
			break;
		case 'edit_eoq':
			include 'edit_eoq.php';
			break;

		case 'laporan_stahl':
			include 'laporan_stahl.php';
			break;

		case 'unit_finishing':
			include 'unit_finishing.php';
			break;

		case 'tambah_finishing':
			include 'tambah_finishing.php';
			break;

		case 'edit_finishing':
			include 'edit_finishing.php';
			break;

		case 'update_finishing':
			include 'update_finishing.php';
			break;

		case 'hapus_finishing':
			include 'hapus_finishing.php';
			break;

		case 'laporan_finishing':
			include 'laporan_finishing.php';
			break;

		case 'unit_bindding':
			include 'unit_bindding.php';
			break;

		case 'tambah_bindding':
			include 'tambah_bindding.php';
			break;

		case 'edit_bindding':
			include 'edit_bindding.php';
			break;

		case 'update_bindding':
			include 'update_bindding.php';
			break;

		case 'hapus_bindding':
			include 'hapus_bindding.php';
			break;

		case 'laporan_bindding':
			include 'laporan_bindding.php';
			break;

		case 'unit_packing':
			include 'unit_packing.php';
			break;

		case 'tambah_packing':
			include 'tambah_packing.php';
			break;

		case 'edit_packing':
			include 'edit_packing.php';
			break;

		case 'update_packing':
			include 'update_packing.php';
			break;

		case 'hapus_packing':
			include 'hapus_packing.php';
			break;

		case 'laporan_packing':
			include 'laporan_packing.php';
			break;

		case 'unit_mesin_web':
			include 'unit_mesin_web.php';
			break;

		case 'tambah_mesin_web':
			include 'tambah_mesin_web.php';
			break;

		case 'edit_mesin_web':
			include 'edit_mesin_web.php';
			break;

		case 'update_mesin_web':
			include 'update_mesin_web.php';
			break;

		case 'hapus_mesin_web':
			include 'hapus_mesin_web.php';
			break;

		case 'laporan_mesin_web':
			include 'laporan_mesin_web.php';
			break;



		default:
			echo "selamat datang di halaman Staf Admin";
			break;
	}
}
