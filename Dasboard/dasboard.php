<?php
session_start();
if (isset($_SESSION['login_success'])) {
  echo "<script>alert('Login berhasil!');</script>";
  unset($_SESSION['login_success']); 
}
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
?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/dasboard.css">

  </head>
  <body>
    
      <!-- Navbar -->
      <nav class="navbar d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <button onclick="openSidebar()" class="me-4">☰</button>
            <div class="input-group me-2" style="max-width: 300px;">
                <div class="input-group-text">
                    <span class="input-group-text bg-light border-0"><i class="fas fa-search"></i></span>
                </div>
                <input type="search" class="form-control" placeholder="Pencarian">
            </div>
        </div>
        <div class="d-flex align-items-center">
            <i class="fas fa-user-circle fa-2xl me-2" aria-label="User  Icon"></i>
            <span class="navbar-text text-black me-4"><?php if (isset($_SESSION['nama_pengguna'])) { echo $_SESSION['nama_pengguna']; 
              echo "<br>Staff Gudang";}?></span>
        </div>
      </nav>

      <!-- Sidebar -->
  <div id="sidebar" class="sidebar">
    <img src="../pic/Polibatam.png">
    <button class="close-btn" onclick="closeSidebar()">x</button>
    
    <ul>
        <li><a href="../Dasboard/dasboard.php">Beranda</a></li>
        <li><a href="../Kelola Bahan Baku/kelola_bahan.php"><i class="fa-solid fa-table-cells-large"></i> Kelola Stok bahan Baku</a></li>
        <li><a href="../Bahan Baku Masuk/bahan_masuk.php"><i class="fa-solid fa-list-check"></i> Bahan Baku Masuk</a></li>
        <li><a href="../Bahan Baku Keluar/bahan_baku_keluar.php"><i class="fa-regular fa-clipboard"></i> Bahan Baku Keluar</a></li>
        <li><a href="../Kategori/kategori.php"><i class="fa-sharp fa-thin fa-chart-simple"></i> Kategori Stok Bahan Baku</a></li>
        <div class="exit">
        <li><a href="../Login/login.php"><i class="fa-solid fa-power-off"></i> Keluar</a></li>
        </div>
    </ul>
  </div>

      <!-- Content -->
      <div class="main-content">
        <h2>Beranda</h2>
        <br>
        
        <!-- Cards Row -->
        <div class="row">
          <div class="col-md-4">
            <div class="card text-center">
              <div class="card-body" style="text-align: left;">
                <h5>Total Stok Bahan Baku</h5>
                <h2>200</h2>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card text-center">
              <div class="card-body" style="text-align: left;">
                <h5>Total Stok Bahan Baku Masuk</h5>
                <h2>50</h2>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card text-center">
              <div class="card-body"  style="text-align: left;">
                <h5>Total Stok Bahan Baku Keluar</h5>
                <h2>50</h2>
              </div>
            </div>
          </div>
        </div>

         <!-- Bar Chart -->
         <div class="chart mt-4">
          <h3 style="text-align: center;">Grafik Berdasarkan Periode Perbulan (PCS)</h3>
          <div class="filtering">
            <select name="kategori">
              <option value="" hidden>--Kategori--</option>
              <option value="">Pokok</option> 
              <option value="">Cemilan</option>
              <option value="">Minuman</option>
            </select>
          </div>
          <canvas id="myChart"></canvas>
        </div>
      </div>
    </div>


      <!-- Chart.js version 3.x -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
<!-- chartjs-plugin-datalabels version 2.0.0 -->
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
  <script src="dasboard.js"></script>
</body>
</html>
