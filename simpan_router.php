
<!DOCTYPE html>
<html>
<head>
	<title>ADD Router</title>
	<script src="admin/dist/js/sweetalert.min.js"></script> 
  <link rel="stylesheet" type="text/css" href="admin/dist/css/sweetalert.css">
</head>
<body>
<?php
	include 'koneksi.php';
	error_reporting(0);

$id_router		=$_POST['id_router'];
$lokasi			=$_POST['lokasi'];
$lat			=$_POST['lat'];
$lng			=$_POST['lng'];
$cabang			=$_POST['cabang'];
$ip				=$_POST['ip'];
$keterangan		=$_POST['keterangan'];





$sql=mysqli_query($konek,"INSERT INTO router (id_router,lokasi,lat,lng,cabang,ip,keterangan) VALUES 
				('','$lokasi','$lat','$lng','$cabang','$ip','$keterangan');");



if ($sql) { ?>
	<script>
        swal({ 
      title: 'Good job!', text: 'Add Router Success', type:'success', timer: 700,   showConfirmButton: false
      },
      function(){
        window.location.href = 'admin/index.php';
    });
    </script>
<?php }
else { ?>
	<script>
        swal({ 
      title: 'WOW !!!', text: 'GAGAL !!', type:'error', timer: 700,   showConfirmButton: false
      },
      function(){
        window.location.href = 'admin/tambah_router.php';
    });
    </script>
<?php }

?>
</body>
</html>