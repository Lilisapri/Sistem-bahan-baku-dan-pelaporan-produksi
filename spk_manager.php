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

</head>

<body>
    <div class="container-fluid">
        <!-- Page Heading -->
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data SPK</h6>
                <br>

		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Nomor Urut</th>
							<th>No SPK</th>
							<th>Judul Cetak</th>
							<th>Tanggal</th>
							<th>Oplah Cetak</th>
							<th>Ukuran Buku</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						require 'koneksi.php';
						$sql = "select * from spk";
						$result = mysqli_query($conn, $sql);
						$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
						$nomor_urut = 1; // Inisialisasi nomor urut
						foreach ($data as $data) {
						?>
							<tr>
								<td><?php echo $nomor_urut++; ?></td> <!-- Menampilkan dan menaikkan nomor urut setiap kali loop -->
								<td><?php echo $data['no_spk']; ?></td>
								<td><?php echo $data['judul_buku']; ?></td>
								<td><?php echo $data['tanggal']; ?></td>
								<td><?php echo $data['oplah_cetak']; ?></td>
								<td><?php echo $data['ukuran_buku']; ?></td>
								<td><a href="unduh_spk.php?id_spk=<?php echo $data['id_spk']; ?>" class="btn btn-primary btn-icon-split">
										<span class="icon text-white-50">
											<i class="fas fa-download"></i>
										</span>
										<span class="text">Unduh</span>
									</a>
								</td>
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
