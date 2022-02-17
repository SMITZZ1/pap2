<?php
require_once "config.php";
$link = mysqli_connect('localhost', 'gabrielcarvalho', 'Password123', 'stormi');

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validar user
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor insira o nome.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "O nome apenas contém letras, numeros, e underscores.";
    } else{
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            $param_username = trim($_POST["username"]);
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Nome inválido.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Erro.";
            }

            mysqli_stmt_close($stmt);
        }
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Insira a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "A password tem que ter pelo menos 6 letras.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Confirme a Password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "A password não coincide.";
        }
    }
    
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Codificar a pass
            
            if(mysqli_stmt_execute($stmt)){
                header("location: login.php");
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
            <link rel="stylesheet" type="text/css" href="register.css">
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
                        position: relative;
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
                
                }
            </style>

        <body>
        <?php // index.php
            require_once 'menu.php';
            echo '<p style="padding-top: 24px">';
        ?>
            
            <!-- Script para a navbar ficar responsiva -->
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

            <div>
                <!-- Form para o Registo -->
                <main class="login centrado">
                    <h2>Registe-se</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="input-field">
                            <label>Nome</label><br />
                            <input type="text" name="username" style="border-top:none; border-left:none; border-right:none; border-width: 1px;" class="form-control" <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                            <span class="invalid-feedback"><?php echo $username_err; ?></span>
                        </div>    
                        <div class="input-field">
                            <label>Palavra Passe</label><br />
                            <input type="password" style="border-top:none; border-left:none; border-right:none; border-width: 1px;" name="password" class="form-control" <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                            <span class="invalid-feedback"><?php echo $password_err; ?></span>
                        </div>
                        <div class="input-field">
                            <br />
                            <label>Confirmar Palavra Passe</label><br />
                            <input type="password" style="border-top:none; border-left:none; border-right:none; border-width: 1px;" name="confirm_password" class="form-control" <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                            <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                        </div>
                        <div class="input-field">
                            <input type="submit" value="Registar">
                            <input type="reset" class="button12" value="Cancelar">
                        </div>
                        <p>Já tem conta? <a href="login.php" style="text-decoration:none;">Dê login</a></p>
                </main>
                </div>

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
                            <a href="#">Tickets</a>
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
       </body>
</html>