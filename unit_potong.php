<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>CEK</title>
  <style>
    .action-buttons {
      display: flex;
      justify-content: space-around;
    }

    .action-buttons a {
      flex: 1;
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Laporan Unit Potong</h6>
        <br>
        <a href="s_admin.php?url=tambah_potong" class="btn btn-primary btn-icon-split">
          <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
          </span>
          <span class="text">Tambah Laporan Unit potong</span>
        </a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr class="text-center">
                <th>Nomor</th>
                
                <th>Tanggal</th>
                <th>Total potong</th>
                <th>Total sisir</th>
                <th>Bahan Baku</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
                require 'koneksi.php';
                $sql = "SELECT up.*, bb.nama AS nama_bahan_baku, bb.satuan AS satuan_bahan_baku 
                        FROM unit_potong up
                        LEFT JOIN bahan_baku bb ON up.id_bahan_baku = bb.id";
                $result = mysqli_query($conn, $sql);
                $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
                $nomor = 1; // Initialize the counter variable
                foreach ($data as $row) {
              ?>
              <tr>
                <td><?php echo $nomor++; ?></td>
               
                <td><?php echo $row['tanggal']; ?></td>
                <td><?php echo $row['total_potong']; ?></td>
                <td><?php echo $row['total_sisir']; ?></td>
                <td><?php echo ($row['nama_bahan_baku'] != NULL) ? $row['nama_bahan_baku'] . ' (' . $row['satuan_bahan_baku'] . ')' : '-'; ?></td>
                <td class="text-center action-buttons">
                  <a href="s_admin.php?url=edit_potong&id=<?php echo $row['id']; ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-edit"></i>
                    </span>
                    <span class="text">Edit</span>
                  </a>
                  <a href="hapus_potong.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-icon-split" onclick="return confirm('yakin hapus')">
                    <span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>
                    <span class="text">Hapus</span>
                  </a>
                </td>
              </tr>
              <?php
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
