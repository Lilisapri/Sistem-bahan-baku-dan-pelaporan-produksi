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

<body id="page-top">
    <div class="card shadow">
        <div class="card-header">
            Form Tambah Bahan Baku
        </div>
        <div class="card-body">
            <form action="simpan_bahan_baku.php" method="post" class="form-horizontal">
                <div class="form-row">
                    <div class="col-md-6 mb-3 ">
                        <label for="kode_bahan_baku">Kode Bahan Baku</label>
                        <input type="text" id="kode_bahan_baku" placeholder="Masukkan Kode Bahan Baku" name="kode_bahan_baku" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="nama">Nama Bahan Baku</label>
                        <input type="text" id="nama" name="nama" placeholder="Masukkan Nama Bahan Baku" class="form-control">
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="jenis">Jenis Bahan Baku</label>
                        <select id="jenis" name="jenis" class="form-control">
                        <option value="Paper Roll">Kertas roll</option>
                            <option value="Sheet Book Papper 52 Gram 79x109">Kertas Sheet Book papper 52 gram 79x109</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="satuan">Satuan</label>
                        <select id="satuan" name="satuan" class="form-control">
                        
                            <option value="Roll">Roll</option>
                            <option value="Rim">Rim</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="harga">Harga per Satuan</label>
                            <input type="text" id="harga" name="harga" placeholder="Masukkan Harga Bahan Baku" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label for="jumlah_persediaan">Jumlah Persediaan</label>
                            <input type="text" id="jumlah_persediaan" name="jumlah_persediaan" placeholder="Masukkan Jumlah Persediaan" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
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