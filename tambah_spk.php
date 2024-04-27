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
	<div class= "card-header">
	Form Tambah SPK
	
	<form action="simpan_spk.php" method="post" class="form-herizontal">
	</div>
	
	<div class="form-group col-sm-4">
	<label>no spk</label>
	<br>
	<input type="text" name="no_spk" class="form-control">
	</div>
	
	<div class="from-group col-sm-4">
	<label>judul buku</label>
	<br>
	<input type="text" name="judul_buku" class="form-control">
	</div>
	
	<div class="form-group col-sm-4">
	<label>no isbn</label>
	<br>
	<input type="text" name="no_isbn" class="form-control">
	</div>

	<div class="form-group col-sm-4">
	<label>tanggal</label>
	<br>
	<input type="date" name="tanggal" class="form-control">
	</div>

	<div class="form-group col-sm-4">
	<label>tanggal permintaan selesai</label>
	<br>
	<input type="date" name="tanggal_permintaan_selesai" class="form-control">
	</div>

	<div class="form-group col-sm-4">
	<label>oplah cetak</label>
	<br>
	<input type="text" name="oplah_cetak" class="form-control">
	</div>
	
	<div class="from-group col-sm-4">
	<label>oplah insheet</label>
	<br>
	<input type="text" name="oplah_insheet" class="form-control">
	</div>
	
	<div class="form-group col-sm-4">
	<label>ukuran buku</label>
	<br>
	<input type="text" name="ukuran_buku" class="form-control">
	</div>

	<div class="form-group col-sm-4">
	<label>jumlah halaman</label>
	<br>
	<input type="text" name="jumlah_halaman" class="form-control">
	</div>
	
	<div class="from-group col-sm-4">
	<label>jumlah catern</label>
	<br>
	<input type="text" name="jumlah_catern" class="form-control">
	</div>
	
	<div class="form-group col-sm-4">
	<label>jumlah plat</label>
	<br>
	<input type="text" name="jumlah_plat" class="form-control">
	</div>

	<div class="form-group col-sm-4">
	<label>ukuran kertas</label>
	<br>
	<input type="text" name="ukuran_kertas" class="form-control">
	</div>
	
	<div class="from-group col-sm-4">
	<label>kebutuhan kertas</label>
	<br>
	<input type="text" name="kebutuhan_kertas" class="form-control">
	</div>
	
	<div class="form-group col-sm-4">
	<label>mesin cetak</label>
	<br>
	<input type="text" name="mesin_cetak" class="form-control">
	</div>
	
	
	<br>
	<div class="from-group col-sm4">
	<input type="submit"  class="btn btn-primary" value="Simpan"> 
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

