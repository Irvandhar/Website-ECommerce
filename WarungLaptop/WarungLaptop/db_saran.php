<?php
    include "db_config.php";
    session_start();

    $email = $_SESSION['email'];

    if($_POST['nama'] ==''||  $email ==''|| $_POST['subjek'] ==''|| $_POST['pesan'] ==''){
        header("location:contact.php");
    }else{
        $query = "INSERT INTO saran(nama,email,subjek,pesan)
        values('$_POST[nama]', '$email', '$_POST[subjek]', '$_POST[pesan]')";
        
        if(mysqli_query($conn, $query)){
            header("location:contact.php");
        }
    }
?>
