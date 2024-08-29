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

<body id="page-top">


	<div class="card shadow">
		<div class="card-header">
			Form Tambah Laporan Unit Mesin Web

			<form action="simpan_mesin_web.php" method="post" class="form-horizontal">
		</div>

		<div class="form-row">
			<div class="form-group col-sm-6">
				<label>Id Spk</label>
				<select name="id_spk" class="form-control">
					<?php
					include 'koneksi.php';
					$sql_spk = $conn->query("SELECT * FROM spk");
					while ($data_spk = $sql_spk->fetch_assoc()) {
						echo '<option value="' . $data_spk['id_spk'] . '">' . $data_spk['no_spk'] . '</option>';
					}
					?>
				</select>
			</div>

			<div class="col-sm-6">
                <div class="form-group">
                    <label>Pilih Unit Kerja</label>
                    <select name="id_unit_kerja" class="form-control">
                        <?php
                        include 'koneksi.php';
                        $sql_unit_kerja = $conn->query("SELECT * FROM unit_kerja WHERE jenis_unit_kerja = 'Unit Mesin Web'");
                        while ($data_unit_kerja = $sql_unit_kerja->fetch_assoc()) {
                            echo '<option value="' . $data_unit_kerja['id_unit_kerja'] . '">' . $data_unit_kerja['jenis_unit_kerja'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>

		<div class="form-row">
			<div class="form-group col-sm-6">
				<label>Pilih Bahan Baku</label>
				<select name="id_bahan_baku" class="form-control">
				<?php
include 'koneksi.php';
$sql_bahan_baku = $conn->query("SELECT * FROM bahan_baku WHERE jenis = 'paper roll' ORDER BY id DESC");
$bahan_baku_terbaru = [];
while ($data_bahan_baku = $sql_bahan_baku->fetch_assoc()) {
    $jenis = $data_bahan_baku['jenis'];
    if (!isset($bahan_baku_terbaru[$jenis])) {
        $bahan_baku_terbaru[$jenis] = $data_bahan_baku;
    }
}
foreach ($bahan_baku_terbaru as $data_bahan_baku) {
    echo '<option value="' . $data_bahan_baku['id'] . '">' . $data_bahan_baku['nama'] . ' [ Stok: ' . $data_bahan_baku['jumlah_persediaan'] . ' ] [ Jenis: ' . $data_bahan_baku['jenis'] . ' ]</option>';
}
?>

				</select>
			</div>

			<div class="form-group col-sm-6">
				<label>Shift Kerja</label>
				<select name="shift_kerja" class="form-control">
					<option value="Pagi">Pagi</option>
					<option value="Malam">Malam</option>
				</select>
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-sm-6">
				<label>Tanggal</label>
				<input type="date" id="tanggal" name="tanggal" class="form-control">
			</div>

			<div class="form-group col-sm-6">
				<label>Jumlah Plat</label>
				<input type="text" name="jumlah_plat" class="form-control">
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-sm-6">
				<label>Jumlah Catern</label>
				<input type="text" name="jumlah_catern" class="form-control">
			</div>

			<div class="form-group col-sm-6">
				<label>Jumlah Roll</label>
				<input type="text" name="jumlah_roll" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<label>Hasil Cetak</label>
			<input type="text" name="hasil_cetak" class="form-control">
		</div>

		<br>
		<div class="form-group">
			<input type="submit" class="btn btn-primary" value="Simpan">
		</div>
		</form>
	</div>
	</div>
	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="js/sb-admin-2.min.js"></script>

	<!-- Script to set the current date to the date input -->
	<script>
		// Get today's date
		var today = new Date();
		
		// Format the date to YYYY-MM-DD
		var dd = String(today.getDate()).padStart(2, '0');
		var mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
		var yyyy = today.getFullYear();

		// Set the min and max attributes of the date input to today's date
		document.getElementById("tanggal").setAttribute("min", yyyy + "-" + mm + "-" + dd);
		document.getElementById("tanggal").setAttribute("max", yyyy + "-" + mm + "-" + dd);
	</script>

</body>

</html>
