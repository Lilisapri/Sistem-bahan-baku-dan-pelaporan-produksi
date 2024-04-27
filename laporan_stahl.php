<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Laporan Stahl</title>
</head>
<script>
  function cetakLaporan() {
    var awal = document.getElementsByName("awal")[0].value;
    var akhir = document.getElementsByName("akhir")[0].value;

    if (awal === "" || akhir === "") {
      alert("Silahkan pilih tanggal terlebih dahulu.");
      return;
    }

    window.open("cetak_laporan_stahl.php?awal=" + awal + "&akhir=" + akhir, "_blank");
  }
</script>

<body>

  <div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header">
        <h5 class="m-0 font-weight-bold text-primary">Laporan Unit Stahl</h6>
          <form method="GET" action="s_admin.php">
            <input type="hidden" name="url" value="laporan_stahl">
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
                  <input type="date" class="form-control" name="awal" value="<?php echo isset($_GET['awal']) ? $_GET['awal'] : ''; ?>">
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
                <th>No</th>
                <th>No SPK</th>
                <th>Jenis Unit Kerja</th>
                <th>Judul Buku</th>
                <th>Tanggal</th>
                <th>Shift Kerja</th>
                <th>Hasil Lipat</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php
                require 'koneksi.php';

                $awal = isset($_GET['awal']) && !empty($_GET['awal']) ? $_GET['awal'] : '1900-01-01';
                $akhir = isset($_GET['akhir']) ? $_GET['akhir'] : date('Y-m-d');

                $sql = "SELECT id,no_spk,jenis_unit_kerja,judul_buku,ust.tanggal,shift_kerja,hasil_lipat
                        FROM unit_stahl ust
                        INNER JOIN spk ON ust.id_spk = spk.id_spk
                        INNER JOIN unit_kerja ON ust.id_unit_kerja = unit_kerja.`id_unit_kerja`
                        WHERE ust.`tanggal` >= '$awal' AND ust.`tanggal` <= '$akhir'";
                $result = mysqli_query($conn, $sql);
                $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
                foreach ($data as $data) {
                ?>
                  <td><?php echo $data['id']; ?></td>
                  <td><?php echo $data['no_spk']; ?></td>
                  <td><?php echo $data['jenis_unit_kerja']; ?></td>
                  <td><?php echo $data['judul_buku']; ?></td>
                  <td><?php echo $data['tanggal']; ?></td>
                  <td><?php echo $data['shift_kerja']; ?></td>
                  <td><?php echo $data['hasil_lipat']; ?></td>
              </tr>
            <?php  } ?>
          </table>
          </td>
        </div>
      </div>
    </div>
  </div>

</body>

</html>