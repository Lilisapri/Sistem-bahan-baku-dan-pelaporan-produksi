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
			Form Tambah Pengguna

			<form action="simpan_pengguna.php" method="post" class="form-herizontal">
		</div>

		<div class="form-group col-sm-4">
			<label>Nama User</label>
			<br>
			<input type="text" name="nama_user" class="form-control">
		</div>

		<div class="from-group col-sm-4">
			<label>Username</label>
			<br>
			<input type="text" name="username" class="form-control">
		</div>

		<div class="form-group col-sm-4">
			<label>Password</label>
			<br>
			<input type="text" name="password" class="form-control">
		</div>


		<div class="form-group col-sm-4">
			<label>Level</label>
			<br>
			<select name="level" class="form-control">
				<option value="">Pilih salah satu</option>
				<option value="pracetak">Admin Pra Cetak</option>
				<option value="produksi">Staf Admin</option>
				<option value="s_admin">Produksi</option>
				<option value="manager">Manager</option>
			</select>
		</div>


		<br>
		<div class="from-group col-sm4">
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

</body>

</html>