<?php
session_start();
include("db_config.php");
?>

<!DOCTYPE html>

<head>
  <title>Warung Laptop</title>
  <link rel="icon" href="img/1.0/Icon.png">
  <link rel="stylesheet" href="css/style.css">
  <!-- Font Awesome Icon Src -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body>
  <div class="login admin">
    <div class="login-header">
      <h2>Selamat datang <?php echo $_SESSION['nama']; ?></h2><br>
      <h4>Anda berhasil login ke dalam database.</h4><br><br>
      <a href='db_logout.php' class="button">Logout ?</a>

      <table border="1">
        <h3>LOGIN & REGISTER</h3>
        <tr>
          <td>Username</td>
          <td>No_telp</td>
          <td>Email</td>
          <td>Password</td>
          <td>Hapus</td>
        </tr>
        <?php
    include "db_config.php";
    $query = "SELECT * FROM reg_user";
    $sql = mysqli_query($conn, $query);
    while ($ban = mysqli_fetch_array($sql)) {
        echo "
            <tr>
                <td>$ban[username]</td>
                <td>$ban[no_tlp]</td>
                <td>$ban[email]</td>
                <td>$ban[password]</td>
                <td><a href='?hapus=$ban[id_user]'>Hapus</a></td>
            </tr>
        ";
    }

    if(isset($_GET['hapus'])){
        $hapus_id = $_GET['hapus'];
        $hapus_query = "DELETE FROM reg_user WHERE id_user = $hapus_id";
        mysqli_query($conn, $hapus_query);
        header("Location: db_admin.php"); 
    }
    ?>
      </table>
      <table border="1">
        <h3>Kotak Saran dan Keritik</h3>
        <tr>
          <td>No</td>
          <td>Nama</td>
          <td>Email</td>
          <td>Subjek</td>
          <td>Pesan</td>
          <td>Aksi</td>
        </tr>
        <?php
            include "db_config.php";
            $no = 1;
            $query = "SELECT * FROM saran";
            $sql = mysqli_query($conn, $query);
            while ($h = mysqli_fetch_array($sql)) {
                echo "
                    <tr>
                        <td>$no</td>
                        <td>$h[nama]</td>
                        <td>$h[email]</td>
                        <td>$h[subjek]</td>
                        <td>$h[pesan]</td>
                        <td><a href='?hapus=$h[No]'>Hapus</a></td>
                    </tr>
                ";
                $no++;

                if(isset($_GET['hapus'])){
                    $hapus_id = $_GET['hapus'];
                    $hapus_query = "DELETE FROM saran WHERE No = $hapus_id";
                    mysqli_query($conn, $hapus_query);
                    header("Location: db_admin.php"); 
                }
            }
        ?>
      </table>
      <table border="1">
        <h3>PRODUCT</h3>
        <tr>
          <td>Product_id</td>
          <td>Product_name</td>
          <td>Product_price</td>
          <td>Product_img</td>
          <td>Kategori</td>
          <td>Merk</td>
          <td>Aksi</td>
        </tr>
        <?php
            include "db_config.php";
            $no = 1;
            $query = "SELECT * FROM product_best
            INNER JOIN product_u3 ON product_best.product_id = product_u3.product_id
            INNER JOIN product_u10 ON product_best.product_id = product_u10.product_id";
            $sql = mysqli_query($conn, $query);
            while ($h = mysqli_fetch_array($sql)) {
                echo "
                    <tr>
                        <td>$no</td>
                        <td>$h[product_name]</td>
                        <td>$h[product_price]</td>
                        <td>$h[product_image]</td>
                        <td>$h[kategori]</td>
                        <td>$h[merk]</td>
                        <td><a href='?hapus=$h[product_id]'>Hapus</a></td>
                    </tr>
                ";
                $no++;

                if(isset($_GET['hapus'])){
                    $hapus_id = $_GET['hapus'];
                    $hapus_query = "DELETE FROM saran WHERE No = $hapus_id";
                    mysqli_query($conn, $hapus_query);
                    header("Location: db_admin.php"); 
                }
            }
        ?>
      </table>
    </div>
  </div>
</body>

</html>
