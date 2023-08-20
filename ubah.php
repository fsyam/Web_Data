<?php 
require 'functions.php';

// ambil data di URL
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];


// cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["submit"]) ) {
    // ambil data dari tiap elemen dalam form

    //cek apakah data berhasil diubah atau tidak
    if( ubah($_POST) > 0 ) {
        echo "
            <script>
                alert('Data berhasil diupdate');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data gagal diupdate');
                document.location.href = 'index.php';
            </script>
        ";
    }
    



}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Update data mahasiswa </title>
    </head>
    <body>
        <h1>Update data mahasiswa</h1>

        <a href="index.php">Home</a>

        <form action="" method="post">
            <input type="hidden" name="id" value="<?= $mhs[ "id" ] ; ?>">
            <ul>
                <li>
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" required value="<?= $mhs["nama"]; ?>">
                </li>
                <li>
                    <label for="nim">Nim</label>
                    <input type="text" name="nim" id="nim" required value="<?= $mhs["nim"]; ?>">
                </li>
                <li>
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" required value="<?= $mhs["email"]; ?>">
                </li>
                <li>
                    <label for="jurusan">Jurusan</label>
                    <input type="text" name="jurusan" id="jurusan" required value="<?= $mhs["jurusan"]; ?>">
                </li>
                <li>
                    <label for="gambar">Gambar</label>
                    <input type="text" name="gambar" id="gambar" required value="<?= $mhs["gambar"]; ?>">
                </li>
                <li>
                    <button type="submit" name="submit">Update Data!</button>
                </li>
            </ul>

        </form>
        
    </body>
</html>