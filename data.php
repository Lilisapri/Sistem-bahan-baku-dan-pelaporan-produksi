<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin-Sitsem laporan produksi</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .action-buttons {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .btn-group {
            display: flex;
            gap: 10px;
        }
    </style>
</head>
<body id="page-top">
    <div class="card shadow">
        <div class="card-header">
            Data SPK
            <br><br>
            <a href="pracetak.php?url=tambah_spk" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah SPK</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nomor Urut</th>
                            <th>NO SPK</th>
                            <th>Judul Cetak</th>
                            <th>Tanggal</th>
                            <th>Oplah Cetak</th>
                            <th>Ukuran Buku</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require 'koneksi.php';
                        $sql = "SELECT * FROM spk";
                        $result = mysqli_query($conn, $sql);
                        $counter = 1; // Counter untuk nomor urut
                        while ($data = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?php echo $counter++; ?></td>
                                <td><?php echo $data['no_spk']; ?></td>
                                <td><?php echo $data['judul_buku']; ?></td>
                                <td><?php echo $data['tanggal']; ?></td>
                                <td><?php echo $data['oplah_cetak']; ?></td>
                                <td><?php echo $data['ukuran_buku']; ?></td>
                                <td>
                                    <div class="action-buttons">
                                        <input type="hidden" name="id_spk" value="<?php echo $data['id_spk']; ?>">
                                        <div class="btn-group">
                                            <a href="pracetak.php?url=edit_spk&id_spk=<?php echo $data['id_spk']; ?>" class="btn btn-success btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-edit"></i>
                                                </span>
                                            </a>
                                            <a href="hapus_spk.php?id_spk=<?php echo $data['id_spk']; ?>" class="btn btn-danger btn-icon-split" onclick="return confirm('yakin hapus')">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                            </a>
                                            <a href="unduh_spk.php?id_spk=<?php echo $data['id_spk']; ?>" class="btn btn-primary btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-download"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
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
    <!-- JavaScript untuk menambahkan nomor urut -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var table = document.querySelector('.table');
            var rows = table.querySelectorAll('tbody tr');
            var counter = 1;

            rows.forEach(function (row) {
                var firstCell = row.firstElementChild;
                firstCell.textContent = counter++;
            });
        });
    </script>
</body>
</html>
