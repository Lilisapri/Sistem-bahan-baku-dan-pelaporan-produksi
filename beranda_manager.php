<!DOCTYPE html>
<html>

<head>
    <title>Halaman Widget</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        canvas {
            max-width: 600px; /* Atur lebar maksimum kanvas */
            max-height: 600px; /* Atur tinggi maksimum kanvas */
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <h1 class="h3 mb-0 text-gray-800 mb-3"><b>Dashboard Manager</b></h1>
        <div class="card-body">
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="#" class="text-decoration-none">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total EOQ
                                    </div>
                                    <div class="h4 mb-2 font-weight-bold text-gray-800">
                                        <?php
                                        require 'koneksi.php';
                                        $sql = "SELECT COUNT(*) AS total FROM tabel_eoq";
                                        $result = $conn->query($sql);
                                        $row = $result->fetch_assoc();
                                        echo $row['total'];
                                        ?>
                                    </div>
                                    <small class="text-muted">Total Kesuluruhan Data EOQ.</small>
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
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Data Bahan Baku</div>
                                    <div class="h4 mb-2 font-weight-bold text-gray-800">
                                        <?php
                                        $sql = "SELECT COUNT(*) AS total FROM bahan_baku";
                                        $result = $conn->query($sql);
                                        $row = $result->fetch_assoc();
                                        echo $row['total'];
                                        ?>
                                    </div>
                                    <small class="text-muted">Jumlah keseluruhan bahan baku.</small>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <a href="#" class="text-decoration-none">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Laporan Unit</div>
                                    <div class="h4 mb-2 font-weight-bold text-gray-800">7
                                    </div>
                                    <small class="text-muted">Jumlah keseluruhan laporan.</small>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <a href="#" class="text-decoration-none">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Sisa Stok Bahan Baku
                                    </div>
                                    <div class="h4 mb-2 font-weight-bold text-gray-800">
                                        <?php
                                        $sql = "SELECT SUM(jumlah_persediaan) AS total FROM bahan_baku";
                                        $result = $conn->query($sql);
                                        $row = $result->fetch_assoc();
                                        echo $row['total'];
                                        ?>
                                    </div>
                                    <small class="text-muted">Total Seluruh Persediaan Bahan Baku.</small>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-box fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</body>
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <canvas id="spkChart" width="100" height="00"></canvas> <!-- Mengatur lebar dan tinggi kanvas -->
                </div>
                <div class="col-auto">
                </div>
            </div>
        </div>
    </div>
    
    <script>
        // Fetching data
        <?php
            require 'koneksi.php';
            $sql = "SELECT MONTH(tanggal) AS bulan, COUNT(*) AS total FROM spk GROUP BY MONTH(tanggal)";
            $result = $conn->query($sql);
            $labels = [];
            $data = [];
            while($row = $result->fetch_assoc()) {
                $labels[] = date('F', mktime(0, 0, 0, $row['bulan'], 1));
                $data[] = $row['total'];
            }
        ?>

        // Chart.js code
        var ctx = document.getElementById('spkChart').getContext('2d');
        var spkChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    label: 'Total SPK',
                    data: <?php echo json_encode($data); ?>,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
            
        });
    </script>
</body>

</html>
