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
            <link rel="stylesheet" type="text/css" href="estilos.css">

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
                    .infos4{
                        border-right: 0px;
                        margin-left: 10px;
                        margin-right: 10px;
                        border-top-style: solid;
                        border-top-width: 1px;
                        border-top-color: #000000;
                        height: 70%;
                        position: relative;
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
            
            <div>
                <!-- Foto para o background -->
                <div class="row">
                    <div class="backhome">
                        &nbsp
                    </div>
                </div>

                <div class="row">
                    <div class="col-12" style="text-align: center;">
                        <h2>As nossas recomendações</h2>
                    </div>

                    <div class="col-3 " style="text-align: center;">
                        <img src="imagens/Recomendacao_1.jpg" height="200px" width="200px"><br />
                        <span><b>Hoodie | Tommy hilfiger</b></span><br />
                        <span>120€</span>
                    </div>

                    <div class="col-3" style="text-align: center;">
                        <img src="imagens/Recomendacao_2.jpg" height="200px" width="200px"><br />
                        <span><b>Sweat | Fred Perry</b></span><br />
                        <span>140€</span>
                    </div>

                    <div class="col-3" style="text-align: center;">
                        <img src="imagens/Recomendacao_3.jpg" height="200px" width="200px"><br />
                        <span><b>Hoodie | Calvin Klein</b></span><br />
                        <span>150€</span>
                    </div>

                    <div class="col-3" style="text-align: center;">
                        <img src="imagens/Recomendacao_4.jpg" height="200px" width="200px"><br />
                        <span><b>Polo | Lacoste</b></span><br />
                        <span>90€</span>
                    </div>
                </div><br /><br />

                <div class="row">
                    <div class="col-12" style="text-align: center;">
                        <h2>Novas coleções</h2>
                    </div>

                    <div class="col-3 " style="text-align: center;">
                        <img src="imagens/Colecao_1.jpg" height="200px" width="220px"><br />
                        <span><b>Casaco | The North Face</b></span><br />
                        <span>280€</span>
                    </div>

                    <div class="col-3 " style="text-align: center;">
                        <img src="imagens/Colecao_2.jpg" height="200px" width="175px"><br />
                        <span><b>Sweat | Adidas</b></span><br />
                        <span>61.50€</span>
                    </div>

                    <div class="col-3 " style="text-align: center;">
                        <img src="imagens/Colecao_3.jpg" height="200px" width="180px"><br />
                        <span><b>Calças | Adidas</b></span><br />
                        <span>49.50€</span>
                    </div>

                    <div class="col-3 " style="text-align: center;">
                        <img src="imagens/Recomendacao_1.jpg" height="200px" width="200px"><br />
                        <span><b>Hoodie | Tommy hilfiger</b></span><br />
                        <span>120€</span>
                    </div>
                </div><br /><br />

                <div class="row">
                    <div class="col-3 infos4" style="text-align: center;">
                        <h3><i class="fa fa-fw fa-lock"></i> Pagamentos Seguros</h3>
                    </div>

                    <div class="col-3 infos4" style="text-align: center;">
                        <h3><i class="fa fa-fw fa-cart-plus"></i> Entrega gratuita para portugal</h3>
                    </div>

                    <div class="col-3 infos4" style="text-align: center;">
                        <h3><i class="fa fa-fw fa-shopping-cart"></i> Devoluções</h3>
                    </div>

                    <div class="col-3 infos4" style="text-align: center; border-right: 0px;">
                        <h3><i class="fa fa-fw fa-phone"></i> Apoio ao cliente</h3>
                    </div>
                </div><br />

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
       </body>
</html>