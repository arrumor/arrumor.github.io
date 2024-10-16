<?php
require 'koneksi.php';

if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];

    $tmp_name = $_FILES['foto']['tmp_name'];
    $file_name = $_FILES['foto']['name'];
    $file_size = $_FILES['foto']['size'];

    $valid_extension = ['jpg', 'jpeg', 'png', 'webp', 'svg'];
    $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    if (!in_array($file_extension, $valid_extension)) {
        echo "
            <script>
                alert('File yang diupload bukan gambar! Hanya file dengan ekstensi jpg, jpeg, png, webp, atau svg yang diperbolehkan.');
                document.location.href = 'create.php';
            </script>
        ";
        exit();
    }

    if ($file_size > 1048576) {
        echo "
            <script>
                alert('Ukuran file terlalu besar! Maksimal 1 MB.');
                document.location.href = 'create.php';
            </script>
        ";
        exit();
    }

    $upload_dir = 'image/';
    date_default_timezone_set('Asia/Makassar');
    $new_file_name = date('Y-m-d H.i.s') . '.' . $file_extension;

    if (move_uploaded_file($tmp_name, $upload_dir . $new_file_name)) {
        $query = "INSERT INTO datacabang (foto, nama, alamat, telepon) VALUES ('$new_file_name', '$nama', '$alamat', '$telepon')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "
                <script>
                    alert('Berhasil menambah data cabang!');
                    document.location.href = 'cabang.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Gagal menambah data cabang! Terjadi kesalahan pada database.');
                    document.location.href = 'create.php';
                </script>
            ";
        }
    } else {
        echo "
            <script>
                alert('Gagal mengupload file! Periksa izin folder atau coba lagi.');
                document.location.href = 'create.php';
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
    <title>Tambah Data Cabang</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style/data.css">
</head>
<body style="background-color: rgb(230, 230, 230)">
    <main class="data-cabang-section">
        <h1 class="data-cabang-title">
            Tambah Data Cabang
        </h1>

        <a class="tombol-back" href="cabang.php">
            <button class="kembali">
                <p>Back</p>
            </button>
        </a>

        <div class="form-datacabang">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-container">
                    <div class="input-field">
                        <label for="nama" class="label-field">Nama Cabang</label><br>
                        <input style="width: 300px; height: 22px" type="text" name="nama" id="nama" required>
                    </div>
                    <br>
                    <div class="input-field">
                        <label for="alamat" class="label-field">Alamat</label><br>
                        <input style="width: 300px; height: 22px" type="text" name="alamat" id="alamat" required>
                    </div>
                    <br>
                    <div class="input-field">
                        <label for="telepon" class="label-field">Nomor Telepon</label><br>
                        <input style="width: 300px; height: 22px" type="text" name="telepon" id="telepon" required>
                    </div>
                    <br>
                    <div class="input-field">
                        <label for="foto" class="label-field">Foto</label><br>
                        <input type="file" name="foto" class="foto" required>
                    </div>
                </div>
                <input type="submit" value="Tambah" name="tambah" class="button-submit">
            </form>
        </div>
    </main>
</body>
</html>