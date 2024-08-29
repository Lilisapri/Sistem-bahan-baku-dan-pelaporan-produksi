<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>

<div class="container-fluid">

          <!-- Page Heading -->
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Laporan Unit Bindding</h6>
			  <br>
		<a href="s_admin.php?url=tambah_bindding" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Laporan Unit Bindding</span>
                  </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr class= "text-center">
                    
                      <th>Nomor</th>
                      
                      <th>Tanggal</th>
                      <th>Jumlah Hasil Bindding</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
		<tbody>
	<tr>
		<?php
		require 'koneksi.php';
		$sql="select * from unit_bindding";
		$result = mysqli_query($conn,$sql);
		$data = mysqli_fetch_all($result,MYSQLI_ASSOC);
		$nomor = 1; // inisialisasi nomor
		foreach ($data as $data)
		{
		?>
                     
                      <td><?php echo $nomor; ?></td>
                      
                      <td><?php echo $data['tanggal']; ?></td>
                      <td><?php echo $data['jumlah_bindding']; ?></td>
                      <td class=><a href="s_admin.php?url=edit_bindding&id=<?php echo $data['id']; ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-edit"></i>
                    </span>
                    <span class="text">Edit</span>
                  </a>
				  
				  <a href="hapus_bindding.php?id=<?php echo $data['id']; ?>" class="btn btn-danger btn-icon-split" onclick="return confirm('yakin hapus')">
                    <span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>
                    <span class="text">Hapus</span>
                  </a>
				  </td>
				  
				  
                    </tr>
				  <?php
                  $nomor++; // Increment nomor setiap perulangan
                  } 
                  ?>
				  </table></td>
				</div>
			</div>
		</div>
	</div>
 
										


</body>
</html>
