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

    if (isset($_POST['tambah'])) {
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $telepon = $_POST['telepon'];
        $oldimg = $_POST['oldimg'];

        if ($_FILES['foto']['error'] === 4) {
            $foto = $oldimg;
        } else {
            $tmp_name = $_FILES['foto']['tmp_name'];
            $file_name = $_FILES['foto']['name'];
            $file_size = $_FILES['foto']['size'];

            $validExtension = ['jpg', 'jpeg', 'png', 'webp', 'svg'];
            $fileExtension = explode('.', $file_name);
            $fileExtension = strtolower(end($fileExtension));

            if (!in_array($fileExtension, $validExtension)) {
                echo "
                    <script>
                        alert('File yang diupload bukan gambar! Hanya file dengan ekstensi jpg, jpeg, png, webp, atau svg yang diperbolehkan.');
                        document.location.href = 'cabang.php';
                    </script>
                ";
                exit;
            }

            if ($file_size > 1048576) {
                echo "
                    <script>
                        alert('Ukuran file terlalu besar! Maksimal 1 MB.');
                        document.location.href = 'cabang.php';
                    </script>
                ";
                exit;
            }

            date_default_timezone_set('Asia/Makassar');
            $new_file_name = date('Y-m-d H.i.s') . '.' . $fileExtension;
            
            if (move_uploaded_file($tmp_name, 'image/'.$new_file_name)) {
                $foto = $new_file_name;
                unlink('image/'.$oldimg);
            } else {
                echo "
                    <script>
                        alert('Gagal mengupload file! Periksa izin folder atau coba lagi.');
                        document.location.href = 'cabang.php';
                    </script>
                ";
                exit;
            }
        }

        $query = "UPDATE datacabang SET nama = '$nama', alamat = '$alamat', telepon = '$telepon', foto = '$foto' WHERE id = $id";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "
                <script>
                    alert('Berhasil memperbarui data cabang!');
                    document.location.href = 'cabang.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Gagal memperbarui data cabang! Terjadi kesalahan pada database.');
                    document.location.href = 'cabang.php';
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

        <div class="container-back">
            <a href="cabang.php">
                <button class="kembali">
                    <p>Back</p>
                </button>
            </a>
        </div>

        <div class="form-datacabang">
            <form action="" method="post" enctype="multipart/form-data">

                <input type = "hidden" name = "oldimg" value = '<?php echo $cabang['foto'] ?>'>

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
                    <img src="image/<?php echo $cabang['foto'] ?>" alt = "<?php echo $cabang['foto'] ?>" width ="200px" height="150px" style="display:block; margin:0 auto;"/>
                    <br>
                    <label for="foto" class="label-field">Foto</label><br>
                    <input type="file" name="foto" class="foto" required>
                </div>
                <input type="submit" value="Ubah" name="tambah" class="button-submit">
            </form>
        </div>
    </main>
</body>
</html>