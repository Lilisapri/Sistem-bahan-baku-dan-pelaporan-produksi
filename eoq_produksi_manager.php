<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
                <a href="s_admin.php?url=tambah_eoq" class="btn btn-primary btn-icon-split mt-3">
                   
                    
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Bahan Baku</th>
                                <th>Satuan</th>
                                <th>Jumlah Pesanan</th>
                                <th>Periode Kebutuhan</th>
                                <th>Biaya Pesanan</th>
                                <th>Harga Per Bahan Baku</th>
                                <th>Hasil EOQ Jumlah Miminal Order</th>
                                <th>Frekuensi Pemesanan (dalam 1 thn)</th>
                                <th>Total Biaya (Per jenis Periode)</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require 'koneksi.php';
                            $sql = "SELECT te.id, bb.nama AS nama_bahan_baku, bb.satuan, te.jumlah_pesanan, te.per_periode_kebutuhan, te.biaya_pesanan_per_order, te.harga_per_bahan_baku, te.eoq, te.frekuensi_pemesanan, te.total_biaya, te.created_at
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
                                        <td><?php echo htmlspecialchars($row['satuan']); ?></td>
                                        <td><?php echo htmlspecialchars($row['jumlah_pesanan']); ?></td>
                                        <td><?php echo ucfirst(htmlspecialchars($row['per_periode_kebutuhan'])); ?></td>
                                        <td>Rp. <?php echo number_format($row['biaya_pesanan_per_order'], 0, ',', '.'); ?></td>
                                        <td>Rp. <?php echo number_format($row['harga_per_bahan_baku'], 0, ',', '.'); ?></td>

                                        <td><?php echo htmlspecialchars($row['eoq']); ?></td>
                                        <td><?php echo htmlspecialchars($row['frekuensi_pemesanan']); ?></td>
                                        <td>Rp. <?php echo number_format($row['total_biaya'], 0, ',', '.'); ?></td>
                                        <td><?php echo htmlspecialchars(date('d-m-Y', strtotime($row['created_at']))); ?></td>
                                        <td>
                                            <div class="action-buttons">
                                                <a href='s_admin.php?url=edit_eoq&id=<?php echo $row['id']; ?>' class='btn btn-success btn-icon-split btn-edit-delete'>
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-edit"></i>
                                                    </span>
                                                    <span class="text">Edit</span>
                                                </a>
                                                <a href='hapus_eoq.php?id=<?php echo $row['id']; ?>' class='btn btn-danger btn-icon-split btn-edit-delete' onclick='return confirm("Are you sure you want to delete this item?")'>
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
                                echo "<tr><td colspan='12' class='text-center'>No data found</td></tr>";
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