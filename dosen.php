<?php
session_start();

@include 'process_nilai.php';
@include 'config.php';

// $nim = $_GET['edit'];


if (isset($_POST['edit_nilai'])) {
    $edit_state = true;
    
    $record = mysqli_query($conn, "SELECT * FROM sistem_akademik WHERE nim=$nim");
    $sistem_akademik = mysqli_fetch_array($record);
    $nim = $sistem_akademik['nim'];
    $nm_mhs = $sistem_akademik['nm_mhs'];
    $alamat = $sistem_akademik['alamat'];
    $telp = $sistem_akademik['telp'];
    $agama = $sistem_akademik['agama'];
    $jurusan = $sistem_akademik['jurusan'];
    $nilai = $sistem_akademik['nilai'];
    
}
$nilai = isset($_POST['nilai']) ? floatval($_POST['nilai']) : null;

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
       <div class="form-container">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                <h3>Nilai Mahasiswa</h3>

                <div class="box">
                <label for="nim">NIM</label>
                <input type="number" placeholder="Enter your NIM" name="nim" required>
                
            </div>

                <div class="box">
                    <label for="nilai">Enter Nilai</label>
                    <input type="text" placeholder="Masukkan Nilai" name="nilai" required>
                </div>

                <?php if ($edit_state == false): ?>

                <input type="submit" class="btn" name="add_nilai" value="Add Nilai">
                <?php else: ?>
                <!-- <input type="submit" class="btn" name="edit_nilai" value="Edit Nilai"> -->
                <?php endif ?>
            </form>
       </div>

       <?php
    //    $select = mysqli_query($conn, "SELECT * FROM sistem_akademik");
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
                        <th>Nilai IPK</th>
                        <th></th>
            
                    </tr>
                </thead>

                <?php 
                    $result = mysqli_query($conn, "SELECT * FROM sistem_akademik");
                    
                    while ($row = mysqli_fetch_assoc($result)) {  ?>
                    <tr>
                        <!-- Table data -->
                        
                        <td><?php echo $row['nim']; ?></td>
                        <td><?php echo $row['nm_mhs']; ?></td>
                        <td><?php echo $row['telp']; ?></td>
                        <td><?php echo $row['jurusan']; ?></td>
                        <td><?php echo $row['alamat']; ?></td>
                        <td><?php echo $row['agama']; ?></td>
                        <td><?php echo $row['nilai']; ?></td>
                        <td>
                              <!-- Dosen actions -->
                                <!-- <a href="dosen.php?edit=<?php echo $row['nim']; ?>" class="btn" >Add Nilai</a> -->
                                <!-- <a href="process_nilai.php?delete=<?php echo $row['nim']; ?>" class="btn">Delete Nilai</a> -->
                            <?php } ?>
                        </td>
                    </tr>
            </table>
        </div>
        
        <a href="index.php?logout" class="btn logout">Log Out </a>
    </div>
</body>
</html>
