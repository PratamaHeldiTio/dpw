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

$daftarBuku = [];
if (isset($_GET['keyword'])) {
    $daftarBuku = search($_GET['keyword']);
}

$i = 1;
?>

<?php if ($daftarBuku == []) : ?>
    <h2>Buku tidak ditemukan</h2>
<?php else : ?>
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
                    <a href="hapus.php?id=<?= $buku['ISBN'] ?>" class="hapus"><i class="fas fa-trash "></i></a>
                </td>
                <?php $i++ ?>
            </tr>
        </tbody>
    <?php endforeach ?>
<?php endif ?>