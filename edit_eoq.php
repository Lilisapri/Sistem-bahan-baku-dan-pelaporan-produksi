<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Edit Data EOQ</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h5 class="h5 text-gray-900 mb-4">Form Edit Data EOQ</h5>
                            </div>
                            <?php
                            require 'koneksi.php';
                            $id = $_GET['id'];
                            $sql = "SELECT te.*, bb.nama AS nama_bahan_baku 
                                    FROM tabel_eoq te
                                    INNER JOIN bahan_baku bb ON te.id_bahan_baku = bb.id
                                    WHERE te.id = '$id'";
                            $result = $conn->query($sql);
                            $data = $result->fetch_assoc();
                            ?>
                            <form class="user" action="update_eoq.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                <div class="form-group row">
                                    <label for="id_bahan_baku" class="col-sm-4 col-form-label">Bahan Baku</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="id_bahan_baku" name="id_bahan_baku" required>
                                            <option value="">Pilih Bahan Baku</option>
                                            <?php
                                            $sqlBahanBaku = "SELECT * FROM bahan_baku";
                                            $resultBahanBaku = $conn->query($sqlBahanBaku);
                                            while ($rowBahanBaku = $resultBahanBaku->fetch_assoc()) {
                                                $selected = ($rowBahanBaku['id'] == $data['id_bahan_baku']) ? 'selected' : '';
                                                echo '<option value="' . $rowBahanBaku['id'] . '" ' . $selected . '>' . $rowBahanBaku['kode_bahan_baku'] . ' - ' . $rowBahanBaku['nama'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jumlah_pesanan" class="col-sm-4 col-form-label">Jumlah Pesanan</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="jumlah_pesanan" name="jumlah_pesanan" value="<?php echo $data['jumlah_pesanan']; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="per_periode_kebutuhan" class="col-sm-4 col-form-label">Periode Kebutuhan</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="per_periode_kebutuhan" name="per_periode_kebutuhan" required>
                                            <option value="">Input per periode kebutuhan</option>
                                            <option value="hari" <?php if ($data['per_periode_kebutuhan'] == 'hari') echo 'selected'; ?>>Harian</option>
                                            <option value="minggu" <?php if ($data['per_periode_kebutuhan'] == 'minggu') echo 'selected'; ?>>Mingguan</option>
                                            <option value="bulan" <?php if ($data['per_periode_kebutuhan'] == 'bulan') echo 'selected'; ?>>Bulanan</option>
                                            <option value="tahun" <?php if ($data['per_periode_kebutuhan'] == 'tahun') echo 'selected'; ?>>Tahunan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="biaya_pesanan" class="col-sm-4 col-form-label">Biaya Pesanan</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="biaya_pesanan" name="biaya_pesanan_per_order" value="<?php echo $data['biaya_pesanan_per_order']; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="harga_per_bahan_baku" class="col-sm-4 col-form-label">Harga per Bahan Baku</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="harga_per_bahan_baku" name="harga_per_bahan_baku" value="<?php echo $data['harga_per_bahan_baku']; ?>" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">
                                    Update
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
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