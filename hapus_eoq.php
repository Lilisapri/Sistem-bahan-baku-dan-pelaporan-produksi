<?php
require 'koneksi.php';

if (isset($_GET['id'])) {
	// Ambil ID dari query string
	$id = $_GET['id'];

	// Siapkan query hapus
	$sql = "DELETE FROM tabel_eoq WHERE id = ?";
	$stmt = $conn->prepare($sql);

	if ($stmt === false) {
		echo "Error: " . $conn->error;
		exit();
	}

	// Bind parameter ke query
	$stmt->bind_param("i", $id);

	// Eksekusi query dan cek apakah berhasil
	if ($stmt->execute()) {
		// Redirect ke halaman EOQ dengan pesan sukses
		header("Location: s_admin.php?url=eoq_produksi&status=success&msg=Data berhasil dihapus");
	} else {
		// Redirect ke halaman EOQ dengan pesan error
		header("Location: s_admin.php?url=eoq_produksi&status=error&msg=Data gagal dihapus: " . $stmt->error);
	}

	// Tutup statement
	$stmt->close();
} else {
	echo "ID tidak ditemukan.";
}

// Tutup koneksi
$conn->close();
