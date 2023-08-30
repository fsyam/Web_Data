<?php
session_start();
require 'functions.php';

// cek cookie
if (isset($_COOKIE['login']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM users WHERE id = $id");
    $row = mysqli_fetch_assoc($result);


    // cek cookie dan username
    if ($key === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }
}


if (isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}




if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    //cek username
    if (mysqli_num_rows($result) == 1) {

        //cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            //set session
            $_SESSION["login"] = true;

            // cek remember me
            if (isset($_POST['remember'])) {
                //buat cookie

                setcookie('id', $row['id'], time() + 60);
                setcookie('key', hash('sha256', $row['username']), time() + 60);
            }

            header("Location: index.php");
            exit;
        }
    }

    $error = true;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Halaman Login</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="styles.css">
    <!--Stylesheet-->

</head>

<body>
    <div class="login">
        <h2 class="active"> Login </h2>
        <h2 class="nonactive">Register</h2>

        <form action="" method="post">



            <input type="text" class="text" id="username" name="username">
            <span>username</span>

            <br>

            <br>

            <input type="password" class="text" id="passowrd" name="password">
            <span>password</span>
            <br>

            <input name="remember" type="checkbox" id="remember" class="custom-checkbox" />
            <label for="remember">Remember me</label>

            <button type="submit" name="login" class="signin">
                Login
            </button>


            <hr>

            <a href="registrasi.php">Register!</a>
        </form>

    </div>
</body>

</html>