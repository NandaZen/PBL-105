<?=
session_start();
if (isset($_SESSION["dasboard.php"]) && $_SESSION[""];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lihat Stok Bahan Baku</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="../css/lihat_stok.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar d-flex justify-content-between align-items-center">
      <div class="d-flex align-items-center">
          <button onclick="openSidebar()">☰</button>
      </div>
      <div class="d-flex align-items-center">
          <i class="fas fa-user-circle fa-2xl me-2" aria-label="User  Icon"></i>
          <span class="navbar-text text-black me-4"><?= if(isset($_SESSION['nama1'])) { echo $_SESSION['nama1']; 
              echo "<br>Admin";}?></span>
      </div>
    </nav>
    
      <!-- Sidebar -->
    <div id="sidebar" class="sidebar">
        <img src="/Polibatam.png">
        <button class="close-btn" onclick="closeSidebar()">x</button>
        
        <ul>
            <li><a href="/Dasboard/tes.html">Beranda</a></li>
            <li><a href="#"><i class="fa-solid fa-list-check"></i></i> Lihat Stock Bahan Baku</a></li>
            <li><a href="/Kelola Pengguna/kelola_pengguna.html"><i class="fa-solid fa-user-plus"></i></i> Kelola Pengguna</a></li>
            <li><a href="#"><i class="fa-solid fa-power-off"></i> Keluar</a></li>
            </div>
        </ul>
    </div>
  </div>

    <div class="container-fluid">
    <!-- Content -->
    <div class="content py-4">
      <h2>Lihat Stok Bahan Baku</h2>

      <!-- Search bar and download icon -->
      <div class="filbar  d-flex justify-content-between align-items-center mb-3">
        <input type="search" class="form-control" name="pencarian" id="Pencarian" placeholder="pencarian">
        <button class="btn btn-light border-0"><i class="fas fa-download"></i></button>
      </div>
      
      <!-- Table -->
      <div class="table-responsive">
        <table id="data-table" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Kode Barcode</th>
              <th>Nama Bahan Baku</th>
              <th>Kategori</th>
              <th>Kuantitas</th>
              <th>Unit</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>4342665</td>
              <td>Beras</td>
              <td>Pokok</td>
              <td>80</td>
              <td>PCS</td>
            </tr>
            <tr>
              <td>5646335</td>
              <td>Roti</td>
              <td>Cemilan</td>
              <td>90</td>
              <td>PCS</td>
            </tr>
            <tr>
              <td>8999876</td>
              <td>Susu</td>
              <td>Minuman</td>
              <td>65</td>
              <td>PCS</td>
            </tr>
            <tr>
              <td>8999743</td>
              <td>Coklat</td>
              <td>Cemilan</td>
              <td>88</td>
              <td>PCS</td>
            </tr>
            <tr>
              <td>8999087</td>
              <td>Gula</td>
              <td>Pokok</td>
              <td>35</td>
              <td>PCS</td>
            </tr>
            <tr>
              <td>87779876</td>
              <td>Garam</td>
              <td>Pokok</td>
              <td>77</td>
              <td>PCS</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Font Awesome for icons -->
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="/sidebar_datatable.js"></script>
</body>
</html>
