<?php
$conn = mysqli_connect("localhost", "root", "", "dpw");

function daftarBuku()
{
    global $conn;
    $query = "SELECT * FROM daftar_buku";
    $result = mysqli_query($conn, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function cariBukuById($id)
{
    global $conn;
    $query = "SELECT * FROM daftar_buku WHERE ISBN = '$id'";
    $result = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($result);

    return $result;
}

function hapus($id)
{
    global $conn;
    $query = "DELETE FROM daftar_buku WHERE ISBN = '$id'";
    $result = mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;
    $isbnLama = $data['isbn_lama'];
    $isbn = htmlspecialchars($data['isbn']);
    $judul = htmlspecialchars($data['judul']);
    $penulis = htmlspecialchars($data['penulis']);
    $penerbit = htmlspecialchars($data['penerbit']);
    $tahunTerbit = htmlspecialchars($data['tahun_terbit']);

    $query = "UPDATE daftar_buku SET
                ISBN = '$isbn',
                judul_buku = '$judul',
                penulis = '$penulis',
                penerbit = '$penerbit',
                tahun_terbit = $tahunTerbit
                WHERE ISBN = '$isbnLama'
                ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function Tambah($data)
{
    global $conn;
    $isbn = htmlspecialchars($data['isbn']);
    $judul = htmlspecialchars($data['judul_buku']);
    $penulis = htmlspecialchars($data['penulis']);
    $penerbit = htmlspecialchars($data['penerbit']);
    $tahunTerbit = htmlspecialchars($data['tahun_terbit']);

    $query = "INSERT INTO daftar_buku VALUES ('$isbn', '$judul', '$penulis', '$penerbit', '$tahunTerbit')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function search($keyword)
{
    global $conn;
    $query = "SELECT * FROM daftar_buku
                        WHERE
                ISBN LIKE '%$keyword%' OR
                judul_buku LIKE '%$keyword%' OR
                penulis LIKE '%$keyword%' OR
                penerbit LIKE '%$keyword%' OR
                tahun_terbit LIKE '%$keyword%'";

    $result = mysqli_query($conn, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function registrasi($data)
{
    global $conn;

    //masukan data yang ditangkap dari $_post ke variable
    $nama = htmlspecialchars($data['nama']);
    $email = htmlspecialchars($data['email']);
    $password = mysqli_real_escape_string($conn, $data['password']);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);
    $img = 'default.jpg';
    $date_time = time();

    // cek apakah no_pus dan username ada yang sama
    $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
    alert('email anda sudah terdaftar silahkan masukan email lain');
    document.location.href = 'register.php';
    </script>";
    }


    //cek kesamaan confirmasi password
    if ($password !== $password2) {
        echo "<script>
  alert('confirmasi password tidak cocok');
  document.location.href = 'register.php';
  </script>";
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // memasukan data ke database
    mysqli_query($conn, "INSERT INTO user VALUES('' ,'$nama', '$email', '$password', '$img', '$date_time')");
    return mysqli_affected_rows($conn);
}




// untuk login
function login($data)
{
    global $conn;
    $email = $data['email'];
    $password = $data['password'];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");

    // cek apakah ada nama didata base
    if (mysqli_num_rows($result) === 1) {

        $pasHash = mysqli_fetch_assoc($result);
        // untuk mencocokan password yang diinput dengan password yang sudah di hash
        if (password_verify($password, $pasHash['password'])) {
            $_SESSION["login"] = true;
            $_SESSION['email'] = $email;
            header("Location: index.php");
            exit;
        }
    }
}

function getProfile()
{
    $email = $_SESSION['email'];
    global $conn;
    $query = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    return mysqli_fetch_assoc($result);
}


function ubahPass($data)
{
    $email = $_SESSION['email'];
    global $conn;
    $passwordLama = mysqli_real_escape_string($conn, $data['password_lama']);
    $passwordBaru =  mysqli_real_escape_string($conn, $data['password_baru']);
    $passwordBaru2 =  mysqli_real_escape_string($conn, $data['password_baru2']);
    $user =  mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
    $user = mysqli_fetch_assoc($user);


    if (password_verify($passwordLama, $user['password'])) {
        if ($passwordLama != $passwordBaru) {
            if ($passwordBaru == $passwordBaru2) {
                $passBaruHash =  password_hash($passwordBaru, PASSWORD_DEFAULT);
                $query = "UPDATE user SET
                            password = '$passBaruHash'
                            WHERE email = '$email'
                            ";
                $result = mysqli_query($conn, $query);

                return mysqli_affected_rows($conn);
            } else {
                echo " <script>
                        alert('password baru dan ulangi password baru tidak sama silahkan cek kembali');
                        document.location.href = 'change_pass.php';
                        </script>";
            }
        } else {
            echo " <script>
                     alert('password anda sama dengan password lama gunakan password lain');
                     document.location.href = 'change_pass.php';
                    </script>";
        }
    } else {
        echo " <script>
        alert('password lama anda salah');
        document.location.href = 'change_pass.php';
        </script>";
    }
}

function ubahProfile($data)
{
    global $conn;
    $email = $data['email'];
    $nama = htmlspecialchars($data['nama']);
    $user =  mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
    $user = mysqli_fetch_assoc($user);
    $error = $_FILES['gambar']['error'];
    $upload = false;

    if ($error === 4) {
        if ($user['nama'] === $nama) {
            echo " <script>
                alert('Profile tidak ada yang berubah');
                document.location.href = 'profile.php';
            </script>";
            exit;
        } else {
            $gambar = $user['img'];
        }
    } else {
        $gambar = upload($email);
        $upload = true;
    }

    $query = "UPDATE user SET
                    nama = '$nama',
                    img = '$gambar'
                    WHERE email = '$email'
                    ";

    mysqli_query($conn, $query);

    if ($upload === true) {
        return 1;
    } else {
        return mysqli_affected_rows($conn);
    }
}

function upload($email)
{
    $tmpName = $_FILES['gambar']['tmp_name'];

    $valid = cekValid();

    $namaFileBaru = $email;
    $namaFileBaru .= '.';
    $namaFileBaru .= $valid;
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
    return $namaFileBaru;
}



function cekValid()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];

    // cek apakah file yg diuplaod ektensinya valid atau tidak
    $ektensiValid = ['jpg', 'jpeg', 'png'];
    $ektensiGambar = explode('.', $namaFile);
    $ektensiGambar = strtolower(end($ektensiGambar));

    if (in_array($ektensiGambar, $ektensiValid)) {
        if ($ukuranFile <= 300000) {
            return $ektensiGambar;
        } else {
            echo "<script>
                        alert('file anda terlalu besar max 300kb, periksa kembali');
                        document.location.href = 'profile.php';
                    </script>";
            exit;
        }
    } else {
        echo "<script>
                 alert('silahkan upload file sesuai ektensi yang diminta');
                 document.location.href = 'profile.php';
            </script>";
        exit;
    }
}
