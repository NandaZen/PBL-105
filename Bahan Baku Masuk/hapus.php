<?php
require_once 'koneksi.php';

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $query = "DELETE FROM t_bahan_baku_masukkeluar WHERE id_bahan_masukkeluar = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 's', $id);
    
    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Data bahan baku berhasil dihapus'); window.location.href='bahan_masuk.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data bahan baku'); history.back(-1);</script>";
    }
}
?>
