<!DOCTYPE html>
<html>
  <head>
    <title></title>
  <script src="dist/js/sweetalert.min.js"></script> 
  <link rel="stylesheet" type="text/css" href="dist/css/sweetalert.css">
  </head>
<body>
<?php

session_start();
$username = $_POST['username'];
$password = $_POST['password'];
include "../koneksi.php";

$query  = "SELECT * FROM admin WHERE username = '$username'";
$hasil  = mysqli_query($konek, $query) or die ("Error");
$data   = mysqli_fetch_array($hasil);
$pengacak   = "YENJAGTVOEOHW26R256V";

if(md5($pengacak.md5($password).$pengacak)==$data['password'])
{

    $_SESSION['username'] = $username ;

    ?>
    <script>
        swal({ 
      title: 'Good job!', text: 'Login Sukses', type:'success', timer: 700,   showConfirmButton: false
      },
      function(){
        window.location.href = 'index.php';
    });
    </script>
    <?php
  
}
else {?>
    <script>
        swal({ 
      title: 'WOW !!!', text: 'Username Atau Password Salah !!', type:'error', timer: 700,   showConfirmButton: false
      },
      function(){
        window.location.href = 'login.php';
    });
    </script>
<?php
}
?>
</body>
</html>
  
  

