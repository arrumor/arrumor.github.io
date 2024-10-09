<?php
    require 'koneksi.php';

    $query = "SELECT * FROM datacabang";
  
    $result = mysqli_query($conn, $query);
    
    $cabang = [];
    
    while ($row = mysqli_fetch_assoc($result)) {
    $cabang[] = $row;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cabang</title>

    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/data.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <?php 
        include ("navbar.php"); 
        ?>
    </header>
    <main>
        <div class="container-pilihan">
            <a href="create.php">
                <button class="tambah">
                <p>Tambah</p>
                </button>
            </a>
        </div>
        <table class="tabel" border="2">
            <thead border="2">
                <tr>
                    <th style="width: 40px" class="header-table">No</th>
                    <th style="width: 220px" class="header-table">Nama Cabang</th>
                    <th style="width: 700px" class="header-table">Alamat</th>
                    <th style="width: 200px" class="header-table">Telepon</th>
                    <th style="width: 130px" class="header-table">Aksi</th>
                </tr>
            </thead>
            <tbody border="2">
                <?php $i = 1; foreach($cabang as $cbg) : ?>
                    <tr class="tabel-cabang">
                    <td class="tabel-cabang"><?php echo $i; ?></td>
                    <td class="tabel-cabang"><?php echo $cbg['nama'] ?></td>
                    <td class="tabel-cabang"><?php echo $cbg['alamat'] ?></td>
                    <td class="tabel-cabang"><?php echo $cbg['telepon'] ?></td>
                    <td class="tabel-cabang">
                        <div class="button-UD">
                            <a href="update.php?id=<?php echo $cbg['id'] ?>">
                                <button class="ubah-data">
                                    <i class="fa-solid fa-pen" style="color: #ffffff;"></i>
                                </button>
                            </a>
                            <a href="delete.php?id=<?php echo $cbg['id'] ?>" onclick="return confirm ('Apakah antum yakin?')">
                                <button class="hapus-data">
                                    <i class="fa-solid fa-trash-can" style="color: #ffffff;"></i>
                                </button>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php $i++; endforeach ?>
            </tbody>
        </table>
    </main>
</body>
</html>