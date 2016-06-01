<?php 
$oldPicture="pa.txt";
if (file_exists($oldPicture)) {

var_dump($oldPicture);

// last resort setting
// chmod($oldPicture, 0777);
chmod($oldPicture, 0777);
    unlink($oldPicture);
    echo 'Deleted old image';
} 
else {
    echo 'Image file does not exist';
}
 ?>