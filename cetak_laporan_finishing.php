<?php
require 'koneksi.php';

$awal = $_GET['awal'];
$akhir = $_GET['akhir'];

$sql = "SELECT uf.id, no_spk, jenis_unit_kerja, judul_buku, uf.tanggal, shift_kerja, jumlah_gabung 
        FROM unit_finishing uf
        INNER JOIN spk ON uf.id_spk = spk.id_spk
        INNER JOIN unit_kerja ON uf.id_unit_kerja = unit_kerja.`id_unit_kerja`
        WHERE uf.`tanggal` >= '$awal' AND uf.`tanggal` <= '$akhir'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    echo "Tidak ada data yang ditemukan.";
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Cetak Laporan Unit Finishing</title>
    <style>
        .header {
            display: flex;
            align-items: center;
            padding-bottom: 20px;
            border-bottom: 2px solid #333;
            margin-bottom: 20px;
        }

        .header img {
            width: 100px;
            height: auto;
            margin-right: 10px;
        }

        .header .company-info {
            font-size: 17px;
            line-height: 1.4;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-top: 0;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body onload="window.print();">
    <div class="container">
        <div class="header">
            <img src="/img/logo.png" alt="Galaxy Offset Logo" style="margin-right:30px">
            <div class="company-info">
                CV. GALAXY MEDIA ILMU<br>
                GALAXY OFFSET (Percetakan)<br>
                Alamat: RT.05 Ds. Blali, Selobanteng, Pungging, Bantul, DIY 55771<br>
                Cp: 081327575687 email: masteryudha85@gmail.com
            </div>
        </div>
        <h2>Laporan Unit Finishing</h2>
        <p>Tanggal: <?php echo $awal; ?> - <?php echo $akhir; ?></p>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>No SPK</th>
                    <th>Jenis Unit Kerja</th>
                    <th>Judul Buku</th>
                    <th>Tanggal</th>
                    <th>Shift Kerja</th>
                    <th>Jumlah Gabung</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $data) { ?>
                    <tr>
                        <td><?php echo $data['id']; ?></td>
                        <td><?php echo $data['no_spk']; ?></td>
                        <td><?php echo $data['jenis_unit_kerja']; ?></td>
                        <td><?php echo $data['judul_buku']; ?></td>
                        <td><?php echo $data['tanggal']; ?></td>
                        <td><?php echo $data['shift_kerja']; ?></td>
                        <td><?php echo $data['jumlah_gabung']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <br>
    </div>
</body>

</html>