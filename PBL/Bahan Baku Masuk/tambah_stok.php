<?php
require_once '../koneksi.php';
include '../config/function.php';

if (isset($_POST["tambah"])) { 
    $result = tambah_stok($_POST);
    
    mysqli_close($conn);

    // Redirect dengan parameter hasil
    if ($result['success']) {
        header("Location: bahan_masuk.php?status=success&message=" . urlencode($result['message']));
    } else {
        header("Location: bahan_masuk.php?status=error&message=" . urlencode($result['message']));
    }
    exit;
}
?>