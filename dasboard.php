<?php

session_start();
//   if (!isset($_SESSION['nama1'])) {
//   header("Location: Login/login.php");
//   exit();
// }

if (isset($_SESSION['login_success'])) {
  echo "<script>alert('Login berhasil!');</script>";
  unset($_SESSION['login_success']); 
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
    <link rel="stylesheet" href="../css/dasboard_admin.css">

  </head>
  <body>
    
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
            <span class="navbar-text text-black me-4"><?php if (isset($_SESSION['nama1'])) { echo $_SESSION['nama1']; 
              echo "<br>Admin";}?></span>
        </div>
      </nav>
    
  <div id="sidebar" class="sidebar">
    <img src="../pic/Polibatam.png">
    <button class="close-btn" onclick="closeSidebar()">x</button>
    
    <ul>
        <li><a href="#">Beranda</a></li>
        <li><a href="../Lihat Stok Bahan Baku/lihat_stok_admin.php"><i class="fa-solid fa-list-check"></i> Lihat Stok Bahan Baku</a></li>
        <div class="exit">
        <li><a href="../Login/logout.php"><i class="fa-solid fa-power-off"></i> Keluar</a></li>
        </div>
    </ul>
  </div>

      <div class="main-content">
        <h2 style="margin-left: 59px; margin-top: 15px;">Beranda</h2>
        <br>
        
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
        
        <div class="chart mt-4">
          <canvas id="myChart"></canvas>
        </div>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js"></script>
    <script src="dasboard.js"></script>
  </body>
  </html>
