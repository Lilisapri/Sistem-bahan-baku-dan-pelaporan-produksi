<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin - Laporan Produksi</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div class="card shadow">
        <div class="card-header">
            Data SPK
            <br><br>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>Nomor Urut</th>
                            
                            <th>No SPK</th>
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
                        $sql = "SELECT 
                                    ROW_NUMBER() OVER (ORDER BY id_spk) AS nomor_urut,
                                    id_spk,
                                    no_spk,
                                    judul_buku,
                                    tanggal,
                                    oplah_cetak,
                                    ukuran_buku
                                FROM 
                                    spk";
                        $result = mysqli_query($conn, $sql);
                        while ($data = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?php echo $data['nomor_urut']; ?></td>
                                
                                <td><?php echo $data['no_spk']; ?></td>
                                <td><?php echo $data['judul_buku']; ?></td>
                                <td><?php echo $data['tanggal']; ?></td>
                                <td><?php echo $data['oplah_cetak']; ?></td>
                                <td><?php echo $data['ukuran_buku']; ?></td>
                                <td class="text-center">
                                    <a href="unduh_spk.php?id_spk=<?php echo $data['id_spk']; ?>" target="_blank" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-print"></i>
                                        </span>
                                        <span class="text">Cetak</span>
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
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>
