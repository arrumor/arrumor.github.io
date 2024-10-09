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
            <form class="login-form" action="index.php" method="post">
                <p style="margin-bottom:50px"><b>Login<b></p>
                <label for="username"></label>
                <input type="text" name="username" id="username_login" placeholder="Username" required><br>
                <br>
                <label for="email"></label>
                <input type="email" name="email" id="email_login" placeholder="Email" required><br>
                <br>
                <label for="password"></label>
                <input type="password" name="password" id="password_login" placeholder="Password" required><br>
                <br>
                <button class="submit" id="login_submit" type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>

