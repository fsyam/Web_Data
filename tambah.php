<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
require 'functions.php';
// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
    // ambil data dari tiap elemen dalam form



    //cek apakah data berhasil ditambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo "
            <script>
                alert('Data berhasil ditambahkan');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal ditambahkan');
                document.location.href = 'tambah.php';
            </script>
        ";
    }
}


?>

<!DOCTYPE html>
<html>

<head>
    <title> Tambah data mahasiswa </title>
</head>

<body>
    <h1>Tambah data mahasiswa</h1>

    <a href="index.php">Home</a>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" required autocomplete="off">
            </li>
            <li>
                <label for="nim">Nim</label>
                <input type="text" name="nim" id="nim" require autocomplete="off">
            </li>
            <li>
                <label for="email">Email</label>
                <input type="text" name="email" id="email" require autocomplete="off">
            </li>
            <li>
                <label for="jurusan">Jurusan</label>
                <input type="text" name="jurusan" id="jurusan" require autocomplete="off">
            </li>
            <li>
                <label for="gambar">Gambar</label>
                <input type="file" name="gambar" id="gambar" require autocomplete="off">
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data!</button>
            </li>
        </ul>

    </form>

</body>

</html>