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



<body id="bg-gradient-primary">
	<div class="card shadow">
		From Edit Unit Finishing
	</div>
	<div class="card-body">
		<?php
		require 'koneksi.php';
		$sql = $conn->query("select * from unit_mesin_web where id='$_GET[id]'");
		$data = $sql->fetch_assoc();
		?>
		<form action="update_mesin_web.php" method="post" class="form-herizontal">
			<div class="form-group col-sm-8">

				<div class="form-group col-sm-4">
					<label> id</label>
					<input type="text" name="id" class="form-control" value="<?php echo $data['id']; ?> ">
				</div>

				<input type="hidden" name="id_spk" value="<?php echo $data['id_spk']; ?>">
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


				<div class="form-group col-sm-4">
					<label> Nama Unit Kerja </label>
					<input type="text" name="id_unit_kerja" class="form-control" value="<?php echo $data['id_unit_kerja']; ?> ">
				</div>

				<div class="form-group col-sm-4 mt-2">
					<label>Pilih Bahan Baku</label>
					<br>
					<select name="id_bahan_baku" class="form-control">
						<?php
						include 'koneksi.php';
						$id_unit_potong = $_GET['id']; // Mengambil nilai id dari parameter URL
						$sql_unit_potong = $conn->query("SELECT * FROM unit_potong WHERE id = '$id_unit_potong'");
						$data_unit_potong = $sql_unit_potong->fetch_assoc();
						$id_bahan_baku_selected = $data_unit_potong['id_bahan_baku'];

						$sql_bahan_baku = $conn->query("SELECT * FROM bahan_baku");
						while ($data_bahan_baku = $sql_bahan_baku->fetch_assoc()) {
							$selected = ($data_bahan_baku['id'] == $id_bahan_baku_selected) ? 'selected' : '';
							echo '<option value="' . $data_bahan_baku['id'] . '" ' . $selected . '>' . $data_bahan_baku['nama'] . ' [ Stok: ' . $data_bahan_baku['jumlah_persediaan'] . ' ] [ Jenis: ' . $data_bahan_baku['jenis'] . ' ]</option>';
						}
						?>
					</select>
				</div>



				<div class="form-group col-sm-4">
					<label> Shift Kerja</label>
					<input type="text" name="shift_kerja" class="form-control" value="<?php echo $data['shift_kerja']; ?> ">
				</div>

				<div class="form-group col-sm-4">
					<label> Tanggal</label>
					<input type="date" name="tanggal" class="form-control" value="<?php echo $data['tanggal']; ?>">
				</div>

				<div class="form-group col-sm-4">
					<label> Jumlah Plat</label>
					<input type="text" name="jumlah_plat" class="form-control" value="<?php echo $data['jumlah_plat']; ?> ">
				</div>

				<div class="form-group col-sm-4">
					<label> Jumlah Catern</label>
					<input type="text" name="jumlah_catern" class="form-control" value="<?php echo $data['jumlah_catern']; ?> ">
				</div>

				<div class="form-group col-sm-4">
					<label> Jumlah Roll</label>
					<input type="text" name="jumlah_roll" class="form-control" value="<?php echo $data['jumlah_roll']; ?>">
				</div>

				<div class="form-group col-sm-4">
					<label> Hasil Cetak</label>
					<input type="text" name="hasil_cetak" class="form-control" value="<?php echo $data['hasil_cetak']; ?> ">
				</div>


				<div class="form-group col-sm-4">
					<input type="submit" class="btn btn-primary" value="Update Unit Mesin Web">
				</div>
		</form>
	</div>
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