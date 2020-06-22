<?php
session_start();
if (!isset($_SESSION["login"])) {
    echo "<script>
        alert('silahkan login sebelum melanjutkan');
        document.location.href = 'login.php';

        </script>";
    exit;
}

require 'functions.php';
if (isset($_POST['ubahPass'])) {
    if (ubahPass($_POST) > 0) {
        echo " <script>
                alert('Password berhasil diubah');
                </script>";
    } else {
        echo " <script>
                alert('maaf password gagal diubah');
                </script>";
    }
}

?>

<?php include_once('template/header.php') ?>

<title>Ubah Password</title>

<?php include_once('template/sidebar.php') ?>

<div class="col-lg-9">
    <div class="row ">
        <div class="col-sm-12 topbar">
            <h3>Ubah Password</h3>
            <a href="logout.php">
                <div class="logout btn btn-secondary float-right">Logout</div>
            </a>
        </div>
        <div class="main-content col-lg-12">
            <div class="col-sm-6 offset-sm-3 form-ubah-password">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="password_lama">Password lama</label>
                        <input type="password" class="form-control" id="password_lama" name="password_lama" placeholder="Masukan password lama" required>
                    </div>
                    <div class="form-group">
                        <label for="password_baru">Password baru</label>
                        <input type="password" class="form-control" name="password_baru" id="password_baru" placeholder="Masukan password baru" required>
                    </div>
                    <div class="form-group">
                        <label for="password_baru2">Ulangi password baru</label>
                        <input type="password" class="form-control" name="password_baru2" id="password_baru2" placeholder="Ulangi password baru" required>
                    </div>
                    <button class="btn btn-primary mt-3 float-right" name="ubahPass">Ubah password</button>
                </form>
            </div>
        </div>

        <?php include_once('template/footer.php') ?>