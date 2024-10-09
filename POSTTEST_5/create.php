<?php
    require 'koneksi.php';

    if(isset($_POST['tambah'])){
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $telepon = $_POST['telepon'];

        $query = "INSERT INTO datacabang VALUES ('', '$nama', '$alamat', '$telepon')";
        $result = mysqli_query($conn, $query);

        if($result){
            echo "<script>
                    alert('Data berhasil ditambahkan');
                    document.location.href = 'cabang.php';
                </script>";
        } else {
            echo "<script>
                    alert('Data gagal ditambahkan');
                    document.location.href = 'tambah.php';
                </script>";
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
                <input type="submit" value="Tambah" name="tambah" class="button-submit">
                <button class="kembali" onclick="window.history.back()">Kembali</button>
            </form>
        </div>
    </main>
</body>
</html>