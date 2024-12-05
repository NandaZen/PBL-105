<?php
require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_kategori = $_POST['id_kategori'];
    $nama_kategori = $_POST['nama_kategori'];

    $query = "UPDATE t_kategori SET nama_kategori = ? WHERE id_kategori = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'ss', $nama_kategori, $id_kategori);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Kategori berhasil diperbarui'); window.location.href='kategori.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui kategori'); window.location.href='kategori.php';</script>";
    }
}
?>
