<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

// tombol cari ditekan
if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Halaman Admin</title>
    <style>
    .loader {
        width: 100px;
        position: absolute;
        top: 130px;
        left: 220px;
        z-index: -1;
        display: none;
    }

    @media print {

        .logout,
        .tambah,
        .form-cari,
        .aksi {
            display: none;
        }

    }
    </style>


</head>

<body>


    <h1>Daftar Mahasiswa</h1>


    <a href="tambah.php" class="tambah">
        <button type="button">Tammbah Mahasiswa</button>
    </a>

    <br><br>

    <a href="logout.php" class="logout">
        <button type="button">Logout</button>
    </a> -

    <a href="print.php" target="_blank">
        <button type="button"> Print</button>
    </a>

    <br><br>

    <form action="" method="post" class="form-cari">

        <input type=" text" name="keyword" size="30" autofocus placeholder="Masukan keyword pencarian.."
            autocomplete="off" id="keyword">

        <img src=" img/loader.gif" class="loader">

    </form>
    <br>

    <div id="container">
        <table border="1" cellpadding="10" cellpadding="0">

            <tr>
                <th>No. </th>
                <th class="aksi">Aksi</th>
                <th>Gambar</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jurusan</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach ($mahasiswa as $row) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td class="aksi">
                    <a href="ubah.php?id=<?= $row["id"] ?>">ubah</a> |
                    <a href="hapus.php?id=<?= $row["id"] ?>"
                        onclick="return confirm('anda yakin ingin menghapus data tersebut?');">hapus</a>
                </td>
                <td><img src="img/<?= $row["gambar"] ?>" alt="" width="50"></td>
                <td><?= $row["nim"]; ?></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["email"]; ?></td>
                <td><?= $row["jurusan"]; ?></td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>

        </table>
    </div>
    <script src="js/code.jquery.com_jquery-3.7.1.js"></script>
    <script src="js/script.js"></script>

</body>

</html>