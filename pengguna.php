 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 <html xmlns="http://www.w3.org/1999/xhtml">

 <head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <title>Untitled Document</title>
 </head>

 <body>

   <div class="container-fluid">

     <!-- Page Heading -->

     <!-- DataTales Example -->
     <div class="card shadow mb-4">
       <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Data Pengguna</h6>
         <br>
         <a href="s_admin.php?url=tambah_pengguna" class="btn btn-primary btn-icon-split">
           <span class="icon text-white-50">
             <i class="fas fa-plus"></i>
           </span>
           <span class="text">Tambah Pengguna</span>
         </a>
       </div>
       <div class="card-body">
         <div class="table-responsive">
           <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
             <thead>
               <tr>

                 <th>ID Pengguna</th>
                 <th>Nama User</th>
                 <th>Username</th>
                 <th>Password</th>
                 <th>Level</th>
                 <th>Aksi</th>
               </tr>
             </thead>
             <tbody>
               <tr>
                 <?php
                  require 'koneksi.php';
                  $sql = "select * from pengguna";
                  $result = mysqli_query($conn, $sql);
                  $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
                  foreach ($data as $data) {
                  ?>

                   <td><?php echo $data['id_pengguna']; ?></td>
                   <td><?php echo $data['nama_user']; ?> </td>
                   <td><?php echo $data['username']; ?></td>
                   <td><?php echo $data['password']; ?></td>
                   <td><?php echo $data['level']; ?></td>
                   <td><a href="s_admin.php?url=edit_pengguna&id_pengguna=<?php echo $data['id_pengguna']; ?>" class="btn btn-success btn-icon-split">
                       <span class="icon text-white-50">
                         <i class="fas fa-edit"></i>
                       </span>
                       <span class="text">Edit</span>
                     </a>

                     <a href="hapus_pengguna.php?id_pengguna=<?php echo $data['id_pengguna']; ?> " class="btn btn-danger btn-icon-split" onclick="return confirm('yakin hapus')">
                       <span class="icon text-white-50">
                         <i class="fas fa-trash"></i>
                       </span>
                       <span class="text">Hapus</span>
                     </a>
                   </td>


               </tr>
             <?php  } ?>
           </table>
           </td>
         </div>
       </div>
     </div>
   </div>




 </body>

 </html>