<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rumah Makan Upnormal</title>
    <link rel="stylesheet" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <?php 
        include ("navbar.php"); 

        $input_username = 'admin';
        $input_email = 'celioarga05@gmail.com';
        $input_password = 'admin123';

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if ($username == $input_username && $email == $input_email && $password == $input_password) {
            echo "<script>alert('Selamat datang $username');</script>";
        }
        else {
            echo "<script>alert('Username atau password salah!');</script>";
            echo "<script>window.location.href='login.php';</script>";
        }
        ?>
    </header>
    <main>
        <div class="banner">
            <img src="background-besar.jpg" alt="Background">
            <p class="nama-resto">Rumah Makan Upnormal</p>
        </div>
        <div class="container_besar">
            <div class="container_kecil">
                <div class="container_makanan1">
                    <img src="nasi-goreng.png"><br>
                    Nasi Goreng Agak Spesial<br>
                    Rp 25.000
                </div>
                <div class="container_makanan2">
                    <br>
                    <br>
                    <img src="nasi-putih.png"><br>
                    Nasi Sebelum Digoreng<br>
                    Rp 7.000
                </div>
                <div class="container_makanan3">
                    <img src="es-teh-seger.png" style="height:230px"><br>
                    Es Teh Manis Dengan Sedotan<br>
                    Rp 5.000
                </div>
                <div class="container_makanan4">
                    <img src="es-teh-tanpa-sedotan.png" style="height:230px"><br>
                    Es Teh Manis Tanpa Sedotan<br>
                    Rp 3.000
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="footer">
            <p>&copy; 2024 Rumah Makan Upnormal. All rights reserved.</p>
        </div>
    </footer>
    <script src="script.js"></script>
</body>
</html>