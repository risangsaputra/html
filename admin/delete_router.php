<?php

if (empty($_SESSION['username'])) {
	include "index.php";
}
else{
	include '../koneksi.php';
	$id=$_GET['id_router'];
	if (empty($id)){
		echo "Data belum dipilih";
	}
	else{
		$sql="DELETE from router WHERE id_router='$id'";
		mysqli_query($konek,$sql)
		or die("Gagal perintah menghapus".mysqli_error());
		echo "<script>
		swal({ 
	  title: 'Deleted!', text: 'Your file has been deleted.', type:'success', timer: 1000,   showConfirmButton: false
	  },
	  function(){
	    window.location.href = 'index.php?act=dashboard';
	});
			</script>";
		
	}
}
?>
