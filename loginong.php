<?php
session_start();
?>
    <!DOCTYPE html>
    <link rel="shortcut icon" href="img/icon.png" />
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title> Human Help - Login ONGs/Instituições</title>
        <link href="css/style.css" rel="stylesheet">
        <link href="css/stilo.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
        <link rel="stylesheet" href="css/bootstrapmin.css">
        <style>
            .error,
            label.error {
                color: red;
                font-size: 15px;
            }
        </style>
    </head>

    <body>

        <header class="header-logarong">
            <div class="container">
                <input type="checkbox" id="chk">
                <label for="chk" class="show-menu-btn">
                    <i class="fas fa-bars"></i>
                </label>
                <ul class="menu">
                    <a href="index.html">Início</a>
                    <a href="sobre.html">Sobre</a>
                    <a href="voluntario.php">Voluntários</a>
                    <a href="ong.php" class="active">ONGs/Instituições</a>
                    <a href="suporte.php">Suporte</a>
                    <label for="chk" class="hide-menu-btn">
                        <i class="fas fa-times"></i>
                    </label>
                </ul>
                <div id="branding">
                    <a href="index.html"><img src="img/logotipotcc1.png" class="logo"></a>
                </div>
            </div>
            <section id="showcase">
                <div class="container">
                    <br>
                    <h1 class="text-1">ONG/Instituição, faça seu login agora!</h1>
                    <br><br>
                    <p class="text-1">Faça o login agora mesmo e encontre voluntários prontos para ajudar sua ONG/Instituição!</p>
                    <br><a href="ong.php" class="btn btn-info btn-lg">Cadastre-se</a>
                </div>
            </section>
        </header>

        <section id="boxes">
            <?php
            if (isset($_SESSION['login_erro'])) {
                echo '<b><div class="alert alert-danger" align="center" role="alert">EMAIL OU SENHA INVÁLIDOS! :(</div></b>';
            }
            unset($_SESSION['login_erro']);
        ?>
                <div class="container">
                    <div class="box">
                        <form id="logong" name="logong" method="post" onSubmit="return validarLogin(this);" action="logar_ong.php">
                            <div class="form-group">
                                <h2 id="topico">Faça seu login</h2>
                                <img src="img/loginong.png" class="image" title="Ongs">
                                <br>
                                <label id="emailo">E-mail</label>
                                <input type="text" class="form-control" id="emailo" name="emailo" placeholder="Digite seu email">
                            </div>
                            <div class="form-group">
                                <label id="senhao">Senha</label>
                                <input type="password" class="form-control" id="senhao" name="senhao" placeholder="Digite sua senha">
                            </div>
                            <a href="ong.php">ONG/Instituição, clique aqui para se cadastrar</a>
                            <br>
                            <br>

                            <input type="submit" id="logar" name="logar" class="btn btn-primary btn-block" value="Login">
                        </form>
                        <br>
                        <br>
                    </div>
                    
                    <br><br><br><br><br><br>

                    <div class="box">
                        <img src="img/voluntario.png" class="image" title="Ongs">
                        <h3 class="text-2">Voluntários</h3>
                        <p>Encontre locais para realizar trabalho voluntário perto de você, de forma prática, fácil e eficiente, além de fazer o bem, você estará ajudando quem precisa.</p>
                    </div>
                    <div class="box">
                        <img src="img/doação.png" class="image" title="Ongs">
                        <h3 class="text-2">Doações</h3>
                        <p>Localize os pontos de arrecadação mais próximos de você, sem sair de casa e garantindo a confiança nestes ambientes.
                        </p>
                    </div>
                </div>

                <footer>
                    <p class="one">Informações adicionais:</p>
                    <p><a href="sobre.html">Sobre o projeto</a></p>
                    <p>Acesse nossas redes sociais e fique por dentro.</p>
                    <p class="one">
                        <a href="https://twitter.com/humanhelpbr"><img src="img/twitter.png"></a>
                        <a href="https://instagram.com/humanhelpbr"><img src="img/instagram.png"></p>
                    </a>
                    <p>Equipe Human Help Copyright &copy; 2019</p>
                </footer>
        </section>

        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.validate.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#logong').validate({
                    rules: {
                        emailo: {
                            required: true,
                            email: true
                        },
                        senhao: {
                            required: true
                        },
                    },
                    messages: {
                        emailo: {
                            required: "O campo email é obrigatório.",
                            email: "O campo email deve conter um email válido."
                        },
                        senhao: {
                            required: "O campo senha é obrigatório."
                        },
                    }
                });
            });
        </script>
    </body>

    </html>