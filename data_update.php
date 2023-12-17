<?php

error_reporting(E_ALL);
ini_set('display_errors', true);

@include 'config.php';

$nim = $_GET['edit'];

if(isset($_POST['update_data'])){

    $nim = $_POST['nim'];
    $nm_mhs = $_POST['nm_mhs'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $agama = $_POST['agama'];
    $jurusan = $_POST['jurusan'];

    if(empty($nim) || empty($nm_mhs) || empty($alamat) || empty($telp) || empty($agama) || empty($jurusan) ){
        $message[] = 'please fill out all data';
    }else{
        $update_data = "UPDATE sistem_akademik SET nim='$nim', nm_mhs='$nm_mhs', alamat='$alamat', telp='$telp', agama='$agama', jurusan='$jurusan' WHERE nim = $nim ";
        $upload = mysqli_query($conn,$update_data);
        var_dump($upload);
        if($upload){
            header('location:admin.php');
            exit;

        }else{
            echo "Error: " . mysqli_error($conn);

        }
    }

};

var_dump($_POST);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.com/libraries/font-awesome"> -->

    <link rel="stylesheet" href="style.css">
    <title>Update your data</title>

</head>
<body>
    
    <?php

    if(isset($message)){
        foreach($message as $message){
            echo '<span class="message">'.$message.'</span>';
        }
    }

    ?>

    <div class="container">

    <div class="form-container centered">

            <?php
            

            $select = mysqli_query($conn, "SELECT * FROM sistem_akademik WHERE nim = $nim");
            while($row = mysqli_fetch_assoc($select)){

            
            
            
            ?>

            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
            <h3>Update Data</h3>
            
            <div class="box">
                <label for="nim">NIM</label>
                <input type="number" placeholder="masukkan NIM" name="nim" required>
                
            </div>

            <div class="box">
                <label for="nm_mhs">Nama Lengkap</label>
                <input type="text" placeholder="masukkan Nama lengkap" name="nm_mhs" required>

            </div>
            
            <div class="box">
                <label for="alamat">Alamat</label>
                <textarea required name="alamat" placeholder="masukkan alamat"  required></textarea>

            </div>
            
            <div class="box">
                <label for="telp">Nomor Telepon</label>
                <input type="number" placeholder="Masukkan Nomor telepon" name="telp" required>

            </div>

            <div class="box">
                <label for="agama">Agama</label>
                <select name="agama" id="dropdown" required>
                    <option value="">Select Here</option>
                    <option value="islam">Islam</option>
                    <option value="kristen protestan">Kristen Protestan</option>
                    <option value="kristen katolik">Kristen Katholik</option>
                    <option value="buddha">Buddha</option>
                    <option value="hindu">Hindu</option>
                    <option value="konghucu">Khonghucu</option>
                    <option value="other">Other</option>
                </select>
            </div>
            
            <div class="box">

                <label for="jurusan">Jurusan</label>
                <select name="jurusan" id="dropdown" required>
                    <option value="">Pilih Jurusan</option>
                    <option value="Manajemen">Manajemen</option>
                    <option value="PGSD">PGSD</option>
                    <option value="PPKN">PPKN</option>
                    <option value="PJKR">PJKR</option>
                    <option value="Pend. MTK">Pend. MTK</option>
                    <option value="Hukum">Hukum</option>
                    <option value="Teknik Industri">Teknik Industri</option>
                    <option value="Teknik Informatika">Teknik Informatika</option>
                    <option value="Sistem Informasi">Sistem Informasi</option>
                    <option value="PAI">PAI</option>
                    <option value="PIAUD">PIAUD</option>
                    <option value="Ilmu Pemerintahan">Ilmu Pemerintahan</option>
                    <option value="Adm. Publik">Adm. Publik</option>
                    <option value="Sosiologi">Sosiologi</option>
                </select>
            </div>

            <input type="submit" class="btn" name="update_data" value="update data">
            <a href="admin.php" class="btn">go back</a>


            </form>

            <?php }; ?>
       </div>

    </div>
    
</body>
</html>