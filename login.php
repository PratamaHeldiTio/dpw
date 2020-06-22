<?php
session_start();
if (isset($_SESSION['login'])) {
    header("Location: index.php");
}

require 'functions.php';

if (isset($_POST['login'])) {
    login($_POST); // untuk menverifikasi data login

    // jika data tidak ada atau gagal diverifikasi maka tampilkan pesan 
    $gagalVerifikasi = true;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>

    <?php if (isset($gagalVerifikasi)) : ?>
        <script>
            alert('email atau password anda salah')
        </script>
    <?php endif; ?>

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h3>SISTEM ADMIN PERPUSTAKAAN</h3>
                <div class="login-form">
                    <h4 style="text-align: center; margin-bottom: 30px;">Login!</h4>
                    <form action="" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Masukan email anda." required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" id="" placeholder="Masukan Password anda." class="form-control" required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block btn-radius" name="login">Login</button>
                        </div>
                    </form>
                </div>
                <br>
                <center><a href="register.php" style="color: white;">Registrasi akun</a></center>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>