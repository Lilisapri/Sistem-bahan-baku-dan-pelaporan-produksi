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
	<div class="container">
		<div class="card shadow mb-4">
			<div class="card-header py-3">
				<h6 class="m-0 font-weight-bold text-primary">Form Edit Unit Cetak</h6>
			</div>
			<div class="card-body">
				<?php
				require 'koneksi.php';
				$sql = $conn->query("SELECT * FROM unit_cetak WHERE id='$_GET[id]'");
				$data = $sql->fetch_assoc();
				?>
				<form action="update_cetak.php" method="post" class="form-horizontal">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Id unit cetak</label>
								<input type="text" name="id" class="form-control" value="<?php echo $data['id']; ?>">
							</div>
							<div class="form-group">
								<label>No Spk</label>
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
							<div class="form-group">
							<label>Pilih Unit Kerja</label>
                        <select name="id_unit_kerja" class="form-control">
                            <?php
                            include 'koneksi.php';
                            $sql_unit_kerja = $conn->query("SELECT * FROM unit_kerja WHERE jenis_unit_kerja = 'Unit Cetak'"); // Mengambil hanya unit cetak
                            $selected = false; // Menandai apakah satu opsi telah dipilih
                            while ($data_unit_kerja = $sql_unit_kerja->fetch_assoc()) {
                                $selectedAttr = ''; // Atribut selected untuk dipilih otomatis
                                if (!$selected) { // Jika belum ada yang dipilih, pilih yang pertama secara otomatis
                                    $selectedAttr = 'selected';
                                    $selected = true; // Setelah dipilih, tandai bahwa sudah ada yang dipilih
                                }
                                echo '<option value="' . $data_unit_kerja['id_unit_kerja'] . '" ' . $selectedAttr . '>' . $data_unit_kerja['jenis_unit_kerja'] . '</option>';
                            }
                            ?>
                        </select>
							</div>
							<div class="form-group">
								<label>Shift Kerja</label>
								<select name="shift_kerja" class="form-control">
									<option value="Pagi">Pagi</option>
									<option value="Malam">Malam</option>
								</select>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label>Tanggal</label>
								<input type="date" name="tanggal" class="form-control" value="<?php echo $data['tanggal']; ?>">
							</div>
							<div class="form-group">
								<label>Total Catern</label>
								<input type="text" name="total_catern" class="form-control" value="<?php echo $data['total_catern']; ?>">
							</div>
							<div class="form-group">
								<label>Total Plat</label>
								<input type="text" name="total_plat" class="form-control" value="<?php echo $data['total_plat']; ?>">
							</div>
							<div class="form-group">
								<label>Total Lembar</label>
								<input type="text" name="total_lembar" class="form-control" value="<?php echo $data['total_lembar']; ?>">
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-primary" value="Update unit cetak">
							</div>
						</div>
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

</body>

</html>
