<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - Inventarisasi</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>


<body id="bg-gradient-primary">
		<div class="card shadow">
			From  Edit Ruang
		</div>
		<div class="card-body">
		 <?php 
		  require 'koneksi.php';
		  $sql=mysql_query("select * from ruang where id_ruang='$_GET[id_ruang]'");
		  while ($data=mysql_fetch_array($sql))
		  {
			  ?>
		  <form action="update_ruang.php" method="post" class="form-herizontal">
		  <div class="form-group col-sm-4">
		  
		  
		 
			  
			 <div class="form-group col-sm-8"> 
			  <label> Id Ruang </label>
				<input type="text" name="id_ruang" class="form-control" value="<?php echo $data['id_ruang'];?> "readonly>
				</div>

			 <div class="form-group col-sm-8"> 
			  <label> Nama Ruang </label>
				<input type="text" name="nama_ruang" class="form-control" value="<?php echo $data['nama_ruang'];?> ">
				</div>

			 <div class="form-group col-sm-8"> 
			  <label> Kode Ruang </label>
				<input type="text" name="kode_ruang" class="form-control" value="<?php echo $data['kode_ruang'];?> ">
				</div>


			 <div class="form-group col-sm-8"> 
			  <label> Keterangan </label>
				<input type="text" name="ket" class="form-control" value="<?php echo $data['ket'];?> ">
				</div>


			 <div class="form-group col-sm-4"> 
			 <input type="submit" class="btn btn-primary" value="Update Data">
			 </div>
		  <?php } ?>
			 </form> 
			 </div>
			 </div>



	
	
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
