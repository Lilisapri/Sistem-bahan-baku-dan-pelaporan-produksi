<!DOCTYPE html>
<html>

<head>
    <title>Halaman Widget</title>

</head>

<body>
    <div class="container-fluid">
        <h1 class="h3 mb-0 text-gray-800 mb-3">Dashboard Admin</h1>
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="#" class="text-decoration-none">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total Pengguna
                                    </div>
                                    <div class="h4 mb-2 font-weight-bold text-gray-800">
                                        <?php
                                        require 'koneksi.php';
                                        $sql = "SELECT COUNT(*) AS total FROM pengguna";
                                        $result = $conn->query($sql);
                                        $row = $result->fetch_assoc();
                                        echo $row['total'];
                                        ?>
                                    </div>

                                    <small class="text-muted">Jumlah keseluruhan pengguna akun.</small>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <a href="#" class="text-decoration-none">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Unit Kerja</div>
                                    <div class="h4 mb-2 font-weight-bold text-gray-800"><?php
                                                                                        $sql = "SELECT COUNT(*) AS total FROM unit_kerja";
                                                                                        $result = $conn->query($sql);
                                                                                        $row = $result->fetch_assoc();
                                                                                        echo $row['total'];
                                                                                        ?>
                                    </div>
                                    <small class="text-muted">Jumlah Unit kerja yang telah sesuai.</small>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>


            <!-- <div class="col-md-4">
                <div class="card widget widget-warning">
                    <div class="card-body">
                        <i class="fas fa-boxes widget-icon"></i>
                        <h3 class="card-title">Sisa Stok Bahan Baku</h3>
                        <p class="card-text">
                            <?php
                            $sql = "SELECT SUM(jumlah_persediaan) AS total FROM bahan_baku";
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                            echo $row['total'];
                            ?>
                        </p>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</body>

</html>