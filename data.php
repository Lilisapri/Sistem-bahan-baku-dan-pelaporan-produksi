<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Admin-Sitsem laporan produksi</title>

	<!-- Custom fonts for this template-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->

	<!-- Custom styles for this template-->
	<link href="css/sb-admin-2.min.css" rel="stylesheet">
	<style>
		.action-buttons {
			display: flex;
			gap: 10px;
			flex-wrap: wrap;
		}
	</style>
</head>

<body id="page-top">

	<div class="card shadow">
		<div class="card-header">
			Data SPK
			<br>
			<br>
			<a href="pracetak.php?url=tambah_spk" class="btn btn-primary btn-icon-split">
				<span class="icon text-white-50">
					<i class="fas fa-plus"></i>
				</span>
				<span class="text">Tambah SPK</span>
			</a>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Id</th>
							<th>No SPK</th>
							<th>Judul Cetak</th>
							<th>Tanggal</th>
							<th>Oplah Cetak</th>
							<th>Ukuran Buku</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<?php
							require 'koneksi.php';
							$sql = "select * from spk";
							$result = mysqli_query($conn, $sql);
							$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
							foreach ($data as $data) {
							?>
								<td><?php echo $data['id_spk']; ?></td>
								<td><?php echo $data['no_spk']; ?></td>
								<td><?php echo $data['judul_buku']; ?></td>
								<td><?php echo $data['tanggal']; ?></td>
								<td><?php echo $data['oplah_cetak']; ?></td>
								<td><?php echo $data['ukuran_buku']; ?></td>
								<td>
									<div class="action-buttons">
										<a href="pracetak.php?url=edit_spk&id_spk=<?php echo $data['id_spk']; ?>" class="btn btn-success btn-icon-split">
											<span class="icon text-white-50">
												<i class="fas fa-edit"></i>
											</span>
											<span class="text">Edit</span>
										</a>
										<a href="hapus_spk.php?id_spk=<?php echo $data['id_spk']; ?>" class="btn btn-danger btn-icon-split" onclick="return confirm('yakin hapus')">
											<span class="icon text-white-50">
												<i class="fas fa-trash"></i>
											</span>
											<span class="text">Hapus</span>
										</a>
										<a href="unduh_spk.php?id_spk=<?php echo $data['id_spk']; ?>" class="btn btn-primary btn-icon-split">
											<span class="icon text-white-50">
												<i class="fas fa-download"></i>
											</span>
											<span class="text">Unduh</span>
										</a>
									</div>
						</tr>
					<?php } ?>
					</tbody>
				</table>
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