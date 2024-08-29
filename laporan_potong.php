<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Laporan Potong</title>
</head>
<script>
  function cetakLaporan() {
    var awal = document.getElementsByName("awal")[0].value;
    var akhir = document.getElementsByName("akhir")[0].value;

    if (awal === "" || akhir === "") {
      alert("Silahkan pilih tanggal terlebih dahulu.");
      return;
    }

    window.open("cetak_laporan_potong.php?awal=" + awal + "&akhir=" + akhir, "_blank");
  }
</script>

<body>

  <div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

      <div class="card-header">
        <h5 class="m-0 font-weight-bold text-primary"> Laporan Unit Potong</h6>
          <form method="GET" action="s_admin.php">
            <input type="hidden" name="url" value="laporan_potong">
            <div class="d-flex flex-row-reverse">
              <div class="p-2">
                <button type="button" class="btn btn-primary" onclick="cetakLaporan()"><i class="fa fa-print"></i> Cetak</button>
              </div>
              <div class="p-2">
                <button type="submit" class="btn btn-primary"><i class="fa fa-filter"></i> Filter</button>
              </div>
              <div class="p-2">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="mdi mdi-calendar-month"></i></span>
                  </div>
                  <input type="date" class="form-control" name="akhir" value="<?php echo date('Y-m-d'); ?>">
                </div>
              </div>
              <div class="p-2">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="mdi mdi-calendar-month"></i></span>
                  </div>
                  <input type="date" class="form-control" name="awal" value="<?php echo isset($_GET['awal']) ? $_GET['awal'] : ''; ?>" required>
                </div>
              </div>
            </div>
          </form>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Nomor urut</th>
				 
                <th>No SPK</th>
                <th>Jenis Unit Kerja</th>
                <th>Judul Buku</th>
                <th>Tanggal</th>
                <th>Shift Kerja</th>
                <th>Total potong</th>
                <th>Total sisir</th>
              </tr>
            </thead>
            <tbody>
              <?php
              require 'koneksi.php';
              $counter = 1; // Variabel untuk nomor urut

              if (isset($_GET['awal'])) {
                $awal = $_GET['awal'];
                $akhir = $_GET['akhir'];
                $sql = "SELECT id,no_spk,jenis_unit_kerja,judul_buku,up.tanggal,shift_kerja,total_potong,total_sisir
                        FROM unit_potong up
                        INNER JOIN spk ON up.id_spk = spk.id_spk
                        INNER JOIN unit_kerja ON up.id_unit_kerja = unit_kerja.`id_unit_kerja` 
                        WHERE up.`tanggal` >= '$awal' AND up.`tanggal` <= '$akhir';";
              } else {
                $sql = "SELECT id,no_spk,jenis_unit_kerja,judul_buku,up.tanggal,shift_kerja,total_potong,total_sisir
                        FROM unit_potong up
                        INNER JOIN spk ON up.id_spk = spk.id_spk
                        INNER JOIN unit_kerja ON up.id_unit_kerja = unit_kerja.`id_unit_kerja`;";
              }
              $result = mysqli_query($conn, $sql);
              $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
              foreach ($data as $row) {
              ?>
                <tr> <!-- Mulai baris tabel -->
                  <td><?php echo $counter++; ?></td> <!-- Nomor urut otomatis -->
                  
                  <td><?php echo $row['no_spk']; ?></td>
                  <td><?php echo $row['jenis_unit_kerja']; ?></td>
                  <td><?php echo $row['judul_buku']; ?></td>
                  <td><?php echo $row['tanggal']; ?></td>
                  <td><?php echo $row['shift_kerja']; ?></td>
                  <td><?php echo $row['total_potong']; ?></td>
                  <td><?php echo $row['total_sisir']; ?></td>
                </tr> <!-- Akhiri baris tabel -->
              <?php
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
