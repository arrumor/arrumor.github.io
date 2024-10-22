<?php
    require 'koneksi.php';

    $id = $_GET['id'];

    $findQuery = mysqli_query($conn, "SELECT * FROM datacabang WHERE id = '$id'");
    $arr_cabang = [];
    while($datacabang = mysqli_fetch_assoc($findQuery)){
        $arr_cabang[] = $datacabang;
    }

    unlink('image/'.$arr_cabang[0]['foto']);

        $query = "DELETE FROM datacabang WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
    
        if($result){
            echo "
                <script>
                    alert('Berhasil menghapus data cabang!');
                    document.location.href = 'cabang.php';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('Gagal menghapus data cabang!');
                    document.location.href = 'cabang.php';
                </script>
            ";
        }
?>