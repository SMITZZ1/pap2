<!DOCTYPE html>
<html lang="pt-PT">
        <head>
            <!-- Bibliotecas extras -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
            <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
            <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
            <script src="Script.js"></script>

            <!-- Para o tipo de letra -->
            <link href='https://fonts.googleapis.com/css?family=Andika New Basic' rel='stylesheet'>
            <link rel="stylesheet" type="text/css" href="login.css">

            <title>Stormi4u</title>
            
            <!-- Devidos metas para o website -->
            <meta charset="UTF-8">
            <meta name="Description" content="Loja de roupa">
            <meta name="keywords" content="roupa stormi stormi4u">
            <meta name="author" content="Gabriel Carvalho">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="icon" href="imagens/logo.png">

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
                    .wrapper{ 
                        width: 100%; 
                        padding: 20px; 
                    }
                }
            </style>
        </head>

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

        <main class="login centrado">
            <h2>Contactos</h2>
            <form action="https://formspree.io/f/mzbogkvp" method="POST">
                <div class="input-field">
                    <label>Seu email:</label><br />
                    <input type="email" style="border-top:none; border-left:none; border-right:none; border-width: 1px;" name="Email" class="form-control">
                    <span class="invalid-feedback"></span>
                </div>    

                <div class="input-field">
                    <label>Assunto:</label><br />
                    <input type="text" style="border-top:none; border-left:none; border-right:none; border-width: 1px;" name="Assunto" class="form-control">
                    <span class="invalid-feedback"></span>
                </div><br />

                <div class="input-field">
                    <label>Mensagem:</label><br />
                    <textarea  type="text" style="resize: vertical;  border-width: 1px; width: 100%; height: 5vw" name="Mensagem" class="form-control"></textarea>
                    <span class="invalid-feedback"></span>
                </div>

                <div class="input-field">
                    <input type="submit" value="Enviar">
                </div>
            </form>
        </main>

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
                <div class="footer">
                    <div class="row">
                        <div class="col-3" style="text-align: center;">
                            <h2>Stormi4u</h2>
                            <a href="contactos.php">Contactos</a>
                            <a href="sobre.php">Sobre nós</a>
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
       </body>
</html>