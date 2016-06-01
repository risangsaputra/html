<?php
session_start();
if (empty($_SESSION['username'])) {
  include "index.php";
}
else{ 
include '../koneksi.php';
$id_admin  =$_POST['id_admin'];
$nama		=$_POST['nama'];
$email	 	=$_POST['email'];
$username	=$_POST['username'];
$password	=$_POST['password'];
$password2	=$_POST['password2'];
$pengacak	="YENJAGTVOEOHW26R256V";



if ($password==$password2) {
	$password	= md5($pengacak . md5($password) . $pengacak);
	$sql_ubah="UPDATE admin SET
				nama       = '$nama',
    			email  		= '$email',
				username	= '$username',
				password	= '$password'
				
			  WHERE id_admin='$id_admin'";
mysqli_query($konek,$sql_ubah) 
or die("Perubahan gagal".mysqli_error());
echo "Data berhasil diubah";
header('location:http:index.php?act=profile');
}
{ ?>
<script language="javascript">
    window.alert('password tidak sama)');
    document.location="location:http:index.php?act=profile";
</script>

<?php } } ?>