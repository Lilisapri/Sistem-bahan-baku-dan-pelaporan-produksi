<!DOCTYPE html>
<html>

<head>
    <title>Halaman Widget</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        canvas {
            max-width: 800px; /* Atur lebar maksimum kanvas */
            max-height: 600px; /* Atur tinggi maksimum kanvas */
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <h1 class="h3 mb-0 text-gray-800 mb-3"><b>Dashboard Pracetak</b></h1>
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <canvas id="spkChart" width="400" height="300"></canvas> <!-- Mengatur lebar dan tinggi kanvas -->
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
