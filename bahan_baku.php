<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

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

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Bahan Baku</title>
    <style>
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
                <h6 class="m-0 font-weight-bold text-primary">Data Bahan Baku</h6>
            </div>
            <div class="card-header py-3">
                <div class="row align-items-center">
                    <div class="col-md-6 mt-2">
                        <a href="s_admin.php?url=tambah_bahan_baku" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Tambah Bahan Baku</span>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 offset-lg-2 offset-md-0 offset-sm-0 mt-2">
                        <div class="form-group mb-0">
                            <form action="s_admin.php" method="GET">
                                <input type="hidden" name="url" value="bahan_baku">
                                <div class="input-group">
                                    <input type="text" name="cari" class="form-control" placeholder="Cari Bahan Baku" value="<?php echo htmlspecialchars($cari); ?>">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Cari</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Kode Bahan Baku</th>
                            <th>Nama Bahan Baku</th>
                            <th>Satuan</th>
                            <th>Jenis</th>
                            <th>Harga per Satuan</th>
                            <th>Jumlah Persediaan</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($data)) : ?>
                            <?php foreach ($data as $row) : ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row['id']); ?></td>
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
                                    <td>
                                        <div class="action-buttons">
                                            <a href="s_admin.php?url=edit_bahan_baku&id=<?php echo $row['id']; ?>" class="btn btn-success btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-edit"></i>
                                                </span>
                                                <span class="text">Edit</span>
                                            </a>
                                            <a href="hapus_bahan_baku.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-icon-split" onclick="return confirm('Yakin hapus?')">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                <span class="text">Hapus</span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td class="text-center" colspan="6">Tidak ada data yang ditemukan</td>
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