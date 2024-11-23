    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/login1.css">
</head>
<body>
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-md-6 left-side d-flex flex-column align-items-center justify-content-center">
                <img src="../pic/Polibatam.png" alt="Polibatam Logo" class="polibatam">
                <img src="Logo Kost.png" alt="Kost Logo" class="kost">
            </div>
            <div class="col-md-6 right-side d-flex align-items-center justify-content-center">
                <div class="login-box">
                    <h2 class="text-center"><strong>Selamat Datang!</strong></h2>
                    <form action="login_process.php" method="POST">
                        <div class="form-group">
                            <label for="username">Nama Pengguna</label>
                            <input name="nama1" type="text" class="form-control" id="username" placeholder="Masukkan Nama Pengguna" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Kata Sandi</label>
                            <input name="password1" type="password" class="form-control" id="password" placeholder="Masukkan Kata sandi" required>
                        </div>
                        <a href="#" class="d-block mb-3">Lupa Kata Sandi?</a>
                        <center><button type="submit" class="btn btn-primary btn-block">Masuk</button></center>
                    </form>

                    <?php if(isset($_GET['error']) && $_GET['error'] == 'wrong_password'): ?>
                        <div class="alert alert-danger mt-3">Nama Pengguna atau Kata Sandi salah, silakan coba lagi!</div>
                    <?php elseif(isset($_GET['error']) && $_GET['error'] == 'user_not_found'): ?>
                        <div class="alert alert-danger mt-3">Nama Pengguna tidak ditemukan!</div>
                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
    </div>
    </a>

    <script>
         document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("showPassword").checked = false;
        });
          document.getElementById("showPassword").addEventListener("click", function() {
            var passwordField = document.getElementById("password1");
            if (this.checked) {
                passwordField.type = "text";  // Ganti tipe password menjadi teks
            } else {
                passwordField.type = "password";  // Kembali ke tipe password
            }
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>