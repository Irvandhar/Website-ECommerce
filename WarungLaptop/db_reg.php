<?php
    include 'db_config.php';
    $username = $_POST["username"];
    $no_tlp = $_POST["no_tlp"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $rpass = $_POST["rpass"];

    $query = "INSERT INTO reg_user (username, no_tlp, email, password, rpass)
            VALUES ('$username', '$no_tlp', '$email', '$password', '$rpass')";

    if(mysqli_query($conn, $query)){
        echo "<script>alert('Selamat akun Berhasil dibuat!.')</script>";
        echo "<script>window.location.href = 'login.php';</script>";
    }else{
        echo "Pendaftaran Gagal : ".mysqli_error($conn);
    }
?>
