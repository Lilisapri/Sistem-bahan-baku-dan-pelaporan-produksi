<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Staf Admin</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="bg-gradient-primary">
    <div class="container-fluid">

        <div class="card-header">
            Form Edit Bahan Baku
        </div>
        <div class="card-body">
            <?php
            require 'koneksi.php';
            $sql = $conn->query("SELECT * FROM bahan_baku WHERE id='$_GET[id]'");
            $data = $sql->fetch_assoc();
            ?>
            <form action="update_bahan_baku.php" method="post" class="form-horizontal">
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="id">ID</label>
                        <input type="text" id="id" name="id" class="form-control" value="<?php echo $data['id']; ?>" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="kode_bahan_baku">Kode Bahan Baku</label>
                        <input type="text" id="kode_bahan_baku" name="kode_bahan_baku" class="form-control" value="<?php echo $data['kode_bahan_baku']; ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="nama">Nama Bahan Baku</label>
                        <input type="text" id="nama" name="nama" class="form-control" value="<?php echo $data['nama']; ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                  
                        <label for="jenis">Jenis Bahan Baku</label>
                        <select id="jenis" name="jenis" class="form-control">
                            <option value="Kertas Roll(Web)" <?php echo ($data['jenis'] == 'Kertas Roll') ? 'selected' : ''; ?>>Kertas Roll-ms-web</option>
                            <option value="Kertas Rim (potong)" <?php echo ($data['jenis'] == 'Kertas Rim') ? 'selected' : ''; ?>>Kertas unit-potong</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="satuan">Satuan</label>
                        <select id="satuan" name="satuan" class="form-control">
                          
                            <option value="Rim" <?php echo ($data['satuan'] == 'rim') ? 'selected' : ''; ?>>Rim</option>
                            <option value="Roll" <?php echo ($data['satuan'] == 'Roll') ? 'selected' : ''; ?>>Roll</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="harga">Harga per Satuan</label>
                        <input type="text" id="harga" name="harga" class="form-control" value="<?php echo $data['harga']; ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="jumlah_persediaan">Jumlah Persediaan</label>
                        <input type="text" id="jumlah_persediaan" name="jumlah_persediaan" class="form-control" value="<?php echo $data['jumlah_persediaan']; ?>">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update Bahan Baku</button>
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