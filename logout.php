<?php 
// Inicia e destrói sessões
session_start(); 
session_destroy(); 

header("Location: login.php"); 
?>
