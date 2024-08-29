<!DOCTYPE html>
<html>

<head>
    <title>Halaman Widget</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="container-fluid">
        <h1 class="h3 mb-0 text-gray-800 mb-3"><b>Dashboard Admin</b></h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total SPK 
                        </div>
                        <div class="h4 mb-2 font-weight-bold text-gray-800">
                            <?php
                            require 'koneksi.php';
                            $sql = "SELECT YEAR(tanggal) AS tahun, COUNT(*) AS total FROM spk GROUP BY YEAR(tanggal)";

                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                            echo $row['total'];
                            ?>
                        </div>
                        <small class="text-muted">Total Seluruh SPK</small>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Data Bahan Baku</div>
                        <div class="h4 mb-2 font-weight-bold text-gray-800"><?php
                                                                            $sql = "SELECT COUNT(*) AS total FROM bahan_baku";
                                                                            $result = $conn->query($sql);
                                                                            $row = $result->fetch_assoc();
                                                                            echo $row['total'];
                                                                            ?>
                        </div>
                        <small class="text-muted">Jumlah keseluruhan bahan baku.</small>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
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
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-md-12 mb-4">
            <canvas id="userLevelChart"></canvas>
        </div>
    </div>

    <script>
        <?php
        require 'koneksi.php';
        $sql = "SELECT level, COUNT(*) AS total FROM pengguna GROUP BY level";
        $result = $conn->query($sql);
        $levels = [];
        $totals = [];
        while ($row = $result->fetch_assoc()) {
            $levels[] = $row['level'];
            $totals[] = $row['total'];
        }
        ?>

        var ctx = document.getElementById('userLevelChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($levels); ?>,
                datasets: [{
                    label: 'Jumlah Pengguna',
                    data: <?php echo json_encode($totals); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>
