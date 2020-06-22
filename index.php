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
$daftarBuku = daftarBuku();
$i = 1;
?>

<?php include_once('template/header.php') ?>

<title>Daftar buku</title>

<?php include_once('template/sidebar.php') ?>

<div class="col-lg-9">
    <div class="row ">
        <div class="col topbar">
            <h3>Daftar buku</h3>
            <a href="logout.php">
                <div class="logout btn btn-secondary float-right">Logout</div>
            </a>
        </div>
        <div class="main-content col-12">
            <div class="row">
                <div class="input-group mt-3 mb-3 col-sm-6 col-lg-4 offset-sm-6 offset-lg-8 float-right">
                    <input type="text" class="form-control" id="keyword" placeholder="Masukan Kata kunci">
                </div>
            </div>
            <div class="row">
                <div class="col-12 overflow-auto">
                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">ISBN</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Penulis</th>
                                <th scope="col">Penerbit</th>
                                <th scope="col">Tahun terbit</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <?php foreach ($daftarBuku as $buku) : ?>

                            <tbody>
                                <tr>
                                    <th scope="row"><?= $i ?></th>
                                    <td>
                                        <?= $buku['ISBN'] ?>
                                    </td>
                                    <td>
                                        <?= $buku['judul_buku'] ?>
                                    </td>
                                    <td>
                                        <?= $buku['penulis'] ?>
                                    </td>
                                    <td>
                                        <?= $buku['penerbit'] ?>
                                    </td>
                                    <td>
                                        <?= $buku['tahun_terbit'] ?>
                                    </td>
                                    <td>
                                        <a href="" data-id="<?= $buku['ISBN'] ?>" class="edit" data-toggle="modal" data-target="#edit"><i class="fas fa-edit"></i></a>
                                        <a href="hapus.php?id=<?= $buku['ISBN'] ?>" onclick="return confirm('yakin? Jika ya silahkan klik ok atau yes');"><i class="fas fa-trash "></i></a>
                                    </td>
                                    <?php $i++ ?>
                                </tr>
                            </tbody>
                        <?php endforeach ?>
                    </table>
                </div>
            </div>
        </div>

        <?php include_once('template/footer.php') ?>
        <?php include_once('template/modal_box.php') ?>