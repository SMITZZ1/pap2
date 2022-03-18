<?php // header.php
  session_start();

  if (isset($_SESSION['username']))
  {
    $utilizador     = $_SESSION['username'];
    $loggedin = TRUE;
  }
  else $loggedin = FALSE;
echo <<<_MAIN
<div class="row">
<div class="topnav" id="myTopnav">
    <div class="logo">
        <a href="index.php" style="padding: 0px 0px 0px 0px; margin: 8px 8px 2px 8px; height: 38px;"> <img src="imagens/Pap-Smitzz.png" heigth="50" width="80"> </a>
    </div>
    <!-- Dropdown -->
    <div class="dropdown">
        <button class="dropbtn">Homem 
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="#">Sweat</a>
            <a href="#">T-shirt</a>
            <div class="dropdown-content1">
                <a href="homem.php">Ver tudo</a>
            </div>
            
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn">Mulher 
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="#">Sweat</a>
            <a href="#">T-shirt</a>
            <div class="dropdown-content1">
                <a href="mulher.php">Ver tudo</a>
            </div>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn">Promoções 
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="#">Sweat</a>
            <a href="#">T-shirt</a>
            <div class="dropdown-content1">
                <a href="#">Ver tudo</a>
            </div>
        </div>
    </div>
    <a href="#"><i class="fa fa-fw fa-heart"></i> Favoritos</a>
    <div class="headerrigth">
        <a href="#"><i class="fa fa-fw fa-shopping-cart"></i> Carrinho</a>
        <a href="login.php" title="Entrar / Registar"><i class="fa fa-fw fa-user"></i> Entrar / Registar</a>
    </div>

    <!-- Para quando estiver no mobile a navbar ficar responsiva -->
    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="Menu_Mobile()">&#9776;</a>
</div>
</div>
_MAIN;
  if ($loggedin)
  {
	  // se estiver registado
echo <<<_REGISTADO
<div class="row">
<div class="topnav" id="myTopnav">
    <div class="logo">
        <a href="index.php" style="padding: 0px 0px 0px 0px; margin: 8px 8px 2px 8px; height: 38px;"> <img src="imagens/Pap-Smitzz.png" heigth="50" width="80"> </a>
    </div>
    <!-- Dropdown -->
    <div class="dropdown">
        <button class="dropbtn">Homem 
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="#">Sweat</a>
            <a href="#">T-shirt</a>
            <div class="dropdown-content1">
                <a href="homem.php">Ver tudo</a>
            </div>
            
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn">Mulher 
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="#">Sweat</a>
            <a href="#">T-shirt</a>
            <div class="dropdown-content1">
                <a href="mulher.php">Ver tudo</a>
            </div>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn">Promoções 
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content" style="min-width: 90px;">
            <a href="#">Sweat</a>
            <a href="#">T-shirt</a>
            <div class="dropdown-content1">
                <a href="#">Ver tudo</a>
            </div>
        </div>
    </div>
    <a href="#"><i class="fa fa-fw fa-heart"></i> Favoritos</a>
    <div class="headerrigth">
        <a href="#"><i class="fa fa-fw fa-shopping-cart"></i> Carrinho</a>

        <div class="dropdown" style="padding-right: 5px">
        <button class="dropbtn ">Perfil 
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            
            <a href="perfil.php">Perfil</a>
            <div class="dropdown-content1">
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </div>
        <!--<a href="perfil.php" title="Perfil"><i class="fa fa-fw fa-user"></i> Perfil</a>-->
    </div>

    <!-- Para quando estiver no mobile a navbar ficar responsiva -->
    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="Menu_Mobile()">&#9776;</a>
</div>
</div>
_REGISTADO;
  }
  else{
	  // se não estiver registado
  }
  ?>

         