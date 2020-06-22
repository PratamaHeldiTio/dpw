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

$profile = getProfile();

if (isset($_POST['ubah_profile'])) {
    if (ubahProfile($_POST) > 0) {
        echo "<script>
        alert('ubah profile berhasil');
        document.location.href = 'profile.php';
        </script>";
    } else {
        echo "<script>
        alert('ubah profile gagal atau tidak ada data yang diperbaharui');
        document.location.href = 'profile.php';
        </script>";
    }
}


?>

<?php include_once('template/header.php') ?>

<title> My Profile</title>

<?php include_once('template/sidebar.php') ?>

<div class="col-lg-9">
    <div class="row ">
        <div class="col-sm-12 topbar">
            <h3>My Profile</h3>
            <a href="logout.php">
                <div class="logout btn btn-secondary float-right">Logout</div>
            </a>
        </div>
        <div class="main-content col-lg-12">
            <div class="card card-profile text-center col-lg-6 offset-lg-3">
                <div class="card-header">
                    Admin
                </div>
                <div class="card-body">
                    <img src="img/<?= $profile['img'] ?>" class="profile-img">
                    <h5 class="card-title"><?= $profile['nama'] ?></h5>
                    <h5 class="card-title"><?= $profile['email'] ?></h5>
                    <a href="#" class="btn" data-toggle="modal" data-target="#edit-profile">Ubah Profile</a>
                </div>
                <div class="card-footer">
                    <small>Terdaftar sejak <?= date('d F Y', $profile['date_time']) ?></small>
                </div>
            </div>

        </div>

        <?php include_once('template/footer.php') ?>


        <!-- Modal -->
        <div class="modal fade" id="edit-profile" tabindex="-1" role="dialog" aria-labelledby="edit-profileLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="edit-profileLabel">Ubah Profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input readonly class="form-control" name="email" value="<?= $profile['email'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama" value="<?= $profile['nama'] ?>">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-3">
                                        <img src="img/<?= $profile['img'] ?>">
                                    </div>
                                    <div class="col-8 offset-1">
                                        <input type="file" class="form-control mt-4" name="gambar">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                            <button type="submit" name="ubah_profile" id="simpan" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>