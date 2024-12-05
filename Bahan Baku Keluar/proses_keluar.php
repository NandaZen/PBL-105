<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mendekode JSON request dari frontend
    $input = json_decode(file_get_contents('php://input'), true);

    $action = $input['action'] ?? '';

    if ($action === 'add') {
        // Tambah data bahan keluar
        $id_bahan_masukkeluar = $input['id_bahan_masuk/keluar'] ?? null;
        $tanggal = $input['tanggal'] ?? null;
        $kuantitas = $input['kuantitas'] ?? null;
        $aksi = $input['aksi'] ?? null;
        $id_bahan_baku = $input['id_bahan_baku'] ?? null;

        if ($id_bahan_masukkeluar && $tanggal && $kuantitas && $aksi && $id_bahan_baku) {
            $sql = "INSERT INTO t_bahan_baku_masukkeluar (id_bahan_masukkeluar,tanggal,kuantitas,aksi,id_bahan_baku)
                    VALUES (?, ?, ?, ?, ?, ?, 'Bahan Baku Keluar')";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ssssis', $id_bahan_masukkeluar, $tanggal, $kuantitas, $aksi, $id_bahan_baku);

            if ($stmt->execute()) {
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Data berhasil ditambahkan!'
                ]);
            } else {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Gagal menambahkan data: ' . $conn->error
                ]);
            }
            $stmt->close();
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Data tidak lengkap!'
            ]);
        }
    } elseif ($action === 'filter') {
        // Filter data bahan keluar berdasarkan bulan
        $bulan = $input['bulan'] ?? null;

        if ($bulan) {
            $sql = "SELECT * FROM stok_bahan WHERE MONTH(tanggal) = ? AND tipe = 'Keluar'";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i', $bulan);

            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_all(MYSQLI_ASSOC);

            echo json_encode([
                'status' => 'success',
                'data' => $data
            ]);
            $stmt->close();
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Bulan tidak valid!'
            ]);
        }
    } elseif ($action === 'edit') {
        $id = $input['id'] ?? null;
        $nama_bahan = $input['nama_bahan'] ?? null;
        $kategori = $input['kategori'] ?? null;
        $kuantitas = $input['kuantitas'] ?? null;
        $unit = $input['unit'] ?? null;

        if ($id && $nama_bahan && $kategori && $kuantitas && $unit) {
            $sql = "UPDATE stok_bahan SET nama_bahan = ?, kategori = ?, kuantitas = ?, unit = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ssisi', $nama_bahan, $kategori, $kuantitas, $unit, $id);

            if ($stmt->execute()) {
                echo json_encode([
                    'status' => 'success',
                    'message' => 'Data berhasil diperbarui!'
                ]);
            } else {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Gagal memperbarui data: ' . $conn->error
                ]);
            }
            $stmt->close();
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Data tidak lengkap!'
            ]);
        }
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Aksi tidak valid!'
        ]);
    }
}

$conn->close();
?>
