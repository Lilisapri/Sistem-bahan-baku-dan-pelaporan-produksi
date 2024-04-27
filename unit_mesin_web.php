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
        <h6 class="m-0 font-weight-bold text-primary">Data Laporan Unit Packing Mesin Web</h6>
        <br>
        <a href="s_admin.php?url=tambah_mesin_web" class="btn btn-primary btn-icon-split">
          <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
          </span>
          <span class="text">Tambah Laporan Unit Mesin Web</span>
        </a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>

                <th>ID</th>
                <th>Tanggal</th>
                <th>Jumlah Plat</th>
                <th>Jumlah Catern</th>
                <th>Jumlah Rol</th>
                <th>Hasil Cetak</th>
                <th>Bahan Baku</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php
                require 'koneksi.php';
                $sql = "SELECT up.*, bb.nama AS nama_bahan_baku, bb.satuan AS satuan_bahan_baku 
                FROM unit_mesin_web up
                LEFT JOIN bahan_baku bb ON up.id_bahan_baku = bb.id";
                $result = mysqli_query($conn, $sql);
                $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
                foreach ($data as $data) {
                ?>

                  <td><?php echo $data['id']; ?></td>
                  <td><?php echo $data['tanggal']; ?></td>
                  <td><?php echo $data['jumlah_plat']; ?></td>
                  <td><?php echo $data['jumlah_catern']; ?></td>
                  <td><?php echo $data['jumlah_roll']; ?></td>
                  <td><?php echo $data['hasil_cetak']; ?></td>
                  <td><?php echo ($data['nama_bahan_baku'] != NULL) ? $data['nama_bahan_baku'] . ' (' . $data['satuan_bahan_baku'] . ')' : '-'; ?></td>
                  <td><a href="s_admin.php?url=edit_mesin_web&id=<?php echo $data['id']; ?>" class="btn btn-success btn-icon-split">
                      <span class="icon text-white-50">
                        <i class="fas fa-edit"></i>
                      </span>
                      <span class="text">Edit</span>
                    </a>

                    <a href="hapus_mesin_web.php?id=<?php echo $data['id']; ?> " class="btn btn-danger btn-icon-split" onclick="return confirm('yakin hapus')">
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