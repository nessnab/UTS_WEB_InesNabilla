<?php
session_start();
include_once 'config.php';
// include_once 'admin.php';

$nim = $_GET['edit'];


// $nim = "";
// $nm_mhs = "";
// $alamat = "";
// $telp = "";
// $agama = "";
// $jurusan = "";
// $nilai = "";

// // $id = 0;
$edit_state = false;
// if (isset($_POST['add_nilai'])) {
// 	// $nim = $_POST['nim'];
// 	// $nm_mhs = $_POST['nm_mhs'];
// 	// $alamat = $_POST['alamat'];
// 	// $telp = $_POST['telp'];
// 	// $agama = $_POST['agama'];
// 	// $jurusan = $_POST['jurusan'];
// 	$nilai = $_POST['nilai'];
// //  $sql = "INSERT INTO sistem_akademik (nim, nm_mhs, alamat, telp, agama, jurusan, nilai) VALUES ('$nim','$nm_mhs','$alamat', '$telp' '$agama', '$jurusan','$nilai')";
 
//  $insert = "INSERT INTO sistem_akademik (nilai) VALUES ('$nilai') WHERE nim=$nim";
 
// //  if (mysqli_query($conn, $insert)) {
// //  	$_SESSION['message'] = "Data Saved Successfully";
// // 		header("Location: dosen.php");
// // 	 } else {
// // 		mysqli_close($conn);
// // 	 }

// }
// For updating records
if (isset($_POST['add_nilai'])) {
	$nim = $_POST['nim'];
	// $nm_mhs = $_POST['nm_mhs'];
	// $alamat = $_POST['alamat'];
	// $telp = $_POST['telp'];
	// $agama = $_POST['agama'];
	// $jurusan = $_POST['jurusan'];
	$nilai = $_POST['nilai'];

	$update_data = "UPDATE sistem_akademik SET nilai='$nilai' WHERE nim = '$nim'";
	$upload = mysqli_query($conn, $update_data);

	if ($upload) {
    header('location:dosen.php');
    exit;
	} else {
    echo "Error: " . mysqli_error($conn);
	}


	// $update_data = "UPDATE sistem_akademik SET nim='$nim' nilai='$nilai' WHERE nim = $nim ";
	// $upload = mysqli_query($conn,$update_data);
	// var_dump($upload);
	// if($upload){
	// 	header('location:dosen.php');
	// 	exit;
	// }else{
	// 	echo "Error: " . mysqli_error($conn);
	
	// }
	
// if(empty($nilai)){
// 	// $message[] = 'please fill out nilai';
// }else{
// 	echo "ERRRRRORRR";
// }

}
// For deleteing records
// if (isset($_GET['delete'])) {
// 	$nim = $_GET['delete'];
// 	mysqli_query($conn, "DELETE FROM data WHERE nim=$nim");
// 	$_SESSION['message'] = "Data Deleted Successfully";
// 	header('location:dosen.php');
// }




?>