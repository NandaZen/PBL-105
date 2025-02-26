<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kategoti Bahan Baku</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/kategori.css">
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
          <span class="navbar-text text-black me-4">Alya<br>Staff Gudang</span>
      </div>
    </nav>

    
     <!-- Sidebar -->
  <div id="sidebar" class="sidebar">
    <img src="/Polibatam.png">
    <button class="close-btn" onclick="closeSidebar()">x</button>
    
    <ul>
        <li><a href="/Dasboard/tes.html">Beranda</a></li>
        <li><a href="/Kelola Bahan Baku/kelola_bahan.html"><i class="fa-solid fa-table-cells-large"></i> Kelola Stok bahan Baku</a></li>
        <li><a href="/Bahan Baku Masuk/tes.html"><i class="fa-solid fa-list-check"></i> Bahan Baku Masuk</a></li>
        <li><a href="/Bahan Baku Keluar/bahan_baku_keluar.html"><i class="fa-regular fa-clipboard"></i> Bahan Baku Keluar</a></li>
        <li><a href="/Kategori/kategori.css"><i class="fa-sharp fa-thin fa-chart-simple"></i> Kategori Stok Bahan Baku</a></li>
        <div class="exit">
        <li><a href="#"><i class="fa-solid fa-power-off"></i> Keluar</a></li>
        </div>
    </ul>
  </div>

    <!-- Content -->
    <div class="container-fluid">
    <div class="content py-4">
      <h2>Kategori Bahan Baku</h2>
      
      <!-- Filter bar -->
      <div class="filbar  d-flex justify-content-between align-items-center mb-3">
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
        <h5 class="modal-title" id="myModalLabel"><strong>Tambah Kategori</strong></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- Modal Body -->
      <div class="modal-body">
        <form>
          <div class="mb-4">
            <label for="id_kategori" class="form-label">ID Kategori</label>
            <input type="text" class="form-control" id="id_kategori" name="id_kategori" placeholder="ID_kategori">
          </div>
          <div class="mb-4">
            <label for="nama_kategori" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Nama Kategori">
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

<!--EditModal-->
<div id="editModal" class="modal fade" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <!-- Modal Content -->
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel"><strong>Perbarui Kategori</strong></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- Modal Body -->
      <div class="modal-body">
        <form>
          <div class="mb-4">
            <label for="id_kategori" class="form-label">ID Kategori</label>
            <input type="text" class="form-control" id="id_kategori" name="id_kategori" placeholder="ID_kategori">
          </div>
          <div class="mb-4">
            <label for="nama_kategori" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Nama Kategori">
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
              <th>ID Kategori</th>
              <th>Nama Kategori</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>K001</td>
              <td>Pokok</td>
              <td>
                <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fas fa-edit"></i></button> <!-- Icon edit-->
                <button class="btn btn-light btn-sm"><i class="fa-regular fa-trash-can" style="color: #dd1d1d;"></i></i></button> <!-- Icon Sampah/delete-->
              </td>
            </tr>
            <tr>
              <td>K002</td>
              <td>Cemilan</td>
              <td>
                <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fas fa-edit"></i></button> <!-- Icon edit-->
                <button class="btn btn-light btn-sm"><i class="fa-regular fa-trash-can" style="color: #dd1d1d;"></i></i></button> <!-- Icon Sampah/delete-->
              </td>
              </td>
            </tr>
            <tr>
                <td>K003</td>
                <td>Minuman</td>
                <td>
                  <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fas fa-edit"></i></button> <!-- Icon edit-->
                <button class="btn btn-light btn-sm"><i class="fa-regular fa-trash-can" style="color: #dd1d1d;"></i></i></button> <!-- Icon Sampah/delete-->
              </td>
                </td>
            </tr>
            
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
