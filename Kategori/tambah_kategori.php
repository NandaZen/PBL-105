<?php
require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_kategori = $_POST['id_kategori'];
    $nama_kategori = $_POST['nama_kategori'];

    $query = "INSERT INTO t_kategori (id_kategori, nama_kategori) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'ss', $id_kategori, $nama_kategori);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Kategori berhasil ditambahkan'); window.location.href='kategori.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan kategori'); window.location.href='kategori.php';</script>";
    }
}
?>
