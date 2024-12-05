<?php
session_start();

if (!isset($_SESSION['nama_pengguna'])) {
    header("Location: ../Login/login.php");
    exit();
}
require_once 'koneksi.php';

$query = "SELECT * FROM t_kategori";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query gagal: " . mysqli_error($conn));
}

$searchKeyword = '';
if (isset($_GET['pencarian']) && !empty($_GET['pencarian'])) {
    $searchKeyword = mysqli_real_escape_string($conn, $_GET['pencarian']);
    $query = "SELECT * FROM t_kategori WHERE id_kategori LIKE '%$searchKeyword%' OR nama_kategori LIKE '%$searchKeyword%'";
} else {
    $query = "SELECT * FROM t_kategori";
}
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query gagal: " . mysqli_error($conn));
}
$allowed_roles = ['Staff Gudang'];

if (!in_array($_SESSION['role'], $allowed_roles)) {
  echo "<script>
      alert('Anda tidak memiliki akses ke halaman ini.');
      window.location.href = '../Login/login.php';
  </script>";
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kategori Bahan Baku</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/kategori.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <nav class="navbar d-flex justify-content-between align-items-center">
      <div class="d-flex align-items-center">
          <button onclick="openSidebar()">☰</button>
      </div>
      <div class="d-flex align-items-center">
          <i class="fas fa-user-circle fa-2xl me-2" aria-label="User Icon"></i>
          <span class="navbar-text text-black me-4">
              <?php if (isset($_SESSION['nama_pengguna'])) { 
                  echo $_SESSION['nama_pengguna']; 
                  echo "<br>Staff Gudang";
              } ?>
          </span>
      </div>
    </nav>

    <div id="sidebar" class="sidebar">
        <img src="../pic/Polibatam.png">
        <button class="close-btn" onclick="closeSidebar()">x</button>
        <ul>
            <li><a href="../Dasboard/dasboard.php">Beranda</a></li>
            <li><a href="../Kelola Bahan Baku/kelola_bahan.php"><i class="fa-solid fa-table-cells-large"></i> Kelola Stok Bahan Baku</a></li>
            <li><a href="../Bahan Baku Masuk/bahan_masuk.php"><i class="fa-solid fa-list-check"></i> Bahan Baku Masuk</a></li>
            <li><a href="../Bahan Baku Keluar/bahan_baku_keluar.php"><i class="fa-regular fa-clipboard"></i> Bahan Baku Keluar</a></li>
            <li><a href="/Kategori/kategori.php"><i class="fa-sharp fa-thin fa-chart-simple"></i> Kategori Stok Bahan Baku</a></li>
            <div class="exit">
                <li><a href="../Login/login.php"><i class="fa-solid fa-power-off"></i> Keluar</a></li>
            </div>
        </ul>
    </div>

    <div class="container-fluid">
        <div class="content py-4">
            <h2>Kategori Bahan Baku</h2>

            <div class="filbar d-flex justify-content-between align-items-center mb-3">
            <div class="filbar d-flex justify-content-between align-items-center mb-3">
            </div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Tambah</button>
            </div>

            <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel"><strong>Tambah Kategori</strong></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="tambah_kategori.php">
                                <div class="mb-4">
                                    <label for="id_kategori" class="form-label">ID Kategori</label>
                                    <input type="text" class="form-control" id="id_kategori" name="id_kategori" placeholder="ID Kategori">
                                </div>
                                <div class="mb-4">
                                    <label for="nama_kategori" class="form-label">Nama Kategori</label>
                                    <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Nama Kategori">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table id="data-table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID Kategori</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?= htmlspecialchars($row['id_kategori']); ?></td>
                            <td><?= htmlspecialchars($row['nama_kategori']); ?></td>
                            <td>
                          
                                <button data-bs-toggle="modal" data-bs-target="#editModal<?= $row['id_kategori']; ?>" class="btn btn-light btn-sm">
                                    <i class="fas fa-edit"></i>
                                </button>

                                <form method="POST" action="delete.php" style="display:inline-block;">
                                    <input type="hidden" name="id_kategori" value="<?= htmlspecialchars($row['id_kategori']); ?>"> 
                                    <button type="submit" name="delete" class="btn btn-light btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                        <i class="fa-regular fa-trash-can" style="color: #dd1d1d;"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
      <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
  <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="../sidebar_datatable.js"></script>
    <script>
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
