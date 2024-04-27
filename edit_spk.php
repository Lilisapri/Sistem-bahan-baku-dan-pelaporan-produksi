<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin pra  cetak</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>



<body id="bg-gradient-primary">
		<div class="card shadow">
			From  Edit SPK
		</div>
		<div class="card-body">
        <?php 
		  require 'koneksi.php';
		  $sql=$conn->query("select * from spk where id_spk='$_GET[id_spk]'");
          $data = $sql->fetch_assoc();
            ?>
		  <form action="update_spk.php" method="post" class="form-herizontal">
		  <div class="form-group col-sm-8">
	
            <input type="hidden" name="id_spk" value="<?php echo $data['id_spk'];?>">
			 <div class="form-group col-sm-4">
				  
			  <label> No SPK</label>
				<input type="text" name="no_spk" class="form-control" value="<?php echo $data['no_spk'];?> ">
				</div>

			 <div class="form-group col-sm-4"> 
			  <label> Judul Buku </label>
				<input type="text" name="judul_buku" class="form-control" value="<?php echo $data['judul_buku'];?> ">
				</div>


			 <div class="form-group col-sm-4"> 
			  <label> No ISBN</label>
				<input type="text" name="no_isbn" class="form-control" value="<?php echo $data['no_isbn'];?> ">
				
            
                <label> Tanggal</label>
				<input type="date" name="tanggal" class="form-control" value="<?php echo $data['tanggal'];?> ">
				</div>

			 <div class="form-group col-sm-4"> 
			  <label> Tanggal Permintaan Selesai </label>
				<input type="date" name="tanggal_permintaan_selesai" class="form-control" value="<?php echo $data['tanggal_permintaan_selesai'];?> ">
				</div>


			 <div class="form-group col-sm-4"> 
			  <label> Oplah Cetak</label>
				<input type="text" name="oplah_cetak" class="form-control" value="<?php echo $data['oplah_cetak'];?> ">
                

                <label> Oplah Inshet</label>
				<input type="text" name="oplah_insheet" class="form-control" value="<?php echo $data['oplah_insheet'];?> ">
				</div>

			 <div class="form-group col-sm-4"> 
			  <label> Ukuran buku </label>
				<input type="text" name="ukuran_buku" class="form-control" value="<?php echo $data['ukuran_buku'];?> ">
				</div>


			 <div class="form-group col-sm-4"> 
			  <label> Jumlah Halaman</label>
				<input type="text" name="jumlah_halaman" class="form-control" value="<?php echo $data['jumlah_halaman'];?> ">

                <label> Jumlah Catern</label>
				<input type="text" name="jumlah_catern" class="form-control" value="<?php echo $data['jumlah_catern'];?> ">
				</div>

			 <div class="form-group col-sm-4"> 
			  <label> Jumlah Plat </label>
				<input type="text" name="jumlah_plat" class="form-control" value="<?php echo $data['jumlah_plat'];?> ">
				</div>

			 <div class="form-group col-sm-4"> 
			  <label> Ukuran kertas</label>
				<input type="text" name="ukuran_kertas" class="form-control" value="<?php echo $data['ukuran_kertas'];?> ">

                <label> Kebutuhan kertas</label>
				<input type="text" name="kebutuhan_kertas" class="form-control" value="<?php echo $data['kebutuhan_kertas'];?> ">
				</div>

			 <div class="form-group col-sm-4"> 
			  <label> Mesin Cetak </label>
				<input type="text" name="mesin_cetak" class="form-control" value="<?php echo $data['mesin_cetak'];?> ">
				</div>
                
			 <div class="form-group col-sm-4"> 
			 <input type="submit" class="btn btn-primary" value="Update SPK">
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
