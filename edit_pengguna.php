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
			From  Edit Pengguna
		</div>
		<div class="card-body">
		 <?php 
		  require 'koneksi.php';
		  $sql=$conn->query("select * from pengguna where id_pengguna='$_GET[id_pengguna]'");
          $data = $sql->fetch_assoc();
            ?>
		  <form action="update_pengguna.php" method="post" class="form-herizontal">
		  <div class="form-group col-sm-8">
	
            <input type="hidden" name="id_pengguna" value="<?php echo $data['id_pengguna'];?>">
			 <div class="form-group col-sm-4">
				  
			  <label> Nama User</label>
				<input type="text" name="nama_user" class="form-control" value="<?php echo $data['nama_user'];?>">
				</div>

			 <div class="form-group col-sm-4"> 
			  <label> username </label>
				<input type="text" name="username" class="form-control" value="<?php echo $data['username'];?>">
				</div>


			 <div class="form-group col-sm-4"> 
			  <label> Password </label>
				<input type="text" name="password" class="form-control" value="<?php echo $data['password'];?>">
				

                </div>
				<div class="form-group col-sm-4">
				<label>Level</label>
				<select name="level" class="form-control">
                <option><?php echo $data['level'];?></option>
				<option value="pracetak">Admin Pra Cetak</option>
				<option value="produksi">Produksi</option>
                <option value="s_admin">Staf Admin</option>
                <option value="manager">Manager</option>
				</select>
				</div>
				<br>
				
			 <div class="form-group col-sm-4"> 
			 <input type="submit" class="btn btn-primary" value="Update pengguna">
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
