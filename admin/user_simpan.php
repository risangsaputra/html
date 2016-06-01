<?php
session_start();
if (empty($_SESSION['username'])) {
  include "index.php";
}
else{ 
include '../koneksi.php';
$id_admin 	=$_POST['id_admin'];
$nama		=$_POST['nama'];
$username	=$_POST['username'];
$password	=$_POST['password'];
$password2	=$_POST['password2'];
$email		=$_POST['email'];
$gambar		=$_POST['gambar'];
$level		=$_POST['level'];
$pengacak	="YENJAGTVOEOHW26R256V";

$uploaddir = "gambar/";
$fileName   = $_FILES['gambar']['name'];
$uploadfile = $uploaddir.$fileName;
$tmpName    = $_FILES['gambar']['tmp_name'];
$size       = $_FILES['gambar']['size'];
$type       = $_FILES['gambar']['type'];
$error      = $_FILES['gambar']['error'];

if ($password==$password2) {
	# code...


	//mendeskripsi password dengan md5 dan pengacak
	$password	= md5($pengacak . md5($password) . $pengacak);

	$sql=mysqli_query($konek,"INSERT INTO admin (id_admin,nama,email,username,password,gambar,level) VALUES
					('','$nama','$email','$username','$password','$fileName','0');");

	if (move_uploaded_file($_FILES['gambar']['tmp_name'], $uploadfile) && $sql) {
	    echo "Berhasil";
	    header('location:http:index.php?act=data_user');
	}
	else{
		echo "gagal";
	}
}
else{
	echo "password tidak sama";
}
}
?>