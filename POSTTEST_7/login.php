<?php
session_start();
require "koneksi.php";
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $query = "SELECT * FROM akun WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            $_SESSION['login'] = true;
            echo "
            <script>
            alert('Login berhasil!');
            document.location.href = 'index.php';
            </script>
            ";
        } else {
            echo "
            <script>
            alert('Login gagal!');
            document.location.href = 'index.php';
            </script>
            ";
        }
    } else {
        echo "
        <script>
        alert('Username tidak ditemukan!')
        document.location.href = 'login.php';
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="style/style.css">
</head>

<body class="body-login">
    <div class="container_login">
        <div>
            <form class="login-form" action="" method="post">
                <p style="margin-bottom:60px"><b>Login<b></p>
                <label for="username"></label>
                <input type="text" name="username" id="username_login" placeholder="Username" required><br>
                <br>
                <label for="password"></label>
                <input type="password" name="password" id="password_login" placeholder="Password" required><br>
                <br>
                <p style="font-size:15px; margin-top: 15px;">Belum punya akun? Registrasi di <a href="registrasi.php">sini</a></p>
                <button class="submit" id="login_submit" name="submit" type="submit">Login</button>
            </form>
        </div>
    </div>
</body>

</html>