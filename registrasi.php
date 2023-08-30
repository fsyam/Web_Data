<?php
require 'functions.php';

if (isset($_POST["register"])) {

    if (registrasi($_POST) > 0) {
        echo "<script>
                        alert('user baru berhasil ditambahkan');
                </script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="register.css">

</head>

<body>


    <div class="login">
        <h2 class="nonactive"> Login </h2>
        <h2 class="active">Register</h2>

        <form action="" method="post">



            <input type="text" class="text" id="username" name="username" required>
            <span>username</span>

            <br>

            <br>

            <input type="password" class="text" id="passowrd" name="password" required>
            <span>password</span>
            <br>

            <br>


            <input type="password" class="text" id="passowrd2" name="password2" required>
            <span>Konfirmasi Password</span>
            <br>

            <button type="submit" name="register" class="signin">
                register
            </button>


            <hr>

            <a href="login.php">Login</a>
        </form>

    </div>


</body>

</html>