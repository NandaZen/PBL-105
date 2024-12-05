<?php 
require('koneksinya.php');

if (isset($_POST["submit"])) { 

    $nama_pengguna = htmlspecialchars(mysqli_real_escape_string($koneksi,$_POST['nama_pengguna']));
    $email = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST['email']));
    $password = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST['password']));
    $password = password_hash($password, PASSWORD_DEFAULT);
    $no_WA = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST['no_WA']));
    $role = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST['role']));

$query = "INSERT INTO pengguna (email, nama_pengguna, password, no_WA, role)
        Values ('$email', '$nama_pengguna', '$password', '$no_WA', '$role')";
 $result = mysqli_query($koneksi, $query);

 if (mysqli_affected_rows($koneksi) > 0){
    echo"<script>
            alert('Data berhasil disimpan!');
            document.location = 'kelola_pengguna2.php';
        </script>";
if ($_POST['role'] === 'Admin' && empty($_POST['no_WA'])) {
            die("Nomor Whatsapp wajib diisi untuk Admin!");
}
        
 }else{
 echo"<script>
        alert('Gagal menyimpan data!');
        document.location = 'kelola_pengguna2.php';
    </script>";
}
mysqli_close($koneksi);
}
?>