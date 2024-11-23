<?php
session_start();
include 'koneksi.php'; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nama1']) && isset($_POST['password1'])) {
        $nama = trim($_POST['nama1']);
        $password = trim($_POST['password1']);

        $query = "SELECT * FROM admin WHERE nama1 = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $nama);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($password === $row['password1']) { 
                $_SESSION['nama1'] = $row['nama1'];
                echo "<script>
                        alert('Berhasil Masuk!');
                        window.location.href = '../Dasboard admin/dasboard.php';
                      </script>";
                exit();
            } else {
                echo "<script>
                        alert('Password salah!');
                        window.location.href = 'login.php?error=wrong_password';
                      </script>";
                exit();
            }
        } else {
            echo "<script>
                    alert('Nama pengguna tidak ditemukan!');
                    window.location.href = 'login.php?error=user_not_found';
                  </script>";
            exit();
        }
        
        $stmt->close();
        $conn->close();
    } else {
        echo "<script>
                alert('Form tidak lengkap!');
                window.location.href = 'login.php';
              </script>";
        exit();
    }
}
?>
