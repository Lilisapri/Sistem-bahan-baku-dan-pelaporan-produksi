<?php
require 'koneksi.php';

$awal = $_GET['awal'];
$akhir = $_GET['akhir'];

$sql = "SELECT ub.id, no_spk, jenis_unit_kerja, judul_buku, ub.tanggal, shift_kerja, jumlah_bindding 
        FROM unit_bindding ub
        INNER JOIN spk ON ub.id_spk = spk.id_spk
        INNER JOIN unit_kerja ON ub.id_unit_kerja = unit_kerja.`id_unit_kerja`
        WHERE ub.`tanggal` >= '$awal' AND ub.`tanggal` <= '$akhir'";

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
    <title>Cetak Laporan Unit Bindding</title>
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
        <h2>Laporan Unit Bindding</h2>
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
                    <th>Jumlah Bindding</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $nomor_urut = 1; // Inisialisasi nomor urut
                foreach ($data as $item) { // Ubah $data menjadi $item untuk mencegah konflik nama variabel
                ?>
                    <tr>
                        <td><?php echo $nomor_urut++; ?></td> <!-- Gunakan $nomor_urut dan tingkatkan nilainya setiap kali loop -->
                        <td><?php echo $item['no_spk']; ?></td>
                        <td><?php echo $item['jenis_unit_kerja']; ?></td>
                        <td><?php echo $item['judul_buku']; ?></td>
                        <td><?php echo $item['tanggal']; ?></td>
                        <td><?php echo $item['shift_kerja']; ?></td>
                        <td><?php echo $item['jumlah_bindding']; ?></td>
                    </tr>
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
