<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Staf Admin</title>

	<!-- Custom fonts for this template-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body Id="page-top">


	<div class="card shadow">
		<div class="card-header">
			Form Tambah Laporan Unit Potong

			<form action="simpan_potong.php" method="post" class="form-herizontal">
		</div>

		<div class="form-group col-sm-4">
			<label>Id Spk</label>
			<br>
			<select name="id_spk" class="form-control">
				<option value="1">SPK-001</option>
				<option value="2">SPK-002</option>
				<option value="3">SPK-003</option>
				<option value="4">SPK-004</option>
				<option value="5">SPK-005</option>
				<option value="6">SPK-006</option>
				<option value="7">SPK-007</option>
				<option value="8">SPK-008</option>
				<option value="9">SPK-009</option>
				<option value="10">SPK-010</option>
			</select>
		</div>

		<div class="from-group col-sm-4">
			<label>Pilih Unit Kerja</label>
			<br>
			<select name="id_unit_kerja" class="form-control">
				<option value="1">Unit Potong</option>
				<option value="2">Unit Cetak</option>
				<option value="3">Unit Stahl</option>
				<option value="4">Unit Finishing</option>
				<option value="5">Unit Bindding</option>
				<option value="6">Unit Packing</option>
				<option value="7">Unit Mesin Web</option>
			</select>
		</div>

		<div class="form-group col-sm-4 mt-2">
			<label>Pilih Bahan Baku</label>
			<br>
			<select name="id_bahan_baku" class="form-control">
				<?php
				include 'koneksi.php';
				$sql_bahan_baku = $conn->query("SELECT * FROM bahan_baku");
				while ($data_bahan_baku = $sql_bahan_baku->fetch_assoc()) {
					echo '<option value="' . $data_bahan_baku['id'] . '">' . $data_bahan_baku['nama'] . ' [ Stok: ' . $data_bahan_baku['jumlah_persediaan'] . ' ] [ Jenis: ' . $data_bahan_baku['jenis'] . ' ]</option>';
				}
				?>
			</select>
		</div>

		<div class="form-group col-sm-4">
			<label>Shift Kerja</label>
			<br>
			<select name="shift_kerja" class="form-control">
				<option value="Pagi">Pagi</option>
				<option value="Malam">Malam</option>
			</select>
		</div>

		<div class="form-group col-sm-4">
			<label>Tanggal</label>
			<br>
			<input type="date" name="tanggal" class="form-control">
		</div>

		<div class="form-group col-sm-4">
			<label>Total Potong</label>
			<br>
			<input type="number" name="total_potong" class="form-control" placeholder="Masukkan angka total potong" required>
		</div>

		<div class="form-group col-sm-4">
			<label>Total Sisir</label>
			<br>
			<input type="number" name="total_sisir" placeholder="Masukkan angka total sisir" class="form-control">
		</div>

		<br>
		<div class="from-group col-sm4">
			<input type="submit" class="btn btn-primary" value="Simpan">
		</div>
		</form>
	</div>





	<!-- Bootstrap core JavaScript-->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="js/sb-admin-2.min.js"></script>

</body>

</html>