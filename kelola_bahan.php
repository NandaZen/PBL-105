<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kelola Bahan Baku</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/kelola_bahan.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
</head>
<body>
  
    <!-- Navbar -->
    <nav class="navbar d-flex justify-content-between align-items-center">
      <div class="d-flex align-items-center">
          <button onclick="openSidebar()">☰</button>
          <div class="input-group me-2" style="max-width: 300px;">
              <div class="input-group-prepend">
                  <span class="input-group-text bg-light border-0"><i class="fas fa-search"></i></span>
              </div>
              <input type="search" class="form-control" placeholder="Pencarian">
          </div>
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
        <li><a href="/Dasboard/dasboard.html">Beranda</a></li>
        <li><a href="#><i class="fa-solid fa-table-cells-large"></i> Kelola Stok bahan Baku</a></li>
        <li><a href="/Bahan Baku Masuk/bahan_masuk.html"><i class="fa-solid fa-list-check"></i> Bahan Baku Masuk</a></li>
        <li><a href="/Bahan Baku Keluar/bahan_baku_keluar.html"><i class="fa-regular fa-clipboard"></i> Bahan Baku Keluar</a></li>
        <li><a href="/Kategori/kategori.html"><i class="fa-sharp fa-thin fa-chart-simple"></i> Kategori Stok Bahan Baku</a></li>
        <div class="exit">
        <li><a href="#"><i class="fa-solid fa-power-off"></i> Keluar</a></li>
        </div>
    </ul>
  </div>

    <!-- Content -->
    <div class="container-fluid">
    <div class="content py-4">
      <h2>Kelola Bahan Baku</h2>
      
      <!-- Filter bar -->
      <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="btn-group" role="group">
         <select name="kategori">
        <option value="" hidden>Kategori</option>
        <option value="">Pokok</option> 
        <option value="">Cemilan</option>
        <option value="">Minuman</option>
      </select>
        
          <button type="button" class="btn btn-light border text-danger">
            <i class="fa-solid fa-rotate-left"></i>    Ulangi
          </button>
        </div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Tambah</button>
      </div>

      <!-- Modal -->
<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <!-- Modal Content -->
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel"><strong>Tambah Stok Bahan Baku</strong></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- Modal Body -->
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="id_kategori" class="form-label">ID_Kategori</label>
            <input type="text" class="form-control" id="id_kategori" name="id_kategori" placeholder="Masukan ID_Kategori">
          </div>

          <div class="mb-3">
            <label for="bahanBaku" class="form-label">Nama Bahan Baku</label>
            <div class="dropdown">
              <select class="form-control" name="bahan_baku">
                <option value="" hidden>-Pilih Bahan Baku-</option>
                 
                 <optgroup label="Pokok">
                 <option label="Beras"></option>
                 <option label="Gandum"></option>
                </optgroup>
        
                <optgroup label="Cemilan">
                <option label="Chuba"></option>
                <option label="TicTac"></option>
                </optgroup>
        
                <optgroup label="Minuman">
                  <option label="Pocari"></option>
                  <option label="Ale-ale"></option>
                  </optgroup>
                  </select>
            </div>
          </div>

          <div class="mb-3">
            <label for="kuantitas" class="form-label">Kuantitas</label>
            <input type="text" class="form-control" id="kuantitas" name="kuantitas" placeholder="Masukkan Kuantitas">
          </div>

          <div class="mb-3">
            <label for="unit" class="form-label">Unit</label>
            <input type="text" class="form-control" id="unit" name="unit" placeholder="PCS">
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

    <!--Edit Modals-->
    <!-- Modal -->
<div id="editModal" class="modal fade" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <!-- Modal Content -->
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel"><strong>Tambah Stok Bahan Baku</strong></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- Modal Body -->
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="id_kategori" class="form-label">ID_Kategori</label>
            <input type="text" class="form-control" id="id_kategori" name="id_kategori" placeholder="Masukan ID_Kategori">
          </div>

          <div class="mb-3">
            <label for="bahanBaku" class="form-label">Nama Bahan Baku</label>
            <div class="dropdown">
              <select class="form-control" name="jurusan">
                <option value="" hidden>-Pilih Bahan Baku-</option>
                 
                 <optgroup label="Pokok">
                 <option label="Beras"></option>
                 <option label="Gandum"></option>
                </optgroup>
        
                <optgroup label="Cemilan">
                <option label="Chuba"></option>
                <option label="TicTac"></option>
                </optgroup>
        
                <optgroup label="Minuman">
                  <option label="Pocari"></option>
                  <option label="Ale-ale"></option>
                  </optgroup>
                  </select>
            </div>
          </div>

          <div class="mb-3">
            <label for="kuantitas" class="form-label">Kuantitas</label>
            <input type="text" class="form-control" id="kuantitas" name="kuantitas" placeholder="Masukkan Kuantitas">
          </div>

          <div class="mb-3">
            <label for="unit" class="form-label">Unit</label>
            <input type="text" class="form-control" id="unit" name="unit" placeholder="PCS">
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
        <table id="data-table" class="table table-bordered table-striped"> <!--Tipe Border dari bootstrap-->
          <thead>
            <tr>
              <th>ID Stok Masuk</th>
              <th>Kode Barcode</th>
              <th>Nama Bahan Baku</th>
              <th>Kategori</th>
              <th>Kuantitas</th>
              <th>Unit</th>
              <th>Tanggal Masuk</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>SM001</td>
              <td>4342665</td>
              <td>Beras</td>
              <td>Pokok</td>
              <td>80</td>
              <td>PCS</td>
              <td>09/10/2024</td>
              <td>
                <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fas fa-edit"></i></button> <!-- Icon edit-->
                <button class="btn btn-light btn-sm" onclick="confirmAction()"><i class="fa-regular fa-trash-can" style="color: #dd1d1d;"></i></i></button> <!-- Icon Sampah/delete-->
              </td>
            </tr>
            <tr>
              <td>SM002</td>
              <td>5646335</td>
              <td>Roti</td>
              <td>Makanan</td>
              <td>90</td>
              <td>PCS</td>
              <td>09/10/2024</td>
              <td>
                <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fas fa-edit"></i></button> <!-- Icon edit-->
                <button class="btn btn-light btn-sm" onclick="confirmAction()"><i class="fa-regular fa-trash-can" style="color: #dd1d1d;"></i></i></button> <!-- Icon Sampah/delete-->
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
