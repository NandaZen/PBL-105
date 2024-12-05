<?php
session_start();

if (!isset($_SESSION['nama_pengguna'])) { 
    header("Location: ../Login/login.php");
    exit();
}
include("koneksi.php");
$query = "SELECT * FROM t_bahan_baku_masukkeluar WHERE aksi = 'Bahan Baku Keluar'";
$result = mysqli_query($conn, $query);

$query_tahun = "SELECT MIN(YEAR(tanggal)) AS tahun_terlama, MAX(YEAR(tanggal)) AS tahun_terbaru FROM t_bahan_baku_masukkeluar";
$result_tahun = mysqli_query($conn, $query_tahun);
$tahun = mysqli_fetch_assoc($result_tahun);

$tahun_terlama = $tahun['tahun_terlama'] ?? date('Y');
$tahun_terbaru = $tahun['tahun_terbaru'] ?? date('Y');

$query_table = "
   SELECT mk.id_bahan_masukkeluar AS id, bk.kode_barcode AS kode_barcode, bk.nama_bahan_baku AS nama_bahan, k.nama_kategori AS kategori, mk.kuantitas AS kuantitas, bk.unit AS unit, mk.tanggal AS tanggal, mk.aksi AS aksi, bk.id_bahan_baku AS id_bahan_baku FROM t_bahan_baku_masukkeluar mk INNER JOIN t_bahan_baku bk ON mk.id_bahan_baku = bk.id_bahan_baku INNER JOIN t_kategori k ON bk.id_kategori = k.id_kategori WHERE mk.aksi = 'Bahan Baku Keluar';
";
$result_table = mysqli_query($conn, $query_table);


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bahan Baku Keluar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/bahan_baku_keluar.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

  <style>
    .sidebar{
      z-index: 1050;
      position: fixed;
      top: 0;
      left: 0;
      width: 0;
      height: 100%;
      overflow-x: hidden;
      transition: 0.5s;
    }
  </style>

</head>

<body>
  
<nav class="navbar d-flex justify-content-between align-items-center">
    <div class="d-flex align-items-center">
        <button onclick="openSidebar()" class="me-4">&#9776;</button>
        <div class="input-group me-2" style="max-width: 300px;">
            <div class="input-group-text" style="border-radius: 20px;">
                <span class="input-group-text bg-light border-0"><i class="fas fa-search"></i></span>
                <input type="search" class="form-control" placeholder="Pencarian">
            </div>
        </div>
    </div>
    <div class="d-flex align-items-center">
        <i class="fas fa-user-circle fa-2xl me-2" aria-label="User Icon"></i>
        <span class="navbar-text text-black me-4">
            <?php echo htmlspecialchars($_SESSION['nama_pengguna']) . "<br>Staff Gudang"; ?>
        </span>
    </div>
</nav>
<!-- Sidebar -->
<div id="sidebar" class="sidebar">
    <img src="../Polibatam.png" alt="Logo">
    <button class="close-btn" onclick="closeSidebar()">&times;</button>
    <ul>
        <li><a href="../Dasboard/dasboard.php">Beranda</a></li>
        <li><a href="../Kelola Bahan Baku/kelola_bahan.php"><i class="fa-solid fa-table-cells-large"></i> Kelola Stok Bahan Baku</a></li>
        <li><a href="../Bahan Baku Masuk/bahan_masuk.php"><i class="fa-solid fa-list-check"></i> Bahan Baku Masuk</a></li>
        <li><a href="../Bahan Baku Keluar/bahan_baku_keluar.php"><i class="fa-regular fa-clipboard"></i> Bahan Baku Keluar</a></li>
        <li><a href="../Kategori/kategori.php"><i class="fa-sharp fa-thin fa-chart-simple"></i> Kategori Stok Bahan Baku</a></li>
        <li><a href="../Login/login.php"><i class="fa-solid fa-power-off"></i> Keluar</a></li>
    </ul>
</div>

