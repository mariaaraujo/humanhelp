<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
require_once('banco.inc');
require_once('checa_voluntario.php');
$voluntario = $_SESSION['codigo_voluntario'];
$home = $con->query("SELECT nm_voluntario, nm_email FROM tb_voluntario WHERE cd_voluntario = '$voluntario'");
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
<header class="header-trabalhocriado">
            <div class="container">
                <input type="checkbox" id="chk">
                <label for="chk" class="show-menu-btn">
                    <i class="fas fa-bars"></i>
                </label>
                <ul class="menu">
                    <a><?php echo $home[0][0]; ?><a>
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
            <section id="showcase">
                <div class="container">
                    <br><br><br>
                    <h1 class="text-1">Tire suas dúvidas aqui</h1>
                    <br><br>
                </div>
            </section>
        </header>

    <section id="boxes">
        <div class="container">
            <h2 id="topico">Voluntário, qual o tipo de dúvida? </h2>
            <div class="box">
                <img src="img/trab.png" class="image" title="Ongs">
                <h3 class="text-2">Como localizar os trabalhos voluntários?</h3>
                <p>O voluntário, ao efetuar seu login será redirecionado a página principal e em seguida após rolar a página terá a opção encontrar trabalho voluntário.
                </p>
            </div>
            <div class="box">
                <img src="img/trab2.png" class="image" title="Ongs">
                <h3 class="text-2">De que forma posso saber hora, dia ou local do trabalho?</h3>
                <p>Ao encontrar o trabalho voluntário desejado, você terá todas informações de dia, hora e local fornecido pela ONG/Instituição.
                </p>
            </div>
            <div class="box">
                <img src="img/trab1.png" class="image" title="Ongs">
                <h3 class="text-2">Será possível cancelar o trabalho?</h3>
                <p>Caso você não possa estar presente no dia do trabalho ou qualquer outra situação, poderá cancelar o trabalho que iria realiza-lo.
                </p>
            </div>
        </div>
    </section>

    <section id="boxes" class="suporte">
        <div class="container">
            <div class="box">
            </div>
            <div class="box">
                <h3 class="text-2">Preencha o formulário</h3><br>
                <form method="POST" action="email.php">
                    <div class="form-group">
                        <label for="nomeduvida">Nome</label>
                        <input type="text" class="form-control" id="nomeduvida" name="nomeduvida" value="<?php echo $home[0][0]; ?>" placeholder="Digite seu nome" disabled>
                    </div>
                    <div class="form-group">
                        <label for="emailduvida">E-mail</label>
                        <input type="email" maxlength="100" class="form-control" id="emailduvida" name="emailduvida" value="<?php echo $home[0][1]; ?>" placeholder="Digite seu email" disabled>
                    </div>
                    <div class="form-group">
                        <label for="duvida">Sua dúvida</label>
                        <textarea class="form-control" id="duvida" name="duvida" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-info btn-lg btn-block">Enviar dúvida</button>
                </form>
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