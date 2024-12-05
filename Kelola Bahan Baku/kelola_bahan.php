<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['nama_pengguna'])) {
    header("Location: ../Login/login.php");
    exit();
}

// Cek role pengguna
if (!isset($_SESSION['role'])) {
    header("Location: ../Login/login.php?error=not_logged_in");
    exit();
}

$allowed_roles = ['Staff Gudang'];
if (!in_array($_SESSION['role'], $allowed_roles)) {
    echo "<script>
        alert('Anda tidak memiliki akses ke halaman ini.');
        window.location.href = '../Login/login.php';
    </script>";
    exit();
}

// Proses tambah data
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    include("koneksi.php");

    $id_bahan_baku = $_POST['id_bahan_baku'];
    $nama_bahan_baku = $_POST['nama_bahan_baku'];
    $unit = $_POST['unit'];
    $kode_barcode = $_POST['kode_barcode'];
    $id_kategori = $_POST['id_kategori'];

    if ($id_bahan_baku && $nama_bahan_baku && $unit && $kode_barcode && $id_kategori) {
        // Gunakan prepared statements untuk keamanan
        $stmt = $conn->prepare("INSERT INTO t_bahan_baku (id_bahan_baku, nama_bahan_baku, Unit, kode_barcode, id_kategori) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $id_bahan_baku, $nama_bahan_baku, $unit, $kode_barcode, $id_kategori);

        if ($stmt->execute()) {
            echo "<script>
                alert('Data berhasil ditambahkan.');
                window.location.href = 'kelola_bahan.php';
            </script>";
        } else {
            echo "<script>
                alert('Terjadi kesalahan: " . htmlspecialchars($stmt->error) . "');
            </script>";
        }
        $stmt->close();
    } else {
        echo "<script>
            alert('Data tidak lengkap. Mohon isi semua kolom.');
        </script>";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Bahan Baku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/kelola_bahan.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
</head>

<body>

    <nav class="navbar d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <button onclick="openSidebar()" class="me-4">☰</button>
            <div class="input-group me-2" style="max-width: 300px;">
                <div class=" input-group-text">
                    <span class="input-group-text bg-light border-0"><i class="fas fa-search"></i></span>
                </div>
                <input type="search" class="form-control" placeholder="Pencarian">
            </div>
        </div>
        <div class="d-flex align-items-center">
            <i class="fas fa-user-circle fa-2xl me-2" aria-label="User  Icon"></i>
            <span class="navbar-text text-black me-4">
                <?= htmlspecialchars($_SESSION['nama_pengguna'] ?? '') ?><br>Staff Gudang
            </span>
        </div>
    </nav>

    <div id="sidebar" class="sidebar">
        <img src="../Polibatam.png">
        <button class="close-btn" onclick="closeSidebar()">x</button>
        <ul>
            <li><a href="../Dasboard/dasboard.php">Beranda</a></li>
            <li><a href="#"><i class="fa-solid fa-table-cells-large"></i> Kelola Stok bahan Baku</a></li>
            <li><a href="../Bahan Baku Masuk/bahan_masuk.php"><i class="fa-solid fa-list-check"></i> Bahan Baku Masuk</a></li>
            <li><a href="../Bahan Baku Keluar/bahan_baku_keluar.php"><i class="fa-regular fa-clipboard"></i> Bahan Baku Keluar</a></li>
            <li><a href="../Kategori/kategori.php"><i class="fa-sharp fa-thin fa-chart-simple"></i> Kategori Stok Bahan Baku</a></li>
            <div class="exit">
                <li><a href="../Login/login.php"><i class="fa-solid fa-power-off"></i> Keluar</a></li>
            </div>
        </ul>
    </div>

    <div class="container-fluid">
        <div class="content py-4">
            <h2>Kelola Bahan Baku</h2>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="d-flex align-items-center">
                    <div class="btn-group me-2" role="group">
                        <select name="kategori" class="form-select">
                            <option value="" hidden>Kategori</option>
                            <option value="Pokok">Pokok</option>
                            <option value="Cemilan">Cemilan</option>
                            <option value="Minuman">Minuman</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-light border text-danger">
                        <i class="fa-solid fa-rotate-left"></i> Ulangi
                    </button>
                </div>

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                    Tambah
                </button>
            </div>

            <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="" method="POST">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel"><strong>Tambah Stok Bahan Baku</strong></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="id_bahan_baku" class="form-label">ID Bahan Baku</label>
                                    <input type="text" class="form-control" name="id_bahan_baku" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nama_bahan_baku" class="form-label">Nama Bahan Baku</label>
                                    <input type="text" class="form-control" name="nama_bahan_baku" required>
                                </div>
                                <div class="mb-3">
                                    <label for="unit" class="form-label">Unit</label>
                                    <input type="text" class="form-control" name="unit" required>
                                </div>
                                <div class="mb-3">
                                    <label for="kode_barcode" class="form-label">Kode Barcode</label>
                                    <input type="text" class="form-control" name="kode_barcode" required>
                                </div>
                                <div class="mb-3">
                                    <label for="id_kategori" class ="form-label">Kategori</label>
                                    <select class="form-select" name="id_kategori" required>
                                        <?php
                                        include("koneksi.php");
                                        $kategori_result = $conn->query("SELECT * FROM t_kategori");
                                        while ($kategori = $kategori_result->fetch_assoc()) {
                                            echo "<option value='{$kategori['id_kategori']}'>{$kategori['nama_kategori']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="table-responsive">
                <table id="data-table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Barcode</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Unit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $result = $conn->query("SELECT t_bahan_baku.*, t_kategori.nama_kategori FROM t_bahan_baku INNER JOIN t_kategori ON t_bahan_baku.id_kategori = t_kategori.id_kategori");
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                <td>{$row['id_bahan_baku']}</td>
                                <td>{$row['kode_barcode']}</td>
                                <td>{$row['nama_bahan_baku']}</td>
                                <td>{$row['nama_kategori']}</td>
                                <td>{$row['Unit']}</td>
                            </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#data-table').DataTable();
        });
        function openSidebar() {
            document.getElementById("sidebar").style.width = "250px";
            document.querySelector(".content").style.marginLeft = "250px";
            document.querySelector(".navbar").style.marginLeft = "250px";
        }

        function closeSidebar() {
            document.getElementById("sidebar").style.width = "0";
            document.querySelector(".content").style.marginLeft = "0";
            document.querySelector(".navbar").style.marginLeft = "0";
        }
    </script>
</body>

</html>