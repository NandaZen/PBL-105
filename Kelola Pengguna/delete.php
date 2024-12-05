<?php
require("koneksinya.php");

if (isset($_POST['delete'])) {
    $email = $_POST['email']; // Ambil email dari form
    $query = "DELETE FROM pengguna WHERE email = ?"; // Query menggunakan placeholder
    $stmt = $koneksi->prepare($query);

    // Cek apakah prepare berhasil
    if ($stmt === false) {
        die("Error pada prepare statement: " . $koneksi->error);
    }

    // Bind parameter (gunakan "s" untuk string)
    $stmt->bind_param("s", $email);

    // Eksekusi pernyataan
    if ($stmt->execute()) {
        // Periksa jumlah baris yang terpengaruh
        if ($stmt->affected_rows > 0) {
            echo "<script>alert('Berhasil Menghapus Pengguna');
                document.location = 'kelola_pengguna2.php';
            </script>";
        } else {
            echo "<script>alert('Email tidak ditemukan!');
                console.log('Email: $email');
                document.location = 'kelola_pengguna2.php';
            </script>";
        }
    } else {
        die("Error pada execute statement: " . $stmt->error);
    }

    // Tutup pernyataan dan koneksi
    $stmt->close();
    $koneksi->close();
}
?>
