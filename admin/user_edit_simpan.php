 <?php
session_start();
if (empty($_SESSION['username'])) {
  include "index.php";
}
else{ 
	include '../koneksi.php';
	error_reporting(0);
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Router</title>
	<script src="dist/js/sweetalert.min.js"></script> 
  <link rel="stylesheet" type="text/css" href="dist/css/sweetalert.css">
</head>
<body>
<?php
	$id_admin  =$_POST['id_admin'];
	$nama		=$_POST['nama'];
	$email	 	=$_POST['email'];
	$username	=$_POST['username'];
	$level		=$_POST['level'];
	$password	=$_POST['password'];
	$password2	=$_POST['password2'];
	$pengacak	="YENJAGTVOEOHW26R256V";


	if ($password==$password2) {
	$password	= md5($pengacak . md5($password) . $pengacak);
	$sql_ubah="UPDATE admin SET
				nama       = '$nama',
    			email  		= '$email',
				username	= '$username',
				password	= '$password',
				level 		= '$level'
				
			  WHERE id_admin='$id_admin'";
	mysqli_query($konek,$sql_ubah);
}
else{
	echo "<script>
        swal({ 
      title: 'WRONG !!!', text: 'Password tidak sama', type:'error', timer: 700,   showConfirmButton: false
      },
      function(){
        window.location.href = 'user_edit.php';
    });
    </script>";
}


if ($sql_ubah) { ?>
	
	<script>
        swal({ 
      title: 'Good job!', text: 'Edit User Success', type:'success', timer: 700,   showConfirmButton: false
      },
      function(){
        window.location.href = 'index.php?act=data_user';
    });
    </script>
 <?php }
else { ?>
	
	<script>
        swal({ 
      title: 'WOW !!!', text: 'GAGAL !! Password tidak sama', type:'error', timer: 700,   showConfirmButton: false
      },
      function(){
        window.location.href = 'index.php?act=data_user';
    });
    </script>
 <?php }

?>

</body>
</html>
<?php 
}
 ?>