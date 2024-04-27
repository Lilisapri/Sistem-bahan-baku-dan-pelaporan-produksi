<?php
require 'koneksi.php';

$id = $_GET['id'];

$sql = "DELETE FROM bahan_baku WHERE id='$id'";
$result = mysqli_query($conn, $sql);

if ($result) {
    // s_admin.php?url=unit_bindding
    header('location: s_admin.php?url=bahan_baku');
} else {
    echo "Gagal menghapus data bahan baku.";
}
