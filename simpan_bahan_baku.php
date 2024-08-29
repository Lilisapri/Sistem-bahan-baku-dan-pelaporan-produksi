
<?php
require 'koneksi.php';

// Pastikan semua field yang diperlukan dari formulir tersedia
if (isset($_POST['kode_bahan_baku'], $_POST['nama'], $_POST['jenis'], $_POST['satuan'], $_POST['harga'], $_POST['jumlah_persediaan'])) {
    $kode_bahan_baku = $_POST['kode_bahan_baku'];
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $satuan = $_POST['satuan'];
    $harga = $_POST['harga'];
    $jumlah_persediaan = $_POST['jumlah_persediaan'];

    // Periksa apakah nama bahan baku sudah ada di database
    $check_sql = "SELECT jumlah_persediaan FROM bahan_baku WHERE nama = ?";
    $check_stmt = $conn->prepare($check_sql);

    // Periksa apakah statement sudah disiapkan dengan benar
    if ($check_stmt === false) {
        echo "Error preparing statement: " . htmlspecialchars($conn->error);
        $conn->close();
        exit();
    }

    // Bind variabel ke prepared statement sebagai parameter
    $check_stmt->bind_param("s", $nama);

    // Cobalah untuk menjalankan prepared statement
    if ($check_stmt->execute()) {
        // Simpan hasilnya sehingga kita bisa memeriksa apakah nama bahan baku sudah ada
        $check_stmt->store_result();

        // Jika nama bahan baku sudah ada, tambahkan jumlah persediaan baru ke jumlah yang sudah ada
        if ($check_stmt->num_rows > 0) {
            $check_stmt->bind_result($existing_jumlah_persediaan);

            // Jika statement masih terbuka, baru lakukan bind_result
            if ($check_stmt->num_rows > 0) {
                $check_stmt->fetch();
                $jumlah_persediaan += $existing_jumlah_persediaan; // Tambahkan jumlah baru ke jumlah yang sudah ada
            }

            $check_stmt->close(); // Tutup statement check
        } else {
            $check_stmt->close(); // Tutup statement check
        }

        // Persiapkan statement insert
        $insert_sql = "INSERT INTO bahan_baku (kode_bahan_baku, nama, jenis, satuan, harga, jumlah_persediaan) VALUES (?, ?, ?, ?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);

        // Periksa apakah statement sudah disiapkan dengan benar
        if ($insert_stmt === false) {
            echo "Error preparing statement: " . htmlspecialchars($conn->error);
            $conn->close();
            exit();
        }

        // Bind variabel ke prepared statement sebagai parameter
        $insert_stmt->bind_param("ssssdi", $kode_bahan_baku, $nama, $jenis, $satuan, $harga, $jumlah_persediaan);

        // Cobalah untuk menjalankan prepared statement
        if (!$insert_stmt->execute()) {
            echo "Gagal menyimpan data bahan baku. Error: " . htmlspecialchars($insert_stmt->error);
            $conn->close();
            exit();
        }

        $insert_stmt->close(); // Tutup statement insert
    } else {
        echo "Gagal mengecek nama bahan baku. Error: " . htmlspecialchars($check_stmt->error);
    }

    // Redirect ke halaman utama
    header('Location: s_admin.php?url=bahan_baku');
    exit();
} else {
    echo "Data tidak lengkap.";
}

// Tutup koneksi
$conn->close();
?>