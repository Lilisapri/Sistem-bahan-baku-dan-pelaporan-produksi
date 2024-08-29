<?php
require 'koneksi.php';

$cari = isset($_GET['cari']) ? $_GET['cari'] : '';

// Prepare and execute a safe query
$stmt = $conn->prepare("SELECT * FROM bahan_baku WHERE nama LIKE CONCAT('%', ?, '%')");
$stmt->bind_param("s", $cari);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Riwayat Data Bahan Baku</title>
</head>


<body>

  <div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

      <div class="card-header">
        <h5 class="m-0 font-weight-bold text-primary"> Riwayat Data Bahan Baku</h6>
          <form method="GET" action="s_admin.php">
            <input type="hidden" name="url" value="bahan_baku">
            <div class="d-flex flex-row-reverse">
              <div class="p-2">
                
              </div>
            </div>
          </form>
      </div>
      <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>Nomor Urut</th>
                            <th>Kode Bahan Baku</th>
                            <th>Nama Bahan Baku</th>
                            <th>Satuan</th>
                            <th>Jenis</th>
                            <th>Harga satuan</th>
                            <th>Total Jumlah Persediaan</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $nomor_urut = 1; // Inisialisasi nomor urut
                        if (!empty($data)) : ?>
                            <?php foreach ($data as $row) : ?>
                              <tr style="text-align: center;">
                                    <td><?php echo $nomor_urut++; ?></td>
                                    <td><?php echo !empty($row['kode_bahan_baku']) ? htmlspecialchars($row['kode_bahan_baku']) : '-'; ?></td>
                                    <td><?php echo htmlspecialchars($row['nama']); ?></td>
                                    <td><?php echo htmlspecialchars($row['satuan']); ?></td>
                                    <td>
                                        <?php
                                        if (!empty($row['jenis'])) {
                                            if (strpos($row['jenis'], 'Sheet Book Papper 52 Gram 79x109') !== false) {
                                                echo 'Sheet Book 79x109';
                                            } else {
                                                echo htmlspecialchars($row['jenis']);
                                            }
                                        } else {
                                            echo '-';
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo 'Rp ' . number_format($row['harga'], 0, ',', '.'); ?></td>
                                    <td><?php echo htmlspecialchars($row['jumlah_persediaan']); ?></td>
                                    <td><?php echo htmlspecialchars(date('d-m-Y', strtotime($row['created_at']))); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td class="text-center" colspan="8">Tidak ada data yang ditemukan</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>

</body>

</html>
