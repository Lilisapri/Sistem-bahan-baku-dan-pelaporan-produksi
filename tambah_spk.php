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

  <div class="container mt-4">
    <div class="card shadow">
      <div class="card-header">
        Form Tambah SPK
      </div>
      <div class="card-body">
        <form action="simpan_spk.php" method="post" class="form-horizontal">
          <div class="row">
            <div class="form-group col-sm-6">
              <label>No SPK</label>
              <input type="text" name="no_spk" class="form-control">
            </div>
            <div class="form-group col-sm-6">
              <label>Judul Buku</label>
              <input type="text" name="judul_buku" class="form-control">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-sm-6">
              <label>No ISBN</label>
              <input type="text" name="no_isbn" class="form-control">
            </div>
            <div class="form-group col-sm-6">
              <label>Tanggal</label>
              <input type="date" name="tanggal" class="form-control">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-sm-6">
              <label>Tanggal Permintaan Selesai</label>
              <input type="date" name="tanggal_permintaan_selesai" class="form-control">
            </div>
            <div class="form-group col-sm-6">
              <label>Oplah Cetak</label>
              <input type="text" name="oplah_cetak" class="form-control">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-sm-6">
              <label>Oplah Insheet</label>
              <input type="text" name="oplah_insheet" class="form-control">
            </div>
            <div class="form-group col-sm-6">
              <label>Ukuran Buku</label>
              <select name="ukuran_buku" class="form-control">
                <option value="14x20">14x20</option>
                <option value="19x26">19x26</option>
                <option value="13x19">13x19</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-sm-6">
              <label>Jumlah Halaman</label>
              <input type="text" name="jumlah_halaman" class="form-control">
            </div>
            <div class="form-group col-sm-6">
              <label>Model Catern</label>
              <select name="model_catern" class="form-control">
                <option value="Model catren 16">Model catren 16</option>
                <option value="Model catren 32">Model catren 32</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-sm-6">
              <label>Jumlah Catern</label>
              <input type="text" name="jumlah_catern" class="form-control">
            </div>
            <div class="form-group col-sm-6">
              <label>Jumlah Plat</label>
              <input type="text" name="jumlah_plat" class="form-control">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-sm-6">
              <label>Ukuran Kertas</label>
              <select name="ukuran_kertas" class="form-control">
                <option value="BOOK PAPER 52 GRAM -79X109 PREMIUM">BOOK PAPER 52 GRAM -79X109 PREMIUM</option>
                <option value="BOOK PAPER 61X86-52 GRAM">BOOK PAPER 61X86-52 GRAM</option>
              </select>
            </div>
            <div class="form-group col-sm-6">
              <label>Kebutuhan Kertas</label>
              <input type="text" name="kebutuhan_kertas" class="form-control">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-sm-6">
              <label>Jenis Mesin</label>
              <select name="mesin_cetak" class="form-control">
                <option value="Mesin Insheet">Mesin Insheet</option>
                <option value="Mesin Web">Mesin Web</option>
              </select>
            </div>
            <div class="form-group col-sm-6">
              <input type="submit" class="btn btn-primary mt-4" value="Simpan">
            </div>
          </div>
        </form>
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
