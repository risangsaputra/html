

<?php

 
$dbhost = 'localhost'; 
$dbuser = 'root';     
$dbpass = 'root';         
$dbname = 'monitoring2';

$konek = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
 

if ($konek->connect_error) {
  
   die('Maaf koneksi gagal: '. $konek->connect_error);
}


?>
