<?php
session_start();
require 'functions.php';

if (!isset($_SESSION["login"])) {
    echo "<script>
        alert('silahkan login sebelum melanjutkan');
        document.location.href = 'login.php';
        </script>";
    exit;
}

if (hapus($_GET['id']) > 0) {
    header('Location: index.php');
} else {
    echo "<script> 
        alert('MOHON MAAF ADA KESALAHAN DATA GAGAL DI HAPUS');
        document.location.href = 'index.php';
    ";
}
