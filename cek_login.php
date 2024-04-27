<?php
require "koneksi.php";
session_start();

$user = $_POST['username'];
$pass = $_POST['password'];

$sql = $conn->query("SELECT * FROM pengguna WHERE username='$user' AND password='$pass'");
$cek = $sql->num_rows;

if ($cek > 0) {
    $data = $sql->fetch_assoc();
    if ($data['level'] == "pracetak") {
        $_SESSION['username'] = $user;
        $_SESSION['level'] = "pracetak";
        $_SESSION['id'] = 1;
        header('location: pracetak.php?url=beranda_pracetak');
    } else if ($data['level'] == "produksi") {
        $_SESSION['username'] = $user;
        $_SESSION['level'] = "produksi";
        $_SESSION['id'] = 2;
        header('location: produksi.php?url=beranda_produksi');
    } else if ($data['level'] == "manager") {
        $_SESSION['username'] = $user;
        $_SESSION['level'] = "manager";
        $_SESSION['id'] = 3;
        header('location: manager.php?url=beranda_manager');
    } else if ($data['level'] == "s_admin") {
        $_SESSION['username'] = $user;
        $_SESSION['level'] = "s_admin";
        $_SESSION['id'] = 4;
        header('location: s_admin.php?url=beranda_admin');
    }
} else {
    echo "<center><h1>Username atau Password Tidak Ditemukan</h1><br><h2>klik <a href='index.php'>disini</a> untuk login kembali</h2></center>";
}
