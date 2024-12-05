<?php
session_start();
include 'koneksinya.php'; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nama_pengguna = mysqli_real_escape_string($conn, $_POST['nama_pengguna']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_BCRYPT) : null;
    $no_wa = mysqli_real_escape_string($conn, $_POST['no_wa']);

    $email = $_SESSION['email'];

    $sql = "UPDATE pengguna SET 
                nama_pengguna = '$nama_pengguna', 
                email = '$email',
                no_wa = '$no_wa'";

    if ($password) {
        $sql .= ", password = '$password'";
    }

    $sql .= " WHERE id = $email";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['nama_pengguna'] = $nama_pengguna;
        $_SESSION['email'] = $email;
        $_SESSION['no_WA'] = $no_wa;

        header("Location: kelola_pengguna2.php?status=success");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {

    header("Location: kelola_pengguna2.php");
    exit();
}
?>
