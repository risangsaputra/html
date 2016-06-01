
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
unset($_SESSION['username']);
session_destroy();
?>
<script>
        swal({ 
      title: 'LOGOUT !!', type:'warning', timer: 700,   showConfirmButton: false
      },
      function(){
        window.location.href = 'login.php';
    });
    </script>
</body>
</html>
  
  





