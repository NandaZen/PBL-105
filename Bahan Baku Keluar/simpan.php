<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_bahan_baku_masukkeluar = $_POST['id_bahan_baku_masukkeluar'];
    $kuantitas = $_POST['kuantitas'];

    $query = "INSERT INTO t_bahan_baku_masukkeluar (id_bahan_baku_masukkeluar, kuantitas, aksi, tanggal) 
              VALUES ('$id_bahan_baku_masukkeluar', '$kuantitas', 'Bahan Baku Keluar', NOW())";
    if (mysqli_query($conn, $query)) {
        header('Location: bahan_baku_keluar.php'); 
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>