<?php
require 'koneksi.php';

// Make sure you have all the required fields from the form
if (isset( $_POST['kode_bahan_baku'], $_POST['nama'], $_POST['jenis'], $_POST['satuan'], $_POST['harga'], $_POST['jumlah_persediaan'])) {
	$kode_bahan_baku = $_POST['kode_bahan_baku'];
	$nama = $_POST['nama'];
	$jenis = $_POST['jenis'];
	$satuan = $_POST['satuan'];
	$harga = $_POST['harga'];
	$jumlah_persediaan = $_POST['jumlah_persediaan'];

	// Prepare an insert statement
	$sql = "INSERT INTO bahan_baku (kode_bahan_baku, nama, jenis, satuan, harga, jumlah_persediaan ) VALUES (?, ?, ?, ?, ?, ?)";
	$stmt = $conn->prepare($sql);

	// Check if the statement was prepared correctly
	if ($stmt === false) {
		echo "Error preparing statement: " . htmlspecialchars($conn->error);
		$conn->close();
		exit();
	}

	// Bind variables to the prepared statement as parameters
	$stmt->bind_param("ssssid", $kode_bahan_baku, $nama, $jenis, $satuan, $harga, $jumlah_persediaan);

	// Attempt to execute the prepared statement
	if ($stmt->execute()) {
		// Records created successfully. Redirect to landing page
		header('Location: s_admin.php?url=bahan_baku');
		exit();
	} else {
		echo "Gagal menyimpan data bahan baku. Error: " . htmlspecialchars($stmt->error);
	}

	// Close statement
	$stmt->close();
} else {
	echo "Data tidak lengkap.";
}

// Close connection
$conn->close();
