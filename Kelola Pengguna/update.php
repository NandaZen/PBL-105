<?php 
require("koneksinya.php");

if (isset($_POST['update'])){
    
        $email = htmlspecialchars(mysqli_real_escape_string($koneksi , $_POST['email']));
        $nama_pengguna = htmlspecialchars(mysqli_real_escape_string($koneksi , $_POST['nama_pengguna']));
        $password = htmlspecialchars(mysqli_real_escape_string($koneksi , $_POST['password']));
        $password = password_hash($password, PASSWORD_DEFAULT);
        $no_WA = htmlspecialchars(mysqli_real_escape_string($koneksi ,$_POST['no_WA']));
        $role = htmlspecialchars(mysqli_real_escape_string($koneksi , $_POST['role']));
    
        //Update data ke tabel user
        $query = "UPDATE pengguna SET email = '$email', 
        username = '$nama_pengguna', 
        password = '$password', 
        no_whatsapp = '$no_WA', 
        role = '$role' 
        WHERE email = '$email'";   
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            echo "<script>
                    alert('Berhasil mengubah data!');
                    document.location = 'kelola_pengguna2.php'
                </script>";
                    
            
        }else{
           echo "<script>
                    alert('Gagal Mengubah data'); 
                    document.location = 'kelola_pengguna2.php'
                    </script>";
    }
    mysqli_close($koneksi);
}
?>
