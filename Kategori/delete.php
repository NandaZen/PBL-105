<?php
require_once 'koneksi.php';

if (isset($_POST['delete'])) {
    $id = $_POST['id_kategori'];

    $query = "DELETE FROM t_kategori WHERE id_kategori = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 's', $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Kategori berhasil dihapus'); window.location.href='kategori.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus kategori'); window.location.href='kategori.php';</script>";
    }
}
?>
