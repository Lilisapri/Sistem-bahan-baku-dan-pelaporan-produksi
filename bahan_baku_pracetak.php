<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
                                <th>Nomor urut</th>
                                <th>Kode Bahan Baku</th>
                                <th>Nama</th>
                                <th>Jenis</th>
                                <th>Satuan</th>
                                <th>Jumlah Persediaan</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
require 'koneksi.php';
$sql = "
SELECT *
FROM bahan_baku
WHERE (nama, id) IN (
    SELECT nama, MAX(id)
    FROM bahan_baku
    GROUP BY nama
)
";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
$nomor_urut = 1; // Mulai nomor urut dari 1
foreach ($data as $data) {
?>
    <tr>
        <td><?php echo $nomor_urut; ?></td>
        <td><?php echo $data['kode_bahan_baku']; ?></td>
        <td><?php echo $data['nama']; ?></td>
        <td><?php echo $data['jenis']; ?></td>
        <td><?php echo $data['satuan']; ?></td>
        <td><?php echo $data['jumlah_persediaan']; ?></td>
    </tr>
<?php
    $nomor_urut++; // Tambahkan 1 setiap kali looping
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
