<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'gabrielcarvalho');
define('DB_PASSWORD', 'Password123');
define('DB_NAME', 'stormi');
 
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// verifica a conecção
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>