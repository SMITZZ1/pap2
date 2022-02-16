<?php // logout.php
  require_once 'menu.php';

  if (isset($_SESSION['username']))
  {
    destroiSessao();    
  }
?>
<?php 
    header ("location: login.php"); 
?>