<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Daftar EOQ</title>
    <style>
        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        .table tbody+tbody {
            border-top: 2px solid #dee2e6;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DATA EOQ</h6>
                <a href="s_admin.php?url=tambah_eoq" class="btn btn-primary btn-icon-split mt-3">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah EOQ</span>
                </a>
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
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require 'koneksi.php';
                            $sql = "SELECT te.id, bb.nama AS nama_bahan_baku, te.jumlah_pesanan, te.per_periode_kebutuhan, te.biaya_pesanan_per_order, te.harga_per_bahan_baku, te.eoq, te.frekuensi_pemesanan, te.total_biaya,te.created_at
                            FROM tabel_eoq te
                            INNER JOIN bahan_baku bb ON te.id_bahan_baku = bb.id";
                            $result = $conn->query($sql);
                            $nomor_urut = 1; // Inisialisasi nomor urut
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <tr>
                                        <td><?php echo $nomor_urut++; ?></td> <!-- Menampilkan nomor urut -->
                                        <td><?php echo htmlspecialchars($row['nama_bahan_baku']); ?></td>
                                        <td><?php echo htmlspecialchars($row['jumlah_pesanan']); ?></td>
                                        <td><?php echo ucfirst(htmlspecialchars($row['per_periode_kebutuhan'])); ?></td>
                                        <td>Rp. <?php echo number_format($row['biaya_pesanan_per_order'], 0, ',', '.'); ?></td>
                                        <td>Rp. <?php echo number_format($row['harga_per_bahan_baku'], 0, ',', '.'); ?></td>

                                        <td><?php echo htmlspecialchars($row['eoq']); ?></td>
                                        <td><?php echo htmlspecialchars($row['frekuensi_pemesanan']); ?></td>
                                        <td><?php echo htmlspecialchars($row['total_biaya']); ?></td>
                                        <td><?php echo htmlspecialchars(date('d-m-Y', strtotime($row['created_at']))); ?></td>
                                        <td>
                                            <div class="action-buttons">
                                                <a href='s_admin.php?url=edit_eoq&id=<?php echo $row['id']; ?>' class='btn btn-success btn-icon-split'>
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-edit"></i>
                                                    </span>
                                                    <span class="text">Edit</span>
                                                </a>
                                                <a href='hapus_eoq.php?id=<?php echo $row['id']; ?>' class='btn btn-danger btn-icon-split' onclick='return confirm("Are you sure you want to delete this item?")'>
                                                    <span class="icon text-white-50">
                                                        <i class='fas fa-trash'></i>
                                                    </span>
                                                    <span class="text">Hapus</span>
                                                </a>
                                            </div>
                                        </td>

                                    </tr>
                            <?php
                                }
                            } else {
                                echo "<tr><td colspan='10' class='text-center'>No data found</td></tr>";
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