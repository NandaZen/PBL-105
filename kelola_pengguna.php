<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kelola Pengguna</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/pengguna.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
</head>
<body>
  
    <!-- Navbar -->
    <nav class="navbar d-flex justify-content-between align-items-center">
      <div class="d-flex align-items-center">
          <button onclick="openSidebar()">☰</button>
      </div>
      <div class="d-flex align-items-center">
          <i class="fas fa-user-circle fa-2xl me-2" aria-label="User  Icon"></i>
          <span class="navbar-text text-black me-4">Shelfia<br>Admin</span>
      </div>
    </nav>

    
     <!-- Sidebar -->
    <div id="sidebar" class="sidebar">
        <img src="/Polibatam.png">
        <button class="close-btn" onclick="closeSidebar()">x</button>
        
        <ul>
            <li><a href="/Dasboard/tes.html">Beranda</a></li>
            <li><a href="/Lihat Stok Bahan Baku/lihat_stok_admin.html"><i class="fa-solid fa-list-check"></i></i> Lihat Stock Bahan Baku</a></li>
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
        <form>
          <div class="mb-2">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
          </div>

          <div class="mb-2">
            <label for="nama_pengguna" class="form-label">Nama Pengguna</label>
            <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" placeholder="Nama Pengguna">
          </div>

          <div class="mb-2">
            <label for="password" class="form-label">Kata Sandi</label>
            <input type="text" class="form-control" id="password" name="password" placeholder="Kata Sandi">
          </div>

          
          <div class="mb-2">
            <label for="whatsapp" class="form-label">No Whatsapp</label>
            <input type="text" class="form-control" id="whatsapp" name="whatsapp" placeholder="No Whatsapp">
          </div>
        

          <div class="mb-2">
            <label for="pengguna" class="form-label">Jenis Pengguna</label>
            <select class="form-control" name="jenis_pengguna">
              <option value="" hidden>-Pilih Jenis Pengguna-</option>
              <option value="Admin">Admin</option>
              <option value="staff">Staff Gudang</option>
            </select>
          </div>
        </form>
    </div>
      <!-- Modal Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>

    <!-- edit Modal -->
    <div id="editModal" class="modal fade" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <!-- Modal Content -->
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel"><strong>Perbarui Pengguna</strong></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <!-- Modal Body -->
          <div class="modal-body">
            <form>
              <div class="mb-2">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
              </div>
    
              <div class="mb-2">
                <label for="nama_pengguna" class="form-label">Nama Pengguna</label>
                <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" placeholder="Nama Pengguna">
              </div>
    
              <div class="mb-2">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="text" class="form-control" id="password" name="password" placeholder="Kata Sandi">
              </div>
    
              
              <div class="mb-2">
                <label for="whatsapp" class="form-label">No Whatsapp</label>
                <input type="text" class="form-control" id="whatsapp" name="whatsapp" placeholder="No Whatsapp">
              </div>
            
    
              <div class="mb-2">
                <label for="pengguna" class="form-label">Jenis Pengguna</label>
                <select class="form-control" name="jenis_pengguna">
                  <option value="" hidden>-Pilih Jenis Pengguna-</option>
                  <option value="Admin">Admin</option>
                  <option value="staff">Staff Gudang</option>
                </select>
              </div>
            </form>
        </div>
          <!-- Modal Footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-primary">Simpan</button>
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
            <tr>
              <td>shelfia@gmail.com</td>
              <td>fia</td>
              <td>A123</td>
              <td>0813256158</td>
              <td>Admin</td>
              <td>
                <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fas fa-edit"></i></button> <!-- Icon edit-->
                <button class="btn btn-light btn-sm"><i class="fa-regular fa-trash-can" style="color: #dd1d1d;"></i></i></button> <!-- Icon Sampah/delete-->
              </td>
            </tr>
            <tr>
              <td>rizka@gmail.com</td>
              <td>pink</td>
              <td>M875</td>
              <td>0898765465</td>
              <td>Admin</td>
              <td>
                <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fas fa-edit"></i></button> <!-- Icon edit-->
                <button class="btn btn-light btn-sm"><i class="fa-regular fa-trash-can" style="color: #dd1d1d;"></i></i></button> <!-- Icon Sampah/delete-->
              </td>
            </tr>
            <tr>
                <td>yaya@gmail.com</td>
                <td>yaya</td>
                <td>P988</td>
                <td>08548846513</td>
                <td>Staff Gudang</td>
                <td>
                  <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fas fa-edit"></i></button> <!-- Icon edit-->
                  <button class="btn btn-light btn-sm"><i class="fa-regular fa-trash-can" style="color: #dd1d1d;"></i></i></button> <!-- Icon Sampah/delete-->
                </td>
              </tr>
              <tr>
                <td>megah@gmail.com</td>
                <td>megah</td>
                <td>F743</td>
                <td>08485646132</td>
                <td>Staff Gudang</td>
                <td>
                  <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fas fa-edit"></i></button> <!-- Icon edit-->
                  <button class="btn btn-light btn-sm"><i class="fa-regular fa-trash-can" style="color: #dd1d1d;"></i></i></button> <!-- Icon Sampah/delete-->
                </td>
              </tr>
              <tr>
                <td>gabriel@gmail.com</td>
                <td>riel</td>
                <td>R877</td>
                <td>08132546488</td>
                <td>Staff Gudang</td>
                <td>
                  <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fas fa-edit"></i></button>
                  <button class="btn btn-light btn-sm" onclick="confirmAction()"><i class="fa-regular fa-trash-can" style="color: #dd1d1d;"></i></button>
                </td>
              </tr>
            <!-- Tambahkan baris lainnya sesuai kebutuhan -->
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

  <script src="/sidebar_datatable.js"></script>
</body>
</html>
