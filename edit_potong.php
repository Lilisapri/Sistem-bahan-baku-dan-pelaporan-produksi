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
		From Edit Unit Potong
	</div>
	<div class="card-body">
		<?php
		require 'koneksi.php';
		$sql = $conn->query("select * from unit_potong where id='$_GET[id]'");
		$data = $sql->fetch_assoc();
		?>
		<form action="update_potong.php" method="post" class="form-horizontal">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>id</label>
						<input type="text" name="id" class="form-control" value="<?php echo $data['id']; ?>">
					</div>

					<div class="form-group">
						<label>No Spk</label>
						<select name="id_spk" class="form-control">
							<?php
							include 'koneksi.php';
							$sql_spk = $conn->query("SELECT * FROM spk");
							while ($data_spk = $sql_spk->fetch_assoc()) {
								echo '<option value="' . $data_spk['id_spk'] . '">' . $data_spk['id_spk'] . '</option>';
							}
							?>
						</select>
					</div>

					<div class="form-group mt-2">
						<label>Pilih Unit Kerja</label>
						<select name="id_unit_kerja" class="form-control">
							<?php
							include 'koneksi.php';
							$sql_unit_kerja = $conn->query("SELECT * FROM unit_kerja WHERE jenis_unit_kerja = 'Unit Potong'");
while ($data_unit_kerja = $sql_unit_kerja->fetch_assoc()) {
    echo '<option value="' . $data_unit_kerja['id_unit_kerja'] . '">' . $data_unit_kerja['jenis_unit_kerja'] . '</option>';
}
?>
						</select>
					</div>

					<div class="form-group mt-2">
						<label>Shift Kerja</label>
						<select name="shift_kerja" class="form-control">
							<option value="Pagi">Pagi</option>
							<option value="Malam">Malam</option>
						</select>
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group mt-2">
					<label>Pilih Bahan Baku</label>
                                <select name="id_bahan_baku" class="form-control">
                                    <?php
                                    $sql_bahan_baku = $conn->query("SELECT bb.id, bb.nama, bb.jumlah_persediaan, bb.jenis 
                                FROM bahan_baku bb
                                INNER JOIN (
                                    SELECT nama, MAX(id) as max_id
                                    FROM bahan_baku
                                    WHERE jenis = 'Sheet Paper' -- Filter berdasarkan jenis bahan baku
                                    GROUP BY nama
                                ) grouped_bb ON bb.id = grouped_bb.max_id
                                ORDER BY bb.id DESC");

                                    while ($data_bahan_baku = $sql_bahan_baku->fetch_assoc()) {
                                        echo '<option value="' . $data_bahan_baku['id'] . '">' . $data_bahan_baku['nama'] . ' [ Stok: ' . $data_bahan_baku['jumlah_persediaan'] . ' ] [ Jenis: ' . $data_bahan_baku['jenis'] . ' ]</option>';
                                    }
                                    ?>
                                </select>
					</div>

					<div class="form-group">
						<label>Tanggal</label>
						<input type="date" name="tanggal" class="form-control" value="<?php echo $data['tanggal']; ?>">
					</div>

					<div class="form-group">
						<label>Total Potong</label>
						<input type="text" name="total_potong" class="form-control" value="<?php echo $data['total_potong']; ?>" required>
					</div>

					<div class="form-group">
						<label>Total Sisir</label>
						<input type="text" name="total_sisir" class="form-control" value="<?php echo $data['total_sisir']; ?>">
					</div>

					<div class="form-group">
						<div class="form-group mt-2">
						<input type="submit" class="btn btn-primary" value="Update unit potong">
					</div>
				</div>
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
