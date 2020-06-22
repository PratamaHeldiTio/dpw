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
if (isset($_POST['Submit'])) {
    if (Tambah($_POST) > 0) {
        echo "<script>
                alert('Buku berhasil ditambahkan');
                document.location.href = 'index.php'
                </script>";
    } else {
        echo "<script>
        alert('Buku gagal ditambahkan');
        document.location.href = 'index.php'
        </script>";
    }
}
?>

<?php include_once('template/header.php') ?>

<title>Tambah buku</title>

<?php include_once('template/sidebar.php') ?>

<div class="col-lg-9">
    <div class="row ">
        <div class="col-sm-12 topbar">
            <h3>Tambah buku</h3>
            <a href="logout.php">
                <div class="logout btn btn-secondary float-right">Logout</div>
            </a>
        </div>
        <div class="main-content col-lg-12">

            <div style="border:0; padding:10px; width:760px; height:auto;">
                <form action="tambah.php" method="POST">
                    <table width="760" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr height="46">
                            <td width="10%"> </td>
                            <td width="25%"> </td>
                            <td width="65%">
                                <font color="orange" size="10">Form Input Data</font>
                            </td>
                        </tr>
                        <tr height="46">
                            <td> </td>
                            <td>ISBN</td>
                            <td><input type="text" name="isbn" size="20" maxlength="7" /></td>
                        </tr>
                        <tr height="46">
                            <td> </td>
                            <td>Judul Buku</td>
                            <td><input type="text" name="judul_buku" size="70" maxlength="128" /></td>
                        </tr>
                        <tr height="46">
                            <td> </td>
                            <td>Penulis</td>
                            <td><input type="text" name="penulis" size="70" maxlength="128" /></td>
                        </tr>
                        <tr height="46">
                            <td> </td>
                            <td>Penerbit</td>
                            <td><input type="text" name="penerbit" size="20" maxlength="128" /></td>
                        </tr>
                        <tr height="46">
                            <td> </td>
                            <td>Tahun Terbit</td>
                            <td><input type="text" name="tahun_terbit" size="20" maxlength="64" /></td>
                        </tr>
                        <tr height="46">
                            <td> </td>
                            <td> </td>
                            <td><input type="submit" name="Submit" value="Submit">
                                <input type="reset" name="reset" value="Cancel"></td>
                        </tr>
                    </table>
                </form>
            </div>

        </div>

        <?php include_once('template/footer.php') ?>