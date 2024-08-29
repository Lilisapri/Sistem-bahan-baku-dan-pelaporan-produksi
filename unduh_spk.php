<!DOCTYPE html>
<html>

<head>
    <title>Cetak SPK</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
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
            font-size: 12px;
            line-height: 1.4;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-top: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        @media print {
            .no-print {
                display: none;
            }

            .footer {
                margin-top: 50px;
                text-align: right;
            }

            .footer img {
                max-width: 80px; /* Atur lebar maksimum gambar */
                height: auto; /* Biarkan tinggi gambar menyesuaikan proporsi */
                margin-top: 20px;
            }
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
                Alamat: RT.05 Ds. Blali, Selobanteng, Pungging, Bantul, DIY 55771<br>
                Cp: 081327575687 email: masteryudha85@gmail.com
            </div>
        </div>
        <h2>Data Surat Perintah Kerja (SPK)</h2>
        <?php
        require 'koneksi.php';

        if (isset($_GET['id_spk'])) {
            $id_spk = $_GET['id_spk'];

            // Mengambil data SPK berdasarkan ID dengan JOIN ke tabel pengguna
            $sql = "SELECT spk.*, pengguna.nama_user FROM spk 
            INNER JOIN pengguna ON spk.id_pengguna = pengguna.id_pengguna
            WHERE spk.id_spk = '$id_spk'";
            $result = mysqli_query($conn, $sql);
            $data = mysqli_fetch_assoc($result);

            if ($data) {
        ?>
                <table>
                    
                    <tr>
                        <th>No SPK</th>
                        <td><?php echo $data['no_spk']; ?></td>
                    </tr>
                    <tr>
                        <th>Judul Buku</th>
                        <td><?php echo $data['judul_buku']; ?></td>
                    </tr>
                    <tr>
                        <th>No ISBN</th>
                        <td><?php echo $data['no_isbn']; ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td><?php echo $data['tanggal']; ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Permintaan Selesai</th>
                        <td><?php echo $data['tanggal_permintaan_selesai']; ?></td>
                    </tr>
                    <tr>
                        <th>Oplah Cetak</th>
                        <td><?php echo $data['oplah_cetak']; ?></td>
                    </tr>
                    <tr>
                        <th>Oplah Insheet</th>
                        <td><?php echo $data['oplah_insheet']; ?></td>
                    </tr>
                    <tr>
                        <th>Ukuran Buku</th>
                        <td><?php echo $data['ukuran_buku']; ?></td>
                    </tr>
                    <tr>
                        <th>Jumlah Halaman</th>
                        <td><?php echo $data['jumlah_halaman']; ?></td>
                    </tr>
                    <tr>
						<th>Model catern</th>
                        <td><?php echo $data['model_catern']; ?></td>
                    </tr>
                    <tr>
                        <th>Jumlah Catern</th>
                        <td><?php echo $data['jumlah_catern']; ?></td>
                    </tr>
                    <tr>
                        <th>Jumlah Plat</th>
                        <td><?php echo $data['jumlah_plat']; ?></td>
                    </tr>
                    <tr>
                        <th>Ukuran Kertas</th>
                        <td><?php echo $data['ukuran_kertas']; ?></td>
                    </tr>
                    <tr>
                        <th>Kebutuhan Kertas</th>
                        <td><?php echo $data['kebutuhan_kertas']; ?></td>
                    </tr>
                    <tr>
                        <th>Mesin Cetak</th>
                        <td><?php echo $data['mesin_cetak']; ?></td>
                    </tr>
                </table>
                <br>
        <?php
            } else {
                echo "Data SPK tidak ditemukan.";
            }
        } else {
            echo "ID SPK tidak ditemukan.";
        }
        ?>
        <div class="footer">
            <div class="signatories">
                <p>Penanggung Jawab</p>
                <p>Admin Pra-Cetak</p>
                <img src="/img/ttd_pra.png" alt="Pranowo" style="max-width: 150px; height: auto;">
                <p>Sri Utami</p>
            </div>
        </div>
    </div>
</body>

</html>
