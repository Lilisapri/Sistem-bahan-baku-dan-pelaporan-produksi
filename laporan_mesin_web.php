<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Laporan Mesin Web</title>
</head>
<body>
  <div class="container-fluid">
    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header">
        <h5 class="m-0 font-weight-bold text-primary">Laporan Unit Mesin Web</h5>
        <form method="GET" action="s_admin.php">
          <input type="hidden" name="url" value="laporan_mesin_web">
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
                <input type="date" class="form-control" name="akhir" value="<?php echo isset($_GET['akhir']) ? $_GET['akhir'] : date('Y-m-d'); ?>">
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
                <th>Jumlah Plat</th>
                <th>Jumlah Catern</th>
                <th>Jumlah Roll</th>
                <th>Hasil Cetak</th>
              </tr>
            </thead>
            <tbody>
              <?php
              require 'koneksi.php';
              $counter = 1; // Variabel untuk nomor urut

              if (isset($_GET['awal'])) {
                $awal = $_GET['awal'];
                $akhir = $_GET['akhir'];
                $sql = "SELECT id,no_spk,jenis_unit_kerja,judul_buku,ms.tanggal,shift_kerja,ms.jumlah_plat,
                              ms.jumlah_catern,jumlah_roll,hasil_cetak
                        FROM unit_mesin_web ms
                        INNER JOIN spk ON ms.id_spk = spk.id_spk
                        INNER JOIN unit_kerja ON ms.id_unit_kerja = unit_kerja.id_unit_kerja 
                        WHERE ms.tanggal >= '$awal' AND ms.tanggal <= '$akhir';";
              } else {
                $sql = "SELECT id,no_spk,jenis_unit_kerja,judul_buku,ms.tanggal,shift_kerja,ms.jumlah_plat,
                              ms.jumlah_catern,jumlah_roll,hasil_cetak
                        FROM unit_mesin_web ms
                        INNER JOIN spk ON ms.id_spk = spk.id_spk
                        INNER JOIN unit_kerja ON ms.id_unit_kerja = unit_kerja.id_unit_kerja;";
              }

              $result = mysqli_query($conn, $sql);

              if (!$result) {
                // Penanganan kesalahan jika query gagal
                echo "Error: " . mysqli_error($conn);
              } else {
                if (mysqli_num_rows($result) > 0) {
                  // Loop melalui hasil query
                  while ($row = mysqli_fetch_assoc($result)) {
              ?>
                    <tr> <!-- Mulai baris tabel -->
                      <td><?php echo $counter++; ?></td> <!-- Nomor urut otomatis -->

                      <td><?php echo $row['no_spk']; ?></td>
                      <td><?php echo $row['jenis_unit_kerja']; ?></td>
                      <td><?php echo $row['judul_buku']; ?></td>
                      <td><?php echo $row['tanggal']; ?></td>
                      <td><?php echo $row['shift_kerja']; ?></td>
                      <td><?php echo $row['jumlah_plat']; ?></td>
                      <td><?php echo $row['jumlah_catern']; ?></td>
                      <td><?php echo $row['jumlah_roll']; ?></td>
                      <td><?php echo $row['hasil_cetak']; ?></td>
                    </tr> <!-- Akhiri baris tabel -->
              <?php
                  }
                } else {
                  echo "Data tidak ditemukan."; // Pesan jika tidak ada data yang ditemukan
                }
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <script>
    function cetakLaporan() {
      var awal = document.getElementsByName("awal")[0].value;
      var akhir = document.getElementsByName("akhir")[0].value;

      if (awal === "" || akhir === "") {
        alert("Silahkan pilih tanggal terlebih dahulu.");
        return;
      }

      window.open("cetak_laporan_mesin_web.php?awal=" + awal + "&akhir=" + akhir, "_blank");
    }
  </script>
</body>
</html>
