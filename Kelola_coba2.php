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
include("tabel.php");
?>
</head>
</head>
<body>
  
    <!-- Navbar -->
    <nav class="navbar d-flex justify-content-between align-items-center">
      <div class="d-flex align-items-center">
          <button onclick="openSidebar()">☰</button>
      </div>
      <div class="d-flex align-items-center">
          <i class="fas fa-user-circle fa-2xl me-2" aria-label="User Icon"></i>
          <span class="navbar-text text-black me-4">Shelfia<br>Admin</span>
      </div>
    </nav>

    
     <!-- Sidebar -->
    <div id="sidebar" class="sidebar">
        <img src="../Polibatam.png">
        <button class="close-btn" onclick="closeSidebar()">x</button>
        
        <ul>
            <li><a href="#">Beranda</a></li>
            <li><a href="#"><i class="fa-solid fa-list-check"></i></i> Lihat Stock Bahan Baku</a></li>
            <li><a href="#"><i class="fa-solid fa-user-plus"></i></i> Kelola Pengguna</a></li>
            <li><a href="#"><i class="fa-solid fa-power-off"></i> Keluar</a></li>
            </div>
        </ul>
    </div>

    <!-- Content -->
    <div class="container-fluid">
    <div class="content py-4">
      <h2>Kelola Pengguna</h2>
      
      <!-- Filter bar -->
      <div class="filbar d-flex justify-content-between align-items-center mb-3">
        <input type="search" class="form-control" name="pencarian" id="Pencarian" placeholder="pencarian">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Tambah</button>
      </div>

      <!-- Modal -->
<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <!-- Modal Content -->
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel"><strong>Tambah Pengguna</strong></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- Modal Body -->
      <div class="modal-body">
      <form class="container-form" action="register.php" method="POST">
            <div class="form-group mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            </div>

            <div class="form-group mb-3">
                <label for="username" class="form-label">Nama pengguna</label>
                <input type="text" class="form-control" id="username" name="nama_pengguna" placeholder="Nama Pengguna" required>
            </div>

            <div class="form-group mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Kata Sandi" required>
            </div>

            <div class="form-group mb-3">
                <label for="no_whatsapp" class="form-label">No. Whatsapp</label>
                <input type="number" class="form-control" id="no_whatsapp" name="no_WA" placeholder="No. Whatsapp" required>
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

      <!-- Table -->
      <div class="table-responsive">
        <table id="data-table" class="table table-bordered table-striped"><!--Tipe Border dari bootstrap-->
          <thead>
            <tr>
              <th>Email</th>
              <th>Nama Pengguna</th>
              <th>Kata Sandi</th>
              <th>No Whatsapp</th>
              <th>Jenis Pengguna</th>
              <th>Aksi</th>
             </tr>
          </thead>
          <tbody>
          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['nama_pengguna']; ?></td>
                <td><?php echo $row['password']; ?></td>
                <td><?php echo $row['no_WA']; ?></td>
                <td><?php echo $row['role']; ?></td>
                <td>
                    <!-- Tombol Edit -->  
                    
                    <button data-bs-toggle="modal" 
                    data-bs-target="#editModal<?php echo $row['id_user']; ?>"
                    data-id-user="<?php echo $row['id_user']; ?>"
                        class="btn btn-light btn-sm mb-1" >
                        <i class="fas fa-edit"></i >
                      </button>
                    
                        <button class="btn btn-light btn-sm" 
                        data-bs-toggle ="modal"
                        data-bs-target = "#hapusModal<?php echo $row['id_user']; ?>"
                        data-id-user = "<?php echo $row['id_user']?>">
                          <i class="fa-regular fa-trash-can" style="color: #dd1d1d;"></i></button>
                </td>
            </tr>

            <div id="editModal<?= $row['id_user']; ?>" class="modal fade" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel"><strong>Perbarui Pengguna</strong></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="update.php" method="POST">
              <input type="hidden" name="id_user" value="<?= $row['id_user']?>">
            <div class="mb-3 form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $row['email'] ?>">
              </div>
    
              <div class="mb-3 form-group">
                <label for="username" class="form-label">Nama Pengguna</label>
                <input type="text" class="form-control" id="username" name="nama_pengguna" value="<?= $row['nama_pengguna'] ?>">
              </div>
    
              <div class="mb-3 form-group">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="text" class="form-control" id="password" name="password" value="<?= $row['password'] ?>">
              </div>
    
              
              <div class="mb-3 form-group">
                <label for="no_WA" class="form-label">No Whatsapp</label>
                <input type="number" class="form-control" id="no_whatsapp" name="no_WA" value="<?= $row['no_WA'] ?>">
              </div>
            
    
              <div class="mb-3 form-group">
                <label for="role" class="form-label">Jenis Pengguna</label>
                <select class="form-control" name="role" required>
                  <option value="Admin" <?=$row ['role'] =='Admin'? 'selected': ''?>>Admin</option>
                  <option value="Staff Gudang" <?=$row ['role'] =='Staff Gudang'? 'selected': ''?>>Staff Gudang</option>
                </select>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" name="update">Ubah</button>
              </div>
            </form>
        </div>
        </div>
      </div>
    </div>
          <!-- Akhir modal edit -->

          <!-- modal hapus-->
          <div id="hapusModal<?= $row['id_user']; ?>" class="modal fade" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <!-- Modal Content -->
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel"><strong>Konfirmasi Hapus Data</strong></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <!-- Modal Body -->
          <div class="modal-body">
            <form action="delete.php" method="POST">
              <input type="hidden" name="id_user" value="<?= $row['id_user']?>">
            
              <h5 class="text-center"> Apakah anda yakin akan menghapus data ini?<br>
                <span class="text-primary font-monospace">ID: <?= $row['id_user']?> - Nama: <?= $row['nama_pengguna']?></span>

              </h5>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary btn-danger" name="delete">Hapus</button>
              </div>
            </form>
        </div>
        </div>
      </div>
    </div>
          <!-- Akhir modal hapus -->
    <?php } ?>
            
          </tbody>
        </table>
      </div>

  <!-- Font Awesome for icons -->
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
  <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <!-- Bootstrap JS -->
  <!-- Bootstrap 5 -->
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
    
    <!-- DELETE -->
    <!-- <script>
    function confirmAction() {
      return confirm("Apakah anda yakin untuk menghapus?")
    }
    </script> -->
</body>
</html>
