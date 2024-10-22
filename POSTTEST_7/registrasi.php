<?php
    require "koneksi.php";
    if (isset($_POST["submit"])) {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $checkQuery = "SELECT * FROM akun WHERE username = '$username'";
        $checkResult = mysqli_query($conn, $checkQuery);
        if (mysqli_num_rows($checkResult) > 0) {
            echo "
            <script>alert('Username sudah digunakan! Silakan gunakan username lain.');
            document.location.href = 'registrasi.php';
            </script>
            ";
        } else {
            $query = "INSERT INTO akun (username, email, password) VALUES ('$username', '$email', '$password')";
            if (mysqli_query($conn, $query)) {
                echo "
                <script>
                alert('Registrasi berhasil!');
                document.location.href = 'login.php';
                </script>
                ";
            } else {
                echo "
                <script>
                alert('Registrasi gagal!');
                document.location.href = 'index.php';
                </script>
                ";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="style/style.css">
</head>
<body class="body-login">
    <div class="container_login">
        <div>
            <form class="login-form" action="" method="post">
                <p style="margin-bottom:60px"><b>Registrasi<b></p>
                <label for="username"></label>
                <input type="text" name="username" id="username_login" placeholder="Username" required><br>
                <br>
                <label for="email"></label>
                <input type="email" name="email" id="email_login" placeholder="Email" required><br>
                <br>
                <label for="password"></label>
                <input type="password" name="password" id="password_login" placeholder="Password" required><br>
                <br>
                <p style="font-size:15px; margin-top: 15px;">Sudah punya akun? Login di <a href="login.php">sini</a></p>
                <button class="submit" name="submit" id="login_submit" type="submit">Registrasi</button>
            </form>
        </div>
    </div>
</body>
</html>