<div class="container-fluid">
    <div class="content py-4">
        <h2>Bahan Baku Keluar</h2>

        <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="btn-group" role="group">
              <?php
                $query_kategori = "SELECT * FROM t_kategori"; 
                $result_kategori = mysqli_query($conn, $query_kategori);
                ?>
                <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Kategori
                    </button>
                    <ul class="dropdown-menu dropdown-menu-light">
                        <?php while ($kategori = mysqli_fetch_assoc($result_kategori)) { ?>
                            <li><a class="dropdown-item" href="?kategori=<?= htmlspecialchars($kategori['id_kategori']); ?>">
                                <?= htmlspecialchars($kategori['nama_kategori']); ?>
                            </a></li>
                        <?php } ?>
                    </ul>
                </div>
          </button>

                  <button type="button" class="btn btn-light border">
                      <input type="text" id="datepicker" placeholder="Pilih Bulan dan Tahun">
                  </button>

          <button type="button" class="btn btn-light border text-danger">
            <i class="fa-solid fa-rotate-left"></i>Ulangi
          </button>
          </div>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Tambah</button>
        </div>
              <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">      
              <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel"><strong>Tambahkan Stok Bahan Baku Keluar</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="simpan.php" method="POST">
                  <div class="mb-3">
                        <?php

                          $query_bahan_baku = "SELECT * FROM t_bahan_baku"; 
                          $result_bahan_baku = mysqli_query($conn, $query_bahan_baku);
                          ?>
                          <label for="bahanBaku" class="form-label">Nama Bahan Baku</label>
                          <select class="form-select" id="id_bahan_baku_masukkeluar" name="id_bahan_baku_masukkeluar">
                              <option value="" disabled selected>-Pilih Bahan Baku-</option>
                              <?php while ($bahan_baku = mysqli_fetch_assoc($result_bahan_baku)) { ?>
                                  <option value="<?= htmlspecialchars($bahan_baku['id_bahan_baku']); ?>">
                                      <?= htmlspecialchars($bahan_baku['nama_bahan_baku']); ?>
                                  </option>
                              <?php } ?>
                          </select>
                    </div>
                 
                  <div class="mb-3">
                    <label for="kuantitas" class="form-label">Kuantitas</label>
                    <input type="text" class="form-control" id="kuantitas" name="kuantitas" placeholder="Masukkan Kuantitas">
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary">Simpan</button>
              </div>
              </div>
              </div>
            </div>
          </div>
        </div>
        </form>



        <div class="table-responsive">
            <table id="data-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kode Barcode</th>
                        <th>Nama Bahan</th>
                        <th>Kategori</th>
                        <th>Kuantitas</th>
                        <th>Unit</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result_table)) { ?>
                    <tr>
                        
                        <td><?= htmlspecialchars($row['id']); ?></td>
                        <td><?= htmlspecialchars($row['kode_barcode'])?></td>
                        <td><?= htmlspecialchars($row['nama_bahan'])?></td>
                        <td><?= htmlspecialchars($row['kategori'])?></td>
                        <td><?= htmlspecialchars($row['kuantitas']); ?></td>
                        <td><?= htmlspecialchars($row['unit'])?></td>
                        <td><?= htmlspecialchars($row['tanggal']); ?></td>
                        <td>
                            <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#editModal"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-light btn-sm" onclick="confirmAction(<?= $row['id']; ?>)"><i class="fa-regular fa-trash-can" style="color: #dd1d1d;"></i></button>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
  $(function() {
        var tahunTerlama = <?= $tahun_terlama; ?>;
        var tahunTerbaru = <?= $tahun_terbaru; ?>;

        $("#datepicker").datepicker({
            dateFormat: "MM yy",
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            yearRange: tahunTerlama + ":" + tahunTerbaru, // Batas tahun
            onClose: function(dateText, inst) {
                $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
            }
        }).focus(function() {
            $(".ui-datepicker-calendar").hide(); // Sembunyikan kalender tanggal
        });
    });
    function openSidebar() {
        document.getElementById("sidebar").style.width = "250px";
        $('.dropdown-menu').removeClass('show');

        $("#datepicker").datepicker("hide");
    }

    function closeSidebar() {
        document.getElementById("sidebar").style.width = "0";
    }

    function confirmAction(id) {
        if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
            window.location.href = `hapus.php?id=${id}`;
        }
    }
</script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        $('#data-table').DataTable();
    });
</script>
</body>
</html>