<?php
session_start();
if (!isset($_SESSION['nama_pengguna'])) {
    header("Location: ../Login/login.php"); 
    exit();
}
if (!isset($_SESSION['role'])) {
    header("Location: ../Login/login.php?error=not_logged_in");
    exit();
  }
  
  $allowed_roles = ['Admin'];
  
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
  <title>Kelola Pengguna</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/pengguna.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <?php 
  require("koneksinya.php"); 
  $query = "SELECT * FROM pengguna"; 
  $result = mysqli_query($koneksi, $query); 
  ?>
</head>
<body>
  
<nav class="navbar d-flex justify-content-between align-items-center">
  <div class="d-flex align-items-center">
    <button onclick="openSidebar()">☰</button>
  </div>
  <div class="dropdown d-flex align-items-center"><span class="navbar-text text-black me-4"><?php if (isset($_SESSION['nama_pengguna'])) { echo $_SESSION['nama_pengguna']; 
    echo "<br>Admin";}?></span>
  <i class="fas fa-user-circle fa-2xl me-2 dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer;"></i>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
      <li class="dropdown-item disabled">
        <strong><?php if (isset($_SESSION['nama_pengguna'])) { echo $_SESSION['nama_pengguna']; } ?></strong>
      </li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item" data-bs-target="editProfileModal">Edit Profil</a></li>
    </ul>
  </div>
  </div>
</nav>

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editProfileModalLabel">Edit Profil</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="editProfileForm" action="update.php" method="POST">
          <div class="form-group mb-3">
            <label for="editNamaPengguna" class="form-label">Nama Pengguna</label>
            <input type="text" class="form-control" id="editNamaPengguna" name="nama_pengguna" value="<?php echo $_SESSION['nama_pengguna']; ?>" required>
          </div>
          <div class="form-group mb-3">
            <label for="editEmail" class="form-label">Email</label>
            <input type="text" class="form-control" id="editEmail" name="email" value="<?php echo $_SESSION['email']; ?>">
          </div>
          <div class="form-group mb-3">
            <label for="editPassword" class="form-label">Password Baru</label>
            <input type="password" class="form-control" id="editPassword" name="password" placeholder="Masukkan Password Baru">
          </div>
          <div class="form-group mb-3">
            <label for="editNoWA" class="form-label">No. WhatsApp</label>
            <input type="number" class="form-control" id="editNoWA" name="no_WA" value="<?php echo $_SESSION['no_WA']; ?>">
          </div>
          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
      </div>
    </div>
  </div>
</div>


<div id="sidebar" class="sidebar">
  <img src="../Polibatam.png">
  <button class="close-btn" onclick="closeSidebar()">x</button>
  <ul>
    <li><a href="../Dasboard admin/dasboard.php">Beranda</a></li>
    <li><a href="../Lihat Stok Bahan Baku/lihat_stok_admin.php"><i class="fa-solid fa-list-check"></i> Lihat Stok Bahan Baku</a></li>
    <li><a href="#"><i class="fa-solid fa-user-plus"></i> Kelola Pengguna</a></li>
    <li><a href="../Login/login.php"><i class="fa-solid fa-power-off"></i> Keluar</a></li>
  </ul>
</div>

<div class="container-fluid">
  <div class="content py-4">
    <h2>Kelola Pengguna</h2>

    <div class="filbar d-flex justify-content-between align-items-center mb-3">
    <div class="tambah ms-auto">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Tambah</button>
    </div>
    </div>

    <!-- Modal Tambah -->
    <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"><strong>Tambah Pengguna</strong></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="register.php" method="POST">
              <div class="form-group mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
              </div>

              <div class="form-group mb-3">
                <label for="nama_pengguna" class="form-label">Nama Pengguna</label>
                <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" placeholder="Nama Pengguna" required>
              </div>

              <div class="form-group mb-3">
                <label for="no_WA" class="form-label">No. Whatsapp</label>
                <input type="number" class="form-control" id="no_WA" name="no_WA" placeholder="No. Whatsapp">
              </div>

              <div class="form-group mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="text" class="form-control" id="password" name="password" placeholder="Password" require>
              </div>

              <div class="form-group mb-3">
                <label for="role" class="form-label">Jenis Pengguna</label>
                <select class="form-control" id="role" name="role" required>
                  <option value="" hidden>-Pilih Jenis Pengguna-</option>
                  <option value="Admin">Admin</option>
                  <option value="Staff Gudang">Staff Gudang</option>
                </select>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Tabel Pengguna -->
    <div class="table-responsive">
      <table id="data-table" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Email</th>
            <th>Nama Pengguna</th>
            <th>No Whatsapp</th>
            <th>Jenis Pengguna</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
            <td><?= $row['email']; ?></td>
            <td><?= $row['nama_pengguna']; ?></td>
            <td><?= $row['no_WA']; ?></td>
            <td><?= $row['role']; ?></td>
            <td>
              <button data-bs-toggle="modal" data-bs-target="#editModal" class="btn btn-light btn-sm" value="<?= $row['email']; ?>">
                <i class="fas fa-edit"></i>
                
              </button>

            <form method="POST" action="delete.php">
                <input type="hidden" name="email" value="<?= $row['email']; ?>">
                <button type="submit" name="delete" class="btn btn-light btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
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

<!-- Validasi JavaScript -->
<script>
  document.getElementById('role').addEventListener('change', function() {
    const noWAInput = document.getElementById('no_WA');
    if (this.value === 'Admin') {
      noWAInput.setAttribute('required', 'required');
      noWAInput.parentElement.querySelector('label').innerText = "No. Whatsapp (Wajib untuk Admin)";
    } else {
      noWAInput.removeAttribute('required');
      noWAInput.parentElement.querySelector('label').innerText = "No. Whatsapp";
    }
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

  <script>
    function openSidebar() {
      document.getElementById("sidebar").style.width = "250px"; // Buka sidebar
      document.querySelector(".content").style.marginLeft = "250px"; // Pindahkan konten utama
      document.querySelector(".navbar").style.marginLeft = "250px"; // Pindahkan navbar
    }
    
    function closeSidebar() {
      document.getElementById("sidebar").style.width = "0"; // Tutup sidebar
      document.querySelector(".content").style.marginLeft = "0"; // Reset margin konten utama
      document.querySelector(".navbar").style.marginLeft = "0"; // Reset margin navbar
    }
    </script>
    <!--Datatables Script-->
    <script>
      $(document).ready( function () {
        $('#data-table').DataTable();
    } );</script>
</body>
</html>
