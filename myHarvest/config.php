
<?php 

$db = new mysqli('127.0.0.1', 'admin', 'password', 'myHarvest');

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}
?>

 <?php
    define('DB_SERVER', '127.0.0.1');
   define('DB_USERNAME', 'admin');
   define('DB_PASSWORD', 'password');
    define('DB_DATABASE', 'myHarvest');
 ?>
