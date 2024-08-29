<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tambah Data EOQ</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg">

            <div class="row">
                <div class="col-lg-12">
                <div class="p-5">
    <div class="text-center">
        <h5 class="h5 text-gray-900 mb-4">Form Tambah Data EOQ</h5>
    </div>
    <form class="user" action="simpan_eoq.php" method="post">
        <div class="form-group row">
            <label for="id_bahan_baku" class="col-sm-4 col-form-label">Bahan Baku</label>
            <div class="col-sm-8">
                <select class="form-control" id="id_bahan_baku" name="id_bahan_baku" onchange="updateSatuanBahanBaku()" required>
                    <option value="">Pilih Bahan Baku</option>
                    <?php
                    require 'koneksi.php';
                    // Mengambil data bahan baku dari tabel bahan_baku
                    $sql = "SELECT * FROM bahan_baku";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['id'] . '" data-satuan="' . $row['satuan'] . '">' . $row['kode_bahan_baku'] . ' - ' . $row['nama'] . '</option>';
                    }
                    ?>
                </select>
                <input type="hidden" id="satuan_bahan_baku" name="satuan_bahan_baku">
            </div>
        </div>
        <div class="form-group row">
            <label for="jumlah_pesanan" class="col-sm-4 col-form-label">Jumlah Pesanan</label>
            <div class="col-sm-8">
                <input type="number" class="form-control" id="jumlah_pesanan" name="jumlah_pesanan" placeholder="Input jumlah pesanan" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="per_periode_kebutuhan" class="col-sm-4 col-form-label">Periode Kebutuhan</label>
            <div class="col-sm-8">
                <select class="form-control" id="per_periode_kebutuhan" name="per_periode_kebutuhan" required>
                    <option value="">Input per periode kebutuhan</option>
                    <option value="hari">Harian</option>
                    <option value="minggu">Mingguan</option>
                    <option value="bulan">Bulanan</option>
                    <option value="tahun">Tahunan</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="harga_per_bahan_baku" class="col-sm-4 col-form-label">Harga per Bahan Baku</label>
            <div class="col-sm-8">
                <input type="number" class="form-control" id="harga_per_bahan_baku" name="harga_per_bahan_baku" placeholder="Input harga per bahan baku" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary w-35 mx-auto mb-4 mt-2 float-right">
            <i class="fas fa-save"></i> Simpan Data EOQ
        </button>
    </form>
</div>

<script>
function updateSatuanBahanBaku() {
    var select = document.getElementById('id_bahan_baku');
    var satuan = select.options[select.selectedIndex].getAttribute('data-satuan');
    document.getElementById('satuan_bahan_baku').value = satuan;
}
</script>
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