<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Daftar EOQ</title>
    <style>
        .btn-icon-split .icon {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-icon-split .text {
            display: flex;
            align-items: center;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        .table tbody+tbody {
            border-top: 2px solid #dee2e6;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DATA EOQ</h6>
                <br>
                <form method="GET" action="manager.php" class="float-right">
                    <input type="hidden" name="url" value="eoq_produksi">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Dari</span>
                        </div>
                        <input type="date" class="form-control" name="from_date" value="<?php echo isset($_GET['from_date']) ? $_GET['from_date'] : ''; ?>" required>
                        <div class="input-group-prepend">
                            <span class="input-group-text">Sampai</span>
                        </div>
                        <input type="date" class="form-control" name="to_date" value="<?php echo isset($_GET['to_date']) ? $_GET['to_date'] : date('Y-m-d'); ?>">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Filter</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nomor Urut</th>
                                <th>Nama Bahan Baku</th>
                                <th>Jumlah Pesanan</th>
                                <th>Periode Kebutuhan</th>
                                <th>Biaya Pesanan</th>
                                <th>Harga Per Bahan Baku</th>
                                <th>EOQ</th>
                                <th>Frekuensi Pemesanan</th>
                                <th>Total Biaya</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require 'koneksi.php';

                            $sql = "SELECT te.id, bb.nama AS nama_bahan_baku, te.jumlah_pesanan, te.per_periode_kebutuhan, te.biaya_pesanan_per_order, te.harga_per_bahan_baku, te.eoq, te.frekuensi_pemesanan, te.total_biaya, te.created_at
                            FROM tabel_eoq te
                            INNER JOIN bahan_baku bb ON te.id_bahan_baku = bb.id";

                            if (isset($_GET['from_date']) && isset($_GET['to_date'])) {
                                $fromDate = $_GET['from_date'];
                                $toDate = $_GET['to_date'];

                                if (!empty($fromDate) && !empty($toDate)) {
                                    $sql .= " WHERE te.created_at BETWEEN '$fromDate' AND '$toDate'";
                                }
                            }

                            $result = $conn->query($sql);
                            $nomor_urut = 1; // Inisialisasi nomor urut

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <tr>
                                        <td><?php echo $nomor_urut++; ?></td>
                                        <td><?php echo htmlspecialchars($row['nama_bahan_baku']); ?></td>
                                        <td><?php echo htmlspecialchars($row['jumlah_pesanan']); ?></td>
                                        <td><?php echo ucfirst(htmlspecialchars($row['per_periode_kebutuhan'])); ?></td>
                                        <td>Rp. <?php echo number_format($row['biaya_pesanan_per_order'], 0, ',', '.'); ?></td>
                                        <td>Rp. <?php echo number_format($row['harga_per_bahan_baku'], 0, ',', '.'); ?></td>
                                        <td><?php echo htmlspecialchars($row['eoq']); ?></td>
                                        <td><?php echo htmlspecialchars($row['frekuensi_pemesanan']); ?></td>
                                        <td><?php echo htmlspecialchars($row['total_biaya']); ?></td>
                                        <td><?php echo htmlspecialchars(date('d-m-Y', strtotime($row['created_at']))); ?></td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo "<tr><td colspan='10' class='text-center'>Filter aktif - Tidak ada data yang ditemukan. </td></tr>";
                            }
                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>