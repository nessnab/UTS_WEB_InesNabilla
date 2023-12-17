<?php

error_reporting(E_ALL);
ini_set('display_errors', true);

@include 'config.php';



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   


   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <link rel="stylesheet" href="style.css">
    <title>Data Mahasiswa by Ines Nabilla</title>
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

       <?php
       
       $select = mysqli_query($conn, "SELECT * FROM sistem_akademik");

       ?>

       <div class="table-display">
       <h3>Data Mahasiswa</h3>

       <table class="data-display">

       <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama Lengkap</th>
                    <th>Nomor Telepon</th>
                    <th>Jurusan</th>
                    <th>Alamat</th>
                    <th>Agama</th>
                    <th>Nilai</th>
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
                    <td><?php echo $row['nilai']; ?></td>
                    <!-- <td>
                        <a href="data_update.php?edit=<?php echo $row['nim']; ?>" class="btn">edit </a>
                        <a href="admin.php?delete=<?php echo $row['nim']; ?>" class="btn">delete </a>
                    </td> -->
                </tr>
                
                <?php }; ?>

       </table>
       
    </div>
    
    <a href="index.php?logout" class="btn logout">Log Out </a>
    </div>
</body>
</html>
