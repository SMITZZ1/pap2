<?php
session_start();

require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: index.html");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="pt-PT">
        <head>
            <link rel="stylesheet" type="text/css" href="estilos.css">
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

            <script type="module">
            // Import the functions you need from the SDKs you need
            import { initializeApp } from "https://www.gstatic.com/firebasejs/9.6.4/firebase-app.js";
            import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.6.4/firebase-analytics.js";
            // TODO: Add SDKs for Firebase products that you want to use
            // https://firebase.google.com/docs/web/setup#available-libraries

            // Your web app's Firebase configuration
            // For Firebase JS SDK v7.20.0 and later, measurementId is optional
            const firebaseConfig = {
                apiKey: "AIzaSyDfHyVHi4gLHXrcBRgc8A6UWy6J3sx7Ep8",
                authDomain: "smitzz.firebaseapp.com",
                projectId: "smitzz",
                storageBucket: "smitzz.appspot.com",
                messagingSenderId: "347599012494",
                appId: "1:347599012494:web:2fd56c853d18f182c23fdf",
                measurementId: "G-71P8FR166P"
            };

            // Initialize Firebase
            const app = initializeApp(firebaseConfig);
            const analytics = getAnalytics(app);
            </script>

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
                        <a href="index.html" style="padding: 0px 0px 0px 0px; margin: 8px;"> <img src="Imagens/Pap-Smitzz.png" heigth="50" width="80"> </a>
                    </div>
                    <!-- Dropdown -->
                    <div class="dropdown">
                        <button class="dropbtn">Homem 
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content">
                            <a href="#">Sweat</a>
                            <a href="#">T-shirt</a>
                            <a href="homem.html">Ver tudo</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button class="dropbtn">Mulher 
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content">
                            <a href="#">Sweat</a>
                            <a href="#">T-shirt</a>
                            <a href="#">Ver tudo</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button class="dropbtn">Promoções 
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content">
                            <a href="#">Sweat</a>
                            <a href="#">T-shirt</a>
                            <a href="#">Ver tudo</a>
                        </div>
                    </div>
                    <a href="#"><i class="fa fa-fw fa-heart"></i> Favoritos</a>
                    <div class="headerrigth">
                        <a href="#"><i class="fa fa-fw fa-shopping-cart"></i> Carrinho</a>
                        <a href="login.html" title="Entrar / Registar"><i class="fa fa-fw fa-user"></i> Entrar / Registar</a>
                    </div>

                    <!-- Para quando estiver no mobile a navbar ficar responsiva -->
                    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="Menu_Mobile()">&#9776;</a>
                </div>
            </div>
            
            <div class="conteudo">
                <!-- Form para o login -->
                <div class="wrapper">
                    <h1>Login</h1>

                    <?php 
                    if(!empty($login_err)){
                        echo '<div class="alert alert-danger">' . $login_err . '</div>';
                    }        
                    ?>

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Username</label><br />
                            <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                            <span class="invalid-feedback"><?php echo $username_err; ?></span>
                        </div>    
                        <div class="form-group">
                            <label>Password</label><br />
                            <input style="background-color:#ffffff" type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                            <span class="invalid-feedback"><?php echo $password_err; ?></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="button1" value="Login">
                        </div>
                        <p>Ainda não tens conta? <a href="register.php" style="text-decoration:none">Registar-se.</a>.</p>
                    </form>
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
                            <a href="homem.html">Para Homem</a>
                            <a href="#">Para Mulher</a>
                            <a href="#">Promoções</a>
                        </div>

                        <div class="col-3" style="text-align: center;">
                            <h2>Apoio ao cliente</h2>
                            <a href="tel:+351930481196">+351 930 481 196</a>
                            <a href="mailto:gpsi194053@alunos.epb.pt">gpsi194053@alunos.epb.pt</a>
                        </div>

                        <div class="col-3" style="text-align: center;">
                            <h2>Informações</h2>
                            <a href="#">Termos e condições</a>
                            <a href="#">Livro de reclamações</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p style="text-align: center;">2021 &copy Stormi4u - Todos os direitos reservados.</p>
                            
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