<?php

error_reporting(E_ALL);
ini_set('display_errors', true);

@include 'config.php';

if(isset($_POST['add_data'])){

    $nim = $_POST['nim'];
    $nm_mhs = $_POST['nm_mhs'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $agama = $_POST['agama'];
    $jurusan = $_POST['jurusan'];
    

    if(empty($nim) || empty($nm_mhs) || empty($alamat) || empty($telp) || empty($agama) || empty($jurusan) ){
        $message[] = 'please fill out all data';
    }else{

    // When adding data in admin.php
    $insert = "INSERT INTO sistem_akademik (nim, nm_mhs, alamat, telp, agama, jurusan) VALUES ('$nim', '$nm_mhs', '$alamat', '$telp', '$agama', '$jurusan')";
        $upload = mysqli_query($conn,$insert);
        if($upload){
            $message[] = 'Your Data Added Succesfully!';
        }else{
            $message[] = 'Failed to Add Your Data'. mysqli_error($conn);

        }
    }

};

if(isset($_GET['delete'])){
    $nim = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM sistem_akademik WHERE nim = $nim");
    header('location:admin.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="style.css">
    <title>Sistem Akademik Universitas Primagraha by Ines Nabilla</title>
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
    <div class="chart">
        <canvas id="myChart" style = "height:40vh; width:20vw; margin:auto;"></canvas>

    </div>
       <div class="form-container">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
            <h3>Sistem Akademik Universitas Primagraha</h3>
            
            <div class="box">
                <label for="nim">NIM</label>
                <input type="number" placeholder="masukkan NIM" name="nim" required>
                
            </div>

            <div class="box">
                <label for="nm_mhs">Nama Lengkap</label>
                <input type="text" placeholder="Masukkan Nama Lengkap" name="nm_mhs" required>

            </div>
            
            <div class="box">
                <label for="alamat">Alamat</label>
                <textarea required name="alamat" placeholder="Masukkan Alamat"  required></textarea>

            </div>
            
            <div class="box">
                <label for="telp">Nomor Telepon</label>
                <input type="number" placeholder="Masukkan Nomor telepon" name="telp" required>

            </div>

            <div class="box">
                <label for="agama">Agama</label>
                <select name="agama" id="dropdown" required>
                    <option value="">Pilih Agama</option>
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

            <input type="submit" class="btn" name="add_data" value="add data">


            </form>
       </div>

       <?php
       
       $select = mysqli_query($conn, "SELECT * FROM sistem_akademik");

       ?>

       <div class="table-display">

       <table class="data-display">

            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama Lengkap</th>
                    <th>Nomor Telepon</th>
                    <th>Jurusan</th>
                    <th>Alamat</th>
                    <th>Agama</th>
                    <th></th>
                </tr>
            </thead>

            <?php while($row = mysqli_fetch_assoc($select)){  ?>

                <tr>
                    <td><?php echo $row['nim']; ?></td>
                    <td><?php echo $row['nm_mhs']; ?></td>
                    <td><?php echo $row['telp']; ?></td>
                    <td><?php echo $row['jurusan']; ?></td>
                    <td><?php echo $row['alamat']; ?></td>
                    <td><?php echo $row['agama']; ?></td>
                    <td>
                        <a href="data_update.php?edit=<?php echo $row['nim']; ?>" class="btn">edit </a>
                        <a href="admin.php?delete=<?php echo $row['nim']; ?>" class="btn">delete </a>
                    </td>
                </tr>
                
                <?php }; ?>
                
            </table>
            
        </div>
        
        <a href="index.php?logout" class="btn logout">Log Out </a>
    </div>
    
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js" integrity="sha512-KxH9hSzji+Js5Zdd6R9Fke/2R1dd7g9C+uqc2qgt7I3CwAYz4d5Ahhdp5gQ67KdpAsj/4lCp6iBR2ugGcfT7eg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

   
<!-- first -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js" integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

    <script>
        const data = {
            labels: [
                'Sistem Informasi',
                'Manajemen',
                'Hukum'
            ],
            datasets: [{
                // label: 'My First Dataset',
                data: [
                    <?php
                    $qry = $conn->query("SELECT jurusan FROM sistem_akademik WHERE jurusan='sistem Informasi'");
                    $resF = $qry->num_rows;
                    echo $resF;
                    ?>, 
                    <?php
                    $qry = $conn->query("SELECT jurusan FROM sistem_akademik WHERE jurusan='manajemen'");
                    $resF = $qry->num_rows;
                    echo $resF;
                    ?>, 
                    <?php
                    $qry = $conn->query("SELECT jurusan FROM sistem_akademik WHERE jurusan='hukum'");
                    $resF = $qry->num_rows;
                    echo $resF;
                    ?>
                    
                ],
                backgroundColor: [
                '#ff2770',
                '#45f3ff',
                'rgb(255, 205, 86)'
                ],
                hoverOffset: 4
            }]
        };
        Chart.defaults.color = '#fff';
        const config = {
            type: 'pie',
            data: data,
        };
        const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );

    </script>

</body>
</html>
