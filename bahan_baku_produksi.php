<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Bahan Baku</title>
</head>

<body>
    <div class="container-fluid">
        <!-- Page Heading -->
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Bahan Baku</h6>
                <br>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kode Bahan Baku</th>
                                <th>Nama</th>
                                <th>Jenis</th>
                                <th>Satuan</th>
                                <th>Harga per Satuan</th>
                                <th>Jumlah Persediaan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require 'koneksi.php';
                            $sql = "SELECT * FROM bahan_baku";
                            $result = mysqli_query($conn, $sql);
                            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
                            foreach ($data as $data) {
                            ?>
                                <tr>
                                    <td><?php echo $data['id']; ?></td>
                                    <td><?php echo $data['kode_bahan_baku']; ?></td>
                                    <td><?php echo $data['nama']; ?></td>
                                    <td><?php echo $data['jenis']; ?></td>
                                    <td><?php echo $data['satuan']; ?></td>
                                    <td><?php echo 'Rp ' . number_format($data['harga'], 0, ',', '.'); ?></td>
                                    <td><?php echo $data['jumlah_persediaan']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>