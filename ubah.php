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
    $daftarBuku = cariBukuById($_GET['keyword']);

    if ($daftarBuku == 0) {
        $false = '';
    }
}

if (isset($_POST['submit'])) {
    if (ubah($_POST) > 0) {
        echo "<script>
            alert('Data berhasil diubah')
            document.location.href = 'index.php';
            </script>";
    } else {
        echo "<script>
            alert('Data gagal diubah')
            document.location.href = 'index.php';
            </script>";
    }
}
?>

<?php if ($daftarBuku != []) : ?>
    <input type="text" name="isbn_lama" value="<?= $daftarBuku['ISBN'] ?>" hidden>
    <div class="form-group">
        <label for="isbn">ISBN</label>
        <input type="text" class="form-control" name="isbn" id="isbn" value="<?= $daftarBuku['ISBN'] ?>" maxlength="7">
    </div>
    <div class="form-group">
        <label for="judul">Judul</label>
        <input type="text" class="form-control" name="judul" id="judul" value="<?= $daftarBuku['judul_buku'] ?>">
    </div>
    <div class="form-group">
        <label for="penulis">Penulis</label>
        <input type="text" class="form-control" name="penulis" id="penulis" value="<?= $daftarBuku['penulis'] ?>">
    </div>
    <div class="form-group">
        <label for="penerbit">Penerbit</label>
        <input type="text" class="form-control" name="penerbit" id="penerbit" value="<?= $daftarBuku['penerbit'] ?>">
    </div>
    <div class="form-group">
        <label for="tahun_terbit">Tahun terbit</label>
        <input type="number" class="form-control" name="tahun_terbit" id="tahun_terbit" value="<?= $daftarBuku['tahun_terbit'] ?>">
    </div>
<?php endif ?>