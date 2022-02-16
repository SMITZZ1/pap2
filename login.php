<?php
session_start();

require_once "config.php";
 
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Submeter os dados na db
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["username"]))){
        $username_err = "Insira o nome.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Insira a Password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validar
    if(empty($username_err) && empty($password_err)){
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = $username;
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            session_start();
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // CASO ESTEJA OS DADOS TODOS BEM
                            header("location: index.php");
                        } else{
                            $login_err = "Nome ou password inválida.";
                        }
                    }
                } else{
                    $login_err = "Nome ou password inválida.";
                }
            } else{
                echo "Erro.";
            }

            mysqli_stmt_close($stmt);
        }
    }
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="pt-PT">
        <head>
            <link rel="stylesheet" type="text/css" href="login.css">
            <!-- Bibliotecas extras -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
            <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
            <!-- Para o tipo de letra -->
            <link href='https://fonts.googleapis.com/css?family=Andika New Basic' rel='stylesheet'>

            <title>Stormi4u</title>
            
            <!-- Devidos metas para o website -->
            <meta charset="UTF-8">
            <meta name="Description" content="Loja de roupa">
            <meta name="keywords" content="roupa stormi stormi4u">
            <meta name="author" content="Gabriel Carvalho">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="icon" href="Imagens/logo.png">

            <style>

                @media screen and (max-width: 600px) {
                    .topnav a:not(:first-child), .dropdown .dropbtn {
                        display: none;
                    }
                    .headerrigth a{
                        display: none;
                    }
                    .topnav a.icon {
                        float: right;
                        display: block;
                    }
                    
                }

                @media screen and (max-width: 600px) {
                    .topnav.responsive {position: fixed;}
                    .topnav.responsive .icon {
                        position: absolute;
                        right: 0;
                        top: 0;
                    }
                    .topnav.responsive a {
                        float: none;
                        display: block;
                        text-align: left;
                    }
                    
                    .topnav.responsive .dropdown {float: none;}
                    .topnav.responsive .dropdown-content {position: relative;}
                    .topnav.responsive .dropdown .dropbtn {
                        display: block;
                        width: 100%;
                        text-align: left;
                    }
                    
                    .headerrigth{
                        position: relative;
                        display: block;
                        width: 100%;
                        float: none;
                    }
                    .wrapper{ 
                        width: 100%; 
                        padding: 20px; 
                    }
                }
            </style>

        <body>
        <div class="row">
                <div class="topnav" id="myTopnav">
                    <div class="logo">
                        <a href="index.php" style="padding: 0px 0px 0px 0px; margin: 8px 8px 2px 8px; height: 38px;"> <img src="Imagens/Pap-Smitzz.png" heigth="50" width="80"> </a>
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
            
            <div class="conteudo">
                <!-- Form para o login -->
                <main class="login centrado">
                    <h2>Login</h2>
                    <?php 
                    if(!empty($login_err)){
                        echo '<div class="alert alert-danger">' . $login_err . '</div>';
                    }        
                    ?>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="input-field">
                            <label>Nome</label><br />
                            <input type="text" style="border-top:none; border-left:none; border-right:none; border-width: 1px;" name="username" placeholder="Insira o seu nome" class="form-control" <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                            <span class="invalid-feedback"><?php echo $username_err; ?></span>
                        </div>    
                        <div class="input-field">
                            <label>Palavra passe</label><br />
                            <input type="password" style="border-top:none; border-left:none; border-right:none; border-width: 1px;" name="password" placeholder="Insira a palavra passe" class="form-control" <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                            <span class="invalid-feedback"><?php echo $password_err; ?></span>
                        </div>
                        <div class="input-field">
                            <input type="submit" value="Login">
                        </div>
                        <p>Ainda não possui conta? <a href="register.php" style="text-decoration:none">Clique aqui</a></p>
                    </form>
                </main>


                <div class="footer">
                    <div class="row">
                        <div class="col-3" style="text-align: center;">
                            <h2>Stormi4u</h2>
                            <a href="#">Contactos</a>
                            <a href="#">Sobre nós</a>
                        </div>

                        <div class="col-3" style="text-align: center;">
                            <h2>Comprar</h2>
                            <a href="homem.php">Para Homem</a>
                            <a href="mulher.php">Para Mulher</a>
                            <a href="#">Promoções</a>
                        </div>

                        <div class="col-3" style="text-align: center;">
                            <h2>Apoio ao cliente</h2>
                            <a href="tel:+351930481196">+351 930 481 196</a>
                            <a href="mailto:gpsi194053@alunos.epb.pt">gpsi194053@alunos.epb.pt</a>
                        </div>

                        <div class="col-3" style="text-align: center;">
                            <h2>Informações</h2>
                            <a href="termos.php">Termos e condições</a>
                            <a href="https://www.livroreclamacoes.pt/Inicio/" target="_blank">Livro de reclamações</a>
                        </div>
                    </div>

                    <script>
                        window.onload = function()
                        {
                            document.getElementById("ano").innerHTML = new Date().getFullYear();
                        }
                    </script>

                    <div class="row">
                        <div class="col-12">
                            <p style="text-align: center;"><span id="ano"></span> &copy Stormi4u - Todos os direitos reservados.</p> 
                        </div>
                    </div>
                </div>
            </div>
            
            <script>
                function Menu_Mobile() {
                    var x = document.getElementById("myTopnav");
                    if (x.className === "topnav") {
                        x.className += " responsive";
                    } else {
                        x.className = "topnav";
                    }
                }
            </script>
       </body>
</html>