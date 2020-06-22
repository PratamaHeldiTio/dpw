<?php
require 'functions.php';

if (isset($_POST['submit'])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
            alert('registrasi berhasil silahkan login');
            document.location.href = 'login.php';
            </script>";
    } else {
        echo "<script>
    alert('registrasi gagal silahkan periksa kembali');
    document.location.href = 'register.php';

    </script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/register.css">
</head>

<body>
    <div id="wrapper">
        <header>
            <h3>SISTEM ADMIN PERPUSTAKAAN</h3>
            <h5>Registrasi</h5>
        </header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 style="margin-bottom: 20px;">Registrasi Akun Baru</h4>
                    <form action="" method="POST">

                        <div class="form-group row">
                            <div class="col-md-2">
                                <label for="">Nama Lengkap</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="nama" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2">
                                <label for="">Email</label>
                            </div>
                            <div class="col-md-4">
                                <input type="email" name="email" id="" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2">
                                <label for="">Password</label>
                            </div>
                            <div class="col-md-4">
                                <input type="password" name="password" id="" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2">
                                <label for="">Ulangi Password</label>
                            </div>
                            <div class="col-md-4">
                                <input type="password" name="password2" id="" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="float-right">
                                    <button class="btn btn-primary" name="submit">Registrasi</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <br>
                    <center><a href="login.php" style="color: black;">Back to login</a></center>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>