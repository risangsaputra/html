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
	$id_router		=$_POST['id_router'];
	$lokasi			=$_POST['lokasi'];
	$lat			=$_POST['lat'];
	$lng			=$_POST['lng'];
	$cabang			=$_POST['cabang'];
	$ip				=$_POST['ip'];
	$keterangan		=$_POST['keterangan'];


	$sql_ubah=mysqli_query($konek,"UPDATE router SET 
			lokasi	='$lokasi',
			lat		='$lat',
			lng 	='$lng',
			cabang	='$cabang',
			ip 		='$ip',
			keterangan='$keterangan'

			WHERE id_router = '$id_router'");
  

if ($sql_ubah) { ?>
	
	<script>
        swal({ 
      title: 'Good job!', text: 'Edit Router Success', type:'success', timer: 700,   showConfirmButton: false
      },
      function(){
        window.location.href = 'index.php';
    });
    </script>
 <?php }
else { ?>
	
	<script>
        swal({ 
      title: 'WOW !!!', text: 'GAGAL !!', type:'error', timer: 700,   showConfirmButton: false
      },
      function(){
        window.location.href = 'edit_router.php';
    });
    </script>
 <?php }

?>

</body>
</html>
<?php 
}
 ?>