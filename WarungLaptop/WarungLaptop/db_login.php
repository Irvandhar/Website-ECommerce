<?php
    session_start();
    include("db_config.php");
    $email = $_POST['email'];
    $password = $_POST['password'];
    if($email != '' && $password != ''){
        
        $sql = "SELECT * FROM reg_user WHERE email='$email' AND password='$password'";
        $query = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($query);
        if(mysqli_num_rows($query) < 1){
            setcookie("message", "Maaf, email atau password salah",time()+60);
            header("location: login.php");
        }else{
            $_SESSION['email'] = $data['email'];
            $_SESSION['nama'] = $data['username'];
            
            if ($email === 'admin@gmail.com') {
                header("location: db_admin.php");
                exit(); 
            }
            setcookie("message","",time()-60);
            header("location: db_welcome.php");
        }
    }else{
        setcookie("message", "email atau Password kosong", time()+60);
        header("location: login.php");
    }
?>
