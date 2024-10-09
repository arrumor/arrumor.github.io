<?php
    require 'koneksi.php';

    $id = $_GET['id'];
    $query = "SELECT * FROM datacabang WHERE id = $id";
    $result = mysqli_query($conn, $query);

    $cabang = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $cabang[] = $row;
    }

    $cabang = $cabang[0];

    if(isset($_POST['tambah'])){
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $telepon = $_POST['telepon'];

        $query = "UPDATE datacabang SET nama = '$nama', alamat = '$alamat', telepon = '$telepon' WHERE id = $id";
        $result = mysqli_query($conn, $query);

        if($result){
            echo "<script>
                    alert('Data berhasil diubah');
                    document.location.href = 'cabang.php';
                </script>";
        } else {
            echo "<script>
                    alert('Data gagal diubah');
                    document.location.href = 'update.php';
                </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Cabang</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style/data.css">
</head>
<body>
    <main class="data-cabang-section">
        <h1 class="data-cabang-title">
            Ubah Data Cabang
        </h1>

        <div class="container">
            <a href="cabang.php">
                <button class="back">
                    <p>Back</p>
                </button>
            </a>
        </div>

        <div class="form-datacabang">
            <form action="" method="post">
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
                <input type="submit" value="Ubah" name="tambah" class="button-submit">
            </form>
        </div>
    </main>
</body>
</html>