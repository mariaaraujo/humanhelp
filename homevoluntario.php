<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
require_once('banco.inc');
require_once('checa_voluntario.php');

$voluntario = $_SESSION['codigo_voluntario'];

$home = $con->query("SELECT v.nm_voluntario, e.nm_cidade, e.nm_estado FROM tb_voluntario as v
join tb_endereco as e
on e.cd_endereco = v.cd_endereco
WHERE v.cd_voluntario = '$voluntario'");
$home = $home->fetch_all();

$con->close();
?>
<!DOCTYPE html>
<link rel="shortcut icon" href="img/icon.png" />
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title> Human Help - portal do voluntariado </title>
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <link rel="stylesheet" href="css/bootstrapmin.css">
</head>

<body>

    <header class="header-vol">
    <?php
            if (isset($_SESSION['editar_sucesso'])) {
                echo '<b><div class="alert alert-success" align="center" role="alert">Dados alterados com sucesso! :)</div></b>';
            }
            unset($_SESSION['editar_sucesso']);

            if (isset($_SESSION['editar_erro'])) {
                echo '<b><div class="alert alert-danger" align="center" role="alert">Os dados não puderam ser alterados com sucesso! :(</div></b>';
            }
            unset($_SESSION['editar_erro']);
            
            if (isset($_SESSION['candidatura_sucesso'])) {
                echo '<b><div class="alert alert-success" align="center" role="alert">Candidatado com sucesso! :)</div></b>';
            }
            unset($_SESSION['candidatura_sucesso']);

            if (isset($_SESSION['candidatura_erro'])) {
                echo '<b><div class="alert alert-danger" align="center" role="alert">Não foi possível candidatar-se a vaga! :(</div></b>';
            }
            unset($_SESSION['candidatura_erro']);

            if (isset($_SESSION['cancelar_trabvolut'])) {
                echo '<b><div class="alert alert-success" align="center" role="alert">Trabalho cancelado com sucesso! :)</div></b>';
            }
            unset($_SESSION['cancelar_trabvolunt']);
    ?>
        <div class="container">
            <input type="checkbox" id="chk">
            <label for="chk" class="show-menu-btn">
                <i class="fas fa-bars"></i>
            </label>
            <ul class="menu">
            <a href="homevoluntario.php">Home <span class="badge badge-primary" title="Home">🏠</span></a>
            <a href="editarvoluntario.php">Editar <span class="badge badge-warning" title="Editar conta">⚙</span></a>
            <a href="logout_voluntario.php">Sair <span class="badge badge-danger" title="Sair">🚪</span></a>
                <label for="chk" class="hide-menu-btn">
                    <i class="fas fa-times"></i>
                </label>
            </ul>
            <div id="branding">
                <a href="homevoluntario.php"><img src="img/logotipotcc1.png" class="logo"></a>
            </div>
        </div>
        <section id="showcase"><br>
            <div class="container">
                <h1 class="text-1">Olá, <?php echo $home[0][0]; ?>!</h1>
            </div>
        </section>
    </header>

    <section id="boxes"><br>
        <div class="container">
            <div class="box" id="perfil-button">

                <hr>
                <img src="img/volun.png" class="image" title="Ongs">
                <h3 class="text-3"><?php echo $home[0][0]; ?></h3>
                <p class="text-p"> Tipo de usuário: <span class="badge badge-secondary" title="Voluntário">Voluntário</span>
                    <br><?php echo $home[0][1].", ".$home[0][2]; ?> - Brasil</p>
                <hr>
                <a href="buscar.php" class="btn btn-info btn-lg btn-block">Começar agora</a>
            </div>
            <div class="box" id="perfil">
                <h3 class="text-1">Editar dados</h3>
                <hr>
                <img src="img/dados.png" class="image" title="Ongs">
                <p class="text-p"> Seus dados podem ser modificados clicando no botão abaixo.</p>
                <a href="editarvoluntario.php" class="btn btn-info btn-lg btn-block">Editar dados </a>
                <hr>
                <br>
            </div>
            <div class="box" id="perfil">
                <h3 class="text-1">Está meio perdido?</h3>
                <hr>
                <img src="img/perdido.png" class="image" title="Ongs">
                <p class="text-p">Em caso de dúvida sobre o site, clique no botão abaixo.</p>
                <a href="ajudavoluntario.php" class="btn btn-info btn-lg btn-block">Preciso de Ajuda </a>
                <hr>
                <br>
            </div>
        </div><br>
    </section>

    <header class="header-trabalho1">
        <div class="container">
            <section id="showcase">
                <div class="container"><br>
                    <h1 class="text-1">Pronto para fazer a diferença?</h1>
                    <p class="text-1">
                        Logo abaixo você poderá localizar as ONGs/Instituições e seus respectivos trabalhos.</p>
                </div>
            </section>
    </header>

    <section id="boxes"><br>
        <div class="container">
            <div class="box" id="perfil">
                <h3>Busque ONGs/Instituições</h3>

                <p class="alterar">Encontre trabalhos criados e visite os perfis das ONGs/Instituições quando desejar.
                </p>
                <img src="img/localizar.png" class="image" title="Ongs">
                <a href="buscar.php" class="btn btn-info btn-lg btn-block" >Explorar</a>

            </div>
            <div class="box" id="perfil">
                <h3 class="text-1">Trabalhos realizados</h3>

                <p class="alterar">Veja todos os trabalhos que você realizou e que já tiveram seu encerramento.
                </p>
                <img src="img/realizados.png" class="image" title="Ongs">
                <a href="trabalhosrealizados.php" class="btn btn-info btn-lg btn-block">Visualizar</a>

            </div>
            <div class="box" id="perfil">
                <h3 class="text-1">Trabalhos em andamento</h3>

                <p class="alterar">Veja os trabalhos em andamento criados pelas ONGs/Instituições.
                </p>
                <img src="img/andamento1.png" class="image" title="Ongs">
                <a href="trabalhosandamentovoluntario.php" class="btn btn-info btn-lg btn-block">Visualizar</a>

            </div>
        </div>
    
        <footer>
        <p>Acesse nossas redes sociais e fique por dentro.</p>
        <p class="one">
            <a href="https://twitter.com/humanhelpbr"><img src="img/twitter.png"></a>
            <a href="https://instagram.com/humanhelpbr"><img src="img/instagram.png"></p>
        </a>
        <p>Equipe Human Help Copyright &copy; 2019</p>
    </footer>
    </section>
</body>

</html>