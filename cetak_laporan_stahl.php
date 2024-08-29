<?php
require 'koneksi.php';

$awal = $_GET['awal'];
$akhir = $_GET['akhir'];

$sql = "SELECT us.id, no_spk, jenis_unit_kerja, judul_buku, us.tanggal, shift_kerja, hasil_lipat 
        FROM unit_stahl us
        INNER JOIN spk ON us.id_spk = spk.id_spk
        INNER JOIN unit_kerja ON us.id_unit_kerja = unit_kerja.`id_unit_kerja`
        WHERE us.`tanggal` >= '$awal' AND us.`tanggal` <= '$akhir'";

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
    <title>Cetak Laporan Unit Stahl</title>
    <style>
      .container {
            max-width: 4000px;
            margin: 0 auto;
            padding: 0px;
        }

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

        .footer {
            margin-top: 50px;
            text-align: right;
        }

        .footer img {
            width: 100px;
            height: auto;
            margin-top: 20px;
        }

        .signatories {
            text-align: right;
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
                Alamat: RT.05 Ds. Blali, Seloharjo, Pundong, Bantul, DIY 55771<br>
                Cp: 081327575687 email: Galaxymedia@gmail.com
            </div>
        </div>
        <h2>Laporan Unit Stahl</h2>
        <p>Tanggal: <?php echo $awal; ?> - <?php echo $akhir; ?></p>
        <table>
            <thead>
                <tr>
                    <th>Nomor urut</th>
                    <th>No SPK</th>
                    <th>Jenis Unit Kerja</th>
                    <th>Judul Buku</th>
                    <th>Tanggal</th>
                    <th>Shift Kerja</th>
                    <th>Hasil Lipat</th>
                </tr>
            </thead>
            <tbody>
                <?php $counter = 1; ?>
                <?php foreach ($data as $row) { ?>
                    <tr>
                        <td><?php echo $counter; ?></td>
                        <td><?php echo $row['no_spk']; ?></td>
                        <td><?php echo $row['jenis_unit_kerja']; ?></td>
                        <td><?php echo $row['judul_buku']; ?></td>
                        <td><?php echo $row['tanggal']; ?></td>
                        <td><?php echo $row['shift_kerja']; ?></td>
                        <td><?php echo $row['hasil_lipat']; ?></td>
                    </tr>
                    <?php $counter++; ?>
                <?php } ?>
            </tbody>
        </table>
        <div class="footer">
            <div class="signatories">
                <p>Penanggung Jawab</p>
                <p>Staf Admin</p>
                <img src="/img/ttd.png" alt="Pranowo">
                <p>Pranowo</p>
            </div>
        </div>
    </div>
</body>

</html>
