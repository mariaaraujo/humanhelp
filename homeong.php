<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
include ('banco.inc');
include ('checa_ong.php');

$cd_instituicao = $_SESSION['codigo_instituicao'];

$qt_vaga = $con->query("SELECT count(cd_trabalho) FROM tb_trabalho WHERE cd_instituicao = '$cd_instituicao'");
$qt_vaga = $qt_vaga->fetch_all();
$qt_vaga = $qt_vaga[0][0];

$qt_voluntario = $con->query("SELECT count(v.cd_vaga) FROM tb_vaga AS v JOIN tb_trabalho AS t ON t.cd_trabalho = v.cd_trabalho WHERE t.cd_instituicao = '$cd_instituicao'");
$qt_voluntario = $qt_voluntario->fetch_all();
$qt_voluntario = $qt_voluntario[0][0];

$home = $con->query("SELECT i.nm_instituicao, e.nm_cidade, e.nm_estado, i.ds_instituicao FROM tb_instituicao as i
JOIN tb_endereco as e
on e.cd_endereco = i.cd_endereco
WHERE i.cd_instituicao = '$cd_instituicao'");
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
    <header class="header-principal">
        <?php
            if (isset($_SESSION['vaga_cadastrada'])) {
                echo '<b><div class="alert alert-success" align="center" role="alert">Vaga cadastrada com sucesso! :)</div></b>';
            }
            unset($_SESSION['vaga_cadastrada']);

            if (isset($_SESSION['editar_sucesso'])) {
                echo '<b><div class="alert alert-success" align="center" role="alert">Dados alterados com sucesso! :)</div></b>';
            }
            unset($_SESSION['editar_sucesso']);

            if (isset($_SESSION['editar_erro'])) {
                echo '<b><div class="alert alert-danger" align="center" role="alert">Os dados não puderam ser alterados com sucesso! :(</div></b>';
            }
            unset($_SESSION['editar_erro']);

            if (isset($_SESSION['cancelar_trab'])) {
                echo '<b><div class="alert alert-success" align="center" role="alert">Trabalho cancelado com sucesso! :)</div></b>';
            }
            unset($_SESSION['cancelar_trab']);
        ?>
        <div class="container">
            <input type="checkbox" id="chk">
            <label for="chk" class="show-menu-btn">
                <i class="fas fa-bars"></i>
            </label>
            <ul class="menu">
                <a href="homeong.php">Home <span class="badge badge-primary" title="Home">🏠</span></a>
                <a href="editarong.php">Editar <span class="badge badge-warning" title="Editar conta">⚙</span></a>
                <a href="logout_ong.php">Sair <span class="badge badge-danger" title="Sair">🚪</span></a>
                <label for="chk" class="hide-menu-btn">
                    <i class="fas fa-times"></i>
                </label>
            </ul>
            <div id="branding">
                <a href="homeong.php"><img src="img/logotipotcc1.png" class="logo"></a>
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
                <img src="img/ongs.png" class="image" title="Ongs">
                <h3 class="text-3"><?php echo $home[0][0]; ?></h3>
                <p class="text-p"> Tipo de usuário: <span class="badge badge-secondary" title="Voluntário">ONG/Instituição</span>
                <br><?php echo $home[0][1].", ".$home[0][2]; ?> - Brasil</p>
                <hr>
                <a href="criacaovaga.php" class="btn btn-success btn-lg btn-block">Criar vaga</a>
            </div>
            <div class="box" id="perfil">
                <hr>
                <h3 class="text-1">Trabalhos criados</h3>
                <p>
                    <h4 class="text-vgcriadas"><?php echo $qt_vaga; ?></h4>
                </p>
                <hr>
                <h3 class="text-1">Descrição da Ong</h3>
                <hr>
                <img src="img/dados.png" class="image" title="Ongs">
                <p class="text-p"><?php echo $home[0][3]; ?></p>
                <a href="editarong.php" class="btn btn-info btn-lg btn-block">Editar dados</a>
                <hr>
                <br>
            </div>
            <div class="box" id="perfil">
                <hr>
                <h3 class="text-1">Voluntários da ONG</h3>
                <p>
                    <h4 class="text-vgcriadas"><?php echo $qt_voluntario; ?></h4>
                </p>
                <hr>
                <h3 class="text-1">Está meio perdido?</h3>
                <hr>
                <img src="img/perdido.png" class="image" title="Ongs">
                <p class="text-p"> Se deseja saber mais como funciona o site basta clicar no botão abaixo.</p>
                <a href="ajudaong.php" class="btn btn-info btn-lg btn-block">Preciso de Ajuda</a>
                <hr>
                <br>
            </div>
        </div><br>
    </section>

    <header class="header-trabalho">
        <div class="container">
            <section id="showcase">
                <div class="container"><br><br>
                    <h1 class="text-1">Criar trabalhos</h1>
                    <p class="text-1">Crie vagas agora mesmo e encontre voluntários.</p>
                </div>
            </section>
    </header>

    <section id="boxes"><br>
        <div class="container">
            <div class="box" id="perfil">
                <h3 class="text-1">Trabalhos criados</h3>
                <hr>
                <p>Veja todos os trabalhos que sua ONG/Instituição já criou.
                </p>
                <img src="img/criados.png" class="image" title="Ongs">
                <a href="trabalhoscriados.php" class="btn btn-info btn-lg btn-block">Visualizar</a>
                <hr>
            </div>
            <div class="box" id="perfil">
                <h3 class="text-1">Trabalhos finalizados</h3>
                <hr>
                <p>Veja os trabalhos que já foram realizados pela sua ONG/Instituição.
                </p>
                <img src="img/finalizados.png" class="image" title="Ongs">
                <a href="trabalhosfinalizados.php" class="btn btn-info btn-lg btn-block">Visualizar</a>
                <hr>
            </div>
            <div class="box" id="perfil">
                <h3 class="text-1">Trabalhos em andamento</h3>
                <hr>
                <p>Veja os trabalhos criados pela sua ONG/Instituição que ainda serão realizados.
                </p>
                <img src="img/andamento1.png" class="image" title="Ongs">
                <a href="trabalhosandamento.php" class="btn btn-info btn-lg btn-block">Visualizar</a>
                <hr>
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